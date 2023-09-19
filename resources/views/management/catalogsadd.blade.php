<?php $page_title = __('Catalogs') ?>
@extends('pike_template')
@section('content')
    <!-- Display Validation Errors -->
    @include('common.errors')
    <div class="panel-body form-add" style="margin-top: 110px;">

        <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">
    </div>

    <!-- Current Users -->
    <div class="panel panel-default" style="margin-top: 110px;">
        <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ $page_title }}: {{ $catalog }}
            {{ $namecatalog }} (CATALOGO FUENTE)

            <div class="form-group row" style="display:flex; justify-content:flex-start;">
                <label for="barcode" class="col-form-label" style="font-size:16px;">{{ __('add product') }}</label>
                <div>
                    <input type="text" disabled name="cantidad" id="cantidadnuevosproductos" class="form-control"
                           value="0" style="margin-left:20px;"/>
                </div>
                <button type="button" hidden="hidden"
                        class="btn btn-warning  btn-rounded  all">{{__('Select all')}}</button>
            </div>
        </div>

        <form action="/{{ strtolower( $group . '/' . $page.'/addproducts') }}" id="hola" method="POST">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="catacontrato" value="{{$catalog}}">
            <input type="hidden" name="catalogonuevo" value="{{$catalogonuevo}}">
            <input type="hidden" name="prueba" id="prueba">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-en task-table ">
                    </table>
                </div>

            </div>


            <button type="submit" id="enviar" class="btn btn-success btn-rounded btn-lg">Agregar productos</button>
        </form>
    </div>

    <script>
        jQuery(document).ready(function ($) {

            table = $(".task-table").DataTable({
                'processing': false,
                'searchable': false,
                'orderable': false,
                'stateSave': false,
                'dom': 'Blfrtip',
                'buttons': [
                    'selectAll',
                    // 'selectNone',
                ],
                'ajax': '/' + $("#url").val() + '/viewlist?id={{ $catalog }}&cat={{$catalogonuevo}}',
                columns: [
                    {data: 'catalogo.name', name: 'Catalogo.name', title: "{{ __('Catalog') }}"},
                    {data: 'categoria.name', name: 'Categoria.name', title: "{{ __('Category') }}"},
                    {data: 'name', name: 'name', title: "{{ __('Product') }}"},
                    {data: 'saleprice', name: 'saleprice', title: "{{ __('Sales Price') }}"},
                    {data: 'image', name: 'image', title: "{{ __('Image') }}"},
                    {data: 'estado', name: 'estado', title: "{{ __('Status') }}"},
                    {
                        data: 'action', name: 'action', title: "{{ __('Actions') }}",
                        targets: 0,
                        'searchable': false,
                        'orderable': false,
                        'checkboxes': {
                            'selectRow': false
                        }
                    }
                ],
                'select': {
                    'style': 'multi',

                },

                "order": [[0, "asc"]],

            });

            //Ejecutar todas las funciones aca

            selectRowCheck();
            selectAllproducts();
        });

        total = 0;
        var totalproductos = new Array();
        document.getElementById('cantidadnuevosproductos').value = total;

        function sumar(valor, dato) {
            totalproductos.push(dato);
            total += valor;
            document.getElementById('cantidadnuevosproductos').value = total;
            document.getElementById('prueba').value = totalproductos;

        }

        function restar(valor, dato) {


            for (var i = 0; i < totalproductos.length; i++) {
                if (totalproductos[i] === dato) {
                    totalproductos.splice(i, 1);
                }
            }

            total -= valor;
            document.getElementById('cantidadnuevosproductos').value = total;
            document.getElementById('prueba').value = totalproductos;
        }

        /**
         * Function to select products when check the Row
         */

        function selectRowCheck() {
            $(".task-table").on('click', 'tr', function () {
                var data = table.rows(this).nodes();
                $(data[0]).find('input').trigger('click');
                setTimeout(function () {
                    if (!$(data[0]).first().hasClass('check')) {
                        $(data[0]).first().addClass('selected');
                        $(data[0]).first().addClass('check')
                    }
                }, 50);
            });
        }

        /**
         * Function to select products filtered on the DataTable
         */
        function selectAllproducts() {
            var es_chrome = navigator.userAgent.toLowerCase().indexOf("chrome") > -1;
            if (es_chrome) {
                $(".buttons-select-all").on('click', function (e) {
                    // var info = table.page.info();
                    // var count = info.recordsTotal;
                    //  $("#cantidadnuevosproductos").val(count);
                    table.rows({"filter": "applied"}).every(function (rowIdx, tableLoop, rowLoop) {
                        var data = $(this.node());
                        console.log(data.find('input[type="checkbox"]').click());
                    });

                });
            }
        }

    </script>

@endsection
