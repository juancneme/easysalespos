<?php $page_title = __('Contracts') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<div class="panel-body form-add" style="margin-top: 110px;">

    <form action="/{{ $group . '/' . $page }}" method="POST" autocomplete="off" class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
        <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Contracts') }}</div>
        
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">
        <input id="id_contrac" type="hidden" name="id_contrac" value="<?= !empty($contractEdit) ? $contractEdit->id : '' ?>">
        
        <div class="form-group row">
            <label for="numbercontract" class="col-sm-3 col-form-label">{{ __('Number Contract') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="numbercontract" id="numbercontract-name" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required value="{{ !empty($contractEdit) ? $contractEdit->numbercontract : old('numbercontract') }}" />
            </div>
        </div>

        <div class="form-group row">
            <label for="typecontract" class="col-sm-3 col-form-label">{{ __('Type Contract') }}*</label>
            <div class="col-sm-6">
                <select name="typecontract" id="typecontract-name" class="form-control " <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required>
                    @foreach ($itemstypecontract as $ItemCont)
                    <option <?= !empty($contractEdit) && $contractEdit->typecontract_id == $ItemCont->id ? 'selected' : '' ?> value="{{ $ItemCont->id }}">{{ $ItemCont->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <label for="persona" class="col-sm-3 col-form-label">{{ __('Persons') }}*</label>
            <div class="col-xs-3 col-sm-4 col-md-4  input-bar-item">
                
                <select name="persona" id="persona-name" class="form-control " <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required>
                    <option value="true" selected disabled>{{__('Select a person')}}</option>
                    @foreach ($persons as $persona)
                    <option <?= !empty($contractEdit) && $contractEdit->person_id == $persona->id ? 'selected' : '' ?> value="{{ $persona->id }}">{{ $persona->fullname }}</option>
                    @endforeach
                </select>
            </div>
            <div style="height: 55px"></div>
            
            <div class="col-xs-2 col-sm-2 col-md-2" style="text-align: right; display:{{ !empty($contractEdit) ? 'none' : ''  }};"  >
                <a href="/{{strtolower( $group.'/'.$page.'/addperson' )}}"
                type="button" class="btn btn-primary"
                <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?>  >{{ __('Add Person') }}</a>
            </div>
            
            <div class="col-xs-2 col-sm-2 col-md-2"  style="text-align: right; display:{{ !empty($contractEdit) ? '' : 'none'  }};"  >
                <button type="button" id="edit-person" class="btn btn-info"
                <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?>>{{ __('Edit Person') }}</button>
            </div>    
        </div>

        <div class="form-group row">
            <label for="startdate" class="col-sm-3 col-form-label">{{ __('Start Date') }}*</label>
            <div class="col-sm-6">
                <input type="date" name="startdate" id="start-name" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required value="{{ !empty($contractEdit) ? $contractEdit->startdate : old('startdate') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="enddate" class="col-sm-3 col-form-label">{{ __('End Date') }}*</label>
            <div class="col-sm-6">
                <input type="date" name="enddate" id="enddate-name" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required value="{{ !empty($contractEdit) ? $contractEdit->enddate : old('enddate') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="timebilling" class="col-sm-3 col-form-label">{{ __('Time Billing') }}</label>
            <div class="col-sm-6">
                <input type="text" name="timebilling" id="timebilling-name" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> value="{{ !empty($contractEdit) ? $contractEdit->timebilling : old('timebilling') }}" />
            </div>
        </div>

        <div class="form-group row">
            <label for="taxregime" class="col-sm-3 col-form-label">{{ __('Tax Regime') }}*</label>
            <div class="col-sm-6">
                <select name="taxregime" id="taxregime-name" class="form-control " <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required>
                    @foreach ($itemstyperegime as $ItemRegime)
                    <option <?= !empty($contractEdit) && $contractEdit->taxregime_id == $ItemRegime->id ? 'selected' : '' ?> value="{{ $ItemRegime->id }}">{{ $ItemRegime->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="quantitystores" class="col-sm-3 col-form-label">{{ __('Quantity Stores') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="quantitystores" id="quantitystores-name" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required value="{{ !empty($contractEdit) ? $contractEdit->quantitystores : old('quantitystores') }}" />
            </div>
        </div>

        <div class="form-group row">
            <label for="quantityusers" class="col-sm-3 col-form-label">{{ __('Quantity Users') }}*</label>
            <div class="col-sm-6">
                <input type="text" name="quantityusers" id="quantityusers-name" class="form-control" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required value="{{ !empty($contractEdit) ? $contractEdit->quantityusers : old('quantityusers') }}" />
            </div>
        </div>

        <div class="form-group row">
            <label for="status" class="col-sm-3 col-form-label">{{ __('Status') }} *</label>
            <div class="col-sm-6">
                <select name="status" id="estado-name" class="form-control select-status" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required>
                    <option <?= !empty($contractEdit) && $contractEdit->status == "1" ? 'selected' : '' ?> value="1">{{ __('Active') }}</option>
                    <option <?= !empty($contractEdit) && $contractEdit->status == "0" ? 'selected' : '' ?> value="0">{{ __('Inactive') }}</option>
                </select>
            </div>
        </div>

        <!-- Add Task Button -->
        <div class="form-group row">
            <div class="col-sm-offset-3 col-sm-6">
                @if(!empty($contractEdit))
                <input type="hidden" name="contractId" value="{{ $contractEdit->id }}" />
                @endif
                <button type="button" class="btn btn-primary btn-cancel" data-placement="top" data-toggle="tooltip" title="{{ __('Cancel') }}">
                    <i class="fa fa-reply"></i> 
                </button>
                <button type="submit" class="btn btn-primary" <?= !validatePermission("edit", $page) ? "disabled" : "" ?>
                        data-placement="top" data-toggle="tooltip" title="{{ __('Save Changes') }}">
                    <i class="fa fa-save"></i> 
                </button>
            </div>
        </div>
    </form>
<!--    <hr style="border-color: #ccc" />-->
</div>

<!-- Current Users -->
<div class="panel panel-default" style="margin-top: 110px;">
    <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Contracts') }}

        <button type="button" class="btn btn-primary btn-add"
            <?= !validatePermission("add", $page) ? "disabled" : "" ?> 
            data-placement="top" data-toggle="tooltip" title="{{ __('Add') }}">
            <i class="fa fa-plus"></i> 
        </button>

    </div>

    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-en task-table">
            </table>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function ($) {

        $(".task-table").DataTable({
            'ajax': '/' + $("#url").val() + '/viewlist',
            columns: [
                {data: 'numbercontract', name: 'numbercontract', title: "{{ __('Number Contract') }}"},
                {data: 'type_contract.name', name: 'TypeContract.name', title: "{{ __('Type Contract') }}"},
                {data: 'fullname', name: 'fullname', title: "{{ __('Cliente Contrato') }}"},
                {data: 'startdate', name: 'startdate', title: "{{ __('Start Date') }}"},
                {data: 'enddate', name: 'enddate', title: "{{ __('End Date') }}"},
                {data: 'estado', name: 'estado', title: "{{ __('Status') }}"},
                {data: 'action', name: 'action', title: "{{ __('Actions') }}",
                    orderable: false, searchable: false}
            ],
            "order": [[ 3, 'desc' ], [ 0, 'asc' ]]
        });

        @if (!empty($contractEdit) || count($errors) > 0)
        $(".btn-add").trigger("click");
        @endif

        $(document).on('click',"#edit-person",function(){
            var edit_person = $('#persona-name').val();
            var edit_user = $('#id_contrac').val();
 
            //alert("/{{ strtolower($group)  }}/editperson/ "+  edit_person);
            location.href='/' + $("#url").val() + '/editperson/' + edit_person+'?user='+edit_user;
        });
    });
</script>
@endsection
