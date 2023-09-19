<!--Modal de Mensajes-->
<div class="modal fade" id="modalMessages" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body" style="display:flex; justify-content: center; font-weight: 800;">
            </div>
            <div class="modal-footer">
                <button type="button" id="btnACPT" class="btn btn-primary messages" onclick="cancelInterval()"
                        data-dismiss="modal" style="width:100%;">{{__('Accept')}}</button>
                <a style="display: none" id="btnMercadopago" target="_blank"
                   class="btn btn-success btn-lg">{{__('Portal MercadoPago')}}</a>
            </div>
        </div>
    </div>
</div>
<!--Modal de Mensajes-->
<div class="modal fade" id="modalMessages1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body" style="display:flex; justify-content: center; font-weight: 800;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary messages" onclick="cancelInterval()"
                        data-dismiss="modal" style="width:100%;">{{__('Accept')}}</button>
                <a style="display: none" id="btnMercadopago" target="_blank"
                   class="btn btn-success btn-lg">{{__('Portal MercadoPago')}}</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal de confirmación venta no presencial-->

<div class="modal fade" id="modalConfirmSaleOut" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">

            </div>

            <div class="modal-body" style="display:flex; justify-content: center; font-weight: 800;">

            </div>

            <div class="modal-footer" style="display:block">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnConfirmSaleOut" onclick="confirmSaleOut()" style="width:100%;">{{__('Accept')}}</button>

                <br>
                <br>
                <div style="display: flex;justify-content: flex-end;">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('Cancel')}}</button>
                </div>
            </div>
        </div>
    </div>
</div>
