<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Yajra\Datatables\Datatables;

use App\Models\Management\User;
use App\Models\Management\Role;
use App\Models\Management\Permission;
use App\Models\Management\PermissionRole;

class PermissionsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index($group, $page, $order = "", $dir = "") {
        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');
        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos
                ]);
    }

    public function viewlist($group, $page) {
//        $queryColumns = array('id', 'name', 'display_name', 'description', 'public');
//        $results = Permission::select($queryColumns);
        $results = Permission::orderBy('name', 'asc');
        
        return Datatables::of($results)
                        ->addColumn('action', function ($model) use ($group, $page) {
                            return getListForm($model->id, $group, $page);
                        })->escapeColumns(['action'])->make(true);
    }

    public function edit($group, $page, $id) {
        $permissionEdit = Permission::find($id);
        $perEdit = !validatePermission("edit", $page) ? "disabled" : "";
        
        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'perEdit' => $perEdit,
            'permissionEdit' => $permissionEdit
                ]);
    }

    public function save(Request $request, $group, $page) {
        // get request fields
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:50',
                    'display_name' => 'required|max:100',
                    'description' => 'required|max:200'
        ]);

        // validate fields
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        if ($request->permissionId > 0) {
            $perm = Permission::find($request->permissionId);
        } else {
            $perm = new Permission();
        }

        try {
            $perm->name = $request->name;
            $perm->display_name = $request->display_name;
            $perm->description = $request->description;
            $perm->public = (int) $request->public;
            $perm->save();
        } catch (\Exception $e) {
            return back()->with('errors', array(__("User can't be saved. Please review data and try again later")));
        }
        return back()->with('success', array(__('Saved successfuly')));
//        return redirect(strtolower('/'.$group.'/'.$page))->with('success', __('Saved successfuly'));

    }

    public function delete($group, $page, $id) {
        try {
                Permission::where('id','=',$id)->delete();
        } catch (\Exception $e) {
            return back()->with('infos', array(__('Deleted unsuccessfuly foreign keys')));
        }
        return back()->with('success', array(__('Deleted successfuly')));
    }

    public function activate(Request $request, $group, $page) {
        $perm = Permission::find($request->id);
        $perm->public = !$perm->public;
        $perm->save();
    }

}
