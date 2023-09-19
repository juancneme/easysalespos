<form action="{{route('tarjetarecaudo')}}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div id="collection_card_modal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{__('Tarjeta Recaudo')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Favor seleccionar una comercio</p>
                    <select name="company_id" id="company_id" class="form-control" onchange="enableButtons()" required>
                        <option selected disabled>{{__('Select a Companie')}}</option>
                        @foreach($listCompaniesWithProvider as $list)
                            <option required
                                    value="{{ !empty($list->company->id) ? $list->company->id : ''}}">{{ !empty($list->company->name) ? $list->company->name : ''}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary buttonTR"> {{__('Descargar')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
