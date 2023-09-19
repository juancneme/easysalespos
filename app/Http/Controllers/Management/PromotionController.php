<?php

namespace App\Http\Controllers\Management;

use App\Models\Management\CompaniesUsers;
use App\Models\Management\Inventory;
use App\Models\Management\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use Yajra\Datatables\Datatables;
use DB;
use \App\Models\Management\Catalog;
use \App\Models\Management\Contract;
use \App\Models\Management\CatalogProducts;
use \App\Models\Management\SpecialPrices;
use \App\Models\Management\Company;

const MASTER = 103;

class PromotionController extends Controller
{

    public $contracts = '';

    public function __construct()
    {
        $this->middleware('auth');

        $this->catalogs = Catalog::where('contract_id', auth()->user()->contract_id)->get();

        $this->products = Company::where('companies.contract_id', auth()->user()->contract_id)
            ->join('catalogs', 'companies.contract_id', 'catalogs.contract_id')
            ->join('catalog_products', 'catalogs.id', 'catalog_products.catalog_id')
            ->get();

        if (auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('adtendero')) {
            $company = Company::where('admon_id', auth()->user()->id)->value('id');
            $this->companies = Company::where('id', $company)->get();
        } else {
            $this->companies = Company::where('contract_id', '=', auth()->user()->contract_id)->get();
        }
        // dd("const");
    }

    public function index($group, $page, $order = "", $dir = "")
    {
        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');

        if (auth()->user() !== null && !auth()->user()->hasRole('admin'))
            $this->contracts = Contract::where('contracts.id', '=', auth()->user()->contract_id)
                ->where('contracts.id', '<>', 1)
                ->orderBy('numbercontract', 'asc')->get();
        else
            $this->contracts = Contract::orderBy('numbercontract', 'asc')->get();

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'contracts' => $this->contracts,
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos,
            'catalogs' => $this->catalogs,
            'products' => $this->products,
            'companies' => $this->companies
        ]);
    }

    public function ajax(Request $request, $page, $group)
    {
        $type = Input::get("type");
        $result = new \stdClass();
        $result->success = false;

        switch ($type) {
            case 'selectProduct':
                $result->data = $this->selectProduct($group, $page, Input::get("id"), Input::get("company"));
                $result->success = true;
                break;

            case 'selectCompany':
                $result->data = $this->selectCompanyProducts(Input::get("id"));
                $result->success = true;
                break;
        }

        return json_encode($result);

    }

    public function selectCompanyProducts($companyId)
    {
        $catalog = Company::where('id', $companyId)->value('catalog_id');

        $master_catalog = Catalog::where('contract_id', auth()->user()->contract_id)
            ->where('typecatalog_id', MASTER)->value('id');


        $products = CatalogProducts::whereIn('catalog_id', [$catalog, $master_catalog])->get();

        return $products;
    }

    public function selectProduct($group, $page, $id, $company_id)
    {
        $product = CatalogProducts::where('id', '=', $id)
            ->get();

        $inventory_price = Inventory::where('product_id', $id)
            ->where('company_id', $company_id)
            ->value('saleprice');

        $product[0]->price = $inventory_price;

        return $product;
    }

    public function viewlist($group, $page)
    {

        $results = SpecialPrices::select('special_prices.*', 'catalog_products.name', 'catalog_products.saleprice AS price',
            'companies.name as companyname', 'special_prices.description as description')
            ->join('catalog_products', 'special_prices.product_id', 'catalog_products.id')
            ->join('companies', 'special_prices.company_id', 'companies.id')
            ->where('special_prices.status', '!=', 3);

        if (!auth()->user()->hasRole('admin')) {
            if (auth()->user()->hasRole('adtienda')) {
                $company = Company::where('admon_id', auth()->user()->id)->value('id');
                $results->where('companies.id', $company);
            } else {
                $results->where('companies.contract_id', auth()->user()->contract_id);
            }

        }

        return Datatables::of($results)
            ->addColumn('estado', function ($model) {
                switch ($model->status) {
                    case 0:
                        return __('Inactive');
                    case 1:
                        return __('Active');
                    case 2:
                        return __('Caducated');
                }
            })
            ->editColumn('saleprice', function ($model) {
                return '$ ' . number_format($model->saleprice, 2);
            })
            ->addColumn('action', function ($model) use ($group, $page) {
                return getListForm($model->id, $group, $page);
            })->escapeColumns(['action'])->make(true);
    }

    function dateRange($date_start, $date_end, $date_new)
    {
        $date_start = strtotime($date_start);
        $date_end = strtotime($date_end);
        $date_new = strtotime($date_new);
        if (($date_new >= $date_start) && ($date_new <= $date_end))
            return 1;
        elseif (($date_new == $date_start) && ($date_new == $date_end))
            return 1;
        return 0;
    }

    function validateDate($date_start, $date_end)
    {
        $date_start = strtotime($date_start);
        $date_end = strtotime($date_end);

        if ($date_start <= $date_end)
            return 1;
        return 0;
    }

    public function edit($group, $page, $id)
    {

        $promotionEdit = SpecialPrices::find($id);
        $perEdit = !validatePermission("edit", $page) ? "disabled" : "";

        if (!auth()->user()->hasRole('admin')) {
            $this->contracts = Contract::where('contracts.id', auth()->user()->contract_id)
                ->where('contracts.id', '<>', 1)
                ->orderBy('numbercontract', 'asc')->get();
        } else {
            $this->contracts = Contract::orderBy('numbercontract', 'asc')->get();
        }

        $this->catalogs = Catalog::where('id', $promotionEdit->catalog_id)->get();
        $this->products = CatalogProducts::where('id', $promotionEdit->product_id)->get();
        $this->companies = Company::where('id', $promotionEdit->company_id)->get();
        $this->startdate = $promotionEdit->startdate;
        $this->enddate = $promotionEdit->enddate;

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'contracts' => $this->contracts,
            'perEdit' => $perEdit,
            'promotionEdit' => $promotionEdit,
            'catalogs' => $this->catalogs,
            'products' => $this->products,
            'companies' => $this->companies,
            'startdate' => $this->startdate,
            'enddate' => $this->enddate,
        ]);
    }

    public function save(Request $request, $group, $page)
    {
        // dd($request->request);
        // get request fields
        $validator = Validator::make($request->all(), [
            "company" => 'required',
            "product" => 'required',
            "saleprice" => 'required',
            "description" => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
        ]);
        // dd("paso");
        $request->merge(['contract' => auth()->user()->contract_id]);
        // dd($request->request);
        // validate fields
        // dd($validator->fails());
        if ($validator->fails()) {
            return redirect(strtolower('/' . $group . '/' . $page))->withInput()->withErrors($validator);
        }
        // dd("paso");
        // Se debe validar disponibilidad de productos en el inventario
        $hasInventory = Inventory::Company($request)
            ->Product($request)
            ->Contract($request)
            ->AvailableQuantity()
            ->exists();
        $hasInventory = true;
        if (!$hasInventory) {
            return redirect(strtolower('/' . $group . '/' . $page))->with('infos', array(__("Product can not have stock")));
        }

        if ($request->catalogId > 0) {
            $specialPrice = SpecialPrices::where('id', '=', $request->catalogId)->first();
        } else {
            $specialPrice = new SpecialPrices();
            $product = new CatalogProducts();
        }

        // Validate that start date is less that end date
        $validDate = $this->validateDate($request->startdate, $request->enddate);

        if ($validDate != 1)
            return redirect(strtolower('/' . $group . '/' . $page))->with('errors', array(__("Promotion can't be saved. Please review date data and try again later")));

        try {
            $actualDate = Carbon::now()->toDateString();
            $catalogId = CatalogProducts::select('catalogs.id as cid')
                ->where('catalog_products.id', $request->product)
                ->join('catalogs', 'catalog_products.catalog_id', 'catalogs.id')
                ->value('cid');

            $state = $this->dateRange($request->startdate, $request->enddate, $actualDate);
            $specialPrice->company_id = $request->company;
            $specialPrice->product_id = $request->product;
            $specialPrice->catalog_id = $catalogId;
            $specialPrice->startdate = $request->startdate;
            $specialPrice->enddate = $request->enddate;
            $specialPrice->description = $request->description;
            $specialPrice->status = $state;
            $specialPrice->saleprice = $request->saleprice;
            $specialPrice->save();
        } catch (Exception $e) {
            return redirect(strtolower('/' . $group . '/' . $page))->with('errors', array(__("Promotion can't be saved. Please review data and try again later")));
        }
        return redirect(strtolower('/' . $group . '/' . $page))->with('success', __('Saved successfuly'));
    }

    /**
     * Delete a promotion
     *
     * @param unknown $group
     * @param unknown $page
     * @param unknown $id
     */
    public function delete($group, $page, $id)
    {
        $res = SpecialPrices::where('id', '=', $id);
        if ($res) {
            $specialprice = SpecialPrices::findOrFail($id);
            $specialprice->status = 3;
            $specialprice->update();
            return redirect(strtolower('/' . $group . '/' . $page))->with('success', __('Deleted successfuly'));
        } else {
            return redirect(strtolower('/' . $group . '/' . $page))->with('infos', __('Deleted unsuccessfuly foreign keys'));
        }
    }

}
