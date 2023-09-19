<!-- Modal mensajes ajax -->
<div id="Notificacion" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>
                <label id="headerMessage" class="col-form-label"></label>
                </h3>
            </div>
            <div class="modal-body" style="display: flex; justify-content: center;">
                <label id="lbmensaje" class="col-form-label"></label>
                <input type="text" name="price_new" id="price_new" class="form-control" data-type="currency" inputmode="numeric" style="display: none" placeholder="{{__('Price')}}">
            </div>

            <input type="text" name="name" id="name" class="form-control" style="display: none" placeholder="{{__('Name')}}">

            <div class="modal-footer">
                <button class="btn btn-primary" id="btnAccept" type="button" style="width: 100%;" data-dismiss="modal">
                    {{ __('Accept') }}
                </button>
            </div>
        </div>
    </div>
</div>

