<!--Modal Credito Local-->
<div class="modal fade" tabindex="-1" role="dialog" id="modalCreditoLocal">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: beige;">
            <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                <span class="log-cls close">&times;</span>
            </button>
            <div class="modal-header">
                 <h5 class="modal-title modal_header_font" id="modalTitle">{{__('Local Credit approval information')}}</h5>
            </div>
            <div id="alert" hidden role="alert"></div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-body">
                <div class="form-group row">
                    <label id="labelField1" for="receipt_number" class="col-sm-6 col-form-label">{{ __('Approval date') }}*</label>
                    <div id="campo_receipt" class="col-sm-5">
                        <input type="date" name="receipt_number" id="receipt_number" class="form-control" max="{{ $datecl }}" value="{{ $datecl }}"
                                <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?>
                                required/>
                    </div>
                </div>

                <div class="form-group row">
                    <label id="labelField2" for="authorization_code" class="col-sm-6 col-form-label">{{ __('Collection Date') }}*</label>    
                    <div class="col-sm-5">
                        <input type="date" name="authorization_code" id="authorization_code" class="form-control" min="{{ $datecl }}" value="{{ $datecl }}"
                                <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?>
                                required >
                        </input>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="txvalorpago" class="col-sm-6 col-form-label">{{ __('Value') }}*</label>
                    <div class="col-sm-5">
                        <input type="text" name="txvalorpago" id="txvalorpago" class="form-control"
                                <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?>
                                required data-type="currency" inputmode="numeric"/>
                    </div>
                </div>

                <div>
                    <button id="btnaddcredit" type="button" style="height:36px; margin-right: 67px; width:100%;"
                            class="btn btn-primary btn-consultar">
                        {{ __('Acept') }}
                    </button>
                </div>

                <br>

                <div class="modal-footer col-12" style="right: 6px; margin-top: 16px;">
                    <button style="width:7rem;" type="button" class="btn btn-danger" data-dismiss="modal">
                        {{ __('Cancel') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ URL::asset('pdviSalePayment/js/modals.js') }}"></script>
