<?php

namespace App\Http\Controllers\Management;

use App\Models\Management\Inventory;
use App\Models\Management\Product;
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
use App\Models\Management\Combination;
use App\Models\Management\CombinationProducts;

const MASTER = 103;

class CombinationController extends Controller
{

    public $contracts = '';

    public function __construct()
    {
        $this->middleware('auth');
        $this->catalogs = Catalog::where('contract_id', '=', auth()->user()->contract_id)->get();
        $this->catalogId = Catalog::where('contract_id', '=', auth()->user()->contract_id)->value('id');

        if (auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('adtendero')) {
            $company = Company::where('admon_id', auth()->user()->id)->value('id');
            $this->companies = Company::where('id', $company)->get();
        } else {
            $this->companies = Company::where('contract_id', '=', auth()->user()->contract_id)->get();
        }
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
            'companies' => $this->companies,
            'products' => ''
        ]);
    }

    public function viewlist($group, $page)
    {

        $results = Combination::select('combination.id as id', 'combination.name as cname', 'companies.name as coname',
            'combination.status as status', 'saleprice')
            ->join('companies', 'combination.company_id', 'companies.id')
            ->where('combination.status', '!=', 2);

        if (!auth()->user()->hasRole('admin')) {
            if (auth()->user()->hasRole('adtienda')) {
                $company = Company::where('admon_id', auth()->user()->id)->value('id');
                $results = $results->where('companies.id', $company);
            } else {
                $results = $results->where('companies.contract_id', auth()->user()->contract_id);
            }
        }


        $obj = new \stdClass();
        $obj->link = '<a href="/management/combinationproducts?id={{ $model->id }}" 
                                data-placement="top" 
                                data-toggle="tooltip" 
                                title="' . __('See Products') . '">
                                <i class="fa fa-list" style="color: #00a2e8; font-size: 20px; margin: 3px;"></i>
                      </a>';
        $obj->vars = array();
        $obj->vars[] = array();
        $obj->vars[0]['name'] = 'model->id';
        $obj->vars[0]['value'] = 'id';

        $buttons = array();
        $buttons[0] = $obj;

        return Datatables::of($results)
            ->addColumn('estado', function ($model) {
                return $model->status == 1 ? __('Active') : __('Inactive');
            })
            ->editColumn('saleprice', function ($model) {
                return '$ ' . number_format($model->saleprice, 2);
            })
            ->addColumn('action', function ($model) use ($group, $page, $buttons) {
                return getListForm($model->id, $group, $page, $buttons, $model);
            })->escapeColumns(['action'])->make(true);
    }

    public function edit($group, $page, $id)
    {

        $comboEdit = Combination::find($id);
        $productsEdit = CombinationProducts::where('combination_id', $id);
        $comboProduct = CombinationProducts::join('catalog_products', 'combination_products.product_id', 'catalog_products.id')
            ->where('combination_products.combination_id', $id)
            ->get();

        $perEdit = !validatePermission("edit", $page) ? "disabled" : "";

        if (!auth()->user()->hasRole('admin')) {
            $this->contracts = Contract::where('contracts.id', auth()->user()->contract_id)
                ->where('contracts.id', '<>', 1)
                ->orderBy('numbercontract', 'asc')->get();
        } else {
            $this->contracts = Contract::orderBy('numbercontract', 'asc')->get();
        }

        $this->catalogs = Catalog::where('id', '=', $comboEdit->catalog_id)->get();

        $this->companies = Company::where('id', '=', $comboEdit->company_id)->get();


        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'contracts' => $this->contracts,
            'perEdit' => $perEdit,
            'comboEdit' => $comboEdit,
            'productsEdit' => $productsEdit,
            'catalogs' => $this->catalogs,
            'companies' => $this->companies,
            'comboProduct' => $comboProduct,
            'products' => ''
        ]);
    }

    public function save(Request $request, $group, $page)
    {
        // dd($request->request);
        if (count($request->products) < 2) {
            return redirect(strtolower('/' . $group . '/' . $page))->with('infos', array(__("Must include at least two products")));
        }

        if ($this->validateProductStock($request)) {
            return redirect(strtolower('/' . $group . '/' . $page))->with('infos', array(__("Product can not have stock")));
        }

        if ($request->catalogId > 0) {
            $combo = Combination::where('id', '=', $request->catalogId)->first();
        } else {
            $combo = new Combination();
        }

        try {
            $combo->company_id = $request->company;
            $combo->saleprice = $request->saleprice;
            $combo->catalog_id = $this->catalogId;
            $combo->name = $request->name;
            $combo->status = $request->status;
            $combo->save();
            $this->saveProducts($request, $combo);
        } catch (Exception $e) {
            return redirect(strtolower('/' . $group . '/' . $page))->with('errors', array(__("Promotion can't be saved. Please review data and try again later")));
        }
        return redirect(strtolower('/' . $group . '/' . $page))->with('success', __('Saved successfuly'));
    }

    public function ajax(Request $request, $group, $page)
    {

        $type = Input::get("type");
        $result = new \stdClass();
        $result->success = false;
        $url = $request->url;

        switch ($type) {
            case 'selectCompany':
                $result->data = $this->selectCompanyProducts(Input::get("id"));
                $result->success = true;
                return json_encode($result);
                break;

            case 'productPrice':
                $product_id = Input::get('product');
                $company_id = Input::get('company');

                $inventory_price = Inventory::where('product_id', $product_id)
                    ->where('company_id', $company_id)
                    ->value('saleprice');

                if (empty($inventory_price))
                    $inventory_price = CatalogProducts::where('id', $product_id)->value('saleprice');

                $result = [
                    'product' => $product_id,
                    'saleprice' => $inventory_price,
                    'success' => true
                ];

                return json_encode($result);
                break;
        }

    }

    public function selectCompanyProducts($companyId)
    {
        $catalog = Company::where('id', $companyId)->value('catalog_id');

        $master_catalog = Catalog::where('contract_id', auth()->user()->contract_id)
            ->where('typecatalog_id', MASTER)->value('id');

        $products = CatalogProducts::whereIn('catalog_id', [$catalog, $master_catalog])->get();

        return $products;
    }

    public function saveProducts($request, $combo)
    {

        if ($request->editadd == "true") {
            CombinationProducts::where('combination_id', $combo->id)->delete();
        }

        for ($i = 1; $i < count($request->products); $i++) {
            $comboProduct = new CombinationProducts();
            $comboProduct->combination_id = $combo->id;
            $comboProduct->product_id = $request->products[$i];
            $comboProduct->quantity = $request->quantities[$i];
            $comboProduct->status = 1;
            $comboProduct->save();
        }
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
        $res = Combination::where('catalog_id', '=', $id)->first();
        if (!$res) {
            $combination = Combination::findOrFail($id);
            $combination->status = 2;
            $combination->update();
            return redirect(strtolower('/' . $group . '/' . $page))->with('success', __('Deleted successfuly'));
        } else {
            return redirect(strtolower('/' . $group . '/' . $page))->with('infos', __('Deleted unsuccessfuly foreign keys'));
        }
    }

    private function validateProductStock(Request $request)
    {
        $newRequest = new Request();

        for ($i = 1; $i < count($request->products); $i++) {
            $newRequest->merge([
                'company' => $request->company,
                'contract' => auth()->user()->contract_id,
                'product' => $request->products[$i]
            ]);

            $hasInventory = Inventory::Company($request)
                ->Product($request)
                ->Contract($request)
                ->AvailableQuantity()
                ->exists();

            if (!$hasInventory) {
                return true;
            }
            // return true;
        }
        return false;
    }

}
