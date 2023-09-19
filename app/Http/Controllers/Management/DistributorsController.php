<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Auth\EloquentUserProvider;
use Yajra\Datatables\Datatables;
use DB;

use \App\Models\Management\Distributor;
use \App\Models\Management\Person;

class DistributorsController extends Controller
{
    public $persons = '';
    
    public function __construct() {
        $this->middleware('auth');
        $this->persons = Person::orderBy('id', 'asc')->get();
    }

    public function index($group, $page, $order = "", $dir = "") {
        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');
        
        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'persons' => $this->persons,
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos
        ]);
    }

    public function viewlist($group, $page) {

//        $queryColumns = array('id', 'name', 'shortname', 'persona_id', 'order', 'status');
//        $results = Distributor::select($queryColumns)->get();
        
        $results = Distributor::select('distributors.*')
                ->join('persons as ref_persona', 'ref_persona.id', '=', 'distributors.person_id')
                ->with('RefPersona');
//        foreach ($results as $row)
//        {
//            $row->persona_id = $row->Person->fullname;
//        }

        return Datatables::of($results)
                        ->addColumn('nompersona', function ($model){
                            return $model->RefPersona->fullname;
                        })
                        ->addColumn('estado', function ($model){
                            return $model->status == 1 ? __('Active') : __('Inactive');
                        })
                        ->addColumn('action', function ($model) use ($group, $page) {
                            return getListForm($model->id, $group, $page);
                        })->escapeColumns(['action'])->make(true);
    }

    public function edit($group, $page, $id) {
        $distributorsEdit = Distributor::find($id);

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'persons' => $this->persons,
            'distributorsEdit' => $distributorsEdit
        ]);
    }

    public function save(Request $request, $group, $page) {
        // get request fields
        $validator = Validator::make($request->all(), [
                    'name' => 'required',
                    'shortname' => 'required',
                    'persona' => 'required'
        ]);

        // validate fields
        if ($validator->fails()) {
            return redirect($group . '/' . $page)->withInput()->withErrors($validator);
        }

        if ($request->distribuidorId > 0) {
            $distribuidor = Distributor::where('id', '=', $request->distribuidorId)->first();
        } else {
            $distribuidor = new Distributor();
        }

        try {
            $distribuidor->name = $request->name;
            $distribuidor->shortname = $request->shortname;
            $distribuidor->person_id = $request->persona;
            $distribuidor->order = $request->order;
            $distribuidor->status = $request->status;
            $distribuidor->save();
        } catch (Exception $e) {
            return redirect(strtolower('/'.$group.'/'.$page))->with('errors', array(__("User can't be saved. Please review data and try again later")));
        }

        return redirect(strtolower('/'.$group.'/'.$page))->with('success', __('Saved successfuly'));
    }

    /**
     * Delete an user
     *
     * @param unknown $group        	
     * @param unknown $page        	
     * @param unknown $id        	
     */
    public function delete($group, $page, $id) {
        Distributor::findOrFail($id)->delete();
        return redirect($group.'/'.$page)->with('success', __('Deleted successfuly'));
    }
}
