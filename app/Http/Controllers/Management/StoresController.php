<?php

namespace App\Http\Controllers\Management;

use App\Models\Management\CompaniesUsers;
use App\Models\Management\Company;
use App\Models\Management\Contract;
use App\Models\Management\Module;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoresController extends Controller
{
    public function __construct()
    {
//
        if(!isset(auth()->guard('client')->user()->contract_id)){
            $this->middleware('auth');
        }
        else{
            $id = Contract::where('id', auth()->guard('client')->user()->contract_id)->value('id');

            $this->stores_id = \Illuminate\Support\Facades\DB::table('companies')
                ->where('contract_id', $id)
                ->join('companies_users', 'companies.id', 'companies_users.company_id')
                ->pluck('id');


            $this->stores = DB::select('SELECT *,   (select address.address from address 
                    where person_id = companies.person_id) as address,
                    (select l2.name as country from address 
					join lists l2 on l2.id = address.country_id
                    where person_id = companies.person_id) as country FROM companies
                    left JOIN companies_users ON companies_users.company_id = companies.id
                    left JOIN shift_managements ON shift_managements.user_id = companies_users.user_id
                    AND shift_managements.typeshift_id = 14
                    WHERE companies.contract_id = ' . $id . '
                    GROUP BY  companies.id;');
        }



    }

    public function index()
    {
        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');

        return view('management' . '/' . 'stores', [
            'group' => ucwords('management'),
            'page' => ucwords('stores'),
            'infos' => $infos,
            'stores' => $this->stores
        ]);
    }

    public function send(Request $request)
    {

        $store = CompaniesUsers::where('company_id', $request->id)
            ->join('shift_managements', 'companies_users.user_id', 'shift_managements.user_id')
            ->where('shift_managements.typeshift_id', 14)
            ->first();

        Auth::logout();
        Auth::loginUsingId($store->user_id);

        $roles = Module::Select('group_name', 'page_name')
            ->where('id', '=', auth()->user()->roles[0]->module_id)->get();
        if (!empty($roles)) {

            return redirect(strtolower($roles[0]->group_name) . '/' . strtolower($roles[0]->page_name))->with('client', true);
        }
    }

    public function search(Request $request)
    {
        try {

            $id = Contract::where('id', auth()->guard('client')->user()->contract_id)->value('id');

            $this->stores = DB::select('SELECT * FROM companies
                    left JOIN companies_users ON companies_users.company_id = companies.id
                    left JOIN shift_managements ON shift_managements.user_id = companies_users.user_id
                    left JOIN address ON companies.person_id = address.person_id
                    AND shift_managements.typeshift_id = 14
                    WHERE companies.contract_id = ' . $id . '
                    AND (companies.name  LIKE '."'%". $request->inputSearch ."%'".' 
                    OR address.address  LIKE '."'%". $request->inputSearch ."%')".'
                    GROUP BY  companies.id ;');

            $errors = (array)session('errors');
            $success = (array)session('success');
            $infos = (array)session('infos');

            return view('management' . '/' . 'stores', [
                'group' => ucwords('management'),
                'page' => ucwords('stores'),
                'infos' => $infos,
                'stores' => $this->stores
            ]);


        } catch (\Exception $e) {

            return back()->with('errors', array(__("The store can´t found")));
        }

    }


}
