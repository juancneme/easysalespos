<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Auth\EloquentUserProvider;
use Yajra\Datatables\Datatables;
use DB;

use \App\Models\Management\Manufacturer;

const path_image = "/support/pictures/manufacturers/";
const path_image2 = "/support/pictures/products/";


class ManufacturersController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->manufacturerService = loadManufacturersService();
    }

    public function index($group, $page, $order = "", $dir = "")
    {

        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,
            'manufacturerService' => $this->manufacturerService,
            'path' => path_image,
            'image' => 'manu000000.png',
        ]);
    }

    public function viewlist($group, $page)
    {
//        $results = Manufacturer::orderBy('name', 'asc');
        $results = Manufacturer::all();

        return Datatables::of($results)
            ->addColumn('estado', function ($model) {
                return $model->status == 1 ? __('Active') : __('Inactive');
            })
            ->addColumn('action', function ($model) use ($group, $page) {
                return getListForm($model->id, $group, $page);
            })
            ->escapeColumns(['action'])->make(true);
    }

    public function edit($group, $page, $id)
    {

        $manufacturerEdit = Manufacturer::find($id);
        $perEdit = !validatePermission("edit", $page) ? "disabled" : "";

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'perEdit' => $perEdit,
            'manufacturerService' => $this->manufacturerService,
            'manufacturerEdit' => $manufacturerEdit,
            'path' => path_image,
            'image' => 'manu000000.png',

        ]);
    }

    public function save(Request $request, $group, $page)
    {
       
        $request->operators == "" ? $exist_mafact = null : $exist_mafact = Manufacturer::where('idpartner', '=', $request->operators)->where('status', '=', 1)->exists();
        if ($exist_mafact && !isset($request->proveedorId)) {
            return back()->with('errors', array(__("The selected operator already exists")));

        }

        $validator = Validator::make($request->all(), [
            'code' => 'required',
            'name' => 'required',
            'shortname' => 'required',
            'image_file' => 'mimes:png'
        ]);
        if ($request[0] != true) {
            if ($validator->fails()) {
//            return redirect($group . '/' . $page.'/edit/'.$request->proveedorId)->withInput()->withErrors($validator);
                return back()->withInput()->withErrors($validator);
            }
        } else {
            $request = $request[1];
            $request->excelFile = true;
        }

        try {
            if ($request->proveedorId > 0) {
                $proveedor = Manufacturer::where('id', '=', $request->proveedorId)->first();
            } else {
                $proveedor = new Manufacturer();
            }
            $proveedor->code = $request->code;
            $proveedor->name = $request->name;
            $proveedor->shortname = $request->shortname;
            $proveedor->order = $request->order;
            //$request->operators != "" ? $proveedor->idpartner = intval($request->operators) : $proveedor->idpartner = 0;
            $proveedor->idpartner = $request->operators != "" ?  intval($request->operators) : 0;
            $proveedor->status = $request->status;
            $proveedor->image = $request->image == null ? 'manu000000.png' : $request->image;
            $proveedor->save();

            if (isset($request->excelFile)) {
                return true;
            }

            if ($request->hasFile('image_file')) {
                $image = $request->file('image_file');
                $image_path = 'manu' . str_pad($proveedor->id, 6, "0", STR_PAD_LEFT) . '.png';
                if (file_exists(public_path() . path_image . $image_path)) {
                    unlink(public_path() . path_image . $image_path);
                }
                $image->move(public_path() . path_image, $image_path);
                if ($request->operators != "") {
                    copy(public_path() . path_image . $image_path, public_path() . path_image2 . $image_path);
                }
                $imagen_nueva = $image_path;
                $proveedor->image = $imagen_nueva;
                $proveedor->save();
            }


        } catch (\Exception $e) {
     

            return back()->with('errors', array(__("User can't be saved. Please review data and try again later")));
        }
//        return back()->with('success', array(__('Saved successfuly')));
        return redirect(strtolower('/' . $group . '/' . $page))->with('success', __('Saved successfuly'));
    }

    public function delete($group, $page, $id)
    {
        try {
            DB::transaction(function () use ($id) {
                Manufacturer::where('id', '=', $id)->delete();
            });
        } catch (\Exception $e) {
            return back()->with('infos', array(__('Deleted unsuccessfuly foreign keys')));
        }
        return back()->with('success', array(__('Deleted successfuly')));
    }

}
