<body>
<div class="clone-email hide" type="hidden">
    <div class="control-group input-group col-12" style="margin-top:100px">
        {{--        {{ csrf_field() }}--}}
        <input type="hidden" name="idemail[]" value="0">
        <div class="col-md-2">
            <div>
                <label for="tipo">{{ __('Type Email') }}</label>
            </div>
            <div>
                <select name="typecontact_email[]" id="typecontact_email-name" class="form-control"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                    @foreach ($itemsemails as $itemsemail)
                        <option
                                value="{{ $itemsemail->id }}">{{ $itemsemail->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div>
                <label>{{ __('Text Email') }} *</label>
            </div>
            <div>
                <input type="email" name="textcontact_email[]" class="form-control" required
                       <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                       maxlength="50"/>
            </div>
        </div>
        <div class="col-md-2">
            <div>
                <label>{{ __('Default Email') }} *</label>
            </div>
            <div class="kt-form__control">
                <select name="default_email[]" id="default_email-name" class="form-control"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                    <option value="1">{{ __('Yes') }}</option>
                    <option value="0" selected>{{ __('No') }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div>
                <label>{{ __('Status') }} *</label>
            </div>
            <div>
                <select name="status_email[]" id="status_email-name" class="form-control"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                    <option value="1">{{ __('Active') }}</option>
                    <option value="0">{{ __('Inactive') }}</option>
                </select>
            </div>
        </div>
        <div class="input-group-btn col-1" style="margin-top: 29px">
            <button class="btn btn-danger btn-delemail" type="button"><i
                        class="glyphicon glyphicon-remove"></i> {{ __('Delete') }}</button>
        </div>
    </div>
</div>
</body>

<body>
<div class="clone-phone hide">
    <div class="control-group input-group col-12" style="margin-top:100px">
        {{--        {{ csrf_field() }}--}}
        <input type="hidden" name="idphone[]" value="0">
        <div class="col-md-2">
            <div>
                <label for="tipo">{{ __('Type Phone') }} *</label>
            </div>
            <div>

                <select name="typecontact_phone[]" id="typecontact_phone-name" class="form-control"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                    @foreach ($itemsphones as $itemsphone)
                        <option
                                value="{{ $itemsphone->id }}">{{ $itemsphone->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div>
                <label>{{ __('Text Phone') }} *</label>
            </div>
            <div>
                <input type="number" name="textcontact_phone[]" class="form-control" pattern="[0-9]{6,10}"
                       placeholder="{{ __('Phone Number') }}"
                       <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> value=""
                       maxlength="50"/>
            </div>
        </div>
        <div class="col-md-2">
            <div>
                <label>{{ __('Default Phone') }} *</label>
            </div>
            <div class="kt-form__control">
                <select name="default_phone[]" id="default_phone-name" class="form-control"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                    <option value="1">{{ __('Yes') }}</option>
                    <option value="0" selected>{{ __('No') }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div>
                <label>{{ __('Status') }} *</label>
            </div>
            <div>
                <select name="status_phone[]" id="status_phone-name" class="form-control"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                    <option value="1">{{ __('Active') }}</option>
                    <option value="0">{{ __('Inactive') }}</option>
                </select>
            </div>
        </div>
        <div class="input-group-btn col-1" style="margin-top: 29px">
            <button class="btn btn-danger btn-delphone" type="button"><i
                        class="glyphicon glyphicon-remove"></i> {{ __('Delete') }}</button>
        </div>
    </div>
</div>
</body>

<body>
<div class="clone-add hide">
    <div class="control-group input-group col-12" style="margin-top:10px">
        {{--        {{ csrf_field() }}--}}
        <div class="col-md-2">
            <div>
                <label for="tipo">{{ __('Type Address') }}</label>
            </div>
            <div>
                <input type="hidden" name="idaddres[]" value="0">
                <select name="typeaddress[]"  class="form-control"
                        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>

                    @foreach ($itemslocations as $itemslocation)
                        <option

                                value="{{ $itemslocation->id }}">{{ $itemslocation->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div>
                <label>{{ __('Address') }} *</label>
            </div>
            <div>
                <input type="text" placeholder="Dirección" name="address[]"
                       class="form-control"
                       <?php !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> value=""
                       maxlength="50"/>
            </div>
        </div>
        <div class="col-md-2">
            <div>
                <label>{{ __('Postal Code') }}</label>
            </div>
            <div class="kt-form__control">
                <input type="text" placeholder="Código Postal" name="postalcode[]"
                       class="form-control"
                       <?php !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> value=""
                       maxlength="12"/>
            </div>
        </div>
        <div class="col-md-2">
            <label>{{ __('Address Default') }} *</label>
            <select name="default_address[]'" id="default_address-name"
                    class="form-control"
                    <?php !empty($perEdit) ? 'readonly' : '' ?>
                    <?php !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                <option
                    value="1">{{ __('Yes') }}
                </option>
                <option
                    value="0" selected>{{ __('No') }}
                </option>
            </select>
        </div>
        <div class="col-md-2">
            <label>{{ __('Status') }} *</label>
            <select name="status_address[]" id="status_address-name"
                    class="form-control"
                    <?php !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                <option
                    <?php $itemslocation->status == "1" ? 'selected' : ''?> value="1">{{ __('Active') }}
                </option>
                <option
                    <?php $itemslocation->status == "0" ? 'selected' : ''?> value="0">{{ __('Inactive') }}
                </option>
            </select>
        </div>
        <div class="input-group-btn col-1" style="margin-top: 29px">
            <button class="btn btn-danger btn-delpdf" type="button"><i
                        class="glyphicon glyphicon-remove"></i> {{ __('Delete') }}</button>
        </div>
    </div>
</div>
</body>