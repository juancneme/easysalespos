<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Input;
use App\Models\Management\Lists;
use App\Services\PayUService\Exception;

class ListsitemsController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index($group, $page, $order = "", $dir = "") {
        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');

        $inputs = Input::all();
        $idowner = $inputs['idowner'];
        
        $namelist = Lists::select('name')->where('id', "=", $idowner)->get()[0]->name;

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'idowner' => ucwords($idowner),
            'namelist' => $namelist,
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos
        ]);
    }

    public function viewlist($group, $page) {
        $queryColumns = array('id', 'name', 'order', 'status');

        $inputs = Input::all();
        $idowner = $inputs['idowner'];

        $results = Lists::where('idowner', "=", $idowner)
                ->whereRaw('idowner <> id');

        return Datatables::of($results)
                        ->addColumn('estado', function ($model) {
                            return $model->status == 1 ? __('Active') : __('Inactive');
                        })
                        ->addColumn('action', function ($model) use ($group, $page) {
                            return getListForm($model->id, $group, $page);
                        })->escapeColumns(['action'])->make(true);
    }

    public function edit($group, $page, $id) {
        $listsEdit = Lists::find($id);
        $perEdit = !validatePermission("edit", $page) ? "disabled" : "";
        $namelist = Lists::select('name')->where('id', "=", $listsEdit->idowner)->get()[0]->name;

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'idowner' => $listsEdit->idowner,
            'namelist' => $namelist,
            'perEdit' => $perEdit,
            'listsEdit' => $listsEdit
        ]);
    }

    public function save(Request $request, $group, $page) {

        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:50',
                    'order' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        try {
            if ($request->listsId > 0) {
                $List = Lists::find($request->listsId);
            } else {
                $List = new Lists();
            }
            $List->idowner = $request->idowner;
            $List->name = $request->name;
            $List->code = $request->code;
            $List->order = $request->order;
            $List->status = $request->status;
            $List->save();
            if ($List->idowner < 0) {
                $List->idowner = $List->id;
                $List->save();
            }
        } catch (\Exception $e) {
            return redirect(strtolower('/'.$group.'/'.$page.'?idowner=').$request->idowner)->with('errors', array(__("User can't be saved. Please review data and try again later")));
        }
        return redirect(strtolower('/'.$group.'/'.$page.'?idowner=').$request->idowner)->with('success', __('Saved successfuly'));
//        return redirect(strtolower('/'.$group.'/'.$page))->with('success', __('Saved successfuly'));
    }

    public function delete($group, $page, $id) {
        try {
                $List = Lists::find($id);
                $List->delete();
            } catch (\Exception $e) {
                return back()->with('infos', __('Deleted unsuccessfuly foreign keys'));
            }
        return back()->with('success', __('Deleted successfuly'));
    }

    public function activate(Request $request, $group, $page) {
        $List = Lists::find($request->id);
        $List->public = !$List->public;
        $List->save();
    }

}
