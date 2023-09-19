<div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ $page_title }}</div>

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">
<input id="countAdd" type="hidden" name="countAdd" value="0">
<input id="countEma" type="hidden" name="countEma" value="0">
<input id="countPho" type="hidden" name="countPho" value="0">
<input id="id_user" type="hidden" name="id_user" value="<?= !empty($user_id) ? $user_id : '' ?>">
<input id="inscription" type="hidden" name="inscription" value="<?= !empty($inscription_id) ? $inscription_id : '' ?>">
<input id="tipoDC" type="hidden" name="tipoDC" value="<?= !empty($tipoDC) ? $tipoDC : '' ?>">


<div class="form-group row">
    <span></span>
    <label for="typeper" class="col-sm-2 col-form-label">{{ __('Type Person') }}*</label>
    <div class="col-sm-9">
        <select name="typeper" id="typeper-name" class="form-control"
                <?= !empty($personsEdit) ? 'readonly' : '' ?>
                <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
            <option value="true" disabled selected>{{__('Select a type of person')}}</option>
            @foreach ($itemstypeperson as $ItemsPerson)
                <option <?= !empty($personsEdit) && $personsEdit->typeperson_id == $ItemsPerson->id ? 'selected' : '' ?>
                        value="{{ $ItemsPerson->id }}">{{ $ItemsPerson->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="typedoc" class="col-sm-2 col-form-label">{{ __('Identification') }}*</label>
    <div class="col-sm-3">
        <select name="typedoc" id="typedoc-name" class="form-control"
                <?= !empty($personsEdit) ? 'readonly' : '' ?>
                <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
            <option value="true" disabled selected>{{__('Select a type of identification')}}</option>
            @foreach ($itemstypedocument as $ItemsDocs)
                <option <?= !empty($personsEdit) && $personsEdit->typedocument_id == $ItemsDocs->id ? 'selected' : '' ?>
                        value="{{ $ItemsDocs->id }}">{{ $ItemsDocs->name }}</option>
            @endforeach
        </select>
    </div>
    <div style="height: 55px"></div>
    <div class="col-sm-4">
        <input type="number"  name="numberdocument" id="numberdocument-name" class="form-control"
               placeholder="{{ __('Number Document') }}"
               <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
               value="{{ !empty($personsEdit) ? $personsEdit->numberdocument : old('numberdocument') }}" required>
    </div>
    <div style="height: 55px"></div>
    <div class="col-sm-2" id="perjur1">
        <input type="number"  name="digitcheck" id="digitcheck-name"
               class="form-control" <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
               value="{{ !empty($personsEdit) ? $personsEdit->digitcheck : old('digitcheck') }}">
    </div>
</div>

<div class="form-group row" id="perjur2">
    <label for="socialreason" class="col-sm-2 col-form-label">{{ __('Social Reason') }}*</label>
    <div class="col-sm-9">
        <input type="text" name="socialreason" id="socialreason-name" class="form-control"
               placeholder="{{ __('Social Reason') }}"
               <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
               style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
               value="{{ !empty($personsEdit) ? $personsEdit->socialreason : old('socialreason') }}">
    </div>
</div>

<div id="pernat1">
    <div class="form-group row">
        <label for="fullname" class="col-sm-2 col-form-label">{{ __('Full Name') }}*</label>
        <div class="col-sm-2">
            <input type="text" name="firstname" id="firstname-name" class="form-control"
                   placeholder="{{ __('First Name') }}"
                   <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                   style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
                   value="{{ !empty($personsEdit) ? $personsEdit->firstname : old('firstname') }}" required>
        </div>
        <div style="height: 55px"></div>
        <div class="col-sm-2">
            <input type="text" name="othernames" id="othernames-name" class="form-control"
                   placeholder="{{ __('Others Names') }}"
                   <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                   style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
                   value="{{ !empty($personsEdit) ? $personsEdit->othernames : old('othernames') }}">
        </div>
        <div style="height: 55px"></div>
        <div class="col-sm-2">
            <input type="text" name="lastname" id="lastname-name" class="form-control"
                   placeholder="{{ __('LastName') }}"
                   <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                   style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
                   value="{{ !empty($personsEdit) ? $personsEdit->lastname : old('lastname') }}" required>
        </div>
        <div style="height: 55px"></div>
        <div class="col-sm-3">
            <input type="text" name="otherlastname" id="otherlastname-name" class="form-control"
                   placeholder="{{ __('Others LastNames') }}"
                   <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                   style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"
                   value="{{ !empty($personsEdit) ? $personsEdit->otherlastname : old('otherlastname') }}">
        </div>
    </div>

    <div class="form-group row" id="divCivil">
        <label for="typecivilstatus" id="civilstatuslabel" class="col-sm-2 col-form-label">{{ __('Civil status')  }}* </label>
        <div class="col-sm-4">
            <select name="typecivilstatus" id="typecivilstatus-name" class="form-control"
                    <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                <option value="true" disabled selected>{{__('select a civil status')}}</option>
                @foreach ($itemstypecivilstatus as $EstadoCivil)
                    <option
                        <?= !empty($personsEdit) && $personsEdit->civilstatus_id == $EstadoCivil->id ? 'selected' : '' ?>  <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> value="{{ $EstadoCivil->id }}">{{ $EstadoCivil->name }}</option>
                @endforeach
            </select>
        </div>

        <label for="typesex" id="sexlabel" style="text-align:justify" class="col-sm-1 col-form-label">{{ __('Sex') }}*</label>
        <div class="col-sm-4 col-form-label" id="divsex"
             style="border: 1px #CED4DA solid; border-radius:5px;border-left-width: 1px;margin-left: 10px;">
            @foreach ($itemsSex as $sex)
                <input type="radio" name="typesex" id="typesex-name" required
                       <?= !empty($personsEdit) && $personsEdit->sex_id == $sex->id ? 'checked' : '' ?>  <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> class="radiocheck"
                       value="{{$sex->id}}"> {{$sex->name}}<br>
            @endforeach
        </div>

    </div>

</div>

<div class="form-group row" id="divVariate">
    <label for="birthdate" class="col-sm-2 col-form-label" id="labelpernat">{{ __('Birthdate') }}*</label>
    <label for="birthdate" class="col-sm-2 col-form-label" id="labelperjur">{{ __('Constitutiondate') }}*</label>
    <div class="col-sm-4">
        <input type="date" name="birthdate" id="birthdate-name" class="form-control"
               <?= isset($viewPerson) ? 'readonly' : ''?>
               <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> value="{{ !empty($personsEdit) ? $personsEdit->birthdate : old('birthdate') }}"
               required>
    </div>

    <label for="status" style="text-align:justify " class="col-sm-1 col-form-label">{{ __('Status') }}*</label>
    <div class="col-sm-4">
        <select name="status" id="estado-name" class="form-control" <?= isset($viewPerson) ? 'readonly' : ''?>
        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
            <option
                <?= !empty($personsEdit) && $personsEdit->status == "1" ? 'selected' : '' ?> value="1">{{ __('Active') }}</option>
            <option
                <?= !empty($personsEdit) && $personsEdit->status == "0" ? 'selected' : '' ?> value="0">{{ __('Inactive') }}</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="localizacion" class="col-sm-2 col-form-label">{{ __('Location') }}*</label>
    <div class="col-3">
        <select name="country" id="country-name" class="form-control" <?= isset($viewPerson) ? 'readonly' : ''?>
        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
            @foreach ($itemscountries as $ItemsContry)
                <option
                    <?= !empty($personsEdit->location) && $personsEdit->location[0]->country_id == $ItemsContry->id ? 'selected' : '' ?>
                    value="{{ $ItemsContry->id }}">{{ $ItemsContry->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-3">
        <select name="state" id="state-name" class="form-control state" <?= isset($viewPerson) ? 'readonly' : ''?>
        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
            @foreach ($itemsstates as $ItemsState)
                <option
                    <?= !empty($personsEdit->location) && $personsEdit->location[0]->deparment_id == $ItemsState->id ? 'selected' : '' ?>
                    value="{{ $ItemsState->code }}" datacode="{{ $ItemsState->code }}">{{ $ItemsState->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-3">
        <select name="city" id="city-name" class="form-control state" <?= isset($viewPerson) ? 'readonly' : ''?>
        <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
            @foreach ($itemscities as $ItemsCity)
                <option
                    <?= !empty($personsEdit->location) && $personsEdit->location[0]->city_id == $ItemsCity->id ? 'selected' : '' ?>
                    value="{{ $ItemsCity->id }}">{{ __($ItemsCity->name) }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row" id="locouthnd">
    <label for="citytext" class="col-sm-2 col-form-label">{{ __('Description Location') }}*</label>
    <div class="col-9">
        <input type="text" name="citytext" id="citytext" class="form-control state"
               <?= isset($viewPerson) ? 'readonly' : ''?>
               placeholder="{{ __('Describe the location outside the country') }}"
               <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> value="{{ !empty($personsEdit->location) ? $personsEdit->location[0]->city : old('citytext') }}">
    </div>
</div>


<!-- START TO ADDRESS LIST--->
<div class="form-group row">
    <label for="direccion" class="col-sm-6 col-form-label">{{ __('ADDRESS LIST') }}</label>
</div>
<body>
<div>
    @if(!empty($personsEdit->location))
        @foreach ($personsEdit->location as $recLocation)
            <div class="control-group input-group col-12" style="margin-top:10px">
                {{--        {{ csrf_field() }}--}}
                <input  type="hidden"  name="idaddres[]" id="addedit" value="{{$recLocation->id}}">
                <div class="col-md-2">
                    <div>
                        <label for="tipo">{{ __('Type Address') }}</label>
                    </div>
                    <div>
                        <select name="typeaddress[]" id="typeper-name" class="form-control"
                                <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                            @foreach ($itemslocations as $itemslocation)
                                <option
                                    <?= $recLocation->typeaddress_id == $itemslocation->id ? 'selected' : ''?>
                                    value="{{ $itemslocation->id }}">{{ $itemslocation->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div>
                        <label>{{ __('Address') }} *</label>
                    </div>
                    <div>
                        <input type="text" onkeypress="return check(event)" placeholder="Dirección" name="address[]"
                               class="form-control"
                               <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> value="{{ !empty($personsEdit->location) ? $recLocation->address : "" }}"
                               maxlength="50"/>
                    </div>
                </div>
                <div class="col-md-2">
                    <div>
                        <label>{{ __('Postal Code') }}</label>
                    </div>
                    <div class="kt-form__control">
                        <input type="number"  placeholder="Código Postal" name="postalcode[]"
                               class="form-control" <?= isset($viewPerson) ? 'readonly' : ''?>
                               <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> value="{{ !empty($personsEdit->location) ? $recLocation->postalcode : '' }}"
                               maxlength="12"/>
                    </div>
                </div>
                <div class="col-md-2">
                    <div>
                        <label>{{ __('Address Default') }} *</label>
                    </div>
                    <div>
                        <select name="default_address[]'" id="default_address-name"
                                class="form-control" <?= isset($viewPerson) ? 'readonly' : ''?>
                                <?= !empty($perEdit) ? 'readonly' : '' ?>
                                <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>

                            <option
                                <?=$recLocation->default == "1" ? 'selected' : ''?> value="1">{{ __('Yes') }}</option>
                            <option
                                <?=$recLocation->default == "0" ? 'selected' : ''?> value="0">{{ __('No') }}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="kt-form__label">
                        <label>{{ __('Status') }} *</label>
                    </div>
                    <div>
                        <select name="status_address[]" id="status_address-name"
                                class="form-control"
                                <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                            <option
                                <?=$recLocation->status == "1" ? 'selected' : ''?> value="1">{{ __('Active') }}</option>
                            <option
                                <?=$recLocation->status == "0" ? 'selected' : ''?> value="0">{{ __('Inactive') }}</option>
                        </select>
                    </div>
                </div>
                <div class="input-group-btn col-1" style="margin-top: 29px">
                    <button class="btn btn-danger btn-editadd" type="button"
                            data-id="{{$recLocation->id}}" <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>>
                        <i
                                class="glyphicon glyphicon-remove"></i> {{ __('Delete') }}</button>
                </div>
            </div>
        @endforeach
        <input type="hidden" name="editadd" id="idadd">
    @else
        <body>
        <div class="">
            <div class="control-group input-group col-12" style="margin-top:10px">
                {{--        {{ csrf_field() }}--}}
                <div class="col-md-2">
                    <div>
                        <label for="tipo">{{ __('Type Address') }}</label>
                    </div>
                    <div>
                        <input type="hidden" name="idaddres[]" value="0">
                        <select name="typeaddress[]" class="form-control"
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
                        <input type="text" onkeypress="return check(event)"  placeholder="Dirección" name="address[]"
                               class="form-control"
                               <?php !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> value=""
                               maxlength="50" required/>
                    </div>
                </div>
                <div class="col-md-2">
                    <div>
                        <label>{{ __('Postal Code') }}</label>
                    </div>
                    <div class="kt-form__control">
                        <input type="number" placeholder="Código Postal" name="postalcode[]"
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
                                value="0">{{ __('Noxxxxx') }}
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
            </div>
        </div>
        </body>
    @endif
</div>
<div class="input-group control-group increment">
    <div class="col-md-11">
        <button class="btn btn-lg btn-block btn-addpdf col-md-12" style="background:#ccc; margin-top: 29px;"
                type="button"><i
                    class="glyphicon glyphicon-plus"></i>{{ __('Btn Address') }}*
        </button>
    </div>
</div>
</body>
<!---- END  ADDRESS LIST--->

<!-- START EMAIL LIST --->
<div class="form-group row" style="margin-top: 29px">
    <label for="direccion" class="col-sm-6 col-form-label">{{ __('eMAILS LIST') }}*</label>
</div>
<body>
<div>
    @if(!empty($personsEdit->contactEmail))
        @foreach ($personsEdit->contactEmail as $recEmail)
            <input type="hidden" id="emailedit" name="idemail[]" value="{{$recEmail->id}}">
            <div class="control-group input-group col-12" style="margin-top:10px">
                {{--{{ csrf_field() }}--}}
                <div class="col-md-2">
                    <div>
                        <label for="tipo">{{ __('Type Email') }}</label>
                    </div>
                    <div>
                        <select name="typecontact_email[]" id="typecontact_email-name" class="form-control"
                                <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                            @foreach ($itemsemails as $itemsemail)
                                <option
                                    <?= $recEmail->typecontact_id == $itemsemail->id ? 'selected' : ''?>
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
                        <input type="email" id="emailtex" name="textcontact_email[]" class="form-control" required
                               <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                               value="{{ !empty($personsEdit->contactEmail) ? $recEmail->textcontact : '' }}"
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
                            <option <?=$recEmail->default == "1" ? 'selected' : ''?> value="1">{{ __('Yes') }}</option>
                            <option <?=$recEmail->default == "0" ? 'selected' : ''?> value="0">{{ __('No') }}</option>
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
                            <option
                                <?= $recEmail->status == "1" ? 'selected' : ''?> value="1">{{ __('Active') }}</option>
                            <option
                                <?= $recEmail->status == "0" ? 'selected' : ''?> value="0">{{ __('Inactive') }}</option>
                        </select>
                    </div>
                </div>
                <div class="input-group-btn col-1" style="margin-top: 29px">

                    <button class="btn btn-danger btn-editemail2 " type="button"
                            data-id="{{$recEmail->id}}" <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>>
                        <i
                                class="glyphicon glyphicon-remove"></i> {{ __('Delete') }}</button>

                </div>
            </div>
        @endforeach
        <input type="hidden" id="prueba" name="editemail">
    @endif
</div>
<div class="input-group control-group increment-email">
    <div class="col-md-11">
        <button class="btn btn-lg btn-block btn-addemail col-md-12" style="background:#ccc; margin-top: 29px"
                type="button"><i
                    class="glyphicon glyphicon-plus"></i>{{ __('Btn Email') }}</button>
    </div>
</div>
</body>
<!-- END EMAIL LIST-->

<!-- START PHONE LIST --->
<div class="form-group row" style="margin-top: 29px">
    <label for="phones" class="col-sm-6 col-form-label">{{ __('PHONES LIST') }}*</label>
</div>
<body>
<div>
    @if(!empty($personsEdit->contactPhone))
        @foreach ($personsEdit->contactPhone as $recPhone)
            <input type="hidden" name="idphone[]" id="phoneedit" value="{{$recPhone->id}}">

            <div class="control-group input-group col-12" style="margin-top:10px">
                {{--        {{ csrf_field() }}--}}
                <div class="col-md-2">
                    <div>
                        <label for="tipo">{{ __('Type Phone') }} *</label>
                    </div>
                    <div>
                        <select name="typecontact_phone[]" id="typecontact_phone-name" class="form-control"
                                <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                            @foreach ($itemsphones as $itemsphone)
                                <option
                                    <?= $recPhone->typecontact_id == $itemsphone->id ? 'selected' : ''?> value="{{ $itemsphone->id }}">{{$itemsphone->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <label>{{ __('Text Phone') }} *</label>
                    </div>
                    <div>
                        <input required type="number" name="textcontact_phone[]" class="form-control"
                               placeholder="{{ __('Phone Number') }}"
                               <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> value="{{ !empty($personsEdit->contactPhone) ? $recPhone->textcontact : '' }}"
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
                            <option <?= $recPhone->default == "1" ? 'selected' : ''?> value="1">{{ __('Yes') }}</option>
                            <option <?= $recPhone->default == "0" ? 'selected' : ''?> value="0">{{ __('No') }}</option>
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
                            <option
                                <?=$recPhone->status == "1" ? 'selected' : ''?> value="1">{{ __('Active') }}</option>
                            <option
                                <?=$recPhone->status == "0" ? 'selected' : ''?> value="0">{{ __('Inactive') }}</option>
                        </select>
                    </div>
                </div>
                <div class="input-group-btn col-1" style="margin-top: 29px">
                    <button class="btn btn-danger btn-editphone" type="button"
                            data-id="{{$recPhone->id}}" <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>>
                        <i
                                class="glyphicon glyphicon-remove"></i> {{ __('Delete') }}</button>
                </div>
            </div>
        @endforeach
        <input type="hidden" name="editphone" id="phone2">
    @endif
</div>
<div class="input-group control-group increment-phone">
    <div class="col-md-11">
        <button class="btn btn-lg btn-block btn-addphone col-md-12" style="background:#ccc; margin-top: 29px"
                type="button"><i
                    class="glyphicon glyphicon-plus"></i>{{ __('Btn Phone') }}</button>
    </div>
</div>
</body>



<script>
    function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true; 
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[ A-Za-z0-9 - -]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>  
 
<!-- END PHONE LIST-->





