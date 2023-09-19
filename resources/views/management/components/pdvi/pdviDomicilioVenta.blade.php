<!--Modal Domicilio-->
<div class="modal fade" id="modalDelivery" data-backdrop="static" data-keyboard="false"
            tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: beige;">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Order Confirmation') }} </h5>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row" style="display: flex;justify-content: space-around;">
                        <div style="margin-left: 27px;">
                            <button type="button" class="btn btn-primary" id="delivery" onclick="addDelivery()"
                                <?= !empty($company) && $company->deliverytype == null ? 'disabled' : '' ?> >
                                {{ __('Home delivery') }}
                            </button>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary" id="noDelivery">
                                {{ __('Store Pickup') }}
                            </button>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
