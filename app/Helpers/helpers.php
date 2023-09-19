<?php

use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

use App\Models\Management\ExcelField;
use App\Models\Management\Configurations;
use App\Models\Management\Permission;
use App\Models\Management\Company;
use App\Models\Management\Address;
use App\Models\Management\Transactions;
use App\Models\Management\CatalogProducts;
use App\Models\Management\Contract;
use App\Models\Management\Counterscontrol;
use App\Models\Management\Deliveries;
use App\Models\Management\Parameters;
use App\Models\Management\TransactionsDetails;
use App\Models\Management\TransactionsPaymentmethods;
use App\Models\Management\ShiftManagements;
use App\Models\Management\BalanceAccounts;
use App\Models\Management\BalancePayments;

use App\Enums\StatusEnum;

include_once __DIR__ . '/Error.php';

/**
 * Build a query from a array (reverse of the PHP parse_str())
 */
function buildQuery($params, $akey = null) {

    if (!is_array($params) || count($params) == 0) {
        return false;
    }

    $out = array();

    //reset in case we are looping
    if (!isset($akey) && !count($out)) {
        unset($out);
        $out = array();
    }

    foreach ($params as $key => $val) {
        if (is_array($val)) {
            $out[] = buildQuery($val, $key);
            continue;
        }

        $thekey = (!$akey) ? $key : $akey . '[' . $key . ']';
        $out[] = $thekey . "=" . urlencode($val);
    }

    return implode("&", $out);
}

/**
 * Return a configurations value by key
 * @param string $key
 * @return string
 */
function getConfig($key, $forcompany = false) {
    $config = Configurations::where('key', '=', $key)->first();

    if (isset($config)) {
        return $config->value;
    }
    return '';
}

function getConfigCompany($key) {
    $company = Company::find(auth()->user()->company_id);
    $company->configurations = json_decode($company->configurations);
    $config = Configurations::where('key', '=', $key)->first();

    if (isset($config)) {
        if (!empty($company->configurations->{$config->id})) {
            return $company->configurations->{$config->id};
        } else {
            return $config->value;
        }
    }
    return '';
}

// funcion para agregar productos
function cheackboxagregarproductos($id, $group, $page, $buttons = array(), $model = null, $deleteBtn = true, $editBtn = true) {
    $return = '<div class="form-group row" style="margin-bottom: -1rem; padding-bottom: 10px; display: flex;flex-wrap: nowrap;flex-direction: row;justify-content: flex-start;">';
    $return .= '    <input type="checkbox"  style="margin-left: 15px; border: none; background: transparent;" onClick="if (this.checked) sumar(1,' . $id . '); else restar(1,' . $id . ')" id="pro" class="form-check-input" name="checkbox[]" value=' . $id . ' 
            title="' . __('View') . '">';
    $return .= '</div>';
    return $return;
}

function getListForm($id, $group, $page, $buttons = array(), $model = null, $deleteBtn = true, $editBtn = true) {
    $return = '<div class="form-group row" style="margin-bottom: -1rem; padding-bottom: 10px; display: flex;flex-wrap: nowrap;flex-direction: row;justify-content: flex-start;">';

    if ($editBtn) {
        $perEdit = !validatePermission("ver", $page) ? "disabled" : "";
        $return .= '<form action="/' . strtolower($group) . '/' . strtolower($page) . '/edit/' . $id . '" class="editform" method="POST">
                        <input type="hidden" name="_token" value="' . csrf_token() . '">
                            <button type="submit" 
                                "' . $perEdit . ' 
                                style="border-width: 0px; background-color: transparent;"
                                data-placement="top" 
                                data-toggle="tooltip" title="' . __('View') . '">
                                <i class="fa fa-edit" style="color: #00a2e8; font-size: 20px; margin: 3px;"></i>
                            </button>
                    </form>';
    }

    if ($deleteBtn) {
        $perDelete = !validatePermission("delete", $page) ? "disabled" : "";
        $return .= '<form action="/' . strtolower($group) . '/' . strtolower($page) . '/' . $id . '" class="deleteform" method="POST">
                        <input type="hidden" name="_token" value="' . csrf_token() . '">
                        <input type="hidden" name="_method" value="DELETE">
                            <a type="submit" 
                                class="btn-delete" 
                                ' . $perDelete . ' 
                                data-placement="top" 
                                data-toggle="tooltip" 
                                title="' . __('Delete') . '" 
                                onclick="return confirm(\'' . __('Are you sure that you want to permanently delete this record?') . '\');">
                                <i class="fa fa-trash" style="color: #00a2e8; font-size: 20px; margin: 3px;"></i>
                            </a> 
                    </form>';
    }

    foreach ($buttons as $button) {
        $link = $button->link;
        foreach ($button->vars as $var) {
            $link = str_replace('{{ $' . $var['name'] . ' }}', $model->{$var['value']}, $link);
        }
        $return .= $link;
    }
    $return .= '</div>';
    return $return;
}

//solo ver los productos
function products($id, $group, $page, $buttons = array(), $model = null, $deleteBtn = true, $editBtn = true) {
    $return = '<div class="form-group row" style="margin-bottom: -1rem; padding-bottom: 10px; display: flex;flex-wrap: nowrap;flex-direction: row;justify-content: flex-start;">';
    foreach ($buttons as $button) {
        $link = $button->link;
        foreach ($button->vars as $var) {
            $link = str_replace('{{ $' . $var['name'] . ' }}', $model->{$var['value']}, $link);
        }
        $return .= $link;
    }
    $return .= '</div>';
    return $return;
}

// funcion para tener los los 3 botones y agregar productos a ese catalago de una forma mas rapida.
function getListFormAddProduct($id, $group, $page, $buttons = array(), $model = null, $buttons1 = array(), $deleteBtn = true, $editBtn = true) {
    $return = '<div class="form-group row" style="margin-bottom: -1rem; padding-bottom: 10px;display: flex;flex-wrap: nowrap;flex-direction: row;justify-content: flex-start;">';

    $perEdit = !validatePermission("ver", $page) ? "disabled" : "";
    $return .= '<form action="/' . $group . '/' . $page . '/edit/' . $id . '" class="editform" method="POST">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                            <button type="submit" class="btn btn-primary" style="margin-right:6px; margin-bottom:3px; width:36px;height:36px"' . $perEdit . ' 
                                data-placement="top" 
                                data-toggle="tooltip" title="' . __('View') . '">
                                    <i class="fa fa-edit"></i>
                            </button>
                </form>';

    $perDelete = !validatePermission("delete", $page) ? "disabled" : "";
    $return .= '<form action="/' . $group . '/' . $page . '/' . $id . '" class="deleteform" method="POST">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-delete" style="margin-right:6px; margin-bottom:3px; width:36px;height:36px" ' . $perDelete . ' 
                                data-placement="top" data-toggle="tooltip" title="' . __('Delete') . '" onclick="return confirm(\'' . __('Are you sure that you want to permanently delete this record?') . '\');">
                                    <i class="fa fa-trash"></i>
                            </button>
                </form>';

    foreach ($buttons as $button) {
        $link = $button->link;
        foreach ($button->vars as $var) {
            $link = str_replace('{{ $' . $var['name'] . ' }}', $model->{$var['value']}, $link);
        }
        $return .= $link;
    }

    foreach ($buttons1 as $button) {
        $link = $button->link;
        foreach ($button->vars as $var) {
            $link = str_replace('{{ $' . $var['name'] . ' }}', $model->{$var['value']}, $link);
        }
        $return .= $link;
    }
    $return .= '</div>';
    return $return;
}

function getListFormularionPedio2($id, $group, $page, $buttons = array(), $model = null, $deleteBtn = true, $editBtn = true) {
    $return = '<div class="form-group row" style="display:flex; flex-wrap:nowrap;">';


    $perEdit = !validatePermission("ver", $page) ? "disabled" : "";

    $perDelete = !validatePermission("delete", $page) ? "disabled" : "";
    $return .= '<form action="/' . $group . '/' . $page . '/' . $id . '" class="deleteform" method="POST">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-delete" ' . $perDelete . ' 
                                data-placement="top" data-toggle="tooltip" title="' . __('Delete') . '" onclick="return confirm(\'' . __('Are you sure that you want to permanently delete this record?') . '\');">
                                    <i class="fa fa-trash"></i>
                            </button>
                    </form>';


    foreach ($buttons as $button) {
        $link = $button->link;
        foreach ($button->vars as $var) {
            $link = str_replace('{{ $' . $var['name'] . ' }}', $model->{$var['value']}, $link);
        }
        $return .= $link;
    }
    $return .= '</div>';
    return $return;
}

//solo se utuliza para la formulacion del pedido
function getListFormularionPedio($id, $group, $page, $buttons = array(), $model = null, $deleteBtn = true, $editBtn = true) {
    $return = '<div class="form-group row" style="display:flex; flex-wrap:nowrap;">';


    $perEdit = !validatePermission("ver", $page) ? "disabled" : "";

    $perDelete = !validatePermission("delete", $page) ? "disabled" : "";
    $return .= '<form action="/' . $group . '/' . $page . '/' . $id . '" class="deleteform" method="POST">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-delete" ' . $perDelete . ' 
                                data-placement="top" data-toggle="tooltip" title="' . __('Delete') . '" onclick="return confirm(\'' . __('Are you sure that you want to permanently delete this record?') . '\');">
                                    <i class="fa fa-trash"></i>
                            </button>
                    </form>';


    foreach ($buttons as $button) {
        $link = $button->link;
        foreach ($button->vars as $var) {
            $link = str_replace('{{ $' . $var['name'] . ' }}', $model->{$var['value']}, $link);
        }
        $return .= $link;
    }


    $consulta = Transactions::findOrFail($id);

    $disables = "";
    $verpdf = "";
    if (($consulta->status == '76')) {
        $verpdf = 'disabled';
    }
    if (!($consulta->status == '76')) {
        $disables = 'disabled';
    }
    $return .= '
    <button type="submit" class="btn btn-dark " ' . $disables . '  data-toggle="modal" data-target="#Modalprove' . $id . '" data-placement="top" data-toggle="tooltip" title="' . __('send to supplier') . '">
    <i class="fa fa-opencart"  ></i>
    </button>
    
    <div class="modal fade" id="Modalprove' . $id . '"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">' . __('send to supplier') . '</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>

                <div class="modal-body">
                <form type="post" action="/management/orderssuppliers/download">
                    <div class="modal-footer">
                    ' . __('Are you sure that I already want to send the order to the supplier?') . '
                            <input type="hidden" name="_token" value="" />
                            <input type="hidden" name="idtp" value="' . $id . '" />
                            <input type="hidden" name="verodescargarpdf" value="1" />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">' . __('Close') . '</button>
                        <button type="submit" class="btn btn-primary">' . __('send to supplier') . '</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div> ';

    $return .= '
        <form type="post" action="/management/orderssuppliers/download" target="_blank">
        <input type="hidden" name="_token" value="" />
        <input type="hidden" name="idtp" value="' . $id . '" />
        <input type="hidden" name="verodescargarpdf" value="2" />
            <button type="submit" class="btn btn-primary " ' . $verpdf . '    data-placement="top" data-toggle="tooltip" title="' . __('Descargar PDF') . '">
            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>

            </button>
        </form>';
    if (($consulta->status == '76')) {
        $return .= '
     <form type="post" action="/management/orderssuppliers/confirmorder">
            </button>
             <input type="hidden" name="idtp" value="' . $id . '" />
             <button type="submit" class="btn btn-success " data-placement="top" data-toggle="tooltip" title="' . __('Confirmar') . '">
            <i class="fa fa-check"></i>
            </button>
        </form>';
    } elseif (($consulta->status == '78')) {
        $return .= '
     <form type="post" action="/management/orderssuppliers/transactionorder"  target="_blank">
            </button>
             <input type="hidden" name="id" value="' . $id . '" />
             <button type="submit" class="btn btn-warning " data-placement="top" data-toggle="tooltip" title="' . __('Ordenar') . '">
            <i class="fa fa-arrow-circle-down"></i>
            </button>
        </form>';
    }


    $return .= '</div>';
    return $return;
}

// funcion para agregar checkbox para crear un pedido
function getListFormCheckBox($id, $page) {
    $return = '';
    // $consulta = Transactions::where('id' ,'=', $id )->firstOrFail();
    $consulta = Transactions::findOrFail($id);

    if ($consulta->status == '72') {
        $perCheckBox = !validatePermission("ver", $page) ? "disabled" : "";
        $return .= '    <input type="checkbox" style="border: none; background: transparent;" class="form-check-input" name="checkbox[]" value=' . $id . ' 
                             title="' . __('View') . '">';
    } else {
        $perCheckBox = !validatePermission("ver", $page) ? "disabled" : "";
        $return .= '    <input type="checkbox" style="border: none; background: transparent;" class="form-check-input" name="checkbox[]" checked disabled value=' . $id . ' 
                             title="' . __('View') . '">';
    }


    $return .= '';
    return $return;
}

//
function getListFormCheckBox2($id, $group, $page, $buttons = array(), $model = null, $deleteBtn = true, $editBtn = true) {
    $return = '<div class="form-group row" style="display:flex; flex-wrap:nowrap;">';

    // foreach ($buttons as $button) {
    // $link = $button->link;
    //         foreach ($button->vars as $var) {
    //             $link = str_replace('{{ $' . $var['name'] . ' }}', $model->{$var['value']}, $link);
    //         }
    //         $return .= $link;
    //     }
    //     $return .= '</div>';
    //     return $return;
}

// funcion para agregar checkbox para crear un pedido
function getListProductosProveedor($id, $group, $page, $proveedores, $pedido) {
    $return = '';
    // $consulta = Transactions::where('id' ,'=', $id )->firstOrFail();


    $a = Transactions::findOrFail($pedido);

    $noModoficar = "";

    if (!($a->status == '76')) {
        $noModoficar = 'disabled';
    }
    $perDelete = !validatePermission("delete", $page) ? "disabled" : "";

    # code...
    $return .= ' 
    <button type="button" ' . $noModoficar . ' class="btn btn-primary" data-toggle="modal" data-target="#Modalprove' . $id . '" data-whatever="@mdo   data-placement="top" data-toggle="tooltip" title="' . __('change supplier') . '" > <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
    </button> 
    <div class="modal fade" id="Modalprove' . $id . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">' . __('change supplier') . '</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
        </div>
    <div class="modal-body">
        <form action="/' . strtolower($group . '/' . $page . '/changeprovider') . '" method="POST">
            <input type="hidden" name="_token" value="' . csrf_token() . '">
        <div class="form-group">

            <label for="supplierproductos" class="col-sm-3 col-form-label">' . __('Supplier') . ' *</label>

                <select name="supplier" id="supplier" class="form-control ">
                <option value="true" selected disabled>' . __('Select a provider') . '</option>';
    foreach ($proveedores as $prove) :
        $return .= ' <option value="' . $prove->id . '"> ' . $prove->name . ' </option>';
    endforeach;
    $return .= ' </select>
          
        
            <input id="url" type="hidden" name="idtd" value="' . $id . '" >
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">' . __('Close') . '</button>
            <button type="submit" class="btn btn-primary">' . __('change supplier') . '</button>
        </div>
        </form>
        </div>

        </div>
        </div>
        </div> ';

    $return .= ' 
                <button type="button"  ' . $noModoficar . ' class="btn btn-primary" data-toggle="modal" data-target="#exampleModal' . $id . '" data-whatever="@mdoata-placement="top" data-toggle="tooltip" title="' . __('New Quantity') . '"><i class="fa fa-plus" aria-hidden="true"></i>
                </button> 
                <div class="modal fade" id="exampleModal' . $id . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">' . __('New Quantity') . '</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                <div class="modal-body">
                    <form action="/' . strtolower($group . '/' . $page . '/newquantity') . '" method="POST">
                        <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <div class="form-group">
                    <label for="recipient-name" class="col-form-label">' . __('Quantity') . '</label>
                        <input type="text" class="form-control" id="cantidad" name="cantidad">
                        <input id="url" type="hidden" name="idtd" value="' . $id . '" >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">' . __('Close') . '</button>
                        <button type="submit" class="btn btn-primary">' . __('Add Quantity') . '</button>
                    </div>
                    </form>
            </div>
            
            </div>
        </div>
        </div> ';


    // cambiar valor de productos

    $return .= ' 
            <button type="button"   ' . $noModoficar . ' class="btn btn-primary" data-toggle="modal" data-target="#cambiarvalor' . $id . '" data-whatever="@mdo"  data-placement="top" data-toggle="tooltip" title="' . __('change product value') . '"><i class="fa fa-pencil" aria-hidden="true"></i>
            </button> 
            <div class="modal fade" id="cambiarvalor' . $id . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">' . __('change value') . '</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
            <div class="modal-body">
                <form action="/' . strtolower($group . '/' . $page . '/changevalue') . '" method="POST">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                <div class="form-group">
                <label for="recipient-name" class="col-form-label">' . __('change value') . '</label>
                    <input type="text" class="form-control" id="cantidad" name="cantidad">
                    <input id="url" type="hidden" name="idtd" value="' . $id . '" >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">' . __('Close') . '</button>
                    <button type="submit" class="btn btn-primary">' . __('change value') . '</button>
                </div>
                </form>
            </div>

            </div>
            </div>
            </div> ';


    $return .= '<form action="/' . $group . '/' . $page . '/' . $id . '" class="deleteform" method="POST">
                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                    <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-delete" ' . $perDelete . '  ' . $noModoficar . '
                                data-placement="top" data-toggle="tooltip" title="' . __('Delete') . '" onclick="return confirm(\'' . __('Are you sure that you want to permanently delete this record?') . '\');">
                                    <i class="fa fa-trash"></i>
                            </button>
                    </form>';
    $return .= '';
    return $return;
}

function from_camel_case($input) {
    preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
    $ret = $matches[0];
    foreach ($ret as &$match) {
        $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
    }
    return implode('_', $ret);
}

function validatePermission($perm, $page) {
    $page = lcfirst($page);
    if (auth()->user()->hasRole('admin')) {
        return true;
    } else {
        //        return !permExist($perm . '-' . $page) ? !auth()->user()->can($perm) : !auth()->user()->can($perm . '-' . $page);
        if (auth()->user()->can($perm))
            return !auth()->user()->can($perm);
        else
            if (permExist($perm . '-' . $page))
            return !auth()->user()->can($perm . '-' . $page);
        else
            return !auth()->user()->can($perm);
    }
}

function permExist($permName) {
    $perm = Permission::where('name', '=', $permName)->first();
    return !empty($perm);
}

function randomPassword($length = 10) {
    //Se define una cadena de caractares. Te recomiendo que uses esta.
    $cadena = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    //Obtenemos la longitud de la cadena de caracteres
    $longitudCadena = strlen($cadena);

    //Se define la variable que va a contener la contrase�a
    $pass = "";

    //Creamos la contrase�a
    for ($i = 1; $i <= $length; $i++) {
        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        $pos = rand(0, $longitudCadena - 1);

        //Vamos formando la contrase�a en cada iteraccion del bucle, a�adiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
        $pass .= substr($cadena, $pos, 1);
    }
    return $pass;
}

function searchInArrayByKeyValue($array, $key, $val) {
    foreach ($array as $k => $v) {
        if ($k == $key && $v == $val) {
            return true;
        }
    }
    return false;
}

function loadManufacturersService() {
    $manufacturerService = [
        ['idpartner' => 40, 'name' => 'Claro'],
        ['idpartner' => 41, 'name' => 'Movistar'],
        ['idpartner' => 42, 'name' => 'Tigo'],
        ['idpartner' => 43, 'name' => 'Avantel'],
        ['idpartner' => 44, 'name' => 'Virgin'],
        ['idpartner' => 45, 'name' => 'Etb'],
        ['idpartner' => 46, 'name' => 'Exito'],
        ['idpartner' => 47, 'name' => 'Conectame'],
        ['idpartner' => 49, 'name' => 'FlashMobile'],
        ['idpartner' => 50, 'name' => 'DirecTv']
    ];

    return $manufacturerService;
}

function tableFieldExcel($columns, $words) {
    $cadena = explode("|", $words);

    for ($i = 0; $i < count($columns); $i++) {

        $existe = ExcelField::where('name_table', '=', $columns[$i]->TABLE_NAME)
            ->where('name_field', $columns[$i]->COLUMN_NAME)
            ->exists();

        if ($existe) {
            $id = ExcelField::where('name_table', $columns[$i]->TABLE_NAME)->where('name_field', $columns[$i]->COLUMN_NAME)->value('id');
            $excelTable = ExcelField::find($id);
        } else {
            $excelTable = new ExcelField();
        }
        $excelTable->name_table = $columns[$i]->TABLE_NAME;
        $excelTable->name_field = $columns[$i]->COLUMN_NAME;
        if (in_array($columns[$i]->COLUMN_NAME, $cadena) || $columns[$i]->EXTRA == "auto_increment" || $columns[$i]->COLUMN_TYPE == "timestamp") {
            $excelTable->status = 0;
        } else {
            $excelTable->status = 1;
        }
        $excelTable->save();
    }
}

function redirectType($message, $type, $input = false) {
    return $input
        ? back()->withInput()->withErrors($message)
        : back()->with($type, $message);
}

function renameImage($catalog, $ext, $count = 0) {
    $count = $count != 0 ? $count+1 : CatalogProducts::where('catalog_id', $catalog)->count() + 1;

    $name = 'PROD' . $catalog . str_pad($count,4,"0", STR_PAD_LEFT) . '.'. $ext;

    if(CatalogProducts::where('image',$name)->exists()) {
        $count = $count+1;
        $name = 'PROD' . $catalog . str_pad($count,4,"0", STR_PAD_LEFT) . '.'. $ext;
    }

    return $name;
}

function productSequence($catalog) {
    return CatalogProducts::where('catalog_id', $catalog)
                    ->count() + 1;
}

function search_transaction_number ($type_transaction, $contract_id, $company_id) {

    
    $reg_counter = search_counter_control ($type_transaction, $contract_id, $company_id);

    $transaction_number = $reg_counter->value_counter;
    $reg_counter->value_counter += 1;
    $reg_counter->save();

    return $reg_counter->pre_value.substr(str_repeat(0, 10).$transaction_number, - 10).$reg_counter->post_value;

}

function search_counter_control ($type_transaction, $contract_id, $company_id) {

    //Registro a nivel de CONTRATO
    $reg_counter = Counterscontrol::where('type_transaction', $type_transaction)
        ->where('contract_id', $contract_id)
        ->where('companies_id', null)
        ->lockForUpdate()->first();

    //Registro a Nivel de COMERCIO
    if (empty($reg_counter)) {
        $reg_counter = Counterscontrol::where('type_transaction', $type_transaction)
            ->where('contract_id', $contract_id)
            ->where('companies_id', $company_id)
            ->lockForUpdate()->first();
    }

    //Validar si usa uno por parametros de configuracion RegisterDIAN
    if (empty($reg_counter)) {
        $registro = Parameters::where('contract_id', $contract_id)
            ->where('company_id', $company_id)
            ->where('parameter', 'RegisterDIAN')
            ->where('status', 1)
            ->get()->first();

        if (!empty($registro)) {
            $reg_counter = Counterscontrol::where('id', $registro->value)
                ->lockForUpdate()->first();
        }
    }

    //Si no existe se debe crear un registro Nuevo
    if (empty($reg_counter)) {

        switch($type_transaction) {
            case 61 : $pre = 'CVEN-';
                break;
            case 65 : $pre = 'INGM-';
                break;
            default:
                $pre = "CNEW-";
                break;
        }

        $reg_counter = new Counterscontrol();
        $reg_counter->type_transaction = $type_transaction;
        $reg_counter->contract_id = $contract_id;
        $reg_counter->companies_id = $company_id;
        $reg_counter->pre_value = $pre;
        $reg_counter->value_counter = 1;
        $reg_counter->post_value = '';
        $reg_counter->start_validity = null;
        $reg_counter->end_validity = null;
        $reg_counter->official_text = '';
        $reg_counter->status = 1;

        $reg_counter->resolution_number = "";
        $reg_counter->resolution_date = "";
        $reg_counter->initial_value = 0;
        $reg_counter->final_value = 0;

    }

    return $reg_counter;

}

function sendNewUserEmail($subject, $object){
    $email = $object->email;

    $file = public_path('files/BienvenidoAlPuntoDeVenta.pdf');
    $url = explode('/',$object->url);

    $business = DB::table('persons')
        ->join('contracts', 'persons.id', '=', 'contracts.person_id')
        ->select('persons.socialreason')
        ->where('contracts.id', '=', 2)
        ->first();

    Mail::send('emails.clientmail', [
        'emailuser'=>$object->email,
        'passuser'=>$object->password,
        'url'=>$url[2],
        'name' => $object->name,
        'business' => $business->socialreason,
        'contract' => $object->contrato], function ($msj) use ($subject, $email, $file) {
        $msj->subject($subject);
        $msj->to($email);
        $msj->attach($file);
    });
}

function create_pdf_sale($id){

    $sale = Transactions::where('id', $id)
        ->with('Cliente','User','Seller','typeOperation')
        ->first();
    $delivery = Deliveries::where('deliveries.transaction_id', $sale->id)
        ->get();
    if ( isset($delivery[0]) && $delivery[0]->courier_id != null ) {
        $address = Address::find($delivery[0]->address_id);
        $sale->address = $address->address;
        $sale->neighborhood = $address->neighborhood;
        $sale->location = $address->location;
    }
    $details = TransactionsDetails::where('transaction_id', $id)
            ->with('product')
            ->get();

    $sale->totalArt = 0;
    foreach ($details as $detail) {
        if ($detail->product[0]->salesunit_id == 54)
            $sale->totalArt += $detail->quantity;
        else
            $sale->totalArt++;
    }
    
    $payments = TransactionsPaymentmethods::where('transaction_id',$id)
        ->with('formaPago')->get();
    
    $payItems = TransactionsPaymentmethods::where('transaction_id', $id)->get()->count();
    
    $numventa = Transactions::select('id')->where('id', $id)->get();
    
    $company = Company::where('id', $sale->company_id)
        ->with('Persona','RegimenImpuestos')
        ->first();

    $img = getContractImage(auth()->user()->contract_id);
    
    $contract = Contract::where('id',auth()->user()->contract_id)
        ->with('Persona')->first();

    $resDian = search_counter_control (61, $contract->id, $company->id);
    
    $pdf = \PDF::loadView('pdf.venta', [
            'sale' => $sale, 
            'details' => $details, 
            'payments' => $payments,
            'payItems' => $payItems, 
            'company' => $company, 
            'img' => $img, 
            'contract' => $contract, 
            'resDian' => $resDian 
            ])
        ->setPaper('A5', 'portrait');
    
    return $pdf;
}

function getContractImage($contract){

    $path  = '/support/pictures/partners/'. str_pad($contract, 3, "0", STR_PAD_LEFT);
    $file = '/logo000001.png';
    $filepath = $path.$file;

    $exists = file_exists(public_path($filepath));

    if(!$exists) $filepath = '/support/pictures/partners/001'.$file;

    return $filepath;
}

function find_parameter($Contract, $Company, $Param, $Value = '') {
    // dd($Contract, $Company, $Param, $Value);
    if ( $Value != '' ) {
        if ($Value == 'codigo') {
            $respons = Parameters::select('parameters.value')
                ->where('parameters.contract_id', $Contract)
                ->where('parameters.company_id', $Company)
                ->where('parameters.parameter', $Param)
                ->where('status', 1)
                ->value('value');
            // dd($respons);
        } else {
            $respons = Parameters::select('*')
                ->where('parameters.contract_id', $Contract)
                ->where('parameters.company_id', $Company)
                ->where('parameters.parameter', $Param)
                ->where('parameters.value', $Value)
                ->where('status', 1)
                ->exists();
        }
    } else {
        $respons = Parameters::select('*')
        ->where('parameters.contract_id', $Contract)
        ->where('parameters.company_id', $Company)
        ->where('parameters.parameter', $Param)
        ->where('status', 1)
        ->exists();
    }
    return $respons;
}

function find_company($user_id, $roll) {
    // dd($user_id, $roll);
    $company = null;
    switch ($roll) {
        case 'vendedor':
        case 'cajero':
            $company = Company::join('companies_users', 'companies_users.company_id', 'companies.id')
                    ->with('RegimenImpuestos')
                    ->with(array('Persona' => function($query) {
                        $query
                            ->with('Location','ContactPhone');
                    }))
                    ->where('companies_users.user_id', $user_id)
                    ->first();
            // dd($company);
            break;
        case 'adtienda':
        case 'adtendero':
            $company = Company::where('admon_id', $user_id)
                ->with('RegimenImpuestos')
                ->with(array('Persona' => function($query) {
                    $query
                        ->with('Location','ContactPhone');
                }))
                ->first();
            break;
        // case 'admin':
        //     $company = Company::where('id', auth()->user()->company_id)
        //         ->with('RegimenImpuestos')
        //         ->with(array('Persona' => function($query) {
        //             $query
        //                 ->with('Location','ContactPhone');
        //         }))
        //         ->first();
        //     break;
        // case 'adcontrato':
        //     $company = Company::where('id', auth()->user()->company_id)
        //         ->with('RegimenImpuestos')
        //         ->with(array('Persona' => function($query) {
        //             $query
        //                 ->with('Location','ContactPhone');
        //         }))
        //         ->first();
        //     break;
        }
    return $company;

}

function buscar_cajero($user, $contract_id, $company_id) {

    $escajero =  $user->hasRole('cajero') ? true : false;
    if ($escajero) {
        $escajeroPpal = find_parameter($contract_id, $company_id, 'CajeroPrincipal', $user->id);
        if ($escajeroPpal) return $user->id;

        $esCajeroDeli = find_parameter($contract_id, $company_id, 'CajeroDomicilios', $user->id);
        if ($esCajeroDeli) return $user->id;

        $esCajeroBack = find_parameter($contract_id, $company_id, 'VendedorBackOffice', $user->id);
        if ($esCajeroBack) {
            $hayCajeroDeli = find_parameter($contract_id, $company_id, 'CajeroDomicilios');
            if ($hayCajeroDeli) {
                $cajeroDeli = find_parameter($contract_id, $company_id, 'CajeroDomicilios', 'codigo');
                return $cajeroDeli;
            } else {
                $cajeroPpal = find_parameter($contract_id, $company_id, 'CajeroPrincipal', 'codigo');
                return $cajeroPpal;
            }
        }
        //Es un cajero alterno
        return $user->id;
    } else {
        // dd("falso");
        if ( $user->hasRole('adtienda') || $user->hasRole('adtendero')) {
            return $user->id;
        } else {
            if ( $user->hasRole('vendedor') ) {
                // dd($contract_id, $company_id, 'CajeroPrincipal', 'codigo');
                $cajeroPpal = find_parameter($contract_id, $company_id, 'CajeroPrincipal', 'codigo');
                return $cajeroPpal;
            } else {
                return null;
            }
        }
    }
}

function buscar_turno($user_id) {
    $shift = ShiftManagements::where('shift_managements.user_id', $user_id)
        ->get()->last();
    return $shift;
}

function buscarTurnoAdmon($company_id) {
        $turnoAdmon = null;
        $turnoAdmon = ShiftManagements::select('shift_managements.*')
                ->join('companies', 'companies.admon_id', 'shift_managements.user_id')
                ->where('companies.id', $company_id)
                ->get()->last();
        return $turnoAdmon;
}

function guardarsaldo($contrato, $company, $usuario, $tipo, $valor, $key, $shiftid, $origen) {

    $cuenta = BalanceAccounts::where('contract_id', $contrato)
        ->where('company_id', $company)
        ->where('user_id', $usuario)
        ->get()->first();

    if (empty($cuenta)) {
        $cuenta = new BalanceAccounts;
        $cuenta->contract_id = $contrato;
        $cuenta->company_id = $company;
        $cuenta->user_id = $usuario;
        $cuenta->status = 1;
    }

    if ($origen == 0) {
        $cuenta->balance_value = $valor;
    } else {
        if ($tipo == 18) {
            $cuenta->balance_value = $cuenta->balance_value + $valor;
        } else {
            $cuenta->balance_value = $cuenta->balance_value - $valor;
        }
    }
    $cuenta->save();

    if ($origen == 3) {
        $balance_ori = BalancePayments::where('balance_payments.businesskey', $key)->get()->first();
        $balance_ori->status = StatusEnum::INACTIVE;
        $balance_ori->save();
        return;
    }

    $cuentadetalle = new BalancePayments;
    $cuentadetalle->company_id = $company;
    $cuentadetalle->contract_id = $contrato;
    $mytime = Carbon::now('America/Bogota');
    $cuentadetalle->date_payment = $mytime->toDateTimeString();
    $cuentadetalle->user_id = auth()->user()->id;
    $cuentadetalle->typepayment_id = $tipo;
    $cuentadetalle->amount_payment = $valor;

    switch($origen) {
        case 0: $cuentadetalle->description_payment = "Valor cuenta inicial caja";
            break;
        case 1: $cuentadetalle->description_payment = "Factura venta No. " . $key;
            break;
        case 2: $cuentadetalle->description_payment = "Recaudo credito venta " . $key;
            break;
        case 3: $cuentadetalle->description_payment = "Reversion Venta " . $key;
            break;
        case 4: $cuentadetalle->description_payment = "Cierre Caja Turno " . $key;
            break;
        case 5: $cuentadetalle->description_payment = "Fiado Electronico " . $key;
            break;
    }

    if ($origen == 1) {
        $cuentadetalle->businesskey = $key;
    } else {
        $cuentadetalle->businesskey = 0;
    }
    $cuentadetalle->shiftmanagement_id = $shiftid;
    $cuentadetalle->amount_payment = $valor;
    $cuentadetalle->status = 1;
    $cuentadetalle->save();

    return $cuentadetalle->id;
}
