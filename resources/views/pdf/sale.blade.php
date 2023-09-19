<!DOCTYPE html>
<html lang="es" >

<head>
    <meta charset="UTF-8">
    <title>{{__('Sale Report')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Bangers|Roboto'>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('pdviSalePdf/css/style.css') }}">
</head>

<body>
<!-- START RECEIPT -->
<div class="receipt">
    <div class="textleft logo">
        <img style="width: 50px; height: 50px" src="<?= file_exists(public_path('/support/pictures/partners/'. str_pad(auth()->user()->contract_id, 3, "0", STR_PAD_LEFT) . '/logo000001.png'))
            ? url('/support/pictures/partners/' .str_pad(auth()->user()->contract_id, 3, "0", STR_PAD_LEFT) . '/logo000001.png')
            : url('/support/pictures/partners/001/logo000001.png')?>"/>
    </div>

    <div class="textleft">
        <span id="contractid">{{__('Contract')}}: {{$contract->numbercontract}}</span>
        <hr>
        <span id="companyName">{{$company->name}}</span>: <span id="companyId">{{$company->id}}</span>
    </div>

    <div class="textleft">
        <span id="IdCiudad">{{$contract->Persona->location[0]->city}}</span>
        <span id="IdDirección">{{$contract->Persona->location[0]->address}}</span>
    </div>

    <br>

    <div id="fact" class="textleft">
        <span>{{$sale->typeOperation->name}} : {{$sale->id}}</span>
    </div>

    <br>

    <!--
    <div class="textleft">
        <span id="TransacciónLabel">CÓDIGO</span> <span style="display: block; float: right" id="IdTransacción">299900210761</span>
    </div>

    <br>

    <div class="textleftBold">
        <span id="FidelizacionLabel">TUS PUNTOS DISPONIBLES</span> <span style="display: block; float: right" id="IdPuntos">7.202</span>
    </div>

    <br>

    <div class="textleftBold">
        <span id="FidelizacionLabel">TUS STICKERS DISPONIBLES:</span>
    </div>

    <div class="textleft">
        <span id="IdLabelPromocion">STICKER PROMOCIÓN:</span> <span style="display: block; float: right" id="IdStickersPromocion">26</span>
    </div>

    <br>
    -->

    <div>
        <table style="width:100%" class="textleft">
            @foreach ($details as $det)
                @foreach ($det->product as $prod)
                    <tr>
                        <td >{{$prod->name}}</td>
                        <td>X{{$det->quantity}}</td>
                        <td>{{'$ ' . number_format($det->quantity*$det->unit_price,2)}}</td>
                    </tr>
                @endforeach
            @endforeach
        </table>
    </div>

    <div class="textrighttBoldGr">
        <span id="IdLabelSubtotal">{{__('SubTotal')}}</span>
        <span id="IdSubTotal">{{'$ '.number_format($sale->total_value-$sale->iva_value,2)}}</span>
    </div>

    <div class="textrighttBoldGr">
        <span id="IdLabelSubtotal">{{__('Total')}}</span>
        <span id="IdTotal">{{'$ '.number_format($sale->total_value,2)}}</span>
    </div>

    <div class="textcenter">
        @foreach ($payments as $p)
            <span id="IdLabelCambio">{{__('Change')}}</span> <span style="display: block; float: right" id="Cambio">{{$p->paymentmethods_id == 92 ? '$ '.number_format($p->receipt_number) : ''}}</span>
        @endforeach
    </div>

    @foreach ($payments as $p)
        <div class="textcenter">
            <span id="IdLabelEfectivo">{{$p->formaPago->name}}</span> <span style="display: block; float: right" id="Efectivo">
                {{$p->paymentmethods_id == 92 ? '$ '.number_format($p->authorization_code) : '$ '.number_format($p->amount,2)}}
        </div>
    @endforeach

    <!--
    <div class="textrighttBoldGr">
        <span id="LabelTotalMercado">TOTAL MERCADO</span> <span style="display: block; float: right" id="IdStickersPromocion">$ 9'999.680.999</span>
    </div>
    -->
    <br>

    <div class="textcenter">
        <span id="LABELTARIFASIVA">DISCRIMINACION TARIFAS IVA</span>
    </div>

    <div>
        <table style="width:100%" class="textcenter">
            <tr>
                <th>TARIFA</th>
                <th>COMPRA</th>
                <th>BASE/IMP</th>
                <th>IVA</th>
            </tr>
            <tr>
                <td>=00%</td>
                <td>3.680</td>
                <td>3.680</td>
                <td>0</td>
            </tr>
            <tr>
                <td>TOTAL=</td>
                <td>3.680</td>
                <td>3.680</td>
                <td>0</td>
            </tr>
        </table>
    </div>

    <br>

    <div class="textleft">
        <span id="IdLabelAtendidoPor">{{__('Cashier')}}:</span> <span id="IdNombrevendedor">{{$sale->User->Persona->fullname}}
            <br>
        <span id="date_label">{{__('Date')}}:</span> <span id="date">{{$sale->created_at}}
    </div>

    <div class="textleft">
        <span id="IdLabelTiquete">NÚMERO FACTURA:</span> <span  id="IDNUMEROFACTURA">0351 0021285987</span>
    </div>

    <div class="textleft">
        <span id="IdLabelDIAN">RESOLUCIÓN DIAN #</span> <span  id="IDRESOLUCIÓNDIAN">110000679307 DEL 02/FEB/2019 RANG. AUT 0351 0021115212 al
	   0029999999</span>
    </div>

    <br>

    <div class="textleft">
        <span id="IdLabelTOTALARTICULOSCOMPRADOS">TOTAL ARTICULOS COMPRADOS =</span> <span style="display: block; float: right" id="IdtOTALARTICULOSCOMPRADOS">33</span>
    </div>

    <div class="textleft">
        <span id="IdLabelNombreTienda">LA TIENDA DE LA ESQUINA</span> <span  id="IdTipoRegimen">NIT:</span> <span  id="IdNit">890.900.608-9</span>
    </div>

    <hr>

    <div class="textcenter">
        <span id="IdLabelTiporegimen">AUTORETENEDOR RES.8825 DE 16/NOV/2016</span>
    </div>

    <hr>

    <div class="textcenter">
        <span id="IdTextoPie">Siempre te daremos el mejor de nuestros descuentos vigentes, no acumulable con otros descuentos.</span>
    </div>

    <div class="textleft">
        <span id="IdTextoPie2">CONSERVA TU TIRILLA DE COMPRA PARA TODOS LOS CAMBIOS DE MERCANCIA.</span>
    </div>

    <div class="textleft">
        <span id="IdFechaTransaccion">20/FEB/2019 20:24</span> <span id="IdTiquete">0354 25 3574 2574</span>
    </div>

    <hr>

    <div class="textleft">
        <span id="IdLABELCLIENTE">ESTIMADO (A):</span> <span id="IdNombreCliente">PEDRO PEREZ GOMEZ</span> <span id="IdDocCliente">10.79.763.652</span>
    </div>

    <div class="textleft">
        <span id="IdLabelEstadoPuntos">ESTADO DE TUS PUNTOS Y STICKERS</span>
    </div>

    <table style="width:100%" class="textcenter">
        <tr>
            <th>Concepto</th>
            <th>Transacción</th>
            <th>Acumulado</th>
        </tr >
        <tr >
            <td>Pnts vigentes</td>
            <td>137</td>
            <td>2000</td>
        </tr>
        <tr>
            <td>Pnts x vencer</td>
            <td>6/JUN/19</td>
            <td>0</td>
        </tr>
        <tr>
            <td>STICKERS OLLAS PREMIUM</td>
            <td>1</td>
            <td>27</td>
        </tr>
        <tr>
            <td>Vencimiento Stickers</td>
            <td>31/DIC/19</td>
        </tr>
    </table>

    <hr>

    <div class="textcenter">
        <span id="IdLABELCUPONES">CUPONES FIDELIZACIÓN EMITIDOS</span> <span id="IdCUPONES">1</span>
    </div>

    <svg id="barcode"></svg>

    <hr>

    <div class="textleftBold">
        <span id="idlabelEvalua">Evalua tu experiencia de compra en el Comercio de la Esquina, ingresa a www.latiendadelaesquina.com </span>
    </div>

    <div class="textcenter">
        <span id="IdFechaTransaccion">20/FEB/2019 20:24</span> <span id="IdTiquete">0354 25 3574 2574</span>
    </div>

    <div class="flex">
        <div id="qrcode"></div>
    </div>

    <div class="footer">
        <div class="printType">COPIA CLIENTE</div>
    </div>

</div>
</body>

</html>
