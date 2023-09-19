<?php

namespace App\Http\Controllers\Sir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Input;
use App\Models\Sir\CubQuerys;
use App\Models\Sir\CubCubos;

class QuerysController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index($group, $page, $order = "", $dir = "") {
        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');

        $querys = CubQuerys::get();
        $cubes = CubCubos::where("status", "=", "1")->get();
        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'querys' => $querys,
            'cubes' => $cubes,
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos
        ]);
    }

    public function viewlist($group, $page) {
//select(DB::raw("cubes.name as cube, querys2.name parent, querys.* "))
                
        $results = CubQuerys::select(DB::raw("ifnull(querys2.name, '') parent_name, cubes.name cube_name, querys.*"))
                ->join("cubes", "cubes.cube_id", "=", "querys.cube_id")
                ->leftJoin("querys as querys2", "querys2.query_id", "=", "querys.parent_id");

        $buttons = array();
        return Datatables::of($results)
                ->addColumn('action', function ($model) use ($group, $page, $buttons) {
                    return getListForm($model->query_id, $group, $page, $buttons, $model);
                })->escapeColumns(['action'])->make(true);
    }

    public function edit($group, $page, $id) {
        $queryEdit = CubQuerys::where("query_id", "=", $id)->first();
        $querys = CubQuerys::get();
        $cubes = CubCubos::where("status", "=", "1")->get();
        
        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'querys' => $querys,
            'cubes' => $cubes,
            'queryEdit' => $queryEdit
        ]);
    }

    public function save(Request $request, $group, $page) {

        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:50'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        try {
            if(!empty($request->queryId)){
                $query = CubQuerys::where("query_id", "=", $request->queryId)->first();
            }
            else {
                $query = new CubQuerys();
            }
            
            $query->parent_id = $request->parent_id;
            $query->cube_id = $request->cube;
            $query->name = $request->name;
            $query->query = !empty($request->querystr) ? $request->querystr : null;
            $query->configuration = $request->configuration;
            $query->parameters = $request->parameters;
            $query->level = $request->level;
            $query->next = $request->next;
            $query->position = $request->position;
            $query->status = $request->status;
            $query->save();
        } catch (\Exception $e) {
            return back()->with('errors', array(__("Query can't be saved. Please review data and try again later")));
        }
//        return back()->with('success', array(__('Saved successfuly')));
        return redirect(strtolower('/' . $group . '/' . $page))->with('success', __('Saved successfuly'));
    }

    public function delete($group, $page, $id) {
        try {
            CubQuerys::where("query_id", "=", $id)->delete();
        } catch (\Exception $e) {
            return back()->with('errors', array(__('Deleted unsuccessfuly foreign keys')));
        }
        return back()->with('success', array(__('Deleted successfuly')));
    }

    public function ajax(Request $request, $page, $group) {
        $type = Input::get("type");
        $result = new \stdClass();
        $result->success = false;
        switch ($type) {
            default:
                break;
        }
        return json_encode($result);
    }

}
