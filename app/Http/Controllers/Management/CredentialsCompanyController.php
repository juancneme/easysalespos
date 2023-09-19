<?php

namespace App\Http\Controllers\Management;

use App\Models\Management\CredentialsCompany;
use App\Models\Management\CredentialsServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CredentialsCompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function save($contract_id,$company_id, $store_key)
    {

        $credential_service_id = CredentialsServices::where('contract_id',trim($contract_id))->first();


        $credentialsCompany = CredentialsCompany::where('company_id',$company_id)
            ->where('credential_service_id',$credential_service_id->id)
            ->first();

        if(!$credentialsCompany){
            $credentialsCompany = new CredentialsCompany();
        }

        $credentialsCompany->credential_service_id = $credential_service_id->id;
        $credentialsCompany->company_id = $company_id;
        $credentialsCompany->store_key = $store_key;
        $credentialsCompany->status = 1;
        $credentialsCompany->save();

    }

}
