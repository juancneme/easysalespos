<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Management\Lists;
use Validator;
use DB;
use Yajra\Datatables\Datatables;

use App\Models\Management\Role;
use App\Models\Management\Permission;
use App\Models\Management\Module;
use App\Models\Management\RoleModule;

const ADMIN_LEVELs = 170;

class RolesController extends Controller {

    public $permissions = '';
    public $modules = '';
    public $itemsmodules = '';
    public $itemslevels = '';

    public function __construct() {
        $this->middleware('auth');

        $this->itemsmodules = Module::where('typelabel_id', '')->orderBy('order', 'asc')->get();
        $this->modules = Module::where('typelabel_id', '52')->orderBy('order', 'asc')->get();
        $this->itemslevels = Lists::where('idowner', ADMIN_LEVELs)->whereRaw('id <> idowner')
                        ->orderBy('order', 'asc')->get();

        if (auth()->user()->hasRole('admin')) {
            $this->permissions = Permission::orderBy('name', 'asc')->get();
        } else {
            $this->permissions = Permission::select(DB::raw('permissions.*'))
                            ->join('permission_role', 'permission_role.permission_id', 'permissions.id')
                            ->join('roles', 'roles.id', 'permission_role.role_id')
                            ->where('permissions.public', '1')
                            ->where('roles.name', 'admin-' . auth()->user()->contract_id)
                            ->orderBy('permissions.name', 'asc')->get();
        }
    }

    public function index($group, $page, $order = "", $dir = "") {
        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'permissions' => $this->permissions,
            'modules' => $this->modules,
            'itemsmodules' => $this->itemsmodules,
            'itemslevels' => $this->itemslevels,
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos
        ]);
    }

    public function viewlist($group, $page) {
        
        $results = Role::orderBy('name', 'asc')->with('adminlevel');

        return Datatables::of($results)
                        ->addColumn('adminlevel', function ($model) {
                            return $model->adminlevel->name;
                        })
                        ->addColumn('action', function ($model) use ($group, $page) {
                            return getListForm($model->id, $group, $page);
                        })->escapeColumns(['action'])->make(true);
    }

    public function edit($group, $page, $id) {

        $roleEdit = Role::find($id);
        $perEdit = !validatePermission("edit", $page) ? "disabled" : "";

        $this->itemsmodules = $roleEdit->modules();

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'permissions' => $this->permissions,
            'modules' => $this->modules,
            'itemsmodules' => $this->itemsmodules,
            'itemslevels' => $this->itemslevels,
            'perEdit' => $perEdit,
            'roleEdit' => $roleEdit
        ]);
    }

    public function save(Request $request, $group, $page) {

        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:50',
                    'display_name' => 'required|max:100',
                    'description' => 'required|max:200',
                    'adminlevel' => 'required',
                    'modules' => 'required'
        ]);

        // validate fields
        if ($validator->fails()) {
//            return redirect($group . '/' . $page)->withInput()->withErrors($validator);
            return back()->withInput()->withErrors($validator);
        }

        try {

            if ($request->roleId > 0) {
                // $roles = Role::where('id', $request->roleId)->get();
                // $role = $roles[0];
                $role = Role::find($request->roleId);
            } else {
                $role = new Role ();
            }

            $role->name = $request->name;
            $role->display_name = $request->display_name;
            $role->description = $request->description;
            $role->adminlevel_id = $request->adminlevel;
            $role->module_id = $request->module;
            $role->status = 1;
            $role->save();

            if ($request->roleId > 0) {
                RoleModule::where('role_id','=',$request->roleId)->delete();
            }
            $modulosOwner = Module::select('idowner')->whereIn('id',$request->modules)
                    ->distinct()
                    ->get();
            foreach ($modulosOwner as $mo) {
                $rolemodule = new RoleModule ();
                $rolemodule->role_id = $role->id;
                $rolemodule->module_id = $mo->idowner;
                $rolemodule->permission_id = '6';
                $rolemodule->save();
            }
            foreach ($request->modules as $m) {
                $rolemodule = new RoleModule ();
                $rolemodule->role_id = $role->id;
                $rolemodule->module_id = $m;
                $rolemodule->permission_id = '6';
                $rolemodule->save();
            }
            if ($request->roleId > 0) {
                $role->detachPermissions($role->perms()->get());
                $role->save();
            }
            if ($request->permissions){
                $role->attachPermissions($request->permissions);
                $role->save();
            }
        } catch (\Exception $e) {
            dd($e);
            return back()->with('errors', array(__("User can't be saved. Please review data and try again later")));
        }
//        return back()->with('success', array(__('Saved successfuly')));
        return redirect(strtolower('/'.$group.'/'.$page))->with('success', __('Saved successfuly'));
    }

    public function delete($group, $page, $id) {
        try {
            DB::transaction(function () use ($id) {
                RoleModule::where('role_id','=', $id)->delete();
                Role::where('id','=',$id)->delete();
            });
        } catch (\Exception $e) {
            return back()->with('infos', array(__('Deleted unsuccessfuly foreign keys')));
        }
        return back()->with('success', array(__('Deleted successfuly')));
    }

}
