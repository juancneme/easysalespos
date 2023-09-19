<?php

namespace App\Http\Controllers\Management;

use App\Models\Management\ClientsLogin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Validator;
use Illuminate\Auth\EloquentUserProvider;
use DB;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

use App\Models\Management\User;
use App\Models\Management\Role;
use App\Models\Management\Contract;
use App\Models\Management\Person;
use App\Models\Management\Lists;
use App\Models\Management\Address;
use App\Models\Management\Contact;
use App\Models\Management\CompaniesUsers;
use App\Models\Management\Company;
use App\Models\Management\Transactions;
use App\Models\Management\RoleUser;
use App\Models\Management\ContractsPersons;
use App\Models\Management\Module;
use Carbon\Carbon;

const path_image = "/support/pictures/users/";
const FUNCTIONAL_AREAS = 180;
const ADMIN_LEVELS = 170;

class UsersController extends Controller
{

    public $roles = '';
    public $contracts = '';
    public $persons = '';
    public $numusers = "";
    public $roles_adcon = [];

    public function __construct()
    {
        $this->middleware('auth');

        if (!empty(auth()->user())) {

            $type_contract = Contract::where('contracts.id', auth()->user()->contract_id)->value('typecontract_id');
            switch($type_contract) {
                //ADCONTRATO DE CENTRALIZADO
                case 142 : $this->roles_adcon = ['cajero'];
                    break;
                //ADCONTRATO DE DES-CENTRALIZADO
                case 143 : $this->roles_adcon = ['adtienda','adtendero'];
                    break;
            }

            if (auth()->user()->hasRole('admin')) {
                $this->roles = Role::orderBy('name', 'asc')->get();
                $this->contracts = Contract::orderBy('numbercontract', 'asc')
                    ->where('contracts.id', '<>', 1)
                    ->get();
                $this->persons = Person::orderBy('id', 'asc')->get();
                $contractedUsers = 999;
            } else {
                if (auth()->user()->hasRole('adcontrato')) {
                    $this->roles = Role::orderBy('name', 'asc')
                        ->whereIn('name', $this->roles_adcon)
                        ->get();

                    $this->contracts = Contract::orderBy('numbercontract', 'asc')
                        ->where('id', auth()->user()->contract_id)
                        ->with('TypeContract')->get();

                    $this->persons = Person::select('*')
                        ->join('contracts_persons', 'contracts_persons.person_id', 'persons.id')
                        ->where('contracts_persons.type_user', 'user')
                        ->where('contracts_persons.contract_id', auth()->user()->contract_id)
                        ->get();

                    $contractedUsers = Contract::where('contracts.id', '=', auth()->user()->contract_id)->value('quantityusers');
                } else {
                    if (auth()->user()->hasRole('adtienda')) {
                        $this->roles = Role::orderBy('name', 'asc')
                            ->whereIn('name', ['cajero','vendedor'])
                            ->get();
        
                        $this->contracts = Contract::orderBy('numbercontract', 'asc')
                            ->where('id', auth()->user()->contract_id)
                            ->with('TypeContract')->get();
        
                        $this->persons = Person::select('*')
                            ->join('contracts_persons', 'contracts_persons.person_id', 'persons.id')
                            ->where('contracts_persons.type_user', 'user')
                            ->where('contracts_persons.contract_id', auth()->user()->contract_id)
                            ->get();
        
                        $contractedUsers = Contract::where('contracts.id', auth()->user()->contract_id)->value('quantityusers');
                    } else {
                        $this->roles = Role::orderBy('name', 'asc')
                            ->whereIn('name', ['cajero','vendedor'])
                            ->get();
        
                        $this->contracts = Contract::orderBy('numbercontract', 'asc')
                            ->where('id', auth()->user()->contract_id)
                            ->with('TypeContract')->get();
        
                        $this->persons = Person::select('*')
                            ->join('contracts_persons', 'contracts_persons.person_id', 'persons.id')
                            ->where('contracts_persons.type_user', 'user')
                            ->where('contracts_persons.contract_id', auth()->user()->contract_id)
                            ->get();
        
                        $contractedUsers = Contract::where('contracts.id', auth()->user()->contract_id)->value('quantityusers');
                    }
                }
            }

            $this->functionalAreas = Lists::where('idowner', '=', FUNCTIONAL_AREAS)->whereRaw('id <> idowner')
                ->orderBy('order', 'asc')->get();

            $this->adminLevels = Lists::where('idowner', '=', ADMIN_LEVELS)->whereRaw('id <> idowner')
                ->orderBy('order', 'asc')->get();

            $createdUsers = User::join('role_user', 'role_user.user_id', 'users.id')
                ->where('users.contract_id', auth()->user()->contract_id)
                ->where('users.status', '1')
                ->where('role_user.role_id', 3)
                ->count();

            if ($createdUsers < $contractedUsers)
                $this->numusers = "";
            else
                $this->numusers = "disabled";
        }

    }

    public function index($group, $page, $order = "", $dir = "")
    {
        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');
        $path = path_image;

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'roles' => $this->roles,
            'contracts' => $this->contracts,
            'persons' => $this->persons,
            'numusers' => $this->numusers,
            'path' => $path,
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,
            'Admin' => auth()->user()->hasRole('admin') ? 1 : 0,
            'functionalAreas' => $this->functionalAreas,
            'adminLevels' => $this->adminLevels,
            'image' => 'user000000.png'
        ]);
    }

    public function passwordFirst()
    {

        return view('auth.resetpasswordnew');
    }

    public function viewlist($group, $page)
    {

        $results = User::with('Contrato', 'roles');

        if (!auth()->user()->hasRole('admin')) {
            $users_sel = [];
            if (auth()->user()->hasRole('adcontrato')) {
                $users_sel = User::where('contract_id', auth()->user()->contract_id)
                    ->whereHas('roles', function($query) {
                        $query->whereIn('name', $this->roles_adcon);
                    })
                    ->pluck('id')->toArray();
            } else {
                if (auth()->user()->hasRole('adtienda')) {
                    $company_id = Company::select('id')
                        ->where('admon_id', auth()->user()->id)
                        ->get()->first();
                    $users_sel = CompaniesUsers::where('company_id', $company_id->id)
                        ->pluck('user_id')->toArray();
                }
            }
            // array_push($users_sel, auth()->user()->id);
            $results->whereIn('id', $users_sel)
                ->where('status', '1');
        } 
        $obj = new \stdClass();
        $obj->link = '<a href="/management/persons/edit/{{ $model->id }}" 
                            data-placement="top" 
                            data-toggle="tooltip" 
                            title="' . __('User Profile') . '">
                            <i class="fa fa-user" style="color: #00a2e8; font-size: 20px; margin: 3px;"></i>
                            </a>';
        $obj->vars = array();
        $obj->vars[] = array();
        $obj->vars[0]['name'] = 'model->id';
        $obj->vars[0]['value'] = 'person_id';
        $buttons = array();
        $buttons[] = $obj;

        return Datatables::of($results)
            ->addColumn('estado', function ($model) {
                return $model->status == 1 ? __('Active') : __('Inactive');
            })
            ->addColumn('roles', function ($model) {
                $ret = array();
                foreach ($model->roles as $role) {
                    $ret[] = $role->display_name;
                }
                return implode(' - ', $ret);
            })
            ->addColumn('action', function ($model) use ($group, $page, $buttons) {

                if (auth()->user()->hasRole('admin')) {
                    return getListForm($model->id, $group, $page, $buttons, $model);
                } else {
                    if (auth()->user()->hasRole('adcontrato') &&
                        (auth()->user()->id != $model->id) &&
                        ($model->roles[0]->name != 'adcontrato')) {

                        return getListForm($model->id, $group, $page, $buttons, $model);
                    } else {
                     
                        if (auth()->user()->hasRole('adtienda') &&
                            (auth()->user()->id != $model->id) &&
                            ($model->roles[0]->name != 'adtienda')) {

                            return getListForm($model->id, $group, $page, $buttons, $model);
                        }

                    }
                }

            })->escapeColumns(['action'])->make(true);
    }

    public function edit($group, $page, $id)
    {

        if (!auth()->user()->hasRole('admin')) {

            $userAuth = User::leftJoin('role_user', 'role_user.user_id', '=', 'users.id')
                ->where('users.contract_id', '=', auth()->user()->contract_id)
                ->where('role_user.role_id', '!=', 2)
                ->where('users.id', '=', $id)
                ->count();

            if ($userAuth == 0)
                return redirect($group . '/' . $page)->with('infos', array(__('Violation report of system security')));
        }

        $userEdit = User::find($id);
       // dd($userEdit);
        $perEdit = !validatePermission("edit", $page) ? "disabled" : "";

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'roles' => $this->roles,
            'contracts' => $this->contracts,
            'persons' => $this->persons,
            'numusers' => $this->numusers,
            'perEdit' => $perEdit,
            'userEdit' => $userEdit,
            'path' => path_image,
            'Admin' => auth()->user()->hasRole('admin') ? 1 : 0,
            'functionalAreas' => $this->functionalAreas,
            'adminLevels' => $this->adminLevels,
            'arrayAreas' => explode("|",$userEdit->functionalareas),
            'image' => 'user000000.png'

        ]);
    }

    public function save(Request $request, $group, $page)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'password' => 'required',
            'email' => 'required|max:100|email',
            'image_file' => 'mimes:png',
            'functional_areas' => 'required',
            'admonlevel'=>'required'
        ]);


        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
//            if(!($request->userId > 0)){
//                return redirect($group . '/' . $page)->withInput()->withErrors($validator);
//            }
//            return redirect($group . '/' . $page.'/edit/'.$request->userId)->withInput()->withErrors($validator);
        }
        // dd($request->userId);
        try {
            $new_seller = false;
            if ($request->userId > 0) {
                $user = User::where('id', '=', $request->userId)->first();
                if ($request->password != $user->password) {
                    $user->password = bcrypt($request->password);
                }
            } else {
                if ($group != 'newstore') {
                    $uname = User::where('email', '=', $request->email)->where('contract_id', $request->contrato)->first();
                    if (!empty($uname->id)) {
                        return redirect(strtolower('/' . $group . '/' . $page))->with('errors', array(__('Email User already exists')));
                    }
                    $uname = User::where('name', '=', $request->name)->where('contract_id', $request->contrato)->first();
                    if (!empty($uname->id)) {
                        return redirect(strtolower('/' . $group . '/' . $page))->with('errors', array(__('Name User already exists')));
                    }
                }
                $user = new User ();
                $user->password = bcrypt($request->password);

                if (auth()->user()->hasRole('adtienda')) {
                    $new_seller = true;
                }
            }

            $user->person_id = $request->persona;
            $user->contract_id = $request->contrato;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->image = $request->image;
            $user->status = $request->status;
            $user->admonlevel = $request->admonlevel;
            $user->functionalareas = implode("|", $request->functional_areas);
            $user->changed_password = null;
            $user->save();

            if ($new_seller) {
                $company_id = Company::Select('id')
                    ->where('admon_id', auth()->user()->id)
                    ->get()->first();
                $com_seller = new CompaniesUsers();
                $com_seller->company_id = $company_id->id;
                $com_seller->user_id = $user->id;
                $com_seller->save();
            }

            if ($request->hasFile('image_file')) {
                $image = $request->file('image_file');
                $image_path = 'user' . str_pad($user->id, 6, "0", STR_PAD_LEFT) . '.png';

                if (file_exists(public_path() . path_image . $image_path)) {
                    unlink(public_path() . path_image . $image_path);
                }
                $image->move(public_path() . path_image, $image_path);
                $imagen_nueva = $image_path;
                $user->image = $imagen_nueva;
            }

            $user->detachRoles(Role::get());
            $user->save();
            $user->attachRoles($request->roles);
            $user->save();

            ContractsPersons::where('type_user', '=', 'user')->where('person_id', '=', $request->persona)->delete();
            $piboteContra_persons = new ContractsPersons();

            $piboteContra_persons->contract_id = $user->contract_id;
            $piboteContra_persons->person_id = $request->persona;
            $piboteContra_persons->type_user = 'user';
            $piboteContra_persons->save();

            if ($group === 'newstore') {
                return $user;
            }

            //send mail toUser
            $subject = __("Register to the PDVI platform");

            sendNewUserEmail($subject, $request);

        } catch (\Exception $e) {
            // dd($e);
            return back()->with('errors', array(__("User can't be saved. Please review data and try again later")));
        }
        return redirect(strtolower('/' . $group . '/' . $page))->with('success', __('Saved successfuly'));
    }

    public function delete($group, $page, $id)
    {
        try {
            DB::transaction(function () use ($id) {
                $person = User::where('id', '=', $id)->value('person_id');
                $role = RoleUser::where('user_id', '=', $id)->value('role_id');
                if ($role != '1' && $role != '2') {
                    ContractsPersons::where('contract_id', '=', auth()->user()->contract_id)
                        ->where('person_id', '=', $person)
                        ->where('type_user', '=', 'user')
                        ->delete();
                    RoleUser::where('user_id', '=', $id)->delete();
                }
                User::where('id', '=', $id)->delete();
            });
        } catch (\Exception $e) {
            return back()->with('infos', array(__('Deleted unsuccessfuly foreign keys')));
        }
        return back()->with('success', array(__('Deleted successfuly')));
    }

    public function password($group)
    {
        return view('management.passwords.resetpassword', [
            'group' => $group,
            'page' => 'password'
        ]);
    }

    public function updatePassword(Request $request, $group)
    {
        $validator = Validator::make($request->all(), [
            'mypassword' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required'
        ]);

        $validator->after(function ($validator) use ($request)  {
            $cur_pass =  $request->get('mypassword');
            $new_pass =  $request->get('password');
            $con_pass =  $request->get('password_confirmation');
            if(strlen($new_pass) < 8) {
                $validator->errors()->add('password', 'La clave debe tener al menos 8 caracteres.');
            }
            if(strlen($new_pass) > 16) {
                $validator->errors()->add('password', 'La clave no puede tener más de 16 caracteres.');
            }
            if (!preg_match('`[!#$%&()*+,-.:;<=>?/@\_"]`',$new_pass)) {
                $validator->errors()->add('password', 'La clave debe tener al menos un caracter especial.');
            }
            if (!preg_match('`[a-z]`',$new_pass)) {
                $validator->errors()->add('password', 'La clave debe tener al menos una letra minúscula.');
            }
            if (!preg_match('`[A-Z]`',$new_pass)) {
                $validator->errors()->add('password', 'La clave debe tener al menos una letra mayúscula.');
            }
            if (!preg_match('`[0-9]`',$new_pass)) {
                $validator->errors()->add('password', 'La clave debe tener al menos un caracter numérico.');
            }
            if ($new_pass != $con_pass) {
                $validator->errors()->add('password', __('New password and confirm password are different.'));
            }
            if ($cur_pass == $new_pass) {
                $validator->errors()->add('password', __('Current and new key must be different.'));
            }
        });

        if ($validator->fails()) {
            return back()->withErrors($validator);
        } else {
            if ($request->password == $request->password_confirmation) {
                if (!empty(auth()->guard('client')->user())) {
                    if (Hash::check($request->mypassword, \Auth::guard('client')->user()->password)) {
                        $dato = DB::table('persons')
                            ->join('clients', 'clients.person_id', '=', 'persons.id')
                            ->join('clients_login', 'clients_login.client_id', 'clients.id')
                            ->where('clients.id', auth()->guard('client')->user()->id)
                            ->where('clients_login.contract_id', auth()->guard('client')->user()->contract_id)
                            ->value('numberdocument');

                        if ($dato == $request->password) {

                            return back()->with('errors', array('su  nueva clave no puede ser igual a su cedula'));
                        } else {
                            $user = new ClientsLogin();
                            $user->where('email', '=', \Auth::guard('client')->user()->email)
                                ->where('contract_id', auth()->guard('client')->user()->contract_id)
                                ->update(['password' => bcrypt($request->password)]);
                            return back()->with('success', array('clave cambiado con éxito'));
                        }
                    }
                }

                $time = Carbon::now();
                $change_date = $time->toDateTimeString();
                if (Hash::check($request->mypassword, \Auth::user()->password)) {

                    $user = new User();
                    $user->where('email', '=', \Auth::user()->email)
                            ->update(['password' => bcrypt($request->password), 'changed_password' => $change_date]);

                    return redirect('/logout')->with('success', array(__('Key changed successfully.')));

                } else {
                    return redirect('/logout')->with('errors', array(__('There is an error in the supplied data.')));
                }

            } else {
                return back()->with('errors', array('clave nueva y clave confirmar son distintas'));
            }
        }
    }

    // public function updatePasswordFirst(Request $request)
    // {

    //     $validator = Validator::make($request->all(), [
    //         'mypassword' => 'required',
    //         'password' => 'required',
    //         'password_confirmation' => 'required'
    //     ]);
    //     if ($validator->fails()) {

    //         return back()->withInput()->withErrors($validator);
    //     } else {
    //         if ($request->password == $request->password_confirmation) {
    //             if (Hash::check($request->mypassword, \Auth::user()->password)) {
    //                 $dato = DB::table('persons')
    //                     ->join('users', 'users.person_id', '=', 'persons.id')
    //                     ->where('users.id', auth()->user()->id)
    //                     ->value('numberdocument');

    //                 if ($dato == $request->password) {

    //                     return back()->with('errors', array('su nueva clave no puede ser igual a su clave asignada'));

    //                 } else {
    //                     // $user = new User();
    //                     // $user->where('email', '=', \Auth::user()->email)
    //                     //     ->update(['password' => bcrypt($request->password)]);

    //                     $time = Carbon::now();
    //                     $change_date = $time->toDateTimeString();
    //                     if (Hash::check($request->mypassword, \Auth::user()->password)) {
    //                         $user = new User();
    //                         $user->where('email', '=', \Auth::user()->email)
    //                                 ->update(['password' => bcrypt($request->password), 'changed_password' => $change_date]);

    //                         //HAY DUDA CONE ST SENTENCIA
    //                         $roles = Module::Select('group_name', 'page_name')
    //                             ->where('id', '=', auth()->user()->roles[0]->module_id)->get();

    //                         return redirect('/logout')->with('success', array(__('Key changed successfully.')));

    //                     } else {
    //                         return redirect('/logout')->with('errors', array(__('There is an error in the supplied data.')));
    //                     }
    //                 }

    //                 if (!empty($roles)) {
    //                     return redirect(strtolower($roles[0]->group_name) . '/' . strtolower($roles[0]->page_name));
    //                 }

    //             } else {
    //                 return back()->with('errors', array('su clave actual no corresponde'));
    //             }
    //         } else {
    //             return back()->with('errors', array('clave nueva y clave confirmar son distintas'));
    //         }
    //     }
    // }

    public function ajax(Request $request, $page, $group)
    {
        $type = Input::get("type");
        $result = new \stdClass();
        $result->success = false;
        switch ($type) {
            case 'selectPersons':
                $result->data = $this->selectPersons($group, $page, Input::get("id"));
                $result->success = true;
                break;
        }
        return json_encode($result);
    }

    public function selectPersons($group, $page, $id)
    {
        $person = Person::where('id', '=', $id)->get();
        return $person;
    }

}
