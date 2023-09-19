<!-- MODAL CONFIRMACION PRODUCTO EN LA VENTA-->
<div class="modal fade" id="modalServices" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning alert-dismissable">
                    {{ __('Are you sure to cancel this sale?')  }}XXXX
                </div>
            </div>
            Valor Recibido Efectivo
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
                <button type="button" class="btn btn-primary btn-services">{{__('Accept')}}</button>
            </div>
        </div>
    </div> 
</div>
