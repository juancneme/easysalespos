<?php

namespace App\Helpers;

//Models
use App\Http\Controllers\Management\SistecreditController;
use App\Models\Management\Transactions;
use App\Models\Management\Deliveries;
use App\Models\Management\TransactionsDetails;
use App\Models\Management\TransactionsPaymentmethods;
use App\Models\Management\Courier;
use App\Models\Management\CatalogProducts;
use App\Models\Management\BalancePayments;
use App\Models\Management\Inventory;
use App\Models\Management\InventoryDetails;

//Utilities
use DB;
use Carbon\Carbon;
use Exception;

//Enums
use App\Enums\DeliveryStatusEnum;
use App\Enums\PaymentMethodEnum;
use App\Enums\TransactionsStatusEnum;
use App\Enums\StatusEnum;
use App\Enums\TransactionsPaymentsEnum;
use App\Enums\TypePayment;

class Transaction
{
    public function __construct($id, $delivery = false){
        $this->id = $id;
        $this->delivery = $delivery;
    }

    public function reject($group, $page){

        try{
            DB::beginTransaction();

            if($this->delivery) {
                $delivery = Deliveries::find($this->id);
                $courier = Courier::find($delivery->courier_id);
                $transaction = Transactions::find($delivery->transaction_id);
                $this->setCourier($delivery, $courier);
            } else {
                $transaction = Transactions::find($this->id);

                $count_deliveries = Deliveries::where('transaction_id', $transaction->id)
                    ->where('status', DeliveryStatusEnum::IN_TRANSIT)
                    ->count();

                if($count_deliveries >= 1) {
                    return redirect(strtolower($group . '/' . $page))
                        ->with('errors', array(__('El pedido de la venta No.'. $transaction->id .
                            ' Se encuentra en tránsito, debe esperar el resultado del pedido')));
                }
            }
            
            $this->rejectPayments($transaction);
            
            $transaction->status = TransactionsStatusEnum::REJECTED;
            $transaction->update();

            $id = isset($delivery) ? $delivery->id : $transaction->id;

            DB::commit();
            return redirect()->back()->with('success', array(__('Se actualizó el estado de la venta No.'. $id)));
        }
        catch(Exception $e){
            DB::rollback();
            dd($e);
            return redirect(strtolower($group . '/' . $page))->with('errors', array(__('Error al procesar la venta.'. $this->id)));
        }
    }

    public function setCourier($delivery, $courier){

        $delivery->status = DeliveryStatusEnum::REJECTED;
        $delivery->enddate = Carbon::now();
        $delivery->update();

        if(isset($courier)){
            $num_deliveries = Deliveries::where('courier_id', $courier->id)
                            ->where('status', DeliveryStatusEnum::IN_TRANSIT)
                            ->count();

            if($num_deliveries == 0){
                $courier->status = StatusEnum::ACTIVE;
                $courier->update();
            }
        }
    }

    public function rejectPayments($transaction){
        $payments = TransactionsPaymentmethods::where('transaction_id', $transaction->id)->get();
        $transaction_details = TransactionsDetails::where('transaction_id', $transaction->id)->get();

        foreach($payments as $payment){

            $payment->status = TransactionsPaymentsEnum::REJECTED;
            $payment->update();

            if($payment->paymentmethods_id == PaymentMethodEnum::EFECTIVO) {
                //Se debe enviar una transaccion por guardar saldo con #inicial = 5 para actualizar la 
                //Adcionalmente no se esta afectando el saldo de la transaccion en balance_accounts
                guardarsaldo(auth()->user()->contract_id, $transaction->company_id, $transaction->user_id, 17, $transaction->total_value, $transaction->id, $transaction->shiftmanagement_id, 3);
                // $this->rejectShiftBalance($transaction);
            }

            if($payment->paymentmethods_id == PaymentMethodEnum::FIADO_ELECTRONICO){
                $sistecreditCtrl = new SistecreditController();
                $sistecreditCtrl->requestCancelCredit($payment->receipt_number);
            }
        }

        foreach($transaction_details as $detail){
            //Se debe tener en cuanta si hay contgrol de inverntarios a nivel company
            //eso obliga a reversar en inventario obligatoriamente
            $catalogProduct = CatalogProducts::find($detail->catalog_product_id);

            $detail->status = TransactionsStatusEnum::REJECTED;
            $detail->update();

            if($catalogProduct->inventory_control == StatusEnum::ACTIVE && $transaction->status != 191) {
                $inventory = Inventory::where('product_id', $catalogProduct->id)->first();
                $inventoryDetail = new InventoryDetails();
                $unit_value = explode('|', $catalogProduct->UnidadVenta->code)[3];

                $inventory->availablequantity = (int) $inventory->availablequantity + (int) $detail->quantity;
                $inventory->update();

                $inventoryDetail->inventory_id = $inventory->id;
                $inventoryDetail->type_operation = 'REVERSION VENTA';
                $inventoryDetail->quantity = $detail->quantity;
                $inventoryDetail->unit_value = $inventory->saleprice;
                $inventoryDetail->total_value = $inventory->saleprice * ($detail->quantity / (int) $unit_value);
                $inventoryDetail->gross_margin = 0;
                $inventoryDetail->save();
            }   
        }

    }

    public function rejectShiftBalance($transaction){
        $balance = new BalancePayments();

        $balance->contract_id = auth()->user()->contract_id;
        $balance->company_id  = $transaction->company_id;
        $balance->user_id = $transaction->user_id;
        $balance->date_payment = Carbon::now();
        $balance->typepayment_id = TypePayment::DEBIT;
        $balance->amount_payment = $transaction->total_value;
        $balance->description_payment = "Reversion Venta No. " . $transaction->id;
        $balance->businesskey = $transaction->id;
        $balance->shiftmanagement_id = $transaction->shiftmanagement_id;
        $balance->status = StatusEnum::ACTIVE;
        $balance->save();
        
        $balance_ori = BalancePayments::where('balance_payments.businesskey', $transaction->id)->get()->first();
        $balance_ori->status = StatusEnum::INACTIVE;
        $balance_ori->save();

    }
}
