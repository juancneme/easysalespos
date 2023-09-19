<?php

namespace App\Console\Commands;

use App\Http\Controllers\Management\PaidProvidersController;
use App\Models\Management\PaidProviders;
use App\Models\Management\TransactionsPaymentmethods;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
const STATUS = 116;
const API_MERCADOPAGO = 'https://api.mercadopago.com/v1/payments/';

class UpdateTransactionsPaymentMethods extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updatePaymentmethods';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualiza los estados de la tabla transaction_paymentmethods';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $paidinProcess = PaidProviders::where('status_id', STATUS)
            ->where('payment_provider_pay_id', '!=', 0)
            ->get();

        if (count($paidinProcess) > 0) {
            for ($i = 0; $i < count($paidinProcess); $i++) {
                $id = $paidinProcess[$i]->payment_provider_pay_id;
                $client = new \GuzzleHttp\Client();
                $response = $client->request('GET', API_MERCADOPAGO .'/'. $id . '?access_token=' . $paidinProcess[$i]->access_token);
                $jsonResponse = json_decode($response->getBody()->getContents());
                switch ($jsonResponse->status) {
                    case 'approved' :
                        $this->updatePayProviders($jsonResponse, $paidinProcess[$i]->id, 2);
                        break;

                    case 'rejected' :
                        $this->updatePayProviders($jsonResponse, $paidinProcess[$i]->id, 4);
                        break;

                    case 'cancelled' :
                        $this->updatePayProviders($jsonResponse, $paidinProcess[$i]->id, 4);
                        break;

                    default:
                        break;

                }

                continue;

            }


        }
    }

    /**
     * Actualiza el estado de cada transacción
     * @param $request
     * @param $id
     * @param $status
     */
    public function updatePayProviders($request, $id, $status)
    {

        $paidProviders = PaidProviders::find($id);
        $paidProviders->payment_provider_status = $request->status;
        $paidProviders->payment_provider_status_detail = $request->status_detail;
        $paidProviders->status_id = $status;
        $paidProviders->update();

        $transactionPay = TransactionsPaymentmethods::find($paidProviders->transaction_id);
        $transactionPay->update(['status' => $status]);

    }
}
