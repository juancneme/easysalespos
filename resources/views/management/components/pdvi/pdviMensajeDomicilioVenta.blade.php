<!--Modal Mensaje Domicilio-->
<div class="modal fade" id="modalDelivery2" data-backdrop="static" data-keyboard="false"
            tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <button type="button" class="btn btn-primary" id="delivery"
                                    onclick="addDelivery()">{{ __('Home delivery') }}</button>
                        </div>
                        <div class="col-sm">
                            <button type="button" class="btn btn-primary"
                                    id="noDelivery">{{ __('Store Pickup') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
