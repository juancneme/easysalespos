<!--Modal Transferencias-->
<div class="modal fade" tabindex="-1" role="dialog" id="modalTransferencia">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: beige;">
            <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                <span class="log-cls close">&times;</span>
            </button>
            <div class="modal-header">
                 <h5 class="modal-title modal_header_font" id="modalTitle_tr">{{__('Bank transfer approval information')}}</h5>
            </div>
            <div id="alert" hidden role="alert"></div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="modal-body">
                <div class="form-group row">
                    <label id="labelField1_tr" for="receipt_number_tr" class="col-sm-6 col-form-label">{{ __('Financial name entity') }}*</label>
                    <!-- //Campo texto -->
                    <div id="campo_receipt_tr" class="col-sm-5">
                        <input type="text"  placeholder="Entidad financiera" name="receipt_number_tr" id="receipt_number_tr" class="form-control"
                                <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?>
                                required />
                    </div>
                </div>

                <div class="form-group row">
                    <label id="labelField2_tr" for="authorization_code_tr" class="col-sm-6 col-form-label">{{ __('Account number') }}*</label>
                    <!-- //campo Numerico -->
                    <div class="col-sm-5">
                        <input  type="number" placeholder="# de referencia" name="authorization_code_tr" id="authorization_code_tr" class="form-control"
                                <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?>
                                required />
                    </div>
                </div>

                <div class="form-group row">
                    <label for="txvalorpago_tr" class="col-sm-6 col-form-label">{{ __('Value') }}*</label>
                    <div class="col-sm-5">
                        <input  type="text" name="txvalorpago_tr" id="txvalorpago_tr" class="form-control"
                                <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?>
                                required data-type="currency" inputmode="numeric"/>
                    </div>
                </div>

                <div>
                    <button id="btnaddtransfer"  type="button" style="height:36px; margin-right: 67px; width:100%;"
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
