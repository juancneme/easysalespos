<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Management\FormulationOrdersController;
use App\Models\Management\Catalog;
use App\Models\Management\Client;
use App\Models\Management\Clients;
use App\Models\Management\CompaniesUsers;
use App\Models\Management\Company;
use App\Models\Management\Contract;
use App\Models\Management\Person;
use App\Models\Management\RoleUser;
use App\Models\Management\ShiftManagements;
use App\Models\Management\Users;
use DB;
use http\Client\Curl\User;
use Illuminate\Support\Facades\Auth;
use Zizaco\Entrust\Entrust;
use App\Models\Coffee\Students;
use App\Models\Coffee\Enrolments;
use App\Models\Coffee\Transactions;
use Illuminate\Support\Facades\Input;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Hash;
use App\Models\Management\Module;
use Carbon\Carbon;

const STOREMANAGER = 6;
const SELLER = 3;

class HomeController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Home Controller
      |--------------------------------------------------------------------------
      |
      | This controller renders your application's "dashboard" for users that
      | are authenticated. Of course, you are free to change or remove the
      | controller as you wish. It is just here to get your app started!
      |
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // if(auth()->guard('client')->user())
        //     $this->middleware('client');
        // else
            $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index($a = "", $b = "", $c = "")
    {

        if (auth()->user() != null) {
            $dato = DB::table('persons')
                ->join('users', 'users.person_id', '=', 'persons.id')
                ->where('users.id', auth()->user()->id)
                ->value('numberdocument');

            $email = \Illuminate\Support\Facades\DB::table('persons')
                ->join('users', 'users.person_id', '=', 'persons.id')
                ->where('users.id', auth()->user()->id)
                ->value('email');

            if (Hash::check($dato, \Auth::user()->password)) {

                $token = str_random(60);
                \Illuminate\Support\Facades\DB::table('password_resets')->where('email', $email)->delete();
                \Illuminate\Support\Facades\DB::table('password_resets')->insert([
                    'email' => $email,
                    'token' => \Hash::make($token), //change 60 to any length you want
                    'created_at' => Carbon::now()
                ]);

                return redirect($token)->with('send_email', $email);

            } else {

                //Ajustar query para validar contra role_module
                $roles = Module::Select('group_name', 'page_name')
                    ->where('id', '=', auth()->user()->roles[0]->module_id)->get();

                $storeManager =  RoleUser::where('user_id',auth()->user()->id)
                    ->where('role_id', STOREMANAGER)->first();

                $idcontract = Users::where('id',auth()->user()->id)->value('contract_id');
                $contract = Contract::find($idcontract);

                /**
                if(auth()->user()->hasRole('cajero')){
                    $shift = ShiftManagements::where('user_id', auth()->user()->id)
                        ->where('typeshift_id', 12)->first();

                    if(!empty($shift)) {
                        Auth::logout();
                        return back()->withErrors(__('Shift Bloqued'));
                    }
                }
                 */


                if (!empty($roles)) {

                    if(strtolower($roles[0]->page_name ==='pdvi')){
                       //Valida si el usuario esta asignado a la comercio
                        if(!CompaniesUsers::where('user_id',\auth()->user()->id)->exists()){
                            Auth::logout();
                            return back()->withErrors(__('Unassigned user to store'));
                        } else {
                            $company_id = CompaniesUsers::where('user_id',\auth()->user()->id)->value('company_id');
                            $asigcatalog = Company::where('id', $company_id)->value('catalog_id');
                    
                            if(is_null($asigcatalog)) {
                                $master_catalog = Catalog::where('contract_id', $idcontract)
                                                    ->where('typecatalog_id', 103)
                                                    ->first();

                                if (is_null($master_catalog)) {
                                    Auth::logout();
                                    return back()->withErrors(__('Catalog not associated to store'));
                                }

                            }
                      }
                   }
                   if(!empty($storeManager)){
                        if(!Company::where('admon_id',$storeManager->user_id)->exists()){
                            Auth::logout();
                            return back()->withErrors(__('Unassigned user to store'));
                        }
                    }
                    // dd(strtolower($roles[0]->group_name) . '/' . strtolower($roles[0]->page_name));
                    return redirect(strtolower($roles[0]->group_name) . '/' . strtolower($roles[0]->page_name));

                } else {

                    return view('sir/info', [
                        "group" => '',
                        "page" => ''
                    ]);
                }
            }
        }
        //  else if (auth()->guard('client')->user() != null) {

        //     return redirect()->route('store');

        //     $contract = Client::where('id',auth()->guard('client')->user()->client_id)
        //         ->value('contract_id');

        //     $contract_seller = DB::table('users')
        //         ->join('role_user', 'users.id', '=', 'role_user.user_id')
        //         ->where('contract_id', $contract)
        //         ->where('role_id',SELLER)
        //         ->value('id');

        //     Auth::loginUsingId($contract_seller);

        //     //Ajustar query para validar contra role_module
        //     $roles = Module::Select('group_name', 'page_name')
        //         ->where('id', '=', auth()->user()->roles[0]->module_id)->get();
        //     if (!empty($roles)) {



        //         return redirect(strtolower($roles[0]->group_name) . '/' . strtolower($roles[0]->page_name))->with('client',true);




        //     } else {

        //         return view('sir/info', [
        //             "group" => '',
        //             "page" => ''
        //         ]);
        //     }

        // }


    }

    public function viewlist() {}

    public function ajax() {}

}
