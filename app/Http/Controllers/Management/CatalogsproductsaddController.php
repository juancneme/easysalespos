<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Auth\EloquentUserProvider;
use Yajra\Datatables\Datatables;
use DB;
use Illuminate\Support\Facades\Input;
use App\Models\Management\Product;
use \App\Models\Management\Catalog;
use \App\Models\Management\Contract;
use \App\Models\Management\Category;

use \App\Models\Management\Supplier;
use \App\Models\Management\Lists;
use \App\Models\Management\CatalogProducts;
use \App\Models\Management\TransactionsDetails;

const MASTER = 103;

class CatalogsProductsAddController extends Controller
{
    public function index($group, $page, $order = "", $dir = "") {
        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');

        $inputs=Input::all();
        $catalog = $inputs['cat'];
        $namecatalog = 'Catalogos MASTER';
        // $namecatalog = Catalog::select('name')->where('type', $catalog)->get()[0]->name;

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'catalog' => $catalog,
            'namecatalog' => $namecatalog,
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,
        ]);


    }

    public function viewlist($group, $page) {


        $inputs=Input::all();
        $catalogonuevo = $inputs['cat'];



        $results = Catalog::select('catalogs.*')
            ->join('contracts as contrato', 'contrato.id', '=', 'catalogs.contract_id')
            ->where('catalogs.typecatalog_id', MASTER)
            ->where('contract_id',auth()->user()->contract_id)
            ->orWhere('contract_id',1)
            ->with('Contrato')->get();


        $obj = new \stdClass();
        $obj->link = '<a href="/management/catalogsadd?id={{ $model->id }}&cat='.$catalogonuevo.'" class="btn btn-success" data-placement="top" data-toggle="tooltip" title="' . __('User Profile') . '" style="margin-right:6px; margin-bottom:3px; width:36px;height:36px">
                            <i class="fa fa-list"></i>
                      </a>';
        $obj->vars = array();
        $obj->vars[] = array();
        $obj->vars[0]['name'] = 'model->id';
        $obj->vars[0]['value'] = 'id';
        $buttons = array();
        $buttons[] = $obj;

                return Datatables::of($results)
                ->addColumn('estado', function ($model) {
                    return $model->status == 1 ? __('Active') : __('Inactive');
                })
                ->addColumn('action', function ($model) use ($group, $page, $buttons) {
                    return getListForm($model->id, $group, $page, $buttons, $model, false, false);
                })->escapeColumns(['action'])->make(true);


    }

}
