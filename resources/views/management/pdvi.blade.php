<?php $page_title = __('EasySalesPOS') ?>
@extends($esvirtual ? 'ruta_template' : 'pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
@include('management.pdvi_product')

<style>
    .img-responsive {
        height: auto;
        width: 100%;
    }

    .sales_class {
        height: 680px;
    }

    .tab_class {
        display: none;
        text-align: center;
    } 

    .buttonPay {
        padding-left: 2px;
        padding-right: 2px; 
        font-weight: bold; 
        color: white; 
        background-color: #3483FA; 
        border-color: #3483FA;
        opacity: 1;
    }

    .buttonPay:hover {
        background-color: #5D9CFB;
    }

    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        right: 0;
        background-color: #fff;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 85px;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    .owl-carousel .owl-stage {
        margin-bottom: 5px;
    }

    .item {
        display: inline-block;
    }

    #shoping_cart {
        max-height: 57px;
        z-index: 100;
        position: absolute;
        right: 0;
        cursor: pointer;
        display: none;
    }

    .circle {
        height: 25px;
        width: 25px;
        border-radius: 50%;
        background: salmon;
        position: absolute;
        top: 75px;
        left: 150px;
        text-align: center;
        color:white;
    }

    .circlemdi {
        height: 25px;
        width: 25px;
        border-radius: 50%;
        background: salmon;
        /*position: absolute;*/
        /*top: 75px;*/
        /*left: 150px;*/
        text-align: center;
        color:white;
    }

    .circle:hover + .hide {
        display: block;
        position: absolute;
        top: 65px;
        left: 250px;
        color: black;
    }

    .btn-open-turn {
        height: 25px;
        position: absolute;
        top: 75px;
        right: 97px;
        text-align: center;
        color:white;
    }

    .btn-open-turn2 {
        height: 25px;
        top: 75px;
        right: 97px;
        text-align: center;
        color:white;
    }

    @keyframes spin {
    	from { transform: rotate(0deg); }
	    to { transform: rotate(360deg); }
    }

    .advanced {
        width: 25px;
        height: 25px;
        background: -webkit-radial-gradient(25px 25px, circle cover, #3fff00, #157700);
        animation-name: spin; 
        animation-duration: 3s;
        animation-iteration-count: infinite; 
        animation-timing-function: linear;
    }

    .divcategoriasf {
        padding-top: 20px;
    }

    @media (min-width: 280px) {

        .divcategoriasf {
        margin-top: 3vh !important;
        }

            .divcategoriasv {
            margin-top: 17vh !important;
        }

        .sidenav {
            top:115px ;
        }

    }

    @media (min-width: 360px) {
        .divcategoriasf {
            margin-top: 3vh !important;
        } 
        
        .divcategoriasv {
            margin-top: 11vh !important;
        } 

        .Tirillaheight  {
            height: 62vh !important;
        }

       .detalles {
            max-height: 90%; 
        }

        
        .sales_class {
            height: 83% !important;
        }

      
        .bannervertical {
            visibility: hidden;
        }

        .bannerhorizontal {
            visibility: hidden;
        }
    }

    @media (max-width: 360px) {

        .divcategorias {
            margin-top: 9vh !important;
        }

    

        .sidenav {
            top:115px ;
        }
    }

    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    } 

    @media (min-width: 483px) {
        .divcategorias {
            margin-top: 4vh !important;
        }
        .sidenav {
            top:75px !important;
        }
    
    }

    @media (min-width: 500px) {
        .sidenav  {
            max-height:734px;
        }
    }

    @media (min-width: 540px) {
        .divcategoriasv {
            margin-top: 5vh !important;
        }
    }

    @media (min-width: 768px) {
        .navbar-expand-md .navbar-nav .dropdown-menu-right {
            right: auto;
            left: auto;
        }   

        .divcategoriasf {
            margin-top: 2vh !important;
        }

        .divcategoriasv {
            margin-top: 12vh !important;
        }

        .sidenav {
            top:160px !important;
        }
    }

    @media (min-width: 787px) {

        .divcategoriasf {
            margin-top: 2vh !important;
        }

        .divcategoriasv {
            margin-top: 9vh !important;
        }

        .sidenav {
            top:116px !important;
        }
    }


    @media (max-width: 990px) {
        .Tirillaheight  {
            height: 62vh !important;
        }

        .sales_class  {
            height: 75% !important;
        }
    }

    @media (max-width: 991px) {
        .sales_class {
            display: none;
        }
        .tab_class {
            display: block;
        }
        .Tirillaheight  {
            height: 62vh ;
        }
    }

    @media (min-width: 992px) {

        .product_class {
            display: block;
        }
        .sales_class {
            display: block;
        }
        .view_product, .view_purchase {
            display: block;
        }
        .Tirillaheight  {
            height: 62vh !important;
        }
    }

    @media (min-width: 1024px) {

       .divcategoriasv {
            margin-top: max(7vh,75px) !important;
        }
    }


</style>

<button type="button" id="btn_open_turn" class="btn-primary btn-open-turn" >Abrir turno</button>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('pdviSalePayment/css/styles.css') }}">
<!-- <div class="shift-control circle advanced" id="shiftControl" style="top:73px;" ></div> -->
<div class="hide">{{ $countMasterProducts }} <br> {{ $countProducts }}</div>

@if ($esvirtual)
<!--Iniciaio carrito comercio virtual -->
<button onclick="openNav()" class="view_purchase2 btn-open-turn" style="border: none;padding-left: 0px;padding-right: 0px;padding-top: 0px;padding-bottom: 0px; background-color: #012060; ">
    <div  style="display: flex; justify-content: center; background-color: #012060;">        
        <div  class="btn" style="display: flex; 
                align-items:center;
                border: none; 
                justify-content:center; 
                width: 60px; 
                height: 60px; 
                margin-top: -39px; 
                padding-left: 6px;
                background-color: #012060;">
            <img  src="/support/pictures/config/carrito.svg" 
                    style="vertical-align:middle; height:23px; 
                           max-width:35px;
                           margin-top: 35px;"
                    alt="Carrito de compras">
            <div id="canttotal2" style="display:flex; align-items:center; 
                    justify-content: center; height: 20px; width: 20px; 
                    border-radius: 50%; background-color: #D00000; color: #FFFFFF; 
                    margin-top:15px; margin-left: -25px;">
                <p style="margin-top:14px;">0</p>
            </div>
        </div>
    </div>
</button>
<!--Fin carrito comercio virtual-->
@endif

<div>
    <!--INICIO FROTEND PDVi-->
    @include('management.frontendpdvi')
    <!--FIN FROTEND PDVi-->
    <form name="form-download" type="post" action="/management/pdvi/download">
        <input type="hidden" name="_token" value=""/>
        <input type="hidden" name="id" id="idfactdownload" value=""/>
        <input type="hidden" name="sendEmail" id="sendEmail" value=""/>
        <input type="hidden" name="idqr" value="{{ $idqr }}">
    </form>

    <form name="form-preview" type="post" action="/management/pdvi/download" target="_blank">
        <input type="hidden" name="_token" value=""/>
        <input type="hidden" name="id" id="idfactpreview" value=""/>
        <input type="hidden" name="preview" id="preview" value="1"/>
    </form>

    <!--INLCUDE BLADES PDVi inicio-->
    @include('management.components.pdvi.pdviAbrirTurnoVenta')
    @include('management.components.pdvi.pdviNewClientModal.pdviNewClientModalComponent')
    @include('management.pdvimodalcomboproducts')
    @include('management.components.pdvi.pdviCancelarVenta')

    @if ($esvirtual)
    @include('management.components.pdvi.pdvi_login')
    @endif

    @include('management.components.pdvi.pdviSalesPaymentModal.pdviSalePayment')
    @include('management.components.pdvi.pdviSalesPaymentModal.pdviCashPaymentModal')
    @include('management.components.pdvi.pdviCodigoQRVenta')
    @include('management.sistecredit')
    @include('management.components.pdvi.pdviTarjetasVenta')
    @include('management.components.pdvi.pdviTransferencia')
    @include('management.components.pdvi.pdviCreditoLocal')
    @include('management.components.pdvi.pdviDomicilioVenta')

    {{--@include('management.components.pdvi.pdviMensajeDomicilioVenta')--}}
    
    @include('management.components.pdvi.pdviDireccionesVenta')
    @include('management.components.pdvi.pdviNuevaDireccionVenta')

    @include('management.components.pdvi.pdviMensajeAjaxVenta')
    @include('management.components.pdvi.pdviMensajeVenta')

    @include('management.components.pdvi.pdviIngresoTelefonoVenta') <!--cuando-->
    @include('management.components.pdvi.pdviConfirmacionProductoVenta')
    <!--INLCUDE BLADES PDVi fin-->
</div>

<!--SCRIPTS inicio-->
@include('management.pdviJS.currencyformat')
@include('management.pdviJS.pdvicomponent')
@include('management.pdviJS.pdvi_impresion')
<script>
    if( $('#esvirtual').val() ) {
        $('.sales_class').hide();
    }

    $('.view_product').on('click', function () {
        $('.product_class').show();
        $('.sales_class').hide();
    });

    $('.view_purchase').on('click', function () {
        $('.product_class').hide();
        $('.sales_class').show();
    });

    $('.view_purchase2').on('click', function () {
        $('.product_class').show();
        $('.sales_class').show();
    });

    $('#shoping_cart').on('click', function () {
        $('.product_class').toggle();
        $('.sales_class').toggle();
    });

    $('#btn_open_turn').on('click',function () {
        $('#AbrirTurno').modal('show')
    })

    function setEfectivo() {
        $('#qrCode').find('.qr-code').remove();
        clearInterval(myVar);
    }

    function openNav() {
        document.getElementById("mySidenav").style.width = "97vw";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    /*SELECT SCRIPT*/
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".dropdown-menu li").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    /*hide show password login*/
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
    }});

</script>

<!--SCRIPTS fin-->
@endsection
