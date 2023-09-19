<!--Modal ingreso # TELEFONICO -->
<div class="modal fade modal-service" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">{{__('Phone number')}}</label>
                        <input type="text" class="form-control" title="Digita un número celular"
                                id="service_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                                name="sevice_number" maxlength="10"/>
                    </div>
                    <div class="form-group ">
                        <label for="recipient-name" class="col-form-label">Confirmar numero
                            telefonico</label>
                        <input type="text" class="form-control" title="Digita un número celular"
                                id="confirm_number" oninput="this.value = this.value.replace(/[^0-9.]/g, '')"
                                maxlength="10"/>
                    </div>
                    <div class="col-sm-6" id="alert-div" hidden="hidden">
                        <label class="text-danger">

                        </label>
                    </div>
                </form>
                <div id="divproducto" class="modal-body modal-service">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="close_modal" class="btn btn-secondary" data-dismiss="modal">
                    Close
                </button>
                <button id="send_modal" type="submit" class="btn btn-primary">
                    Enviar
                </button>
            </div>
        </div>
    </div>
</div>
