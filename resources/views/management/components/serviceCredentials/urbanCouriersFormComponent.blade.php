@if(!empty($edit))
    <div style="height:8px"></div>
    <input type="hidden" name="{{$nameId}}" value="{{ $edit->id }}"/>
@endif
<div class="form-group row requerido-couriers" style="display: none;">
    <label for="name" class="col-sm-3 col-form-label">{{ __('Companies') }}*</label>
    <div class="col-sm-6">
        <select name="companies_id" id="companies_id" class="form-control requerido-couriers"
                <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
            @foreach($listCompanies as $list)
                <option <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                        <?=!empty($itemEdit) && $itemEdit->company_id == $list->id ? "selected" : "" ?>
                        value="{{ $list->id }}">{{$list->name}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group row requerido-couriers" style="display: none;">
    <label for="name" class="col-sm-3 col-form-label">{{ __('User id') }}*</label>
    <div class="col-sm-6">
        <input type="text" name="user_name" id="user_name" class="form-control requerido-couriers"
               <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
               value="{{ !empty($itemEdit) ? $itemEdit->user_name : '' }}"/>
    </div>
</div>
<div class="form-group row requerido-couriers" style="display: none;">
    <label for="name" class="col-sm-3 col-form-label">{{ __('Company id') }}*</label>
    <div class="col-sm-6">
        <input type="text" name="password" id="password" class="form-control requerido-couriers "
               <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
               value="{{ !empty($itemEdit) ? $itemEdit->password : '' }}"/>
    </div>
</div>
<div class="form-group row requerido-couriers" style="display: none;">
    <label for="name" class="col-sm-3 col-form-label">Client secret*</label>
    <div class="col-sm-6">
        <input type="text" name="secret_key" id="secret_key" class="form-control requerido-couriers"
               <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
               value="{{ !empty($itemEdit) ? $itemEdit->key : '' }}"/>
    </div>
</div>
<div class="form-group row requerido-couriers" style="display: none;">
    <label for="name" class="col-sm-3 col-form-label">{{ __('Client id') }}*</label>
    <div class="col-sm-6">
        <input type="text" name="accessToken" id="accessToken" class="form-control requerido-couriers"
               <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
               value="{{ !empty($itemEdit) ? $itemEdit->access_token : '' }}"/>
    </div>
</div>
<div class="form-group row requerido-couriers" style="display: none;">
    <label for="name" class="col-sm-3 col-form-label">{{ __('URL') }}*</label>
    <div class="col-sm-6">
        <input type="text" name="end_point" id="end_point" class="form-control requerido-couriers "
               <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
               value="{{ !empty($itemEdit) ? $itemEdit->url_service : '' }}"/>
    </div>
</div>
<div class="form-group row requerido-couriers" style="display: none;">
    <label for="status" class="col-sm-3 col-form-label">{{ __('Type') }}*</label>
    <div class="col-sm-6">
        <input type="text" name="type_url" id="type_url" class="form-control requerido-couriers "
               <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required readonly
               <?= !empty($itemEdit) && $itemEdit->type_url == "PRD" ? 'selected' : '' ?> value="PRD"/>
    </div>
</div>

<div class="form-group row requerido-couriers" style="display: none;">
    <label for="status" class="col-sm-3 col-form-label">{{ __('Status') }}*</label>
    <div class="col-sm-6">
        <select name="status" id="status" class="form-control requerido-couriers"
                <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
            <option
                <?= !empty($itemEdit) && $itemEdit->status == "1" ? 'selected' : '' ?> value="1">{{ __('Active') }}</option>
            <option
                <?= !empty($itemEdit) && $itemEdit->status == "0" ? 'selected' : '' ?> value="0">{{ __('Inactive') }}</option>
        </select>
    </div>
</div>



