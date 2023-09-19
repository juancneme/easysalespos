<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Management\Address;
use App\Models\Management\Company;
use App\Models\Management\Contract;
use App\Models\Management\Deliveries;
use App\Models\Management\Transactions;
use App\Models\Management\TransactionsDetails;
use App\Models\Management\TransactionsPaymentmethods;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class tirilla01 extends Controller
{
    function tirilla01() {

        $id = 725; 

        //INICO DATA TIRILLA DESDE ID VENTA
        $sales = Transactions::where('id', $id)
            ->with('Cliente','User','Seller','typeOperation')
            ->first();

        $delivery = Deliveries::where('deliveries.transaction_id', $sales->id)
            ->get();

        if ( isset($delivery[0]) ) {
            $address = Address::find($delivery[0]->address_id);
            $sales->address = $address->address;
            $sales->neighborhood = $address->neighborhood;
            $sales->location = $address->location;
        }
        
        $details = TransactionsDetails::select('catalog_products.name', 'transactions_details.quantity',
                     'transactions_details.unit_price',
                     'transactions_details.total_value',
                     'catalog_products.salesunit_id')
                ->join('catalog_products', 'catalog_products.id', 'transactions_details.catalog_product_id')
                ->where('transactions_details.transaction_id', $id)
                ->get()->toArray();

        $sales->totalArt = 0;
        for ($i=0; $i<count($details); $i++) {
            if ($details[$i]['salesunit_id'] == 54)
                $sales->totalArt += $details[$i]['quantity'];
            else
                $sales->totalArt++;
        }

        $payments = TransactionsPaymentmethods::select('lists.id',
                    'lists.name', 
                    'transactions_paymentmethods.amount', 
                    'transactions_paymentmethods.authorization_code', 
                    'transactions_paymentmethods.receipt_number')
                ->join('lists', 'lists.id', 'transactions_paymentmethods.paymentmethods_id')
                ->where('transactions_paymentmethods.transaction_id', $id)
                ->get()->toArray();

        $payItems = TransactionsPaymentmethods::where('transaction_id', $id)
            ->get()->count();
    
        $numventa = Transactions::select('id')->where('id', $id)->get();
    
        $company = Company::where('id', $sales->company_id)
            ->with('Persona','RegimenImpuestos')
            ->first();

        $contract = Contract::where('id',auth()->user()->contract_id)
            ->with('Persona')->first();

        $resDian = search_counter_control (61, $contract->id, $company->id);

        //FIN DATA TIRILLA DESDE ID VENTA

        //inicio Congiguracion impresora. Se debe parametrizar
        $nombre_impresora = "imp_pdv";

        $connector = new WindowsPrintConnector($nombre_impresora);
        $printer = new Printer($connector);
        $printer->setJustification(Printer::JUSTIFY_CENTER);
        //fin Congiguracion impresora. Se debe parametrizar

        //Prueba impresion tipos de letras
        $this->prueba_impresion($printer);
        $printer -> initialize();
        exit();

        //inicio Construccion tirilla01
        $path_file = '/support/pictures/companies/' . $sales->contract_id . '/' . $company->id . '/' . $company->logo;
        if ( file_exists(public_path( $path_file )) ) {
            $logo = EscposImage::load(public_path( $path_file ), false);
        }
        $printer->bitImage($logo);
        
        /*
        Imprimimos un mensaje. Podemos usar
        el salto de línea o llamar muchas
        veces a $printer->text()
         */
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        $printer->setTextSize(1, 2);
        $printer->text($company->name);
        $printer->feed();
        $printer->text($company->slogan);
        $printer->feed();
        $printer->setTextSize(1, 1);
        $printer->feed();
        $printer->text('IVA '.$company->RegimenImpuestos->name.' NIT: '.$contract->Persona->numberdocument.'-'.$contract->Persona->digitcheck);
        $printer->feed();

        if ($resDian->resolution_number != '') {
            $printer->text('RESOLUCION DIAN: '.$resDian->resolution_number.' DE '.$resDian->resolution_date);
            $printer->feed();
            $printer->text('DEL '.$resDian->initial_value.' AL '.$resDian->final_value.' '.$resDian->official_text);
            $printer->feed();
        }
        $printer->text($company->Persona->location[0]->address);
        $printer->feed();

        if ( isset($company->Persona->ContactPhone[0]->textcontact) ) {
            $printer->text($company->Persona->location[0]->city.' - Tel: '.$company->Persona->ContactPhone[0]->textcontact);
        } else {
            $printer->text($company->Persona->location[0]->city);
        }
        $printer->feed(2);

        $printer -> setJustification(Printer::JUSTIFY_LEFT);
        $printer->setTextSize(1, 2);
        $printer->text(__("SALES INVOICE").': '.$sales->invoice_number);

        $printer->setTextSize(1, 1);
        $printer->feed(2);
        $printer->text(__("Client"));
        $printer->feed();
        $printer->text(__("Mr. or Ms").': ');
        if (!empty($sales->Cliente)) {
            $printer->text($sales->Cliente->person->fullname);
            $printer->feed();
            $printer->text($sales->Cliente->person->TypeDocument->code . ' : ' . $sales->Cliente->person->numberdocument);
            $printer->feed();
            if (!empty($sales->address)) {
                $printer->text(!empty($sales->address) ? $sales->address : '');
                $printer->feed();
                $printer->text(!empty($sales->neighborhood) ? $sales->neighborhood : '');
                $printer->feed();
                $printer->text(!empty($sales->location) ? $sales->location : '');
            }
        } else {
            $printer->text(__("Customer Counter"));
        }
        $printer->feed(2);

        $reg = $this->registrox2_caj_fec($printer, __("Seller"), __("Date"));
        $printer->text($reg);
        $printer->feed();
        $reg = $this->registrox2_caj_fec($printer, $sales->Seller->Persona->fullname, $sales->created_at);
        $printer->text($reg);
        $printer->feed(2);

        $printer -> setJustification(Printer::JUSTIFY_LEFT);
        $printer->setTextSize(1, 1);

        // $details = $details->toArray();
        $reg = $reg = $this->registrox3_prod_tit(
                        $printer,
                        __('Description'),
                        __('Valor Un'),
                        __('SubTotal'));
        $printer->text($reg);
        $printer->feed();
        $printer->text('------------------------------------------------');
        $printer->feed();

        if (count($details) > 0) {
            for ($i=0; $i<count($details); $i++) {
                $reg = $this->registrox3_prod(
                        $printer,
                        $details[$i]['quantity'].' X '.strtoupper($details[$i]['name']),
                        $details[$i]['unit_price'],
                        $details[$i]['total_value']
                    );
                $printer->text($reg);
                $printer->feed();
            }
        }

        //Resumen valores
        $printer->text('------------------------------------------------');
        $printer->feed(1);
        $printer -> setEmphasis(true);
        $reg = $this->registrox2_resume(
            $printer,
            __('Total Articles'),
            $sales->totalArt,
            true
            );
        $printer->text($reg);
        $printer->feed();

        $reg = $this->registrox2_resume(
            $printer,
            __('SubTotal'),
            $sales->total_value-$sales->iva_value);
        $printer->text($reg);
        $printer->feed();

        $reg = $this->registrox2_resume(
            $printer,
            __('VAT'),
            $sales->iva_value);
        $printer->text($reg);
        $printer->feed();

        $reg = $this->registrox2_resume(
            $printer,
            __('Total'),
            $sales->total_value);
        $printer->text($reg);
        $printer->feed();
        $printer -> setEmphasis(false);
        $printer->text('------------------------------------------------');
        $printer->feed();
        
        //Medios de Pago diferente a Efectivo
        //xxxxxxxxxxxxxxx
        $efectivo = null;
        $printer -> setEmphasis(true);
        $printer->setTextSize(1, 2);
        // dd($payments[0]['id']);
        if (count($payments) > 0) {
            for ($i=0; $i<count($payments); $i++) {
                if ($payments[$i]['id'] != 92) {
                    $reg = $this->registrox2_medpag(
                        $printer,
                        $payments[$i]['name'],
                        $payments[$i]['amount']
                    );
                    $printer->text($reg);
                    $printer->feed();
                } else {
                    $efectivo = $i;
                }
            }
        }

        $printer->text('------------------------------------------------');
        $printer->feed();
        $printer->setTextSize(1, 2);
        if ($efectivo >= 0) {
            // dd($efectivo,$payments[$efectivo]['amount']);
            $reg = $this->registrox2_medpag(
                $printer,
                __('Cash Payment'),
                $payments[$efectivo]['amount']
            );
            $printer->text($reg);
            $printer->feed();

            $reg = $this->registrox2_medpag(
                $printer,
                __('Received Value'),
                $payments[$efectivo]['authorization_code']
            );
            $printer->text($reg);
            $printer->feed();

            $reg = $this->registrox2_medpag(
                $printer,
                __('Change'),
                $payments[$efectivo]['receipt_number']
            );
            $printer->text($reg);
            $printer->feed();

        }
        $printer->text('------------------------------------------------');
        $printer -> setEmphasis(true);
        $printer->feed(1);
        $printer -> setJustification(Printer::JUSTIFY_CENTER);
        $printer->setTextSize(1, 1);
        $printer->text("GRACIAS POR SU COMPRA");
        $printer->feed(2);
        $printer->cut();
        $printer->pulse(); //Abrir cajon
        $printer->close();

    }

    public function prueba_impresion($printer){
        /* Initialize */
        $printer -> initialize();
        
        /* Text of various (in-proportion) sizes */
        $this->title($printer, "Change height & width\n");
        for ($i = 1; $i <= 8; $i++) {
            $printer -> setTextSize($i, $i);
            $printer -> text($i);
        }
        $printer -> text("\n");
        
        /* Width changing only */
        $this->title($printer, "Change width only (height=4):\n");
        for ($i = 1; $i <= 8; $i++) {
            $printer -> setTextSize($i, 4);
            $printer -> text($i);
        }
        $printer -> text("\n");
        
        /* Height changing only */
        $this->title($printer, "Change height only (width=4):\n");
        for ($i = 1; $i <= 8; $i++) {
            $printer -> setTextSize(4, $i);
            $printer -> text($i);
        }
        $printer -> text("\n");
        
        /* Very narrow text */
        $this->title($printer, "Very narrow text:\n");
        $printer -> setTextSize(1, 8);
        $printer -> text("The quick brown fox jumps over the lazy dog.\n");
        
        /* Very flat text */
        $this->title($printer, "Very wide text:\n");
        $printer -> setTextSize(4, 1);
        $printer -> text("Hello world!\n");
        
        /* Very large text */
        $this->title($printer, "Largest possible text:\n");
        $printer -> setTextSize(8, 8);
        $printer -> text("Hello\nworld!\n");
        
        $printer -> cut();
        $printer -> close();

        return;

    }
    public function title(Printer $printer, $text)
    {
        $printer -> selectPrintMode(Printer::MODE_EMPHASIZED);
        $printer -> text("\n" . $text);
        $printer -> selectPrintMode(); // Reset
    }

    public function registrox2_caj_fec($printer,$d1,$d2) {
        $Col1 = 23;
        $Col2 = 23;

        $datcol1 = str_pad($d1, $Col1);
        $datcol2 = str_pad($d2, $Col2, ' ', STR_PAD_LEFT);

        return($datcol1.' '.$datcol2);
    }

    public function registrox3_prod_tit($printer,$d1,$d2,$d3) {
        $Col1 = 26;
        $Col2 = 10;
        $Col3 = 10;

        $datcol1 = str_pad($d1, $Col1);
        $datcol2 = str_pad($d2, $Col2,' ', STR_PAD_LEFT);
        $datcol3 = str_pad($d3, $Col3,' ', STR_PAD_LEFT);

        return($datcol1.' '.$datcol2.' '.$datcol3);
    }

    public function registrox3_prod($printer,$d1,$d2,$d3) {
        $Col1 = 26;
        $Col2 = 10;
        $Col3 = 10;

        // if (strlen($d1) >= $Col1+5) {
        //     $printer->text(substr($d1,0,26));
        //     $printer->feed();
        //     // $new  = substr($d1,0,26);
        //     $d1 = substr($d1,26,strlen($d1));
        //     // dd($new,' ',$d1);
        // } else {
        //     $d1 = substr($d1,0,26);
        // }
        if (strlen($d1) > $Col1) {
            $d1 = substr($d1,0,26);
        }

        $datcol1 = str_pad($d1, $Col1) ;
        $datcol2 = str_pad('$'.number_format($d2), $Col2,' ', STR_PAD_LEFT);
        $datcol3 = str_pad('$'.number_format($d3), $Col3,' ', STR_PAD_LEFT);

        return($datcol1.' '.$datcol2.' '.$datcol3);
    }

    public function registrox2_resume($printer,$d2,$d3,$sw=false) {
        $Col1 = 10;
        $Col2 = 20;
        $Col3 = 14;

        $d1 = '';
        $datcol1 = str_pad($d1, $Col1);
        $datcol2 = str_pad($d2, $Col2);
        if ( $sw )
            $datcol3 = str_pad(number_format($d3), $Col3,' ', STR_PAD_LEFT);
        else
            $datcol3 = str_pad('$'.number_format($d3), $Col3,' ', STR_PAD_LEFT);

        return($datcol1.' '.$datcol2.' '.$datcol3);
    }

    public function registrox2_medpag($printer,$d2,$d3) {
        $Col1 = 5;
        $Col2 = 18;
        $Col3 = 16;

        $d1 = '';
        $datcol1 = str_pad($d1, $Col1);
        $datcol2 = str_pad($d2, $Col2);
        $datcol3 = str_pad('$'.number_format($d3), $Col3,' ', STR_PAD_LEFT);

        return($datcol1.' '.$datcol2.' '.$datcol3);
    }

    //
}
