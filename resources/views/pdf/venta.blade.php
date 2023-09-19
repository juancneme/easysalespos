<!DOCTYPE>
<html style="text-transform: uppercase">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{__('Sale Report')}}</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('pdviSalePdf/css/styles.css') }}">
</head>
<body>
<header class="row col-12">
    <div class="row col-8" style="text-align: center">
        <h1 id="companyName">{{$company->name}}</h1>
        <h1 id="companyName">{{$company->slogan}}</h1>
        <h2 id="regimen">IVA {{$company->RegimenImpuestos->name}} NIT: {{$contract->Persona->numberdocument}}-{{$contract->Persona->digitcheck}}</h2>
        @if ($resDian->resolution_number != '')
            <h2 id="regimen">{{__('RESOLUCION DIAN')}}: {{$resDian->resolution_number}}
                DE {{$resDian->resolution_date}}</h2>
            <h2 id="regimen">DEL {{$resDian->initial_value}}:
                AL {{$resDian->final_value}} {{$resDian->official_text}}</h2>
        @endif
        <h2 id="contractid">{{$company->Persona->location[0]->address}}</h2>
        @if ( isset($company->Persona->ContactPhone[0]->textcontact) )
        <h2 id="contractid">{{$company->Persona->location[0]->city}} - Tel: {{$company->Persona->ContactPhone[0]->textcontact}}</h2>
        @else
        <h2 id="contractid">{{$company->Persona->location[0]->city}}</h2>
        @endif
    </div>

    @if(file_exists(public_path('/support/pictures/companies/' . auth()->user()->contract_id . '/' . $company->id . '/' . $company->logo)))
        <div class="row col-4" id="logo" style="right:0;position:absolute;top:0">
            <img style="width: 80px;height: 80px"
                 src="{{url('/support/pictures/companies/' . auth()->user()->contract_id . '/' . $company->id . '/' . $company->logo) }}"/>
        </div>
    @endif

    <br>

    <div id="fact" class="textleft">
        <h2>{{__('SALES INVOICE')}} : {{$sale->invoice_number}}</h2>
    </div>

</header>

<br>

<section>
    <div>
        <table id="facliente">
            <thead>
            <tr>
                <th id="fac">{{__('Client')}}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>
                    <p id="cliente">{{__('Mr. or Ms')}}
                        . <?= !empty($sale->Cliente) ? $sale->Cliente->person->fullname : 'Cliente Mostrador'?>
                        <br>
                        <?= !empty($sale->Cliente) ? $sale->Cliente->person->TypeDocument->code . ' : ' . $sale->Cliente->person->numberdocument : '' ?>
                        <br>
                        <?= !empty($sale->address) ? $sale->address : '' ?>
                        <br>
                        <?= !empty($sale->neighborhood) ? $sale->neighborhood : '' ?>
                        <br>
                        <?= !empty($sale->location) ? $sale->location : '' ?>
                    </p>
                </th>
            </tr>
            </tbody>
        </table>
    </div>
</section>

<section>
    <div>
        <table id="facvendedor">
            <thead>
            <tr id="fv">
                <th>{{__('Seller')}}</th>
                <th>{{__('Date')}}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$sale->Seller->Persona->fullname}}</td>
                <td style="text-align: right">{{$sale->created_at}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</section>

<br>

<section>
    <div>
        <table id="facarticulo">
            <colgroup>
                <col style="width: 59%"/>
                <col style="width:  1%"/>
                <col style="width: 20%"/>
                <col style="width: 20%"/>
            </colgroup>
            <thead>
            <tr id="fa">
                <th style="text-align: left">{{__('Description')}}</th>
                <th style="text-align: right">{{__('Quantity')}}</th>
                <th style="text-align: right">{{__('Valor Un')}}</th>
                <th style="text-align: right">{{__('SubTotal')}}</th>
            <!-- <th style="">{{__('VAT Value')}}</th> -->
            <!-- <th style="">{{__('VAT')}}</th> -->
            </tr>
            </thead>
            <tbody>
            @foreach ($details as $det)
                @foreach ($det->product as $prod)
                    <tr>
                        <td>{{$prod->name}}</td>
                        <td style="text-align: right">{{$det->quantity}}</td>
                        <td style="text-align: right">{{'$ ' . number_format($det->unit_price,2)}}</td>
                        <td style="text-align: right">{{'$ ' . number_format($det->total_value,2)}}</td>
                    <!-- <td>{{'$ ' . number_format($det->iva_value, 2)}}</td> -->
                    <!-- <td>{{!empty($prod->ValorImpuesto->name) ? explode(" ",$prod->ValorImpuesto->name)[1] : '0%'}}</td> -->
                    </tr>
                @endforeach
            @endforeach
            </tbody>
            <tfoot>
            <tr style="background: #2183E3; height: 2px">
                <th colspan="4"></th>
            </tr>

            <tr>
                <th colspan="3" style="margin-left: 20%">{{__('Total Articles')}}</th>
                <td style="width: 100px; text-align: right">{{number_format($sale->totalArt)}}</td>
            </tr>
            <tr>
                <th colspan="3" style="margin-left: 20%">{{__('SubTotal')}}</th>
                <td style="width: 100px; text-align: right">{{'$ '.number_format($sale->total_value-$sale->iva_value,2)}}</td>
            </tr>
            <tr>
                <th colspan="3" style="margin-left: 20%">{{__('VAT')}}</th>
                <td style="width: 100px; text-align: right">{{'$ '.number_format($sale->iva_value,2)}}</td>
            </tr>
            <tr>
                <th colspan="3" style="margin-left: 20%">{{__('Total')}}</th>
                <td style="width: 100px ;text-align: right">{{'$ '.number_format($sale->total_value,2)}}</td>
            </tr>
            <tr style="background: #2183E3; height: 2px">
                <th colspan="4"></th>
            </tr>
            @foreach ($payments as $p)
                @if ($p->paymentmethods_id != 92)
                    <tr>
                        <th colspan="3" style="margin-left: 20%">{{$p->formaPago->name}}</th>
                        <td style="width: 100px; text-align: right">{{'$ '.number_format($p->amount,2)}}</td>
                    </tr>
                @endif
            @endforeach
            @foreach ($payments as $p)
                @if ($p->paymentmethods_id == 92)
                    <h1>
                        <tr>
                            <th colspan="3" style="padding-left: 30px;"><h1
                                        style="margin-bottom: 0;">{{__('Cash Payment')}}</h1></th>
                            <td style="text-align: right"><h1
                                        style="margin-bottom: 0;">{{number_format($p->amount,2)}}</h1></td>
                        </tr>
                        <tr>
                            <th colspan="3" style="padding-left: 30px; "><h1
                                        style="margin-bottom: 0;">{{__('Received Value')}}</h1></th>
                            <td style="text-align: right"><h1
                                        style="margin-bottom: 0;">{{number_format($p->authorization_code,2)}}</h1></td>
                        </tr>
                        <tr>
                            <th colspan="3" style="padding-left: 30px;"><h1
                                        style="margin-bottom: 0;">{{__('Change')}}</h1></th>
                            <td style="text-align: right"><h1
                                        style="margin-bottom: 0;">{{number_format($p->receipt_number,2)}}</h1></td>
                        </tr>
                    </h1>
                @endif
            @endforeach

            <tr style="background: #2183E3; height: 2px">
                <th colspan="4"></th>
            </tr>
            </tfoot>
        </table>
    <!-- <div id="comments">
                    <p><b>{{__('Comments')}}:</b></p>
                    <p>{{$sale->comments}}</p>
                </div> -->
    </div>
</section>

<br>
<br>

<footer>
    <div id="gracias">
        <p>{{__('Thanks for your purchase')}}, {{$contract->numbercontract}}</p>
    </div>
</footer>

</body>
</html>
