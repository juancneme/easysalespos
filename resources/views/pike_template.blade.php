<!DOCTYPE html>
<style>
.table-en {
  line-height: 1;
  color: #276782;
  border-top: 1px solid #284a6d;
  border-bottom: 1px solid #284a6d;"
}
</style>

<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php header("Expires: Tue, 01 Jan 2000 00:00:00 GMT"); header("Last-Modified: " . gmdate("D, d MYH:i:s") . " GMT"); header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0"); header("Cache-Control: post-check=0, pre-check=0", false); header("Pragma: no-cache"); ?> 
        <title>{{ $page_title or "PDVi" }}</title>
        <meta name="description" content="Punto de Venta">
        <meta name="author" content="EasyNet">

        <!-- BEGIN CSS for this page -->
        <!-- Favicon -->
        <link rel="shortcut icon" href="/support/pictures/config/logos/logo000001.ico">
        <!-- Bootstrap CSS -->
        <link href="/pike_template/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- Font Awesome CSS -->
        <link href="/pike_template/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        
        <link rel="stylesheet" type="text/css" href="/pike_template/assets/plugins/datatables/dataTables.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="/pike_template/assets/plugins/datatables/buttons.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="/pike_template/assets/plugins/datatables/responsive.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="/pike_template/assets/plugins/datatables/autoFill.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="/pike_template/assets/plugins/datatables/colReorder.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="/pike_template/assets/plugins/datatables/fixedColumns.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="/pike_template/assets/plugins/datatables/fixedHeader.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="/pike_template/assets/plugins/datatables/keyTable.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="/pike_template/assets/plugins/datatables/rowGroup.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="/pike_template/assets/plugins/datatables/rowReorder.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="/pike_template/assets/plugins/datatables/scroller.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="/pike_template/assets/plugins/datatables/select.dataTables.min.css"/>

        <link rel="stylesheet" type="text/css" href="/pike_template/assets/css/carrouselpdv.css"/>
        
        <link rel="stylesheet" type="text/css" href="/pike_template/assets/plugins/switchery/switchery.min.css"/>

        <link href="/pike_template/assets/plugins/owlcarousel/owl.carousel.min.css" rel="stylesheet" />
        <link href="/pike_template/assets/plugins/owlcarousel/owl.theme.default.min.css" rel="stylesheet" />
        
        <!-- CUSTOM PLUGINS -->
        <link href="/css/bootstrap-datetimepicker-standalone.min.css" rel="stylesheet" type="text/css">
        <link href="/pike_template/assets/css/select2.css" rel="stylesheet" type="text/css" />
        <link href="/pike_template/assets/css/icheck.flat.css" rel="stylesheet" type="text/css" />
        <link href="/pike_template/assets/css/jquery.datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="/pike_template/assets/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css" />
        <link href="/pike_template/assets/css/slider.css" rel="stylesheet" type="text/css" />
        <link href="/pike_template/assets/css/pace.min.css" rel="stylesheet" type="text/css" /> 


        <link href="{{ asset('css/easy-autocomplete.themes.min.css') }}" rel="stylesheet">        

        <!-- CUSTOM PLUGINS -->
        <link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet">
        <link href="/pike_template/assets/css/fontawesome-iconpicker.min.css" rel="stylesheet" type="text/css" /> 
        <link href="/pike_template/assets/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" /> 
               
        <!-- Custom CSS -->
        <link href="/pike_template/assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="/pike_template/assets/css/custom.css" rel="stylesheet" type="text/css" />
         
        <!-- END CSS for this page -->

        <script src="/pike_template/assets/js/jquery-3.3.1.js"></script>
        
         <!--repeater-->
        <script src="/js/jquery.repeater.js"></script>
       




        <!--<script src="/pike_template/assets/js/jquer.js"></script>-->
        <script src="/pike_template/assets/js/modernizr.min.js"></script>
        <script src="/pike_template/assets/js/jquery.min.js"></script>
        <script src="/pike_template/assets/js/moment.min.js"></script>
        
        
        <script src="/pike_template/assets/js/popper.min.js"></script>
        <script src="/pike_template/assets/js/bootstrap.min.js"></script>
        

        <script src="/pike_template/assets/js/detect.js"></script>
        <script src="/pike_template/assets/js/fastclick.js"></script>
        <script src="/pike_template/assets/js/jquery.blockUI.js"></script>
        <script src="/pike_template/assets/js/jquery.nicescroll.js"></script>
       

        <script src="/pike_template/assets/js/jquery.scrollTo.min.js"></script>
        <script src="/pike_template/assets/plugins/switchery/switchery.min.js"></script>

        <script src="/pike_template/assets/js/pikeadmin.js"></script>
        
    
        
        <!-- BEGIN Java Script for this page -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        
        <script src="/pike_template/assets/plugins/datatables/jszip.min.js"></script>
        <script src="/pike_template/assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="/pike_template/assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="/pike_template/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/pike_template/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="/pike_template/assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="/pike_template/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="/pike_template/assets/plugins/datatables/buttons.colVis.min.js"></script>
        <script src="/pike_template/assets/plugins/datatables/buttons.flash.min.js"></script>
        <script src="/pike_template/assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="/pike_template/assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="/pike_template/assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="/pike_template/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
        <script src="/pike_template/assets/plugins/datatables/dataTables.autoFill.min.js"></script>
        <script src="/pike_template/assets/plugins/datatables/dataTables.colReorder.min.js"></script>
        <script src="/pike_template/assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>
        <script src="/pike_template/assets/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="/pike_template/assets/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="/pike_template/assets/plugins/datatables/dataTables.rowGroup.min.js"></script>
        <script src="/pike_template/assets/plugins/datatables/dataTables.rowReorder.min.js"></script>
        <script src="/pike_template/assets/plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="/pike_template/assets/plugins/datatables/dataTables.select.min.js"></script>
        
        <!-- Counter-Up-->
        <script src="/pike_template/assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="/pike_template/assets/plugins/counterup/jquery.counterup.min.js"></script>
        
        <script src="/pike_template/assets/plugins/switchery/switchery.min.js"></script>
        
        <!-- CUSTOM PLUGINS -->
        <script src="/pike_template/assets/js/bootstrap-datetimepicker.min.js"></script>
        <script src="/pike_template/assets/js/bootstrap-lightbox.min.js"></script>
        <script src="/pike_template/assets/js/bootstrap-treeview.min.js"></script>
        <script src="/pike_template/assets/js/perfect-scrollbar.jquery.min.js"></script>
        <script src="/pike_template/assets/js/perfect-scrollbar.min.js"></script>
        <script src="/pike_template/assets/js/jquery.datetimepicker.full.min.js"></script>
        <script src="/pike_template/assets/js/select2.full.min.js"></script>

        <script src="/pike_template/assets/js/jquery.validate.min.js"></script>
        <script src="/pike_template/assets/js/icheck.min.js"></script>
        <script src="/pike_template/assets/js/jssor.slider.min.js"></script>
        <script src="/pike_template/assets/js/bootstrap-slider.js"></script>
        <script src="/pike_template/assets/js/pace.min.js"></script>
        
        <script src="/pike_template/assets/plugins/owlcarousel/owl.carousel.min.js"></script>
        <script src="/pike_template/assets/js/fontawesome-iconpicker.min.js"></script>
        <script src="/pike_template/assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="/pike_template/assets/js/jquery.ui.pos.js"></script>
        
        <script src="/pike_template/assets/js/custom.js"></script>
 
        <script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap-select.js') }}"></script>
        
        <!-- High Charts -->
        <script src="/highcharts/js/highcharts-5.0.11.js"></script>
        <script src="/highcharts/js/highcharts-more-5.0.11.js"></script>
        <script src="/highcharts/js/highcharts-3d-5.0.11.js"></script>
        <script src="/highcharts/js/exporting.js"></script>
        <script src="/highcharts/js/export-data.js"></script>
        <script src="/highcharts/js/heatmap.js"></script>
        <!-- End High Charts -->
        
        <script src="/pike_template/assets/js/sir.js"></script>
        <script src="/js/numbers.js"></script>
        @include('management.components.modals.terms_conditions')

    </head>

    <script>
        
        jQuery(document).ready(function($) {

            $(".btn-add").on('click', function () {
                $(".panel-default").toggle();
                $(".form-add").toggle();
            });
            $(".btn-cancel").on('click', function () {
                location.href = "/{{ strtolower($group . '/' . $page) }}";
            });

            $.extend(true, $.fn.dataTable.defaults, {
                lengthMenu: [10, 20, 30, 50],
                pageLength: 10,
                pagingType: "full_numbers",
                processing: true,
                serverSide: true,
                responsive: true,
                stateSave: false,
                @if(empty(Session::get('locale')) || Session::get('locale') == 'es')
                language: {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "No hay datos disponibles",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "<<",
                        "sLast": ">>",
                        "sNext": ">",
                        "sPrevious": "<"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },

                    "decimal": "",
                    "emptyTable": "No hay datos disponibles",
                    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "No se encontraron resultados",
                    "paginate": {
                        "first": "<<",
                        "last": ">>",
                        "next": ">",
                        "previous": "<"
                    },
                    "aria": {
                        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
                @endif
                stateSaveCallback: function (settings, data) {
                    sessionStorage.setItem('commonTable', JSON.stringify(data));
                },
                stateLoadCallback: function (settings) {
                    try {
                        return JSON.parse(sessionStorage.getItem('commonTable'));
                    } catch (e) {
                    }
                }
            });

            @if(\App\Models\Management\RoleUser::where('user_id', auth()->user()->id)->value('role_id') == 2
                || \App\Models\Management\RoleUser::where('user_id', auth()->user()->id)->value('role_id') == 6
                || \App\Models\Management\RoleUser::where('user_id', auth()->user()->id)->value('role_id') == 7)
                    @if(is_null(\App\Models\Management\User::where('id', auth()->user()->id)->value('authorization')))
                        $('#modalTermsConditions').modal({'show': true, keyboard: false, backdrop: 'static'});


                        $('input[name="conditions"').click(function() {
                            $(this).is(':checked')
                                ? $('#btnAcceptConditions').prop("disabled", false)
                                : $('#btnAcceptConditions').prop("disabled", true);
                            });

                        $('#btnAcceptConditions').on('click', function(){
                            var check = $('input[name="conditions"]:checked').length;
                           

                            if(check > 0){
                                $.ajax({
                                    url: '/management/contracts/ajax?type=acceptConditions',
                                    type: $('#formAcceptConditions').attr('method'),
                                    data: {},
                                    success: function(response){
                                        res = JSON.parse(response);
                                        console.log(res);

                                        res.success === false
                                            ? alert('ERROR')
                                            : $('#modalTermsConditions').modal('hide');
                                              window.location.href = "{{ url('management/catalogs')}}";
                                    }
                                });
                            }
                            else{
                                alert('Debes aceptar los Términos y Condiciones');
                            }
                        });
                    @endif
                @endif

        });
    </script>

    <body class="adminbody" style="margin-top: -100px;">

        <!--<div id="main" class="enlarged forced">-->
        <div id="main">

            <!-- top bar navigation -->
            @include('pike_header')
            <!-- End Navigation -->

            <!-- Left Sidebar -->
            @include('pike_sidebar')
            <!-- End Sidebar -->

            <div class="content-page">

                <!-- Start content -->
                <div class="content">

                    <div class="container-fluid">

                        <div class="row">

<!--                             
                            <div class="col-xl-12">
                                <div class="breadcrumb-holder">
                                    <h1 class="main-title float-left" style="margin-top: 111px;">{{ $page_title or __('Dashboard') }}</h1>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item" style="padding-top: 14px;margin-top: 100px;">{{ strtolower($group) }}</li>
                                        <li class="breadcrumb-item active" style="margin-top: 114px; padding-top: 0px;">{{ strtolower($page) }}</li>
                                    </ol>
                                    <div class="clearfix" style="padding-top: 53px;"></div>
                                </div>
                            </div> 
                             -->
                        </div>
                        <!-- end row -->
                        
                        <!-- Content -->
                        @yield('content')
                        <!-- Content -->
                    </div>
                    <!-- END container-fluid -->

                </div>
                <!-- END content -->

            </div>
            <!-- END content-page -->

            <!-- footer -->
            @include('pike_footer')
            <!-- footer -->
            
        </div>
        <!-- END main -->			

    </body>
</html>
