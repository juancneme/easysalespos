<!--Modal Codigo QR-->
<div class="modal fade" tabindex="-1" role="dialog" id="modalQr">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: beige;">
            <button type="button" class="close" aria-label="Close" data-dismiss="modal"
                    onclick="setEfectivo()>
                <span class="log-cls close">&times;</span>
            </button>
            <div class="modal-header">
                <h5 class="modal-title modal_header_font">{{ __('Payment with qr wallet') }}</h5>
            </div>
            <div id="alert" hidden role="alert"></div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div>
                <div class="modal-header">
                    <h5 class="modal-title text_modal_secondtext">{{ __('Scan this code with your wallet to make the payment') }}</h5>
                </div>
                <div class="container qr_imagen">
                    <div style="display: none" id="qrCode"
                        class="visible-print text-center">
                    </div>
                </div>
                <div class="modal-footer col-12" style="right: 6px; margin-top: 16px;">
                <button type="button" class="btn btn-danger" data-dismiss="modal" 
                            onclick="setEfectivo()">
                    {{__('Cancel')}}
                </button>
                </div>
            </div>
        </div>
    </div>
</div>

