<?php
namespace App\Http\Controllers\Management;
use App\Http\Controllers\Controller;
use App\Models\Management\Catalog;
use App\Models\Management\Company;
use App\Models\Management\Contract;
use Yajra\Datatables\Datatables;

const MASTER = 103;

class InventoryController extends Controller{

    public function __construct(){
        $this->middleware("auth");
    }

    public function index($group, $page){
        $errors = (array) session('errors');
        $success = (array) session('success');
        $infos = (array) session('infos');

        if (!auth()->user()->hasRole('admin'))
            $this->contracts = Contract::where('contracts.id', '=', auth()->user()->contract_id)
                ->where('contracts.id','<>',1)
                ->orderBy('numbercontract', 'asc')->get();
         else
             $this->contracts = Contract::orderBy('numbercontract', 'asc')
                ->get();

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'contracts' => $this->contracts,
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos
        ]);
    }

    public function viewlist($group, $page) {

        $company = find_company(auth()->user()->id, auth()->user()->roles[0]->name);

        $results = Catalog::select('catalogs.*')
            ->join('contracts as contrato', 'contrato.id', '=', 'catalogs.contract_id')
            ->with('Contrato.TypeContract');

        if (auth()->user()->hasRole('adcontrato'))
            $results->where('catalogs.contract_id', auth()->user()->contract_id);

        if (auth()->user()->hasRole('adtienda') || auth()->user()->hasRole('cajero')) {

            $catalogoid = 0;

            $master_catalog = Catalog::where('contract_id', auth()->user()->contract_id)
                ->where('typecatalog_id',MASTER)->value('id');

            if (!empty($company)) $catalogoid = $company->catalog_id;

            $results->whereIn('catalogs.id', [$catalogoid, $master_catalog]);

        } else {
            $result->whereIn('catalogs.id', []);
        }

        $obj = new \stdClass();
        $obj->link = '<a href="/management/inventorycatalogsproducts?id={{ $model->id }}" 
                            data-placement="top" 
                            data-toggle="tooltip" 
                            title="' . __('My Catalog') . '" 
                            <i class="fa fa-fw fa-bars" style="color: #00a2e8; font-size: 20px; margin: 3px;"></i>
                      </a>';
        $obj->vars = array();
        $obj->vars[] = array();
        $obj->vars[0]['name'] = 'model->id';
        $obj->vars[0]['value'] = 'id';

        $buttons = array();
        $buttons[0] = $obj;

        return Datatables::of($results)
            ->addColumn('type', function ($model) {
                return $model->typecatalog_id == MASTER ? __('Master ') : __('Comercio');
            })
            ->addColumn('estado', function ($model) {
                return $model->status == 1 ? __('Active') : __('Inactive');
            })
            ->addColumn('action', function ($model) use ($group, $page, $buttons) {
                return getListForm($model->id, $group, $page, $buttons, $model,false,false);
            })->escapeColumns(['action'])->make(true);
    }

}
