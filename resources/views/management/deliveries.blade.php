<?php $page_title = __('Deliveries') ?> 
@extends('pike_template')
@section('content')
@include('common.errors')
<div class="panel-body form-add" style="margin-top: 110px;">
    <!-- New Form -->
    <form action="/{{ $group . '/' . $page }}" method="POST" enctype="multipart/form-data"
            class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
        <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Delivery') }}</div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">

        <div class="form-group row">
            <label style="display: none" for="price_sale"
                    class="col-sm-3 col-form-label">{{ __('Requested') }}</label>
            <div class="col-sm-6">
                <input type="hidden" name="sale" id="id_sale" class="form-control" required
                        value="{{ !empty($id) ? $id : '' }}"/>
            </div>
        </div>

        <!-- Messenger Service -->
        <div class="form-group row">
            <label for="company" class="col-sm-3 col-form-label">{{ __('Deliverie Service') }}</label>
            <div class="col-sm-6">
                <select name="deliverie" required id="deliverie-name" class="form-control">
                    <option selected value="">{{ __('Select Deliverie') }}</option>
                    @if(!empty($options))
                        @foreach($options as $option)
                            <option value="{{ $option->id }}">{{ $option->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <!-- delivery address -->
        <div class="form-group row">
            <label for="company" class="col-sm-3 col-form-label">{{ __('Delivery address') }}</label>
            <div class="col-sm-6">
                @if(!empty($address))
                    @foreach($address as $a)
                        <input type="text" disabled class="form-control" value="{{$a->address}}">
                    @endforeach
                @endif
            </div>
        </div>

        <!-- City -->
        <div class="form-group row">
            <label for="company" class="col-sm-3 col-form-label">{{ __('City') }}</label>
            <div class="col-sm-6">
                @if(!empty($city))
                    @foreach($city as $c)
                        <input type="text" disabled class="form-control" value="{{$c->name}}">
                    @endforeach
                @endif
            </div>
        </div>

        <!-- Add Task Button -->
        <div style="height:42px"></div>
        <div class="form-group row">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="button" class="btn btn-primary btn-cancel" data-placement="top" data-toggle="tooltip"
                        title="{{ __('Cancel') }}">
                    <i class="fa fa-reply"></i>
                </button>
                <button type="submit" class="btn btn-primary"
                        data-placement="top" data-toggle="tooltip" title="{{ __('Send Order') }}">
                    <i class="fa fa-share"></i>
                </button>
            </div>
        </div>
    </form>
</div>
<!-- Confirm Modal-->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color:#F5F5DC">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <br>
            <div class="modal-body" style="display:flex; justify-content: center;">
                <label id="lbmensaje" class="col-form-label"></label>
            </div>

            <div id="footer" class="modal-footer" style="display: inline-table;">

            </div>
        </div>
    </div>
</div>

<!----Modal de respuesta ----->
<!--Modal Combos-->
<div class="modal fade" tabindex="-1" role="dialog" id="modalCurriers">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="comboheader" style="background-color:#F5F5DC">
            <h5 class="modal-title modal_header_font">Selecciona un mensajero</h5>
            </div>
            <div id="alert" hidden role="alert"></div>
            <form action="/management/deliveries/assignCurrierToDelivery" id="formSearch" method="POST" class="form-horizontal" style="padding-right: 15px;padding-left: 15px; background-color:#F5F5DC;border:none;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                    <div class="container" >
                        @if(isset($curriers))
                        <select name="currier_id" required id="currier_id" class="form-control">
                            <option selected value="">{{ __('Select Courrier') }}</option>
                                @foreach($curriers as $currier)
                                    <option value="{{ $currier->id }}">{{$currier->person->lastname .' '. $currier->person->firstname }}</option>
                                @endforeach
                        </select>
                            <input type="hidden" name="delivery_id" class="form-control" value="{{$delivery_id}}">
                        @endif
                    </div>
                </div>
                <div class="modal-footer" style="display:block;">
                    <div style="width: 100%;">
                    <button type="submit" class="btn btn-primary" style="width:100%" >{{ __('Accept') }} </button>    
                    </div>
                    <br>
                    <div style="display:flex; justify-content:flex-end;">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="closeModal()" >{{ __('Close') }} </button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>

<div class="panel panel-default" style="margin-top: 110px;">
    <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Deliveries') }}

        <button style="display: none" type="button" class="btn btn-primary btn-add"
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

<script>
    jQuery(document).ready(function ($) {

        $(".task-table").DataTable({
            'ajax': '/' + $("#url").val() + '/viewlist',
            columns: [
                {data: 'id', name: 'id', title: "{{__('ID')}}"},
                {data: 'transaction', name: 'transaction', title: "{{__('ID Sale')}}"},
                {data: 'courier', name: 'courier', title: "{{ __('Courier') }}"},
                {data: 'city', name: 'city', title: "{{ __('City') }}"},
                {data: 'address', name: 'address', title: "{{ __('Delivery address') }}"},
                {data: 'company', name: 'companyco', title: "{{ __('Delivery company') }}"},
                {data: 'startdate', name: 'startdate', title: "{{ __('Start Date') }}"},
                {data: 'enddate', name: 'enddate', title: "{{ __('End Date') }}"},
                {data: 'status.name', name: 'status.name', title: "{{ __('Status') }}"},
                {
                    data: 'action', name: 'action', title: "{{ __('Actions') }}",
                    orderable: false, searchable: false
                }
            ]
            // ,
            // "order": [[8, "asc"], [0, "desc"]]
        });

        @if(!empty($send) && $send == true){
            $(".btn-add").trigger("click");
        }
        @endif
        
        @if(isset($modal) && $modal)
            $('#modalCurriers').modal('show');
        @endif
    });

    function confirmDelivery(value){
        //let value = $(this).attr("data-id");
        $('#lbmensaje').text('¿Confirmas que el pedido está listo?');
        $("#confirmModal").modal("show");
        $("#footer").html('<a href="/management/deliveries/confirmDelivery/' + value + '" class="btn btn-primary" data-placement="top"" style="width:100%" >{{__('Aceptar')}}</a> <br><br> <div style="display: flex;justify-content: flex-end;"> <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('Cancel')}}</button> </div>')
    }

    function receiveDelivery(id){
        let value = $(this).attr("data-id");
        console.log(id);

        $('#lbmensaje').text('¿Cuál es el estado del pedido?');
        $("#confirmModal").modal("show");
        $("#footer").html('<a href="/management/pdvi/edit/' + id + '/delivered" class="btn btn-primary" data-placement="top"" style="width:100%" >{{__('Delivered')}}</a> <br><br> <div style="display:flex; justify-content:flex-end;"><a href="/management/deliveries/receiveDelivery/' + id + '/rejected" class="btn btn-danger" data-placement="top"" style="width:25%" >{{__('Rejected')}}</a></div>')

    }

    function closeModal(){
        window.history.back();
    }

</script>
@include('management.pdviJS.pdvi_impresion')

@endsection
