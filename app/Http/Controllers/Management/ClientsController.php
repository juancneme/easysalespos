<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Auth\EloquentUserProvider;
use DB;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Management\User;
use App\Models\Management\Role;
use App\Models\Management\Contract;
use App\Models\Management\Client;
use App\Models\Management\Person;
use App\Models\Management\Lists;
use App\Models\Management\Address;
use App\Models\Management\Contact;
use App\Models\Management\CompaniesUsers;
use App\Models\Management\Transactions;
use App\Models\Management\RoleUser;
use App\Models\Management\ContractsPersons;
use App\Models\Management\Module;

const path_image = "/support/pictures/users/";

class ClientsController extends Controller {

    public $roles = '';
    public $contracts = '';
    public $persons = '';
    public $numusers = '';

    public function __construct() {
        $this->middleware('auth');

        if(!empty(auth()->user())) {
            if (auth()->user()->hasRole('admin')) {
                $this->contracts = Contract::orderBy('numbercontract', 'asc')
                    ->where('contracts.id', '<>', 1)
                    ->get();
                $this->persons = Person::orderBy('id', 'asc')->get();
                $contractedUsers = 999;
            } else {
                $this->contracts = Contract::orderBy('numbercontract', 'asc')
                    ->where('contracts.id', '<>', 1)
                    ->where('id', '=', auth()->user()->contract_id)
                    ->with('TypeContract')->get();

                $this->persons = Person::select('*')
                    ->join('contracts_persons', 'contracts_persons.person_id', '=', 'persons.id')
                    ->where('contracts_persons.type_user', '=', 'user')
                    ->where('contracts_persons.contract_id', auth()->user()->contract_id)
                    ->get();

                $contractedUsers = Contract::where('contracts.id', '=', auth()->user()->contract_id)->value('quantityusers');
            }


            $createdUsers = User::join('role_user', 'role_user.user_id', '=', 'users.id')
                ->where('users.contract_id', '=', auth()->user()->contract_id)
                ->where('users.status', '=', '1')
                ->where('role_user.role_id', '<>', '2')
                ->count();

            if ($createdUsers < $contractedUsers)
                $this->numusers = '';
            else
                $this->numusers = 'disabled';
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
            'Admin'=> auth()->user()->hasRole('admin') ? 1 : 0,
            'image' => 'user000000.png'
        ]);
    }


    public function viewlist($group, $page)
    {
        $results = Client::with('person');
        if (!auth()->user()->hasRole('admin')) {
            $results->where('contract_id', '=', auth()->user()->contract_id);
        }

        $obj = new \stdClass();
        $obj->link = '<a href="/management/persons/edit/{{ $model->id }}" class="btn btn-success" data-placement="top" data-toggle="tooltip" style="width:36px;height:36px"; title="' . __('User Profile') . '">
			<i class="fa fa-user"></i>
		</a>';
        $obj->vars = array();
        $obj->vars[] = array();
        $obj->vars[0]['name'] = 'model->id';
        $obj->vars[0]['value'] = 'person_id';
        $buttons = array();
        $buttons[] = $obj;

        return Datatables::of($results)
            ->addColumn('fullname', function ($model) {
                return $model->person->fullname;
            })
            ->addColumn('identification', function ($model) {
                return $model->person->identification;
            })
            ->addColumn('email', function ($model) {
                return $model->person->email;
            })
            ->addColumn('estado', function ($model) {
                return $model->status == 1 ? __('Active') : __('Inactive');
            })
            ->addColumn('action', function ($model) use ($group, $page, $buttons) {
                return getListForm($model->id, $group, $page, $buttons, $model);
            })->escapeColumns(['action'])->make(true);
    }

    public function edit($group, $page, $id)
    {

        if (!auth()->user()->hasRole('admin')) {

            $userAuth = Client::where('contract_id', '=', auth()->user()->contract_id)
                ->where('id', '=', $id)
                ->count();

            if ($userAuth == 0)
                return redirect($group . '/' . $page)->with('infos', array(__('Violation report of system security')));
        }

        $userEdit = Client::find($id);
        $perEdit = !validatePermission("edit", $page) ? "disabled" : "";

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'contracts' => $this->contracts,
            'persons' => $this->persons,
            'numusers' => $this->numusers,
            'perEdit' => $perEdit,
            'userEdit' => $userEdit,
            'path' => path_image,
            'Admin'=> auth()->user()->hasRole('admin') ? 1 : 0,
            'image' => 'user000000.png'

        ]);
    }

    public function sendMail($email){
        $subject = __("Register to the PDVI platform");
        Mail::send('emails.newclientmail', ['emailuser'=>$email,'contract_id'=>auth()->user()->contract_id],function ($msj) use ($subject, $email) {
            $msj->subject($subject);
            $msj->to($email);
        });
    }

    public function save(Request $request, $group, $page)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:100|email',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        try {
            $this->sendMail($request->email);

        } catch (\Exception $e) {
            
        }
        return redirect(strtolower('/' . $group . '/' . $page))->with('success', __('Saved successfuly'));
    }

    public function delete($group, $page, $id)
    {
       
    }

    
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
