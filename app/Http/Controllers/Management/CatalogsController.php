<?php

namespace App\Http\Controllers\Management;

use App\Enums\TypeCatalogsEnum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Auth\EloquentUserProvider;
use Yajra\Datatables\Datatables;
use DB;
use \App\Models\Management\Catalog;
use \App\Models\Management\Contract;
use \App\Models\Management\Lists;
use \App\Models\Management\CatalogProducts;
use App\Models\Management\Company;

const UNIDADES_VENTA = 53;
const TIENDAS_TYPE_ID = 105;
const MASTER = 103;

class CatalogsController extends Controller
{

    public $contracts = '';
    public $typesArray = [];

    public function __construct()
    {
        $this->middleware('auth');

        $this->catalogosSemilla = Catalog::where('typecatalog_id', TypeCatalogsEnum::SEMILLA)
            ->where('contract_id', 1)
            ->get();

        if(auth()->user()->hasRole('admin')){
            array_push($this->typesArray, TypeCatalogsEnum::MASTER_PRODUCTOS);
            array_push($this->typesArray, TypeCatalogsEnum::MASTER_SERVICIOS);
            array_push($this->typesArray, TypeCatalogsEnum::SEMILLA);
            array_push($this->typesArray, TypeCatalogsEnum::TIENDA);
        }

        if(auth()->user()->hasRole('adcontrato')){
            array_push($this->typesArray, TypeCatalogsEnum::MASTER_PRODUCTOS);
            array_push($this->typesArray, TypeCatalogsEnum::MASTER_SERVICIOS);
        }

        if(auth()->user()->hasRole('adtienda')){
            array_push($this->typesArray, TypeCatalogsEnum::TIENDA);
        }

        if(auth()->user()->hasRole('adtendero')){
            array_push($this->typesArray, TypeCatalogsEnum::TIENDA);
        }

        $this->typeCatalogs = Lists::where('idowner', TypeCatalogsEnum::IDOWNER)
            ->where('id', '<>', TypeCatalogsEnum::IDOWNER)
            ->whereIn('id', $this->typesArray)
            ->get();

        $this->catalog = Company::Where('admon_id', auth()->user()->id)->value('catalog_id');

        $this->add = is_null($this->catalog) ? ' ' : 'disabled';
    }



    public function index($group, $page, $order = "", $dir = "")
    {

        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');

        if (auth()->user() !== null && !auth()->user()->hasRole('admin')) {
            $this->contracts = Contract::where('contracts.id', '=', auth()->user()->contract_id)
                ->where('contracts.id', '<>', 1)
                ->orderBy('numbercontract', 'asc')->get();
        } else {
            $this->contracts = Contract::orderBy('numbercontract', 'asc')->get();
        }

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'contracts' => $this->contracts,
            'catalogosSemilla' => $this->catalogosSemilla,
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,
            'catalogAdd' => $this->add,
            'typeCatalogs' => $this->typeCatalogs
        ]);
    }

    public function viewlist($group, $page)
    {

        $results = Catalog::select('catalogs.*')
            ->join('contracts as contrato', 'contrato.id', 'catalogs.contract_id')
            ->with('Contrato.TypeContract', 'TypeCatalog')
            ->where('catalogs.id', '!=', 1000)
            ->whereIn('typecatalog_id', $this->typesArray)
            ->orderBy('catalogs.id', 'desc');

        if (auth()->user() !== null && auth()->user()->hasRole('adcontrato')) {
            $results->where('catalogs.contract_id', auth()->user()->contract_id);
        }

        if (auth()->user() !== null && auth()->user()->hasRole('adtienda')) {
            $tienda = Company::Where('admon_id', auth()->user()->id)->first();

            $catalogoid = 0;

            if (!empty($tienda)) $catalogoid = $tienda->catalog_id;

            $results->where('catalogs.id', $catalogoid);
        }

        $obj = new \stdClass();
        $obj->link = '<a href="/management/catalogsproducts?id={{ $model->id }}" 
                            data-placement="top" 
                            data-toggle="tooltip" 
                            title="' . __('My Catalog') . '" 
                            <i class="fa fa-fw fa-bars" style="color: #00a2e8; font-size: 20px; margin: 3px;"></i>
                      </a>';
        $obj->vars = array();
        $obj->vars[] = array();
        $obj->vars[0]['name'] = 'model->id';
        $obj->vars[0]['value'] = 'id';

        $obj1 = new \stdClass();


        $obj1->link = '<a href="/management/catalogsadd?id=1000&cat={{ $model->id }}" 
                            data-placement="top" 
                            data-toggle="tooltip" 
                            title="' . __('Catalog Master') . '" 
                            <i class="fa fa-shopping-basket" style="color: #00a2e8; font-size: 20px; margin: 3px;"></i>
                       </a>';

        $obj1->vars = array();
        $obj1->vars[] = array();
        $obj1->vars[0]['name'] = 'model->id';
        $obj1->vars[0]['value'] = 'id';

        $obj2 = new \stdClass();
        $obj2->link = '<a href="/management/catalogsaddproducts?id=1000&cat={{ $model->id }}" 
                            data-placement="top" 
                            data-toggle="tooltip" 
                            title="' . __('Master catalog with starting inventory') . '" 
                            <i class="fa fa-outdent" style="color: #00a2e8; font-size: 20px; margin: 3px;"></i>
                      </a>';

        $obj2->vars = array();
        $obj2->vars[] = array();
        $obj2->vars[0]['name'] = 'model->id';
        $obj2->vars[0]['value'] = 'id';

        $obj3 = new \stdClass();
        $obj3->link = '<a onClick="onShowMaster(this)" 
                            data-id="{{ $model->id }}" 
                            data-placement="top" 
                            data-toggle="tooltip" 
                            title="' . __('Clone catalog') . '" 
                            <i class="fa fa-clone" style="color: #00a2e8; font-size: 20px; margin: 3px;"></i>
                      </a>';

        $obj3->vars = array();
        $obj3->vars[] = array();
        $obj3->vars[0]['name'] = 'model->id';
        $obj3->vars[0]['value'] = 'id';

        $buttons = array();
        //$buttons[0] = $obj;
        //$buttons[1] = $obj1;

        return Datatables::of($results)
            ->addColumn('type', function ($model) {
                return $model->typeCatalog->name;
            })
            ->addColumn('estado', function ($model) {
                return $model->status == 1 ? __('Active') : __('Inactive');
            })
            ->addColumn('action', function ($model) use ($group, $page, $buttons, $obj, $obj1, $obj2, $obj3) {
                // $model->typecatalog_id != 105  ? array_push($buttons, $obj) : array_push($buttons, $obj, $obj1, $obj2, $obj3);
                array_push($buttons, $obj, $obj1, $obj2, $obj3);
                return getListForm($model->id, $group, $page, $buttons, $model);
            })->escapeColumns(['action'])->make(true);
    }

    public function edit($group, $page, $id)
    {

        $catalogEdit = Catalog::find($id);
        $perEdit = !validatePermission("edit", $page) ? "disabled" : "";

        if (!auth()->user()->hasRole('admin')) {
            $this->contracts = Contract::where('contracts.id', '=', auth()->user()->contract_id)
                ->where('contracts.id', '<>', 1)
                ->orderBy('numbercontract', 'asc')->get();
        } else {
            $this->contracts = Contract::orderBy('numbercontract', 'asc')->get();
        }

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'contracts' => $this->contracts,
            'perEdit' => $perEdit,
            'catalogEdit' => $catalogEdit,
            'catalogosSemilla' => $this->catalogosSemilla,
            'catalogAdd' => $this->add,
            'typeCatalogs' => $this->typeCatalogs
        ]);
    }

    public function save(Request $request, $group, $page)
    {
        // get request fields
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        // validate fields
        if ($validator->fails()) {
            return redirect(strtolower('/' . $group . '/' . $page))->withInput()->withErrors($validator);
        }

        if ($request->catalogId > 0) {
            $catalog = Catalog::where('id', '=', $request->catalogId)->first();
        } else {
            $catalog = new Catalog();
        }

        try {
            $catalog->contract_id = $request->contract;
            $catalog->name = $request->name;
            $catalog->description = $request->description;
            $catalog->typecatalog_id = $request->type;
            $catalog->status = $request->status;
            $catalog->save();

            if (auth()->user()->hasRole('adtienda')) {
                $company = Company::where('admon_id', auth()->user()->id)->first();
                $company->catalog_id = $catalog->id;
                $company->save();
            }
        } catch (Exception $e) {
            return redirect(strtolower('/' . $group . '/' . $page))->with('errors', array(__("User can't be saved. Please review data and try again later")));
        }
        return redirect(strtolower('/' . $group . '/' . $page))->with('success', __('Saved successfuly'));
    }

    /**
     * Delete an user
     *
     * @param unknown $group
     * @param unknown $page
     * @param unknown $id
     */
    public function delete($group, $page, $id)
    {
        $res = CatalogProducts::where('catalog_id', '=', $id)->first();
        if (!$res) {
            Catalog::findOrFail($id)->delete();
            return redirect(strtolower('/' . $group . '/' . $page))->with('success', __('Deleted successfuly'));
        } else {
            return redirect(strtolower('/' . $group . '/' . $page))->with('infos', __('Deleted unsuccessfuly foreign keys'));
        }

        //        Catalog::findOrFail($id)->delete();
        //        return redirect(strtolower('/'.$group.'/'.$page))->with('success', __('Deleted successfuly'));
    }
}
