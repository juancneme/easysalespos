<?php

namespace App\Http\Controllers\management;

use App\Enums\TypeCatalogsEnum;
use App\Models\Management\BusinessType;
use App\Models\Management\Catalog;
use App\Models\Management\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Validator;
use Yajra\Datatables\Datatables;

class TypebusinessController extends Controller
{
    public function __construct(){
        $this->middleware('auth');

        $this->catalogs = Catalog::where('typecatalog_id', TypeCatalogsEnum::SEMILLA)
            ->get();
    }

    public function index($group, $page){
        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');

        return view(strtolower($group . '/' . $page),[
            'group' => ucwords($group),
            'page' => ucwords($page),
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,
            'catalogs' => $this->catalogs
        ]);
    }

    public function viewlist($group, $page)
    {
        if (auth()->user()->hasRole('admin'))
            $results = BusinessType::with('Catalog');

        return Datatables::of($results)
            ->addColumn('name', function ($model) {
                return $model->name;
            })
            ->addColumn('catalog', function ($model) {
                return $model->catalog_id . ' - ' . $model->catalog->name;
            })
            ->addColumn('status', function ($model) {
                return $model->status == 1 ? __('Active') : __('Inactive');
            })
            ->addColumn('action', function ($model) use ($group, $page) {
                return getListForm($model->id, $group, $page);
            })
            ->escapeColumns(['action'])
            ->make(true);
    }

    public function save(Request $request, $group, $page){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'catalog' => 'required'
        ]);

        if ($validator->fails())
            return back()->withInput()->withErrors($validator);

        try{
            DB::beginTransaction();

            $business = isset($request->id)
                        ? BusinessType::find($request->id)
                        : new BusinessType();

            $business->name = $request->name;
            $business->catalog_id = $request->catalog;
            $business->status = $request->status;
            $business->save();

            DB::commit();

            return redirect(strtolower('/'.$group.'/'.$page))->with('success', __('Saved successfuly'));
        }
        catch(\Exception $e){
            dd($e);
            DB::rollback();
            return redirect(strtolower('/'.$group.'/'.$page))->with('errors', array(__("Record can't be saved. Please review data and try again later")));
        }
    }

    public function edit($group, $page, $id)
    {
        $business = BusinessType::find($id);

        return view(strtolower($group . '/' . $page),[
            'group' => ucwords($group),
            'page' => ucwords($page),
            'businessEdit' => $business,
            'catalogs' => $this->catalogs
        ]);
    }

    public function delete($group, $page, $id) {
        try {
            $res = BusinessType::findOrFail($id);
            $res->delete();
            return redirect(strtolower('/'.$group.'/'.$page))->with('success', __('Deleted successfuly'));
        }
        catch(\Exception $e){
            return redirect(strtolower('/'.$group.'/'.$page))->with('infos', __('Deleted unsuccessfuly foreign keys'));
        }
    }
}
