<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\EloquentUserProvider;
use Yajra\Datatables\Datatables;
use DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Input;
use App\Models\Management\Transactions;
use App\Models\Management\TransactionsDetails;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Models\Management\Supplier;
use App\Models\Management\User;
use App\Models\Management\CatalogProducts;

class OrderssuppliersproductsController extends Controller
{

    public function index($group, $page, $order = "", $dir = "")
    {
        $errors = (array)session('errors');
        $success = (array)session('success');
        $infos = (array)session('infos');

        $inputs = Input::all();
        $pedido = $inputs['id'];

        // $nombreProveedor = Supplier::select('name')
        // ->join('transactions as t' ,'t.supplier_id','=','suppliers.id')
        // ->where('t.id','=', $pedido)->get();
        $nombreproveedor = DB::select('select s.name from suppliers s , transactions t  where t.supplier_id = s.id and t.id = :id', ['id' => $pedido]);

        // $numero = Transactions::select('name')->where('id', "=", $catalog)->get()[0]->name;
        foreach ($nombreproveedor as $nombre) {
            $nombrePro = $nombre->name;
        }

        return view($group . '/' . $page, [
            'group' => ucwords($group),
            'page' => ucwords($page),
            'pedido' => $pedido,
            'nombre' => $nombrePro,
            'errors' => $errors,
            'success' => $success,
            'infos' => $infos
        ]);
    }

    public function viewlist($group, $page)
    {

        $inputs = Input::all();
        $pedido = $inputs['id'];


        $proveedores = Supplier::all();


        $results = TransactionsDetails::select('transactions_details.*', DB::raw('sum(transactions_details.quantity) as totalpro'))
            ->join('catalog_products as orderpro', 'orderpro.id', '=', 'transactions_details.catalog_product_id')
            ->with('Orderpro')
            ->where('transaction_id', '=', $pedido)
            ->groupBy('catalog_product_id');


        return Datatables::of($results)
            ->addColumn('estado', function ($model) {
                return $model->status == 1 ? __('Active') : __('Inactive');
            })
            ->addColumn('action', function ($model) use ($group, $page, $proveedores, $pedido) {
                return getListProductosProveedor($model->id, $group, $page, $proveedores, $pedido);
            })
            ->escapeColumns(['action'])->make(true);
    }


    public function newQuantityProducts(Request $request, $group, $page)
    {

        $validator = Validator::make($request->all(), [
            'cantidad' => 'required|integer|min:1',
        ]);

        // validate fields
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $productoDato = TransactionsDetails::where('id', '=', $request->idtd)->get();

        foreach ($productoDato as $dato) {

            $valorTotal = $dato->unit_price * $request->cantidad;
            $cambioDeValor = TransactionsDetails::find($dato->id);
            $cambioDeValor->quantity = $request->cantidad;
            $cambioDeValor->total_value = $valorTotal;
            $cambioDeValor->update();
            // for($i =0; $i<$request->cantidad; $i++){
            //     $productosNuevos = new TransactionsDetails();
            //     $productosNuevos->transaction_id=$dato->transaction_id;
            //       $productosNuevos->catalog_product_id=$dato->catalog_product_id;
            //       $productosNuevos->quantity=$dato->quantity;
            //       $productosNuevos->unit_price=$dato->unit_price;
            //       $productosNuevos->iva_value=$dato->iva_value;
            //       $productosNuevos->total_value=$dato->total_value;
            //       $productosNuevos->lot_number=$dato->lot_number;
            //       $mytime=Carbon::now('America/Bogota');
            //       $productosNuevos->expiration_date=$mytime->toDateTimeString();
            //       $productosNuevos->fabrication_date=$mytime->toDateTimeString();
            //       $productosNuevos->status=$dato->status;
            //       $productosNuevos->save();
            //    }

            $actualizarValor = DB::table('transactions')
                ->select(DB::raw('sum(td.total_value) as totalsuma'), DB::raw('sum(td.iva_value) as ivavalor'))
                ->join('transactions_details as td', 'td.transaction_id', '=', 'transactions.id')
                ->where('transactions.id', '=', $dato->transaction_id)->get();

            foreach ($actualizarValor as $valorNuevo) {
                # code...

                $actu = Transactions::find($dato->transaction_id);
                $actu->total_value = $valorNuevo->totalsuma;
                $actu->iva_value = $valorNuevo->ivavalor;
                $actu->update();
            }
        }

        return back()->with('success', __('added new amount'));

    }

    public function changeProvider(Request $request, $group)
    {

        $validator = Validator::make($request->all(), [
            'supplier' => 'required',
        ]);

        // validate fields
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }


        $idTransDetalle = $request->idtd;
        $idSupplier = $request->supplier;
        $idtablaTransacion = '';
        $buscarProveedor = Transactions::where('supplier_id', '=', $idSupplier)->where('status', '=', '76')
            ->where('contract_id', '=', auth()->user()->contract_id)->exists();

        if ($buscarProveedor == true) {
            $buscarProveedor1 = Transactions::where('supplier_id', '=', $idSupplier)->where('status', '=', '76')
                ->where('contract_id', '=', auth()->user()->contract_id)->firstOrFail();
            $idtablaTransacionDeluevoProveedor = $buscarProveedor1->id;

            // dd($idtablaTransacion);
            $cantiadaProductos = TransactionsDetails::find($idTransDetalle);
            $idtransacionAnterior = $cantiadaProductos->transaction_id;
            # code...

            $numeroTotalProductos = TransactionsDetails::where('catalog_product_id', '=', $cantiadaProductos->catalog_product_id)
                ->where('transaction_id', '=', $cantiadaProductos->transaction_id)->get();
            //   dd($numeroTotalProductos);
            foreach ($numeroTotalProductos as $numero1) {
                $cambioEstado = TransactionsDetails::find($numero1->id);
                $cambioEstado->transaction_id = $idtablaTransacionDeluevoProveedor;
                $cambioEstado->update();

                //cambio de proveedor Catalogo productos

                $cambioProveedor = CatalogProducts::find($numero1->catalog_product_id);
                $cambioProveedor->supplier_id = $buscarProveedor1->supplier_id;
                $cambioProveedor->update();
            }


            //Actualizar VALOR DE LA TRANSACCION Nueva
            $actualizarValor = DB::table('transactions')
                ->select(DB::raw('sum(td.total_value) as totalsuma'), DB::raw('sum(td.iva_value) as ivavalor'))
                ->join('transactions_details as td', 'td.transaction_id', '=', 'transactions.id')
                ->where('transactions.id', '=', $idtablaTransacionDeluevoProveedor)->get();

            foreach ($actualizarValor as $valorNuevo) {
                # code...

                $actu = Transactions::find($idtablaTransacionDeluevoProveedor);
                $actu->total_value = $valorNuevo->totalsuma;
                $actu->iva_value = $valorNuevo->ivavalor;
                $actu->update();
            }
            //Actualizar VALOR DE LA TRANSACCION ANTERIOR
            $actualizarValor = DB::table('transactions')
                ->select(DB::raw('sum(td.total_value) as totalsuma'), DB::raw('sum(td.iva_value) as ivavalor'))
                ->join('transactions_details as td', 'td.transaction_id', '=', 'transactions.id')
                ->where('transactions.id', '=', $idtransacionAnterior)->get();

            foreach ($actualizarValor as $valorNuevo) {
                # code...

                $actu = Transactions::find($idtransacionAnterior);
                $actu->total_value = $valorNuevo->totalsuma;
                $actu->iva_value = $valorNuevo->ivavalor;
                $actu->update();
                if ($valorNuevo->totalsuma == 0) {
                    $actu = Transactions::find($idtransacionAnterior);
                    $actu->delete();
                    return redirect($group . '/orderssuppliers')->with('success', __('change of product supplier, and the previous supplier no longer has products'));;

                }
            }


        } else {


            $empresa = User::select('users.contract_id', 'catalogs.id as catalog_id', 'companies.id as company_id')
                ->join('catalogs', 'catalogs.contract_id', '=', 'users.contract_id')
                ->join('companies', 'companies.contract_id', '=', 'users.contract_id')
                ->where('users.id', '=', auth()->user()->id)
                ->first();
            $cantiadaProductos = TransactionsDetails::find($idTransDetalle);
            $idtransacionAnterior = $cantiadaProductos->transaction_id;
            $prevewTransaction = Transactions::find($idtransacionAnterior);

            $nuevaTransaccion = new Transactions();
            $nuevaTransaccion->typeoperation_id = '64';
            $nuevaTransaccion->contract_id = $empresa->contract_id;
            $nuevaTransaccion->catalog_id = $empresa->catalog_id;
            $nuevaTransaccion->company_id = $empresa->company_id;
            $nuevaTransaccion->supplier_id = $idSupplier;
            $nuevaTransaccion->client_id = '19';
            $nuevaTransaccion->user_id = auth()->user()->id;
            $mytime = Carbon::now('America/Bogota');
            $nuevaTransaccion->operation_date = $mytime->toDateTimeString();
            $nuevaTransaccion->support_document = '0';
            $nuevaTransaccion->invoice_number = '1';
            $nuevaTransaccion->total_value = '0';
            $nuevaTransaccion->iva_value = '0';
            $nuevaTransaccion->status = '76';
            $nuevaTransaccion->client_id = $prevewTransaction->client_id;
            $nuevaTransaccion->save();


            $buscarIDproductos = TransactionsDetails::find($idTransDetalle);
            $idtransacionAnterior = $buscarIDproductos->transaction_id;
            # code...

            $numeroTotalProductos = TransactionsDetails::where('catalog_product_id', '=', $buscarIDproductos->catalog_product_id)
                ->where('transaction_id', '=', $buscarIDproductos->transaction_id)->get();


            foreach ($numeroTotalProductos as $numero1) {
                $cambioEstado = TransactionsDetails::find($numero1->id);
                $cambioEstado->transaction_id = $nuevaTransaccion->id;
                $cambioEstado->update();


                //cambio nuevo proveedor
                $cambioProveedor = CatalogProducts::find($numero1->catalog_product_id);
                $cambioProveedor->supplier_id = $idSupplier;
                $cambioProveedor->update();
            }

            //Actualizar VALOR DE LA TRANSACCION Nueva
            $actualizarValor = DB::table('transactions')
                ->select(DB::raw('sum(td.total_value) as totalsuma'), DB::raw('sum(td.iva_value) as ivavalor'))
                ->join('transactions_details as td', 'td.transaction_id', '=', 'transactions.id')
                ->where('transactions.id', '=', $nuevaTransaccion->id)->get();

            foreach ($actualizarValor as $valorNuevo) {
                # code...

                $actu = Transactions::find($nuevaTransaccion->id);
                $actu->total_value = $valorNuevo->totalsuma;
                $actu->iva_value = $valorNuevo->ivavalor;
                $actu->update();
            }


            //Actualizar VALOR DE LA TRANSACCION ANTERIOR
            $actualizarValor = DB::table('transactions')
                ->select(DB::raw('sum(td.total_value) as totalsuma'), DB::raw('sum(td.iva_value) as ivavalor'))
                ->join('transactions_details as td', 'td.transaction_id', '=', 'transactions.id')
                ->where('transactions.id', '=', $idtransacionAnterior)->get();

            foreach ($actualizarValor as $valorNuevo) {
                # code...

                $actu = Transactions::find($idtransacionAnterior);
                $actu->total_value = $valorNuevo->totalsuma;
                $actu->iva_value = $valorNuevo->ivavalor;
                $actu->update();
                if ($valorNuevo->totalsuma == 0) {
                    $actu = Transactions::find($idtransacionAnterior);
                    $actu->delete();
                    return redirect($group . '/orderssuppliers')->with('success', __('change of product supplier, and the previous supplier no longer has products'));
                }
            }


        }


        return back()->with('success', __('Change the value of the product'));
    }

    public function valueChange(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cantidad' => 'required|integer|min:1',
        ]);

        // validate fields
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $productoDato = TransactionsDetails::where('id', '=', $request->idtd)->get();

        foreach ($productoDato as $dato) {

            $valorNuevoProducto = $request->cantidad;
            $cambioValorNuevo = $request->cantidad * $dato->quantity;

            $cambioDeValor = TransactionsDetails::find($dato->id);
            $cambioDeValor->unit_price = $valorNuevoProducto;
            $cambioDeValor->total_value = $cambioValorNuevo;
            $cambioDeValor->update();


            $actualizarValor = DB::table('transactions')
                ->select(DB::raw('sum(td.total_value) as totalsuma'), DB::raw('sum(td.iva_value) as ivavalor'))
                ->join('transactions_details as td', 'td.transaction_id', '=', 'transactions.id')
                ->where('transactions.id', '=', $dato->transaction_id)->get();

            foreach ($actualizarValor as $valorNuevo) {
                # code...

                $actu = Transactions::find($dato->transaction_id);
                $actu->total_value = $valorNuevo->totalsuma;
                $actu->iva_value = $valorNuevo->ivavalor;
                $actu->update();


            }
            $cambioProveedor = CatalogProducts::find($dato->catalog_product_id);
            $cambioProveedor->purchaseprice = $valorNuevoProducto;
            $cambioProveedor->update();

        }

        return back()->with('success', __('Change the value of the product'));

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
        $eliminarProducto = TransactionsDetails::where('id', '=', $id)->get();
        foreach ($eliminarProducto as $producto) {
            # code...

            $todosLosProductos = TransactionsDetails::where('catalog_product_id', '=', $producto->catalog_product_id)
                ->where('transaction_id', '=', $producto->transaction_id);

            $todosLosProductos->delete();
            $actualizarValor = DB::table('transactions')
                ->select(DB::raw('sum(td.total_value) as totalsuma'), DB::raw('sum(td.iva_value) as ivavalor'))
                ->join('transactions_details as td', 'td.transaction_id', '=', 'transactions.id')
                ->where('transactions.id', '=', $producto->transaction_id)->get();

            foreach ($actualizarValor as $valorNuevo) {
                # code...

                $actu = Transactions::find($producto->transaction_id);
                $actu->total_value = $valorNuevo->totalsuma;
                $actu->iva_value = $valorNuevo->ivavalor;
                $actu->update();
                if ($valorNuevo->totalsuma == 0) {
                    $actu = Transactions::find($producto->transaction_id);
                    $actu->delete();
                    return redirect($group . '/orderssuppliers')->with('success', __('change of product supplier, and the previous supplier no longer has products'));;

                }
            }

        }

        return back()->with('success', __('Deleted successfuly'));
    }


}