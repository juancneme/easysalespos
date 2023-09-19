<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Auth\EloquentUserProvider;
use Yajra\Datatables\Datatables;
use DB;

use \App\Models\Management\Supplier;
use \App\Models\Management\Person;
use App\Models\Management\Contract;

const path_image_supliers = "/support/pictures/suppliers/";

class SuppliersController extends Controller
{
    public $persons = '';

    public function __construct() {
        $this->middleware('auth');
        if(auth()->user()){
            $this->persons = Person::orderBy('id', 'asc')->get();

            $this->contratos = Contract::where('id', '=', auth()->user()->contract_id)
                ->orderBy('numbercontract', 'asc')->get();
        }

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
            'infos' => $infos,

            'persons' => $this->persons,
            'contratos' => $this->contratos,
            'path' => path_image_supliers,
            'image'=>'supl000000.png'
        ]);
    }

    public function viewlist($group, $page) {

        $results = Supplier::with('RefPersona', 'Contrato');

        if (auth()->user()->contract_id != 1) {
            $results->where('contract_id', auth()->user()->contract_id);
        }
        return Datatables::of($results)

                ->addColumn('nompersona', function ($model){
                    return $model->RefPersona->fullname;
                })
                ->addColumn('estado', function ($model){
                    return $model->status == 1 ? __('Active') : __('Inactive');
                })
                ->addColumn('action', function ($model) use ($group, $page) {
                    return getListForm($model->id, $group, $page);
                })
                ->escapeColumns(['action'])->make(true);
    }

    public function edit($group, $page, $id) {
        $supplierEdit = Supplier::find($id);
        $perEdit = !validatePermission("edit", $page) ? "disabled" : "";

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'persons' => $this->persons,
            'contratos' => $this->contratos,
            'perEdit' => $perEdit,
            'supplierEdit' => $supplierEdit,
            'path' => path_image_supliers,
            'image'=>'supl000000.png'
        ]);
    }

    public function save(Request $request, $group, $page) {
        // get request fields
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:50',
                    'shortname' => 'required|max:25',
                    'person' => 'required'
        ]);

        // validate fields
        if ($validator->fails()) {
//            return redirect($group . '/' . $page)->withInput()->withErrors($validator);
            return back()->withInput()->withErrors($validator);
        }
        try {
            if ($request->supplierId > 0) {
                $distribuidor = Supplier::where('id', '=', $request->supplierId)->first();
            } else {
                $distribuidor = new Supplier();
            }

            $distribuidor->name = $request->name;
            $distribuidor->shortname = $request->shortname;
            $distribuidor->person_id = $request->person;
            $distribuidor->order = $request->order;
            $distribuidor->image = empty($request->image) ? 'supl000000.png' :$request->image;
            $distribuidor->status = 1;
            $distribuidor->contract_id = $request->contract;
            $distribuidor->save();
            if($group === 'newstore' ){
                return  true;
            }
            if($request->hasFile('image_file')) {

                $image = $request->file('image_file');
                $image_path = 'supl'. str_pad($distribuidor->id,  6, "0",STR_PAD_LEFT) .'.png';

                if(file_exists(public_path().path_image_supliers.$image_path)){
                    unlink(public_path().path_image_supliers.$image_path);
                }
                $image ->move(public_path().path_image_supliers,$image_path);
                $imagen_nueva = $image_path;
                $distribuidor->image = $imagen_nueva;
            }
            $distribuidor->save();

        } catch (\Exception $e) {
            // dd($e,'Suppliers');
            if (isset($request->excelFile)) {
                return false;
            }
            return back()->with('errors', array(__("User can't be saved. Please review data and try again later")));
        }
        if (isset($request->excelFile)) {
            return true;
        }
        return redirect(strtolower('/'.$group.'/'.$page))->with('success', __('Saved successfuly'));
    }

    public function delete($group, $page, $id) {
        try {
            DB::transaction(function () use ($id) {
                Supplier::where('id','=',$id)->delete();
            });
        } catch (\Exception $e) {
            return back()->with('infos', array(__('Deleted unsuccessfuly foreign keys')));
        }
        return back()->with('success', array(__('Deleted successfuly')));
    }
}
