<?php

namespace App\Http\Controllers\Sir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Input;
use App\Models\Sir\Connections;
use App\Models\Sir\Process;
use Illuminate\Support\Facades\File;
use App\Models\Sir\Xml\Schema;

class ConnectionsController extends Controller {

    protected $process;
    
    public function __construct() {
        $this->middleware('auth');
        $this->process = Process::where("status", "=", "1")
                ->orderBy('name', 'asc')->get();
    }

    public function index($group, $page, $order = "", $dir = "") {
        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');
        
//        $data =Input::file('/storage/app/cards/Esq_cubosir.xml');
        $data = File::get('public/storage/app/cards/Esq_cubosir.xml');
        $xml = simplexml_load_file('public/storage/app/cards/Esq_cubosir.xml');
        
        $json  = json_encode($xml);

        //convert into associative array
        $xmlArr = json_decode($json, true);
        
        $schema = new Schema($xmlArr);
//        foreach($xml->attributes() as $k => $v){
//            try {
//                $schema->{'set'.ucfirst($k)}($v[0]);
//            }
//            catch(Exception $e){ 
//                continue; 
//                
//            }
//        }
        dd($schema);

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
                
        $results = Connections::select(DB::raw('connection_id, name, url, class, cube, user, status'));

        $buttons = array();
        return Datatables::of($results)
                ->addColumn('action', function ($model) use ($group, $page, $buttons) {
                    return getListForm($model->connection_id, $group, $page, $buttons, $model);
                })->escapeColumns(['action'])->make(true);
    }

    public function edit($group, $page, $id) {
        $connectionEdit = Connections::where("connection_id", "=", $id)->first();
        
        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'connectionEdit' => $connectionEdit
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
            
            if(!empty($request->connectionId)){
                $query = Connections::where("connection_id", "=", $request->connectionId)->first();
            }
            else {
                $query = new Connections();
            }
            
            $query->name = $request->name;
            $query->url = $request->url;
            $query->class = $request->class;
            $query->cube = $request->cube;
            $query->user = $request->user;
            $query->password = $request->password;
            $query->status = $request->status;
            $query->save();
            
        } catch (\Exception $e) {
            return back()->with('errors', array(__("Connection can't be saved. Please review data and try again later")));
        }
//        return back()->with('success', array(__('Saved successfuly')));
        return redirect(strtolower('/' . $group . '/' . $page))->with('success', __('Saved successfuly'));
    }

    public function delete($group, $page, $id) {
        try {
            Connections::where("connection_id", "=", $id)->delete();
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
                        $p = Connections::find($row['id']);
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
