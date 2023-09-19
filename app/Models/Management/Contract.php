<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;
use const App\Http\Controllers\Management\TIPOS_PAGOS;

class Contract extends Model
{
    //
    public $table = "contracts";

    public function TypeContract(){
        return $this->hasOne('App\Models\Management\Lists', 'id', 'typecontract_id');
    }
    
    public function Persona(){
        return $this->hasOne('App\Models\Management\Person', 'id', 'person_id');
    }

    public function TypeRegime(){
        return $this->hasOne('App\Models\Management\Lists', 'id', 'typecontract_id');
    }

    public function getPaymentsMethods(){
        $itemstypepay1 = Contract::where('contracts.id', $this->id)
            ->join('lists', 'lists.id', 'contracts.paymentsmethods')
            ->value('paymentsmethods');

        $paymentsid = explode("|", $itemstypepay1);

        return Lists::where('idowner', '=', TIPOS_PAGOS)->whereIn('id', $paymentsid)
            ->orderBy('name', 'asc')->get();
    }
}
