<?php

namespace App\Http\Controllers\Management;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\EloquentUserProvider;
use Yajra\Datatables\Datatables;
use DB;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Management\Transactions;
use App\Models\Management\Category;
use App\Models\Management\Company;
use Illuminate\Support\Facades\Input;
use App\Models\Management\TransactionsDetails;
use App\Models\Management\CatalogProducts;

use Carbon\Carbon;
use App\Models\Management\User;
use App\Models\Management\CompaniesUsers;
use App\Models\Management\Lists;
use \App\Models\Management\Person;


const PEDIDO_LIST = 62;
const STATUS = 72;
const rutaimagenprod = "/support/pictures/productscatalogs/";
const rutaimagencat = "/support/pictures/categories/";
const TIPOS_DOCUMENTOS = 4;

class FormulationOrdersController extends Controller
{
    public $images = '';
    public $salesunits = '';
    public $categories = '';
    public $asigcatalog = '';

    public function __construct()
    {
        if(auth()->guard('client')->user())
            $this->middleware('client');
        else
            $this->middleware('auth');

        $this->asigcatalog = CompaniesUsers::select('companies.catalog_id')
            ->join('companies', 'companies.id', '=', 'companies_users.company_id')
            ->where('companies_users.user_id', '=', auth()->user()->id)
            ->get()->first();

        $this->itemstypedocument = Lists::whereIn('code', ['CC', 'CE'])
            ->where('idowner', '=', TIPOS_DOCUMENTOS)->whereRaw('id <> idowner')
            ->orderBy('order', 'asc')->get();

        $this->defaultclient = Person::select('clients.id as id','socialreason')->join('clients','persons.id','clients.person_id')
            ->where('persons.socialreason','REGISTRO PARA EMPRESA SIN DISTRIBUIDOR')->get();

        if (!empty($this->asigcatalog->catalog_id)) {

            $categorias_catalogo = CatalogProducts::select('category_id')
                ->where('catalog_id', $this->asigcatalog->catalog_id)
                ->distinct()
                ->get()
                ->toArray();

            $this->categories = Category::select('categories.*')
                ->whereIn('categories.id', $categorias_catalogo)
                ->where('typemodal', 0)
                ->with(array('ProductsCatalog' => function ($query) {
                    $query->where('catalog_id', $this->asigcatalog->catalog_id)
                        ->with('ValorImpuesto');
                }))
                ->orderBy('order', 'asc')
                ->get();

// dd($this->categories[0]);

        }
        
    }

    public function viewlist($group, $page)
    {

        $results = Transactions::where('typeoperation_id', PEDIDO_LIST )
            ->where('status', STATUS)
            ->with('User')
            ->with('Comercio')
            ->with('Estado')
            // ->with('client')
            ->orderByRaw('created_at DESC');
// dd($results->get());
        if (!auth()->user()->hasRole('admin')) {
            $results->where('transactions.contract_id', auth()->user()->contract_id);
        }

        $obj = new \stdClass();
        $obj->link = '<a href="/management/formulationordersproducts?id={{ $model->id }}" class="btn btn-success" data-placement="top" data-toggle="tooltip" title="' . __('See Products') . '">
                            <i class="fa fa-list"></i>
                    </a>';
        $obj->vars = array();
        $obj->vars[] = array();
        $obj->vars[0]['name'] = 'model->id';
        $obj->vars[0]['value'] = 'id';
        $buttons = array();
        $buttons[] = $obj;

        return Datatables::of($results)
            // ->addColumn('fullname', function ($model) {
            //     return $model->client->person->fullname .' '. $model->client->person->identification;
            // })
            ->addColumn('action', function ($model) use ($group, $page, $buttons) {
                return getListForm($model->id, $group, $page, $buttons, $model, true, false);
            })
            ->escapeColumns(['action'])->make(true);

    }

    public function index($group, $page, $order = "", $dir = "")
    {

        //dd($path);
        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'errors' => $errors,
            'categories' => $this->categories,
            'success' => $success,
            'infos' => $infos,
            'itemstypedocument' => $this->itemstypedocument,
            'defaultclient' => $this->defaultclient
        ]);

    }

    public function ajax($page, $group)
    {
        $type = Input::get("type");
        $result = new \stdClass();
        $result->success = false;

        switch ($type) {
            case 'guardarfactura':
                $result->data = $this->guardarfactura($group, $page, Input::get("query"), Input::get("items"), Input::get("total"), Input::get("iva"),Input::get("clientid"));
                $result->success = true;
                break;
        }
        return json_encode($result);
    }

    public function edit($group, $page, $id)
    {


        //dd($path);
        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'errors' => $errors,
            'categories' => $this->categories,
            'images' => $this->images,
            'success' => $success,
            'infos' => $infos


        ]);

    }


    public function guardarfactura($group, $page, $query, $items, $total, $iva, $clientid)
    {
// dd($group, $page, $query, $items, $total, $iva, $clientid);
        $empresa = User::select('users.contract_id', 'catalogs.id as catalog_id', 'companies.id as company_id')
            ->join('catalogs', 'catalogs.contract_id', '=', 'users.contract_id')
            ->join('companies', 'companies.contract_id', '=', 'users.contract_id')
            ->where('users.id', '=', auth()->user()->id)
            ->first();

        try {

            DB::beginTransaction();

            $venta = new Transactions();
            $venta->typeoperation_id = '62';
            $venta->contract_id = $empresa->contract_id;
            $venta->catalog_id = $empresa->catalog_id;
            $venta->company_id = $empresa->company_id;
            $venta->supplier_id = '1';
            $venta->client_id = $clientid;
            $venta->user_id = auth()->user()->id;
            $mytime = Carbon::now('America/Bogota');
            $venta->operation_date = $mytime->toDateTimeString();
            $venta->support_document = '0';
            $venta->invoice_number = '1';
            $venta->total_value = $total;
            $venta->iva_value = $iva;
            $venta->status = '72';

            $venta->save();


            $array = json_decode($query);

            for ($i = 0; $i < $items; $i++) {
                foreach ($array as $value) {

                    $detalle = new TransactionsDetails();
                    $detalle->transaction_id = $venta->id;
                    $detalle->catalog_product_id = $value[$i]->idarticulo;
                    $detalle->quantity = $value[$i]->cantidad;
                    $detalle->unit_price = $value[$i]->precio_venta;
                    $detalle->iva_value = $value[$i]->valor_iva;
                    $detalle->total_value = $value[$i]->precio_total;
                    $detalle->lot_number = '0';
                    $mytime = Carbon::now('America/Bogota');
                    $detalle->expiration_date = $mytime->toDateTimeString();
                    $detalle->fabrication_date = $mytime->toDateTimeString();
                    $detalle->status = '1';
                    $detalle->save();
                }
            }

            DB::commit();

            return redirect($group . '/' . $page);

        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
        }


    }


    public function delete($group, $page, $id)
    {

        try {
            $consulta = Transactions::where('id', '=', $id)->where('status', '=', '74')->exists();


            if ($consulta == true) {
                return back()->with('infos', array(__('No se puede Eliminar el pedido esta Procesado')));
            } else {
                TransactionsDetails::where('transaction_id', '=', $id)->delete();
                Transactions::where('id', '=', $id)->delete();
                return back()->with('success', array(__('Deleted successfuly')));
            }


        } catch (\Exception $e) {
            return back()->with('infos', array(__('Deleted unsuccessfuly foreign keys')));
        }
    }
}
