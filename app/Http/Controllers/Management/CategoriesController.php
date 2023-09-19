<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Auth\EloquentUserProvider;
use Yajra\Datatables\Datatables;
use DB;
use App\Enums\ImagesPathEnum;

use \App\Models\Management\Category;
use \App\Models\Management\Contract;

const path_image = 'support/pictures/categories/';
const path_default_image ='support/pictures/config/';

class CategoriesController extends Controller
{
    public $contracts = '';

    public function __construct()
    {
        $this->middleware('auth');

        if (auth()->user()->hasRole('admin')) {
            $this->contracts = Contract::orderBy('numbercontract', 'asc')
                ->where('contracts.id', '<>', 1)
                ->with('TypeContract')
                ->get();
        } else {
            $this->contracts = Contract::where('id', '=', auth()->user()->contract_id)
                ->where('contracts.id', '<>', 1)
                ->with('TypeContract')
                ->orderBy('numbercontract', 'asc')->get();
        }
    }

    public function index($group, $page, $order = "", $dir = "")
    {
        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'contracts' => $this->contracts,
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,
            'path' => path_image,
            'image' => 'cate000000.png'
        ]);
    }

    public function viewlist($group, $page)
    {

        $results = Category::with('Contrato');

        if (!auth()->user()->hasRole('admin')) {
            $results->where('contract_id', '=', auth()->user()->contract_id);
        }

        return Datatables::of($results)
            ->addColumn('estado', function ($model) {
                return $model->status == 1 ? __('Active') : __('Inactive');
            })
            ->addColumn('image', function ($model) use ($group, $page) {

                $image = !file_exists(public_path(ImagesPathEnum::PATH_CATEGORIES. $model->image)) 
                            ? ImagesPathEnum::PATH_DEFAULT_CATEGORY . 'cate000000.png'
                            : ImagesPathEnum::PATH_CATEGORIES . $model->image;

                return '<img height="30%" width="30%" src="' .$image. '"/>';
            })
            ->addColumn('action', function ($model) use ($group, $page) {
                return getListForm($model->id, $group, $page);
            })
            ->escapeColumns(['action'])->make(true);
    }

    public function edit($group, $page, $id)
    {

        $categoriaEdit = Category::find($id);
        $perEdit = !validatePermission("edit", $page) ? "disabled" : "";

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'contracts' => $this->contracts,
            'perEdit' => $perEdit,
            'categoriaEdit' => $categoriaEdit,
            'path' => path_image,
            'image' => 'cate000000.png'
        ]);
    }

    public function save(Request $request, $group, $page)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'shortname' => 'required|max:15',
            'contract' => 'required',
            'order' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        if ($request->categoryId > 0) {
            $categoria = Category::where('id', '=', $request->categoryId)->first();
        } else {
            $categoria = new Category();
        }

        try {
            $categoria->contract_id = $request->contract;
            $categoria->name = strtoupper($request->name);
            $categoria->shortname = ucwords($request->shortname);
            $categoria->order = $request->order;
            $categoria->image = "cate" . str_pad($categoria->id, 6,"0", STR_PAD_LEFT) . ".png";
            $categoria->status = 1;
            $categoria->save();
            $id_category = $categoria->id;
            $categoria->idowner = $id_category;
            $categoria->save();
            if ($request->hasFile('image_file')) {
                $image = $request->file('image_file');
                $image->move(public_path(ImagesPathEnum::PATH_CATEGORIES), $categoria->image);
                $categoria->save();
            }

            $categoria->save();

            if (isset($request->excelFile)) {
                return true;
            }

        } catch (\Exception $e) {
            return back()->with('errors', array(__("User can't be saved. Please review data and try again later")));
        }
        return redirect(strtolower('/' . $group . '/' . $page))->with('success', array(__('Saved successfuly')));
    }

    public function delete($group, $page, $id)
    {
        try {
            $cate = Category::find($id);
            $cate->delete();
        } catch (\Exception $e) {
            return back()->with('infos', __('Deleted unsuccessfuly foreign keys'));
        }
        return back()->with('success', __('Deleted successfuly'));
    }
}
