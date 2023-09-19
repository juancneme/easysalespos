<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Management\BalanceAccounts;
use App\Models\Management\BalancePayments;
use DB;

trait SaveFunction { 

    public function savepayment ( $tipo, $contract, $filenumber, $valueIn, $description, $fechaPayment='', $pindeposito='', $user_res = '' ) { 

        // dd( $tipo, $contract, $filenumber, $valueIn, $description, $fechaPayment, $pindeposito);    

        //EVALUA SI ES NUMERO DE REFERENCIA 
        if (substr($filenumber,0,4) == 'NURE' ) {
            return true;
        }

        $user_id = auth()->user()->id;
        if ($user_res != '') {
            $user_id = $user_res;
        }
        
        if ( $tipo == 'DB' ) {
            $swSaldo = $this->validar_saldo_disponible($contract, $valueIn,$user_id);
            if (!$swSaldo) {
                return false;
            }
        }

        //se debe usar la funcion de guardasaldo ===>

        $account = BalanceAccounts::where('contract_id', $contract)->first();

        if ( $tipo == 'DB'){
            $account->balance_value = $account->balance_value - $valueIn;
        } else {
            $account->balance_value = $account->balance_value + $valueIn;
        }
        $account->save();

        $regexiste = BalancePayments::where('businesskey', $filenumber)->get();

        if (count($regexiste) >= 1) {
            return false;
        }

        $payment = new BalancePayments();
        $payment->contract_id = $contract;
        $payment->company_id = null;
        $payment->user_id = $user_id;
        if ( $tipo == 'DB'){
            $payment->date_payment = Carbon::now()->toDateTimeString();
            $payment->typepayment_id = 18; //Nota Debito
            $payment->pin_payment = $pindeposito;
        } else {
            $payment->date_payment = $fechaPayment;
            $payment->typepayment_id = 17; //Nota Credito
            $payment->pin_payment = $pindeposito;
        }
        $payment->amount_payment = $valueIn;
        $payment->description_payment = $description.': '.$filenumber;
        $payment->businesskey = $filenumber;
        $payment->status = 1;
        $payment->save();
        return true;
    }
    
    public function validar_saldo_disponible($contract, $valueIn, $user = '') {
        if ($user == '') $user = auth()->user()->id;
        $saldo = $this->calcula_saldo_disponible($contract, $user);

        if ($saldo >= $valueIn){
            $return = true;
        } else {
            $return = false;
        }

        return $return;
    }

    public function calcula_saldo_disponible_contrato($contract) {
        $creditos = BalancePayments::select(DB::raw("sum(balance_payments.amount_payment) AS value"))
                ->where('balance_payments.contract_id', $contract)
                ->where('balance_payments.typepayment_id', 17)
                ->whereNotIn('balance_payments.user_id', [100000,100001,100002])
                ->value('value');
        $debitos = BalancePayments::select(DB::raw("sum(balance_payments.amount_payment) AS value"))
                ->where('balance_payments.contract_id', $contract)
                ->where('balance_payments.typepayment_id', 18)
                ->whereNotIn('balance_payments.user_id', [100000,100001])
                ->value('value');
        return $creditos - $debitos;
    }

    public function calcula_saldo_disponible($contract, $company, $user) {

        if ($user == 'all') {
            if ($company == 'all') {
                $creditos = BalancePayments::select(DB::raw("sum(balance_payments.amount_payment) AS value"))
                        ->where('balance_payments.contract_id', $contract)
                        // ->where('balance_payments.company_id', $company)
                        // ->where('balance_payments.user_id', $user)
                        ->where('balance_payments.typepayment_id', 18)
                        ->value('value');
                $debitos = BalancePayments::select(DB::raw("sum(balance_payments.amount_payment) AS value"))
                        ->where('balance_payments.contract_id', $contract)
                        // ->where('balance_payments.company_id', $company)
                        // ->where('balance_payments.user_id', $user)
                        ->where('balance_payments.typepayment_id', 17)
                        ->value('value');
            } elseif ($company > 0) {
                $creditos = BalancePayments::select(DB::raw("sum(balance_payments.amount_payment) AS value"))
                        ->where('balance_payments.contract_id', $contract)
                        ->where('balance_payments.company_id', $company)
                        // ->where('balance_payments.user_id', $user)
                        ->where('balance_payments.typepayment_id', 18)
                        ->value('value');
                $debitos = BalancePayments::select(DB::raw("sum(balance_payments.amount_payment) AS value"))
                        ->where('balance_payments.contract_id', $contract)
                        ->where('balance_payments.company_id', $company)
                        // ->where('balance_payments.user_id', $user)
                        ->where('balance_payments.typepayment_id', 17)
                        ->value('value');
            }
        } elseif ($user > 0) {
            $creditos = BalancePayments::select(DB::raw("sum(balance_payments.amount_payment) AS value"))
                    ->where('balance_payments.contract_id', $contract)
                    ->where('balance_payments.company_id', $company)
                    ->where('balance_payments.user_id', $user)
                    ->where('balance_payments.typepayment_id', 18)
                    ->value('value');
            $debitos = BalancePayments::select(DB::raw("sum(balance_payments.amount_payment) AS value"))
                    ->where('balance_payments.contract_id', $contract)
                    ->where('balance_payments.company_id', $company)
                    ->where('balance_payments.user_id', $user)
                    ->where('balance_payments.typepayment_id', 17)
                    ->value('value');
        }

        return $creditos - $debitos;
    }

}