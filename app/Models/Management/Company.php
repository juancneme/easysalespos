<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Model;
use const App\Http\Controllers\Management\TIPOS_PAGOS;
use const App\Http\Controllers\Management\TIPOS_SEDES;

class Company extends Model {

    public $timestamps = false;

    public $table = "companies";

    public function Persona(){
        return $this->hasOne('App\Models\Management\Person', 'id', 'person_id');
    }

    public function Contrato(){
        return $this->hasOne('App\Models\Management\Contract', 'id', 'contract_id');
    }

    public function RegimenImpuestos(){
        return $this->hasOne('App\Models\Management\Lists', 'id', 'taxregime_id');
    }

    public function companiesUser()
    {
        return $this->hasMany(CompaniesUsers::class, 'company_id', 'id');
    }

    public function getSellers(){

        return User::select('users.id', 'socialreason', 'firstname', 'lastname')
                ->join('companies_users', 'companies_users.user_id', 'users.id')
                ->join('persons', 'persons.id', 'users.person_id')
                ->where('companies_users.company_id', $this->id)
                ->get();
    }

    public function getPaymentsMethods(){
        $itemstypepay1 = Company::where('companies.id', $this->id)
            ->join('lists', 'lists.id', 'companies.paymentsmethods')
            ->value('paymentsmethods');

        $paymentsid = explode("|", $itemstypepay1);

        return Lists::where('idowner', '=', TIPOS_PAGOS)->whereIn('id', $paymentsid)
            ->orderBy('name', 'asc')->get();
    }

    
}