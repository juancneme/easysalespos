<style>
    .wrapper {
        text-align: center;
    }

    .button {
        position: absolute;
    }

    .loader {
        border: 16px solid #a4a4a4;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 42px;
        height: 42px;
        -webkit-animation: spin 2s linear infinite;
    / Safari / animation: spin 2 s linear infinite;
    }

    /* Safari*/
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>

<div class="panel panel-default" style="display:none">
</div>

<div class="modal fade" id="modalSisteCredit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                <span class="log-cls close">&times;</span>
            </button>
            <div class="modal-header">
                <h5 class="modal-title modal_header_font" id="exampleModalLabel">{{__('Electronic credit')}}</h5>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center">
                    <div class="loader" hidden="true" style="margin-top: -41px;">
                    </div>
                </div>

                <div id="msj-error" class="alert alert-danger alert-dismissable" role="alert" style="display: none">
                    <strong id="msj"></strong>
                </div>
                <form id="siste-credit-form">
                    <div class="form-group row" >
                        <label for="typedoc" class="col-sm-3 col-form-label">{{ __('Type of Identification') }}*</label>
                        <div class="col-sm-8" id="type_identification_label">
                            <select name="typedoc" id="typedoc" class="form-control" required
                                <?= !empty($personsEdit) ? 'readonly' : '' ?>
                                <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> >
                                <option value="00" disabled selected>{{__('Select a type of identification')}}</option>
                                @foreach ($itemstypedocumentSis as $ItemsDocs)
                                <option required
                                    <?= !empty($availableCreditLimit) && $typedocument == $ItemsDocs->id ? 'selected' : '' ?>
                                    value="{{ !isset($availableCreditLimit) ?  $ItemsDocs->id : $typedocument }}">
                                    {{ $ItemsDocs->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">{{ __('Number Document') }}*</label>
                        <div class="col-sm-8">
                            <input type="number" name="numberdocument" id="numberdocument"
                                   class="form-control"
                                   placeholder="{{ __('Number Document') }}"
                                   <?= isset($availableCreditLimit) ? 'readonly' : '' ?>
                                   value="{{ isset($availableCreditLimit) ? $numberdocument : old('numberdocument') }}"
                                   required/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">{{ __('Type of Period') }}*</label>
                        <div class="col-sm-8">
                            <select id="periodtype" name="periodtype" class="form-control" 
                                <?= !empty($personsEdit) ? 'readonly' : '' ?>
                                <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> >
                                <option value="00" disabled selected>{{__('Select a type of period')}}</option>
                                @foreach ($periodtypeitemsSis as $ItemsPerTy)
                                <option required
                                    <?= !empty($availableCreditLimit) && $ItemsPeriod == $ItemsPerTy->code ? 'selected' : '' ?>
                                    value="{{ !isset($availableCreditLimit) ?  $ItemsPerTy->code : $ItemsPeriod }}">
                                    {{ $ItemsPerTy->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- zzzzzzzzzzzzzzzzzzzz -->
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">{{ __('Number of Periods') }}*</label>
                        <div class="col-sm-8">
                            <select id="numberperiods" name="numberperiods" class="form-control" 
                                <?= !empty($personsEdit) ? 'readonly' : '' ?>
                                <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> >
                                <option value="00" disabled selected>{{__('Select a number of periods')}}</option>
                            </select>
                        </div>
                    </div>
                    <!-- 
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">
                            {{ __('Cuotas del credito') }}*
                        </label>
                        <div class="col-sm-8">
                            <input type="number" name="months" id="months" class="form-control"
                                   <?= isset($totalDownPayment) ? 'readonly' : '' ?>
                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                                   value="{{isset($totalDownPayment) ? $months : ''}}"
                                   placeholder="{{ __('Cuotas') }}"/>
                        </div>
                    </div>
                    -->
                    <div class="form-group row cupo" style="display: none">
                        <label for="name" class="col-sm-3 col-form-label">{{ __('Cupo Disponible') }}</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="availableCreditLimit"
                                   id="availableCreditLimit" required
                                   readonly
                                   placeholder="{{ __('Cupo Disponible') }}"
                                   <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                                   value=" "/>
                            <div style="margin-top: 15px; display: none" id="cupo-msj-error" class="alert alert-danger"
                                 role="alert">
                                {{__('Cupo no disponible!')}}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row input-row" <?= isset($totalDownPayment) ? ' ' : 'style="display: none"' ?> >
                        <label for="name" class="col-sm-3 col-form-label">
                            {{ __('Valor del credito') }}*
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="creditValue" id="creditValue" class="form-control" readonly
                                   placeholder="{{ __('Valor') }}"/>
                        </div>
                    </div>
                    <div class="form-group row input-totalDownPayment-row " style="display: none">
                        <label for="name" class="col-sm-3 col-form-label">
                            {{ __('Valor de cada cuota/mes') }}
                        </label>
                        <div class="col-sm-8">
                            <input type="text" name="totalDownPayment" id="totalDownPayment"
                                   class="form-control" readonly value=" "/>
                        </div>
                    </div>
                    <div class="form-group row input-token-row" style="display: none">
                        <label for="name" class="col-sm-3 col-form-label">
                            {{ __('Clave dinámica') }}
                        </label>
                        <div class="col-sm-8">
                            <input type="number" name="token" id="token" class="form-control"
                                   value=""/>
                        </div>
                    </div>
                    <div>
                        <button type="button" style="height:36px; margin-right: 67px; width:100%;"
                                class="btn btn-primary btn-consultar" onclick="getCreditLimitClient()"
                                <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                                data-placement="top" data-toggle="tooltip" title="{{ __('Consultar') }}">
                            {{ __('Consultar') }}
                        </button>
                    </div>

                    <div style="display: flex; justify-content: center;">
                        <div class="alert alert-warning alert-token" style="background-color: #f5f5dc; border-color: #f5f5dc; margin-top: 5px;"
                             role="alert">
                        </div>
                    </div>
                    <div>
                        <button id="createSis" type="button" class="btn btn-primary btn-check"
                                style="display: none; margin-right: 67px; width:100%" 
                                data-placement="top" data-toggle="tooltip"
                                title= {{__('Firmar')}}>  {{__('Firmar')}}
                        </button>
                    </div>
                    <div>
                        <div style="display: flex; justify-content: flex-end;">
                            <div class="modal-footer col-12" style="right: 6px; margin-top: 16px;">
                                <button type="button" class="btn btn-warning new-token"
                                        style="display: none; margin-right: 20px; width:7rem; "
                                        onclick="generateNewToken()"
                                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                                        data-placement="top" data-toggle="tooltip" title="{{ __('Nueva Clave') }}">
                                    {{ __('Nueva Clave') }}
                                </button>

                                <button style="width:7rem;" type="button" class="btn btn-danger close-fiado"
                                        data-dismiss="modal"
                                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> data-placement="top"
                                        data-toggle="tooltip" title="{{ __('Cancelar') }}">
                                    {{ __('Cancel') }}
                                </button>
                            </div>
                        </div>

                        <div style="height:42px"></div>
                        <div class="wrapper">
                        </div>
                        <div style="height:42px"></div>
                        <div class="col-md-12">
                            @if(!empty($edit))
                                <div style="height:8px"></div>
                                <input type="hidden" name="{{$nameId}}" value="{{$edit->id}}"/>
                            @endif
                        </div>
                </form>
            </div>
            <div class="modal-footer" style="margin-top: -152px;padding-bottom: 3rem;">
            </div>
        </div>
    </div>
</div>
</div>

<!--modal chat-->
<div class="modal fade" tabindex="-1" role="dialog" id="modalChat">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: beige;">
            <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                <span class="log-cls close">&times;</span>
            </button>
            <div class="modal-header">
                <h5 class="modal-title modal_header_font" id="exampleModalLabel">{{__('Form credit')}}</h5>
            </div>

            <div id="alert" hidden role="alert"></div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-body">
                <div class="container">

                    <div class="form-group row">
                        <label for="typeDocChat" class="col-sm-6 col-form-label">{{ __('Type document') }}</label>
                        <div class="col-sm-6">
                            <select name="type" id="typeDocChat" class="form-control">
                                @foreach ($itemstypedocument as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="name" class="col-sm-6 col-form-label">{{ __('Number Document') }}*</label>
                        <div class="col-sm-6">
                            <input type="text" id="numberDocChat" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button type="button" data-dismiss="modal" style="height:36px; margin-right: 67px; width:100%;"
                        onclick="initialChat()" class="btn btn-primary">
                    {{ __('Acept') }}
                </button>
            </div>

            <br>

            <div class="modal-footer col-12" style="right: 6px; margin-top: 16px;">
                <button style="width:7rem;" type="button" class="btn btn-danger" data-dismiss="modal"
                        onclick="closeClientModal()">{{ __('Cancel') }}
                </button>
            </div>
        </div>
    </div>
</div>

<script>

    $('#periodtype').on('change', function () {

        let period = $('#periodtype').val();
        let valor = $('#txremainingprice').val();
        let cuotas = [];

        if ( period == 15 ) {
            if (valor >=  10000 && valor <=  99999) {
                cuotas.push(1);
            }
            if (valor >= 100000 && valor <= 200000) {
                cuotas.push(1);
                cuotas.push(2);
            }
        } else {
            if ( period == 30 ) {
                if (valor >=  10000 && valor <=  99999) {
                    cuotas.push(1);
                }
                if (valor >= 100000 && valor <= 200000) {
                    cuotas.push(1);
                    cuotas.push(2);
                }
            }
        }

        var $options = $();
        $options = $options.add($("<option>{{ __('Select a number of periods') }}</option>").attr('value', '00' ));
        for (i = 0; i < cuotas.length; i++) {
            $options = $options.add($("<option>").attr('value', cuotas[i]).html( cuotas[i] ));
        }
        $('#numberperiods').html($options).trigger('change');
    });

    function getCreditLimitClient() {

        $.ajax({
            url: '/management/pdvi/getCreditLimitClient',
            type: 'get',
            data: {
                "typedoc": $('#typedoc').val(),
                "numberdocument": $('#numberdocument').val(),
                'periodtype' : $('#periodtype').val(),
                'numberperiods' : $('#numberperiods').val(),
                "creditValue": $('#txremainingprice').val(),
            },
            beforeSend: function (xhr) {
                $(".loader").removeAttr('hidden');
            },
            success: function (response, textStatus, xhr) {
                if (xhr.status === 200) {
                    $(".loader").attr('hidden', true);
                    token = response.data.token.value;
                    $("#msj-error").hide();
                    $("#typedoc").attr('readonly', true);
                    document.getElementById("typedoc").style.pointerEvents = "none";
                    $("#numberdocument").attr('readonly', true);
                    $("#periodtype").attr('readonly', true);
                    document.getElementById("periodtype").style.pointerEvents = "none";
                    $("#numberperiods").attr('readonly', true);
                    document.getElementById("numberperiods").style.pointerEvents = "none";
                    $('.cupo').removeAttr('style');
                    $('#availableCreditLimit').val(response.data2.data.availableCreditLimit);
                    $('.btn-consultar').hide();
                    $('#creditValue').val($('#txremainingprice').val());
                    $('.input-totalDownPayment-row').show();
                    $('#totalDownPayment').val(response.data3.data.totalFeeValue);
                    showInputs();
                    $('.input-token-row').show();
                    $('#real_token').val(response.data.token.value);
                    $('.btn-aproved').hide();
                    $('.btn-check').show();
                    $('#btnCalculate').hide();
                    $('.alert-token').html('Vigente hasta: ' + response.expirationDate);
                    $('.new-token').show();
                    if (response.data2.data.availableCreditLimit === 0) {
                        $('#cupo-msj-error').show();
                        $('.btn-consultar').attr('disabled', true);
                    }
                }
            }, error: function (xhr, ajaxOptions, thrownError) {
                if (xhr.status === 422) {
                    $(".loader").attr('hidden', true);
                    $.each(xhr.responseJSON.errors, function (index, datas) {
                        $('#msj').html(datas);
                        $('#msj-error').fadeIn();
                    });
                } else {
                    $(".loader").attr('hidden', true);
                    $('#msj').html(xhr.responseJSON.errors);
                    $('#msj-error').fadeIn();
                }
            }
        });
    }

    function generateNewToken() {
        $.ajax({
            url: '/management/pdvi/getCreditToken',
            type: 'get',
            data: {
                "typedoc": $('#typedoc').val(),
                "numberdocument": $('#numberdocument').val(),
                "creditValue": $('#creditValue').val(),
                "months": $('#months').val(),
                "availableCreditLimit": $('#availableCreditLimit').val(),
            },
            beforeSend: function (xhr) {
                $(".loader").removeAttr('hidden');
            },
            success: function (response, textStatus, xhr) {
                if (xhr.status === 200) {
                    $(".loader").attr('hidden', true);
                    token = response.data.token.value;
                    $("#msj-error").hide();
                    $('#real_token').val(response.data.token.value);
                    $('.alert-token').html('Nueva Clave vigente hasta: ' + response.expirationDate);
                }
            }, error: function (xhr, ajaxOptions, thrownError) {
                if (xhr.status === 422) {
                    $(".loader").attr('hidden', true);
                    $.each(xhr.responseJSON.errors, function (index, datas) {
                        $('#msj').html(datas);
                        $('#msj-error').fadeIn();
                    });
                } else if (xhr.status === 415 || xhr.status === 500) {
                    $(".loader").attr('hidden', true);
                    $('#msj').html(xhr.responseJSON.errors);
                    $('#msj-error').fadeIn();
                }
            }
        });
    }

    function showInputs() {
        let inputs = ['creditValue',];
        let buttons = ['btnContinue'];

        $(".input-row").removeAttr('style');
        $.each(inputs, function (index, input) {
            $("#" + input).prop('required', true);
        });
        $.each(buttons, function (index, button) {
            $("#" + button).hide();
        });
        $("#btnCalculate").show();
        // $("#type_identification_label").hide()
        // $("#type_identification_label_disabled").show()
        // $("#typedoc").attr('readonly', true);

    }

    function openModalChat() {
        $('#modalChat').modal('show');
    }


</script>
