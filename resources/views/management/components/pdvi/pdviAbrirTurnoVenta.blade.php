<!-- Modal Abrir Turno -->
<div id="AbrirTurno" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top: 0px; margin-bottom: 0px; padding-top: 0px;">

            <div class="modal-body" style="padding-top:0px;">
                <div class="modal-header">
                    <h5 class="modal-title modal_header_font">{{ __('Shift opening') }}</h5>
                </div>

                <input type="hidden" name="txidusuario" id="txidusuario" 
                        value="{{$userid->id}}"
                        class="form-control" disabled="disabled" />

                <label class="col-form-label">{{ __('User Name') }}</label>

                <input type="text" name="txnombreusuario" id="txnombreusuario"
                        value="{{$userid->firstname}} {{$userid->othernames}} {{$userid->lastname}} {{$userid->otherlastname}}"
                        class="form-control" disabled="disabled" />

                <label class="col-form-label">{{ __('Initial cash balance') }}</label>
                @if ($accounts != '')
                <input type="number" name="txsaldocaja" min="0" id="txsaldocaja" readonly
                        value="{{ $accounts->balance_value }}" class="form-control" />
                @else
                <input type="number" name="txsaldocaja" id="txsaldocaja" readonly
                        value="$ 0" class="form-control" />
                @endif

                <label class="col-form-label">{{ __('Date') }}</label>
                <input type="date" name="txfecha" id="txfecha" 
                        class="form-control" disabled="disabled" />

                <label for="payform_name" class="col-form-label">{{ __('Status') }}</label>
                <select name="sltypeshift" id="sltypeshift" class="form-control" 
                        disabled="disabled">
                    @foreach ($itemstypeshift as $ItemsLists)
                        <option <?= old('typepay') == $ItemsLists->id ? 'selected' : '' ?> 
                                value="{{ $ItemsLists->id }}">{{ $ItemsLists->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                <button class="btn btn-success btn-lg btnopen">{{ __('Open Shift') }}</button>
            </div>
        </div>
    </div>
</div>
