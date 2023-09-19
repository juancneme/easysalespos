<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Input;
use App\Models\Management\Lists;

class ListsController extends Controller {

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
        $results = Lists::whereRaw('id = idowner');

        $obj = new \stdClass();
        $obj->link = '<a href="/management/listsitems?idowner={{ $model->id }}" 
                        data-placement="top" 
                        data-toggle="tooltip" 
                        title="' . __('See details') . '">
                        <i class="fa fa-list" style="color: #00a2e8; font-size: 20px; margin: 3px;"></i>
                      </a>';
        $obj->vars = array();
        $obj->vars[] = array();
        $obj->vars[0]['name'] = 'model->id';
        $obj->vars[0]['value'] = 'id';

        $buttons = array();
        $buttons[] = $obj;

        return Datatables::of($results)
                        ->addColumn('estado', function ($model) {
                            return $model->status == 1 ? __('Active') : __('Inactive');
                        })
                        ->addColumn('action', function ($model) use ($group, $page, $buttons) {
                            return getListForm($model->id, $group, $page, $buttons, $model);
                        })->escapeColumns(['action'])->make(true);
    }

    public function edit($group, $page, $id) {
        $listsEdit = Lists::find($id);
        $perEdit = !validatePermission("edit", $page) ? "disabled" : "";

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'perEdit' => $perEdit,
            'listsEdit' => $listsEdit
        ]);
    }

    public function save(Request $request, $group, $page) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:50'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        if ($request->listsId > 0) {
            $list = Lists::find($request->listsId);
        } else {
            $list = new Lists();
        }
        
        try {
            $list->idowner = $request->idowner;
            $list->name = $request->name;
            $list->code = $request->code; //$request->code;
            $list->order = $request->order;
            $list->status = $request->status;
            $list->save();
            if ($list->idowner < 0) {
                $list->idowner = $list->id;
                $list->save();
            }
        } catch (\Exception $e) {
            return back()->with('errors', array(__("User can't be saved. Please review data and try again later")));
        }
        return back()->with('success', array(__('Saved successfuly')));
    }

    public function delete($group, $page, $id) {
        //No tiene llave faranea con la misma tabla
        $res = Lists::where('idowner', '=', $id)->where('id','<>',$id)->first();
        if (!$res){
            Lists::findOrFail($id)->delete();
            return back()->with('success', __('Deleted successfuly'));
        }else{
            return back()->with('infos', __('Deleted unsuccessfuly foreign keys'));
        }
    }

    public function activate(Request $request, $group, $page) {
        $list = Lists::find($request->id);
        $list->public = !$list->public;
        $list->save();
    }

}
