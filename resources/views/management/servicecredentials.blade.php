<?php $page_title = __('Service credentials') ?>
@extends('pike_template')
@section('content')
    <!-- Display Validation Errors -->
    @include('common.errors')
    <div class="panel-body form-add" style="margin-top: 110px;">
        <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">
        <form action="/{{strtolower($group . '/' . $page) }}" method="POST" autocomplete="off"
              enctype="multipart/form-data"
              class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('New Service') }}</div>

            <!--Change inputs-->
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">{{ __('Provider') }}*</label>
                <div class="col-sm-6">
                    @if(empty($itemEdit))
                        <select name="provider_id" id="provider_id" class="form-control" onclick="changeInputs()"
                                <?=!empty($itemEdit) ? 'readonly' : ''  ?>
                                <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                            @if(empty($itemEdit) )
                                <option selected disabled>{{__('Select a services')}}</option>
                            @endif
                            @foreach($listServices as $list)
                                <option <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>  required
                                        <?=!empty($itemEdit) && $itemEdit->provider == $list->id ? "selected" : "" ?>
                                        value="{{ $list->id }}">{{ $list->name}}</option>
                            @endforeach
                        </select>
                    @else
                        @foreach($listServices as $list)
                            @if($list->id == $itemEdit->provider)
                                <input type="hidden" value="{{$itemEdit->provider}}" name="provider_id"
                                       id="provider_id">
                                <input type="text" value="{{$list->name}}" class="form-control" readonly>
                            @endif
                        @endforeach

                    @endif
                </div>
            </div>
            <!--Multimarca component Form -->
        @component('management.components.serviceCredentials.serviceCredentialsComponent')
            @slot('page',$page)
            @slot('group',$group)
            @slot('nameId','serviceId')
            @slot('listServices',$listServices)
            @slot('listCompanies',$listCompanies)
            @slot('edit',!empty($itemEdit) ? $itemEdit : '')
            @slot('perEdit',!empty($perEdit) ? $perEdit : '')
            @slot('itemEdit',!empty($itemEdit) ? $itemEdit : '')
        @endcomponent

        <!--Mercado Pago component Form-->
        @component('management.components.serviceCredentials.mercadopagoFormComponent')
            @slot('page',$page)
            @slot('group',$group)
            @slot('nameId','serviceId')
            @slot('listServices',$listServices)
            @slot('listCompanies',$listCompanies)
            @slot('edit',!empty($itemEdit) ? $itemEdit : '')
            @slot('perEdit',!empty($perEdit) ? $perEdit : '')
            @slot('itemEdit',!empty($itemEdit) ? $itemEdit : '')
        @endcomponent

        <!--SisteCredito component Form-->
            @component('management.components.serviceCredentials.sistecreditFormComponent')
                @slot('page',$page)
                @slot('group',$group)
                @slot('nameId','serviceId')
                @slot('listServices',$listServices)
                @slot('listCompanies',$listCompanies)
                @slot('edit',!empty($itemEdit) ? $itemEdit : '')
                @slot('perEdit',!empty($perEdit) ? $perEdit : '')
                @slot('itemEdit',!empty($itemEdit) ? $itemEdit : '')
            @endcomponent

            <!-- mensajeros component Form-->
            @component('management.components.serviceCredentials.urbanCouriersFormComponent')
                @slot('page',$page)
                @slot('group',$group)
                @slot('nameId','serviceId')
                @slot('listServices',$listServices)
                @slot('listCompanies',$listCompanies)
                @slot('edit',!empty($itemEdit) ? $itemEdit : '')
                @slot('perEdit',!empty($perEdit) ? $perEdit : '')
                @slot('itemEdit',!empty($itemEdit) ? $itemEdit : '')
            @endcomponent

            <div style="height:42px"></div>
            <div class="col-md-12">
                @if(!empty($edit))
                    <div style="height:8px"></div>
                    <input type="hidden" name="{{$nameId}}" value="{{$edit->id}}"/>
                @endif
                <button type="button" class="btn btn-primary btn-cancel" data-placement="top"
                        data-toggle="tooltip" title="{{ __('Cancel') }}">
                    <i class="fa fa-reply"></i>
                </button>

                <button type="submit" class="btn btn-primary"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                        data-placement="top" data-toggle="tooltip" title="{{ __('Save Changes') }}">
                    <i class="fa fa-save"></i>
                </button>
            </div>

        </form>
    </div>

    <!--Data Table-->
    <div class="panel panel-default" style="margin-top: 110px;">
        <div class="panel-heading">{{ __('Service') }}

            <button type="button" class="btn btn-primary btn-add"
                <?= !validatePermission("add", $page) ? "disabled" : "" ?>
                data-placement="top" data-toggle="tooltip" title="{{ __('Add') }}">
                <i class="fa fa-plus"></i>
            </button>

            <button id="collection-card" type="button" class="btn btn-success collection-card disabled"
                onclick="showCollectionCard()"> {{__('Tarjeta Recaudo')}}<i class="fa fa-file"></i>
            </button>

        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-en task-table">
                </table>
            </div>
        </div>
    </div>

    <!--Modal Tarjeta Recaudo-->
    @component('management.components.serviceCredentials.tarjetaRecaudo.tarjetaRecaudoComponent')
        @slot('page',$page)
        @slot('group',$group)
        @slot('listCompaniesWithProvider',$listCompaniesWithProvider)
    @endcomponent

    <script>
        var multimarca = 110;
        var mercadoPago = 111;
        var sisteCedit = 112;
        var couriers = 113;

        jQuery(document).ready(function ($) {
            $(".task-table").DataTable({
                'ajax': '/' + $("#url").val() + '/viewlist',
                columns: [
                    {data: 'user_name', name: 'user_name', title: "{{ __('User') }}"},
                    {data: 'key', name: 'key', title: "{{ __('Secret Key') }}"},
                    {data: 'url_service', name: 'url_service', title: "{{ __('URL') }}"},
                    {data: 'provider.name', name: 'provider.name', title: "{{ __('Provider') }}"},
                    {data: 'contract.numbercontract', name: 'contract.numbercontract', title: "{{ __('Contract') }}"},
                    {data: 'type_url', name: 'type_url', title: "{{ __('Type') }}"},
                    {data: 'estado', name: 'estado', title: "{{ __('Status') }}"},
                    {
                        data: 'action',
                        name: 'action',
                        width: '110px',
                        title: "{{ __('Actions') }}",
                        orderable: false,
                        searchable: false
                    }
                ],
                "order": [[0, "asc"]]
            });
            @if(isset($StoreId))
            console.log("{{$StoreId}}")
            $(".btn-add").trigger("click");
            $("#provider_id").val(112)
            $("#storeId").val("{{$StoreId}}")

            @endif

            @if (!empty($itemEdit) || count($errors) > 0)
            $(".btn-add").trigger("click");
            @endif
            @if(count($listCompaniesWithProvider)>0)
            $("#collection-card").removeClass("disabled")
            @endif

            //functions
            changeInputs();
            disableButtons();
        });

        function changeInputs() {
            let value = $('#provider_id').val();
            let clases = ['requerido-multimarca', 'requerido-mercadopago', 'requerido-sistecredit','requerido-couriers'];

            switch (parseInt(value)) {
                case multimarca :
                    $(".requerido-multimarca").prop("disabled", false);
                    $(".requerido-multimarca").show(1200);
                    $.each(clases, function (index, clase) {
                        if (clase != "requerido-multimarca") {
                            $("." + clase).prop("disabled", true);
                            $("." + clase).hide(1200);
                        }
                    });
                    break;
                case mercadoPago:
                    $(".requerido-mercadopago").prop("disabled", false);
                    $(".requerido-mercadopago").show(1200);
                    $.each(clases, function (index, clase) {
                        if (clase != "requerido-mercadopago") {
                            $("." + clase).prop("disabled", true);
                            $("." + clase).hide(1200);
                        }
                    });
                    break;
                case sisteCedit:
                    $(".requerido-sistecredit").prop("disabled", false);
                    $(".requerido-sistecredit").show(1200);
                    $.each(clases, function (index, clase) {
                        if (clase != "requerido-sistecredit") {
                            $("." + clase).prop("disabled", true);
                            $("." + clase).hide(1200);
                        }
                    });
                    break;
                case couriers:
                    $(".requerido-couriers").prop("disabled", false);
                    $(".requerido-couriers").show(1200);
                    $.each(clases, function (index, clase) {
                        if (clase != "requerido-couriers") {
                            $("." + clase).prop("disabled", true);
                            $("." + clase).hide(1200);
                        }
                    });
                    break;
                default:
                    break;
            }

        }

        function showCollectionCard() {
            if ($("#collection-card").hasClass("disabled")) {
                return setTimeout(function () {
                    $.message("{{__("Para habilitar la tarjeta recaudo debe adicionar las credenciales de Super Pagos, para más informacion comuniquese con un administrador.")}}", "info", true);
                }, 500);
            }
            $("#collection_card_modal").modal('show');
        }

        function disableButtons() {
            $('.buttonTR').attr('disabled', true);
        }

        function enableButtons() {
            let idCompany = $('#company_id').val();
            if (idCompany != null) {
                $('.buttonTR').removeAttr('disabled');
            }
        }

    </script>
@endsection
