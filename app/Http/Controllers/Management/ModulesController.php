<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Auth\EloquentUserProvider;
use Yajra\Datatables\Datatables;
use DB;
use App\Models\Management\Module;
use App\Models\Management\Lists;
use App\Models\Management\RoleModule;

const TIPOS_ETIQUETAS = 50;
const GRUPOS_MENU = 56;
const LISTA_ICONOS = 70;

class ModulesController extends Controller {

    public $itemstypelabel = '';
    public $itemsidowner = '';
    public $gruposmenu = '';
    public $icons = '';

    public function __construct() {
        $this->middleware('auth');
        
        $this->itemstypelabel = Lists::where('idowner', '=', TIPOS_ETIQUETAS)->whereRaw('id <> idowner')
                        ->orderBy('order', 'asc')->get();
        
        $this->itemsidowner = Module::where('typelabel_id', '=', '51')->orderBy('name', 'asc')->get();
        
        $this->gruposmenu = Lists::where('idowner', '=', GRUPOS_MENU)->whereRaw('id <> idowner')
                        ->orderBy('order', 'asc')->get();
        $this->icons = Lists::where('idowner', '=', LISTA_ICONOS)->whereRaw('id <> idowner')
                        ->orderBy('order', 'asc')->get();
    }

    public function index($group, $page, $order = "", $dir = "") {

        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'itemstypelabel' => $this->itemstypelabel,
            'itemsidowner' => $this->itemsidowner,
            'gruposmenu' => $this->gruposmenu,
            'icons' => $this->icons,
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos
        ]);
    }

    public function viewlist($group, $page) {

        $results = Module::with('TypeLabel');
        // dd($results->get()->toArray());
        return Datatables::of($results)
                        ->addColumn('estado', function ($model){
                            return $model->status == 1 ? __('Active') : __('Inactive');
                        })
                        ->addColumn('action', function ($model) use ($group, $page) {
                            return getListForm($model->id, $group, $page);
                        })->escapeColumns(['action'])->make(true);
    }

    public function edit($group, $page, $id) {
        $modulesEdit = Module::find($id);
        $perEdit = !validatePermission("edit", $page) ? "disabled" : "";

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'itemstypelabel' => $this->itemstypelabel,
            'itemsidowner' => $this->itemsidowner,
            'gruposmenu' => $this->gruposmenu,
            'icons' => $this->icons,
            'perEdit' => $perEdit,
            'modulesEdit' => $modulesEdit
        ]);
    }

    public function save(Request $request, $group, $page) {
        // get request fields
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:50',
                    'typelabel' => 'required',
                    'idowner' => 'required',
                    'order' => 'required|numeric|min:1',
                    'status' => 'required'
        ]);

        // validate fields
        if ($validator->fails()) {
//            return redirect($group . '/' . $page)->withInput()->withErrors($validator);
            return back()->withInput()->withErrors($validator);
        }

        try {
            if ($request->modulesId > 0) {
                $mod = Module::find($request->modulesId);
            } else {
                $mod = new Module();
            }
        
            $mod->name = $request->name;
            $mod->typelabel_id = $request->typelabel;
            $mod->group_name = $request->group_name;
            $mod->page_name = $request->page_name;
            $mod->idowner = $request->idowner;
            $mod->order = $request->order;
            $mod->icon_id = $request->icon;
            $mod->status = $request->status;
            $mod->save();
        } catch (\Exception $e) {
            return back()->with('errors', array(__("User can't be saved. Please review data and try again later")));
        }
        return back()->with('success', array(__('Saved successfuly')));
//        return redirect(strtolower('/'.$group.'/'.$page))->with('success', __('Saved successfuly'));
    }

    public function delete($group, $page, $id) {
        try {
                Module::where('id','=',$id)->delete();
        } catch (\Exception $e) {
            return back()->with('infos', array(__('Deleted unsuccessfuly foreign keys')));
        }
        return back()->with('success', array(__('Deleted successfuly')));
    }

    public function activate(Request $request, $group, $page) {

        $mod = Module::find($request->id);
        if ($mod->status == 0) {
            $mod->status = 1;
        } else {
            $mod->status = 0;
        };
        $mod->save();

        return redirect(strtolower($group . '/' . $page))->with('success', __('Saved successfuly'));

    }

}
