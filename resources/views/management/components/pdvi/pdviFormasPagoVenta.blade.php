<!-- Modal Forma de Pago -->
<div id="FormaPago" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <label class="col-form-label">Total Factura XXXXXXXXX</label>
                <input type="text" name="txpagototal" id="txpagototal" class="form-control"
                        readonly="readonly">
                <label for="payform_name" class="col-form-label">{{ __('Pay Form') }}</label>
                <select name="payform_name" id="payform_name" class="form-control">
                    @foreach ($itemstypepay as $ItemsLists)
                        <option
                            <?= old('typepay') == $ItemsLists->id ? 'selected' : '' ?> value="{{ $ItemsLists->id }}">{{ $ItemsLists->name }}</option>
                    @endforeach
                </select>
                <label class="col-form-label">Valor Forma de Pago</label>
                <input type="number" name="txvalorpago" id="txvalorpago" value="0" class="form-control">
                <div style="height: 5px"></div>
                <label class="col-form-label">Agregar Forma Pago</label>
                <button id="btnaddfp" class="btn btn-add" type="button" style="background-color:#A9D0F5">
                    +
                </button>
                <div style="height: 7px"></div>
                <div class="col-12 col-12 col-12 col-12" style="height: 20vh; border: gray 2px solid; ">
                    <table id="detallespago"
                            class="table table-responsive table-striped table-border table-condensed table-hover"
                            style="max-height: 18vh;">
                        <thead style="background-color:#A9D0F5">
                        </thead>
                        <tbody id="tbdetallespago" style="overflow-y: scroll;">
                        </tbody>
                    </table>
                </div>

                <label class="col-form-label">Valor Recibido Efectivo</label>
                <input type="number" name="valor_recibido" id="valor_recibido" value="0"
                        class="form-control">
                <label class="col-form-label">Cambio</label>
                <input type="text" name="valor_cambio" id="valor_cambio" value="0" disabled="disabled"
                        class="form-control">

                <label class="col-form-label">Correo de comprador</label>
                <input type="email" name="emailUser" id="emailUser" placeholder="E-Mail"
                        value="juan@m.com"
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control">

                <label for="comment">{{__('Comentarios:')}}</label>
                <textarea class="form-control" rows="3" id="comments" name="comments"></textarea>

            </div>
            <div class="modal-footer" id="modal-preference">
                {{--                                <script id="mercadopago"--}}
                {{--                                        src="https://www.mercadopago.com.co/integrations/v1/web-payment-checkout.js">--}}
                {{--                                </script>--}}
                <button style="width:7rem;" id="btnCancel" class="btn btn-danger" type="button"
                        data-dismiss="modal">{{__('Cancel')}}</button>
                {{--                            <a style="display: none" id="btnMercadopago" target="_blank"--}}
                {{--                               class="btn btn-success btn-lg">{{__('Portal MercadoPago')}}</a>--}}
                <button style="width:7rem;" class="btn btn-success btn-lg" id="btpagarfp">{{__('Pay')}}</button>
            </div>
        </div>
    </div>
</div>
