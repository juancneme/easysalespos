<!-- Modal Cancelar Venta en HTML -->
<div id="CancelarVenta" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content" style="background-color: beige;">
            <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                <span class="log-cls close">&times;</span>
            </button>

            <div class="modal-header">
                <h5 class="modal-title modal_header_font title_canven_1">{{__('Cancel Sale')}}</h5>
            </div>

            <div class="modal-body">
                <h5 class="modal-title text_modal_secondtext title_canven_2">{{ __('Are you sure to cancel this sale?') }}</h5>
            </div>
            
            <div style="margin-bottom: 17px">
                <button  data-dismiss="modal" id="btcancelar" style="height:36px; margin-right: 20px; width:90%; margin-left: 20px; font-weight: bold;"
                        class="btn btn-primary title_canven_3">
                    {{ __('Yes cancel sale') }}
                </button>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-lg "  data-dismiss="modal">
                    {{ __('Return') }}
                </button>
            </div>
        </div>
    </div>
</div>
