<?php

namespace App\Http\Controllers\Sir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Input;
use App\Models\Sir\Process;

class ProcessController extends Controller {

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
//select(DB::raw("cubes.name as cube, querys2.name parent, querys.* "))
                
        $results = Process::select(DB::raw('*'));

        $buttons = array();
        return Datatables::of($results)
                ->addColumn('action', function ($model) use ($group, $page, $buttons) {
                    return getListForm($model->id, $group, $page, $buttons, $model);
                })->escapeColumns(['action'])->make(true);
    }

    public function edit($group, $page, $id) {
        $processEdit = Process::where("id", "=", $id)->first();
        
        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'processEdit' => $processEdit
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
            $order = Process::select('sort')->max('sort');
            if(!empty($request->processId)){
                $query = Process::where("id", "=", $request->processId)->first();
            }
            else {
                $query = new Process();
            }
            
            $query->name = $request->name;
            $query->description = $request->description;
            $query->status = $request->status;
            $query->sort = empty($order) ? 1 : ($order + 1);
            $query->save();
            
        } catch (\Exception $e) {
            return back()->with('errors', array(__("Query can't be saved. Please review data and try again later")));
        }
//        return back()->with('success', array(__('Saved successfuly')));
        return redirect(strtolower('/' . $group . '/' . $page))->with('success', __('Saved successfuly'));
    }

    public function delete($group, $page, $id) {
        try {
            Process::where("id", "=", $id)->delete();
        } catch (\Exception $e) {
            return back()->with('errors', array(__('Deleted unsuccessfuly foreign keys')));
        }
        return back()->with('success', array(__('Deleted successfuly')));
    }

    public function ajax(Request $request) {
        $type = Input::get("type");
        $result = new \stdClass();
        $result->success = false;
        switch ($type) {
            case 'reorder':
                if(!empty($request->result) && is_array($request->result)){
                    foreach($request->result as $row){
                        $p = Process::find($row['id']);
                        $p->sort = $row['sort'];
                        $p->save();
                    }
                    $result->success = true;
                }
                break;
                        
            default:
                break;
        }
        return json_encode($result);
    }

}
