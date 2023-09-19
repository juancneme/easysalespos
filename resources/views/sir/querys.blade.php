<?php $page_title = __('Querys') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<div class="panel-body form-add" style="margin-top: 110px;">

    <!-- New Form -->
    <form action="/{{ $group . '/' . $page }}" method="POST" enctype="multipart/form-data" class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
        <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Querys') }}</div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group row">
            <label for="parent_id" class="col-sm-3 col-form-label">{{ __('Parent') }}*</label>
            <div class="col-sm-6">
                <select name="parent_id" id="parent_id-name" class="form-control">
                    <option value="0">{{__('Select')}}</option>
                    @foreach ($querys as $query)
                    <option value="{{ $query->query_id }}" {{ !empty($queryEdit) && $query->query_id == $queryEdit->parent_id ? 'selected' : '' }}>{{ $query->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="cube" class="col-sm-3 col-form-label">{{ __('Cube') }}*</label>  
            <div class="col-xs-3 col-sm-4 col-md-4 input-bar-item">
                <select name="cube" id="cube-name" class="form-control" required>
                    <option value="">{{__('Select')}}</option>
                    @foreach ($cubes as $cube)
                    <option value="{{ $cube->cube_id }}" {{ !empty($queryEdit) && $queryEdit->cube_id == $cube->cube_id ? 'selected' : '' }}>{{ $cube->name }}</option>
                    @endforeach
                </select>
            </div> 
        </div>

        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label" >{{ __('Name') }} *</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="name-id" class="form-control" required
                       value="{{ !empty($queryEdit) ? $queryEdit->name : old('name') }}" />
            </div>
        </div>

        <div class="form-group row">
            <label for="query" class="col-sm-3 col-form-label">{{ __('Query') }} </label>
            <div class="col-sm-6">
                <textarea name="querystr" id="querystr-id" class="form-control">{{ !empty($queryEdit) ? $queryEdit->query : old('query') }}</textarea>
<!--                <button type="button" class="btn btn-primary" id="btnmdx" data-toggle="modal" data-target="#modalMdx">
                    <i class="fa fa-gears"></i> MDX
                </button>-->
            </div>
        </div>

        <div class="form-group row">
            <label for="configuration" class="col-sm-3 col-form-label">{{ __('Configuration') }}*</label>
            <div class="col-sm-6">
                <input type="hidden" name="configuration" id="configuration-id" placeholder="{}" class="form-control" 
                       value="{{ !empty($queryEdit) ? $queryEdit->configuration : old('configuration') }}" >
                <button type="button" class="btn btn-primary" id="btnconfig" data-toggle="modal" data-target="#modalConfig">
                    <i class="fa fa-gears"></i>
                </button>
            </div>
        </div>

        <div class="form-group row">
            <label for="parameters" class="col-sm-3 col-form-label">{{ __('Parameters') }}</label>
            <div class="col-sm-6">
                <input type="text" name="parameters" id="parameters-id" class="form-control" 
                       value="{{ !empty($queryEdit) ? $queryEdit->parameters : old('parameters') }}" >
            </div>
        </div>

        <div class="form-group row">
            <label for="level" class="col-sm-3 col-form-label">{{ __('Level') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="level" id="level-id" class="form-control" required
                       value="{{ !empty($queryEdit) ? $queryEdit->level : old('level') }}" >
            </div>
        </div>

        <div class="form-group row">
            <label for="next" class="col-sm-3 col-form-label">{{ __('Next') }}*</label>
            <div class="col-sm-6">
                <select name="next" class="form-control">
                    <option value="0">{{ __('Nothing') }}</option>
                    @foreach ($querys as $query)
                    <option value="{{ $query->query_id }}" {{ !empty($queryEdit) && $query->query_id == $queryEdit->next ? 'selected' : ''}}>{{ $query->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="position" class="col-sm-3 col-form-label">{{ __('Page') }}*</label>
            <div class="col-sm-6">
                <select name="position" id="position-id" class="form-control" required>
                    <option value="">{{ __("Select") }}</option>
                    <option value="0" {{ !empty($queryEdit) && $query->position == '0' ? 'selected' : ''}}>{{ __("SIR") }}</option>
                    <option value="1" {{ !empty($queryEdit) && $query->position == '1' ? 'selected' : ''}}>{{ __("Gestion y Control") }}</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="status" class="col-sm-3 col-form-label">{{ __('Status') }}*</label>
            <div class="col-sm-6">
                <select name="status" id="estado-name" class="form-control" required>
                    <option <?= !empty($queryEdit) && $queryEdit->status == "1" ? 'selected' : '' ?> value="1">{{ __('Active') }}</option>
                    <option <?= !empty($queryEdit) && $queryEdit->status == "0" ? 'selected' : '' ?> value="0">{{ __('Inactive') }}</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                @if(!empty($queryEdit))
                <input type="hidden" name="queryId" value="{{ $queryEdit->query_id }}" />
                @endif

                <button type="button" class="btn btn-primary btn-cancel" data-placement="top" data-toggle="tooltip" title="{{ __('Cancel') }}">
                    <i class="fa fa-reply"></i>
                </button>
                @if(validatePermission('edit', $page))
                <button type="submit" class="btn btn-primary" data-placement="top" data-toggle="tooltip" title="{{ __('Save Changes') }}">
                    <i class="fa fa-save"></i>
                </button>
                @endif
            </div>
        </div>
    </form>
</div>

<!-- Current Users -->
<div class="panel panel-default" style="margin-top: 110px;">
    <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Querys') }}

        <button type="button" class="btn btn-primary btn-add" 
            <?= !validatePermission("add", $page) ? "disabled" : "" ?>
            data-placement="top" data-toggle="tooltip" title="{{ __('Add') }}">
            <i class="fa fa-plus"></i> 
        </button>

    </div>

    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-en task-table">
            </table>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modalMdx">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Mdx') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="titulomdx" class="col-sm-3 col-form-label">{{ __('Title') }}*</label>
                    <div class="col-sm-6">
                        <input name="titulomdx" id="titulomdx-name" class="form-control" required tooltip="El título del mdx" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-apply-config">Apply</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalConfig">
    <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Configuration') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="formConfig">
                    <div class="form-group row">
                        <label for="Titulo" class="col-sm-3 col-form-label">{{ __('Title') }}*</label>
                        <div class="col-sm-6">
                            <input name="Titulo" id="titulo-name" class="form-control" required tooltip="El título de la gráfica" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Subtitulo" class="col-sm-3 col-form-label">{{ __('Subtitle') }}*</label>
                        <div class="col-sm-6">
                            <input name="Subtitulo" id="subtitulo-name" class="form-control" required tooltip="El subtitulo de la gráfica" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Tipo" class="col-sm-3 col-form-label">{{ __('Type') }}*</label>
                        <div class="col-sm-6">
                            <select name="Tipo" id="type-name" class="form-control" required tooltip="El tipo de reporte">
                                <option value="dual">{{ __('Table & Graph') }}</option>
                                <option value="graph" disabled="">{{ __('Graph') }}</option>
                                <option value="table">{{ __('Table') }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="TipoComponente" class="col-sm-3 col-form-label">{{ __('Component Type') }}*</label>
                        <div class="col-sm-6">
                            <select name="TipoComponente" id="componenttype-name" class="form-control" required tooltip="El tipo de gráfica">
                                <option value="highcharts" data-type-id="notable">{{ __('Highcharts') }}</option>
                                <option value="datatables" data-type-id="table">{{ __('Datatable') }}</option>
                                <option value="googlecharts" data-type-id="notable" disabled="">{{ __('Googlecharts') }}</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">{{ __('Table Options') }}*</label>
                        
                        <div class="col-sm-6">
                            <input type="checkbox" class="control-input-onoff" name="totals" id="totals-name">
                            <label for="totals">{{ __('Totals') }}</label>
                        </div>
                        <div class="col-sm-6 offset-md-3">
                            <input type="checkbox" class="control-input-onoff" name="filters" id="filters-name">
                            <label for="filters">{{ __('Filters') }}</label>
                        </div>
                        <div class="col-sm-6 offset-md-3">
                            <input type="checkbox" class="control-input-onoff" name="exports" id="exports-name">
                            <label for="exports">{{ __('Export') }}</label>
                        </div>
                        <div class="col-sm-6 offset-md-3">
                            <input type="checkbox" class="control-input-onoff" name="columns" id="columns-name">
                            <label for="columns">{{ __('Columns') }}</label>
                        </div>
                        <div class="col-sm-6 offset-md-3">
                            <input type="checkbox" class="control-input-onoff" name="footers" id="footers-name">
                            <label for="footers">{{ __('Footers') }}</label>
                        </div>
                    </div>

                    <div class="form-group row hide" id="div-tipoGrafica">
                        <label for="TipoGrafica" class="col-sm-3 col-form-label">{{ __('Graph Type') }}*</label>
                        <div class="col-sm-6">
                            <select name="TipoGrafica" id="graphtype-name" class="form-control" required tooltip="El tipo de gráfica">
                                <option value="line" data-componenttype-id="highcharts">{{ __('Line') }}</option>
                                <!--<option value="spline" disabled data-componenttype-id="highcharts">{{ __('Curved Line') }}</option>-->
                                <option value="area" data-componenttype-id="highcharts">{{ __('Area') }}</option>
<!--                                <option value="area-stacking" disabled data-componenttype-id="highcharts">{{ __('Stacking Area') }}</option>
                                <option value="area-percent" disabled data-componenttype-id="highcharts">{{ __('Percent Area') }}</option>
                                <option value="area-inverted" disabled data-componenttype-id="highcharts">{{ __('Inverted Area') }}</option>-->
                                <option value="areaspline" data-componenttype-id="highcharts">{{ __('Curved Area') }}</option>
                                <option value="bar" data-componenttype-id="highcharts">{{ __('Bar') }}</option>
                                <!--<option value="bar-stacking" data-componenttype-id="highcharts">{{ __('Stacking Bar') }}</option>-->
                                <option value="column" data-componenttype-id="highcharts">{{ __('Column') }}</option>
<!--                                <option value="column-stacking" data-componenttype-id="highcharts">{{ __('Stacking Column') }}</option>
                                <option value="column-percent" data-componenttype-id="highcharts">{{ __('Percent Column') }}</option>
                                <option value="column-placement" data-componenttype-id="highcharts">{{ __('Dual Grouped Column') }}</option>-->
<!--                                <option value="columnrange" disabled data-componenttype-id="highcharts">{{ __('Column Range') }}</option>
                                <option value="columnrange-inverted" disabled data-componenttype-id="highcharts">{{ __('Inverted Column Range') }}</option>-->
                                <!--<option value="cylinder" data-componenttype-id="highcharts">{{ __('Cylinder') }}</option>-->
                                <option value="pie" data-componenttype-id="highcharts">{{ __('Pie') }}</option>
                                <option value="semi-circle" data-componenttype-id="highcharts">{{ __('Semicircle') }}</option>
<!--                                <option value="variablepie" data-componenttype-id="highcharts">{{ __('Pie Variable') }}</option>-->
                                <!--<option value="columnline" data-componenttype-id="highcharts">{{ __('Column & Line') }}</option>-->
<!--                                <option value="solidgauge" data-componenttype-id="highcharts">{{ __('Gauge') }}</option>-->
                                <option value="polar-line" data-componenttype-id="highcharts">{{ __('Polar Line') }}</option>
                                <option value="polar-area" data-componenttype-id="highcharts">{{ __('Polar Area') }}</option>
                                <option value="polar-column" data-componenttype-id="highcharts">{{ __('Polar Column') }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">{{ __('Graphs Options') }}*</label>
                        
                        <div class="col-sm-6">
                            <input type="checkbox" class="control-input-onoff" name="option3D" id="option3D-name">
                            <label for="option3D">{{ __('3D') }}</label>
                        </div>
                        <div class="col-sm-6 offset-md-3">
                            <input type="checkbox" class="control-input-onoff" name="inverted" id="inverted-name">
                            <label for="inverted">{{ __('Inverted') }}</label>
                        </div>
                        <div class="col-sm-6 offset-md-3">
                            <input type="checkbox" class="control-input-onoff" name="percent" id="percent-name">
                            <label for="percent">{{ __('Percent') }}</label>
                        </div>
                        <div class="col-sm-6 offset-md-3">
                            <input type="checkbox" class="control-input-onoff" name="stacking" id="stacking-name">
                            <label for="stacking">{{ __('Stacking') }}</label>
                        </div>
                        <div class="col-sm-6 offset-md-3">
                            <input type="checkbox" class="control-input-onoff" name="grouped" disabled id="grouped-name">
                            <label for="grouped">{{ __('Grouped') }}</label>
                        </div>
                        
                        <div class="col-sm-6 offset-md-3">
                            <input type="checkbox" class="control-input-onoff" name="totalspie" id="totalspie-name">
                            <label for="totalspie">{{ __('Totals in pie') }}</label>
                        </div>
                        <div class="col-sm-6 offset-md-3">
                            <input type="checkbox" class="control-input-onoff" name="drawvars" id="drawvars-name">
                            <label for="drawvars">{{ __('Draw vars') }}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="icono" class="col-sm-3 col-form-label">{{ __('Icon') }}*</label>
                        <div class="col-sm-6">
        <!--                    <select name="icono" id="icon-name" class="form-control" required tooltip="Icono" data-toggle="dropdown">
                            </select>-->
                            <div class="btn-group">
                                <button type="button"
                                        class="icp icp-dd btn btn-default dropdown-toggle iconpicker-component"
                                        data-toggle="dropdown">
                                    {{ _('Select') }} <i class="fa fa-fw"></i>
                                    <span class="caret"></span>
                                </button>
                                <div class="dropdown-menu"></div>
                            </div>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="color" class="col-sm-3 col-form-label">{{ __('Color') }}*</label>
                        <div class="col-sm-6">
                            <input type="text" name="color" id="colorPicker" class="form-control" required tooltip="Color de fondo">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-apply-config">Apply</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
jQuery(document).ready(function ($) {

    $("#componenttype-name").children('option').hide();
    
    // popup config
    $('#btnconfig').on('click', function (e) {
        obj = JSON.parse($("#configuration-id").val());
        
        console.log(obj);
        $("#titulo-name").val(obj.Titulo);
        $("#subtitulo-name").val(obj.Subtitulo);
        $("#type-name").val(obj.Tipo).change();
        $("#componenttype-name").val(obj.TipoComponente);
        $("#graphtype-name").val(obj.TipoGrafica);
        $(".iconpicker-component > i").attr('class', '').addClass('fa').addClass(obj.icono);
        $("#colorPicker").val(obj.color);
        
        // options table
//        $("#totals-name").prop("checked", obj.totals);
//        $("#filters-name").prop("checked", obj.filters);
//        $("#exports-name").prop("checked", obj.exports);
//        $("#columns-name").prop("checked", obj.columns);
//        $("#footers-name").prop("checked", obj.footers);
        
        if(obj.totals){
            $("#totals-name").click();
        }
        if(obj.filters){
            $("#filters-name").click();
        }
        if(obj.exports){
            $("#exports-name").click();
        }
        if(obj.columns){
            $("#columns-name").click();
        }
        if(obj.footers){
            $("#footers-name").click();
        }
        
        // options graph
//        $("#option3D-name").prop("checked", obj.option3d);
//        $("#inverted-name").prop("checked", obj.inverted);
//        $("#grouped-name").prop("checked", obj.grouped);  
//        $("#stacking-name").prop("checked", obj.stacking);  
//        $("#percent-name").prop("checked", obj.percent);  
//        $("#drawvars-name").prop("checked", obj.drawvars);  
//        $("#totalspie-name").prop("checked", obj.totalspie);  
        
        if(obj.option3d){
            $("#option3d-name").click();
        }
        if(obj.inverted){
            $("#inverted-name").click();
        }
        if(obj.grouped){
            $("#grouped-name").click();
        }
        if(obj.stacking){
            $("#stacking-name").click();
        }
        if(obj.percent){
            $("#percent-name").click();
        }
        if(obj.drawvars){
            $("#drawvars-name").click();
        }
        if(obj.totalspie){
            $("#totalspie-name").click();
        }
    });
    
    $("#type-name").on('change', function(){
        if ($(this).val() == 'table'){
            $("#componenttype-name").children('option[data-type-id="table"]').show();
            $("#componenttype-name").children('option[data-type-id="notable"]').hide();
            $("#div-tipoGrafica").addClass('hide');
        }
        else {
            $("#componenttype-name").children('option[data-type-id="table"]').hide();
            $("#componenttype-name").children('option[data-type-id="notable"]').show();
            $("#div-tipoGrafica").removeClass('hide');
        }
    }).val("");
    
    $("#componenttype-name").val("");
    $(".btn-apply-config").on('click', function(){
        obj = {};
        obj.Titulo = $("#titulo-name").val();
        obj.Subtitulo = $("#subtitulo-name").val();
        obj.Tipo = $("#type-name").val();
        obj.TipoComponente = $("#componenttype-name").val();
        obj.TipoGrafica = $("#graphtype-name").val();
        obj.icono = $(".iconpicker-component > i").attr('class').replace('fa ', '');
        obj.color = $("#colorPicker").val();
        
        // table options
        obj.totals = $("#totals-name").prop('checked');
        obj.filters = $("#filters-name").prop('checked');
        obj.exports = $("#exports-name").prop('checked');
        obj.columns = $("#columns-name").prop('checked');
        obj.footers = $("#footers-name").prop('checked');
        
        // graphs options
        obj.option3d = $("#option3D-name").prop('checked');
        obj.inverted = $("#inverted-name").prop('checked');
        obj.grouped = $("#grouped-name").prop('checked');
        obj.stacking = $("#stacking-name").prop('checked');
        obj.percent = $("#percent-name").prop('checked');
        obj.totalspie = $("#totalspie-name").prop('checked');
        obj.drawvars = $("#drawvars-name").prop('checked');
        
        $("#configuration-id").val(JSON.stringify(obj));
        $("#modalConfig").modal('hide');
    });
    
    $("#colorPicker").colorpicker({
        format: 'rgb' //'hex'
    });
    
    $('.iconpicker-component').iconpicker();
    $(".task-table").DataTable({
        'ajax': '/sir/querys/viewlist',
        columns: [
            {data: 'query_id', name: 'query_id', title: "{{ __('ID') }}"},
            {data: 'name', name: 'name', title: "{{ __('Name') }}"},
            {data: 'parent_name', name: 'parent_name', title: "{{ __('Parent') }}"},
            {data: 'cube_name', name: 'cube_name', title: "{{ __('Cube') }}"},
            {data: 'level', name: 'level', title: "{{ __('Level') }}"},
            {data: 'position', name: 'position', title: "{{ __('Page') }}", render: function (data, type, full, meta){
                return data == 0 ? "{{ __('SIR') }}" : "{{ __('Gestion y Control') }}";
            }},
            {data: 'status', name: 'status', title: "{{ __('Status') }}", render: function (data, type, full, meta){
                return data == 0 ? "{{ __('Inactive') }}" : "{{ __('Active') }}";
            }},
            {data: 'action', name: 'action', width: '110px', title: "{{ __('Actions') }}", orderable: false, searchable: false}
        ],
        "order": [[0, "desc"]]
    });
    
    @if (!empty($queryEdit) || count($errors) > 0)
    $(".btn-add").trigger("click");
    @endif

});
</script>
@endsection