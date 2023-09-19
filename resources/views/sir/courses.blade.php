<?php $page_title = __('Courses') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<div class="panel-body form-add" style="margin-top: 110px;">

    <!-- New Form -->
    <form action="/{{ $group . '/' . $page }}" method="POST" enctype="multipart/form-data" class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
        <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Courses') }}</div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
              
        <div class="form-group row">
            <label for="process" class="col-sm-3 col-form-label" >{{ __('Process') }} *</label>
            <div class="col-sm-6">
                <select name="process" id="process-id" class="form-control" required>
                    <option value="">{{ __('Select') }}</option>
                    @foreach($process as $p)
                    <option value="{{ $p->id }}" {{ !empty($coursesEdit) && $coursesEdit->process_id == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="name" class="col-sm-3 col-form-label" >{{ __('Name') }} *</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="name-id" class="form-control" required
                       value="{{ !empty($coursesEdit) ? $coursesEdit->name : old('name') }}" />
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label">{{ __('Description') }} </label>
            <div class="col-sm-6">
                <input type="text" name="description" id="description-id" class="form-control"
                       value="{{ !empty($coursesEdit) ? $coursesEdit->description : old('description') }}" />
            </div>
        </div>
        
        <div class="form-group row">
             <label for="status" class="col-sm-3 col-form-label">{{ __('Status') }}*</label>
            <div class="col-sm-6">
                <select name="status" id="estado-name" class="form-control" required>
                    <option <?= !empty($coursesEdit) && $coursesEdit->status == "1" ? 'selected' : '' ?> value="1">{{ __('Active') }}</option>
                    <option <?= !empty($coursesEdit) && $coursesEdit->status == "0" ? 'selected' : '' ?> value="0">{{ __('Inactive') }}</option>
                </select>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                @if(!empty($coursesEdit))
                <input type="hidden" name="coursesId" value="{{ $coursesEdit->id }}" />
                @endif
                
                <button type="button" class="btn btn-primary btn-cancel" data-placement="top" data-toggle="tooltip" title="{{ __('Cancel') }}">
                    <i class="fa fa-reply"></i>
                </button>
                @if(validatePermission('edit', $page))
                <button type="submit" class="btn btn-primary" data-placement="top" data-toggle="tooltip" title="{{ __('Save Changes') }}">
                    <i class="fa fa-save"></i>
                </button>
                @endif
            </div>
        </div>
    </form>
</div>

<!-- Current Users -->
<div class="panel panel-default" style="margin-top: 110px;">
    <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Courses') }}

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

    var table = $(".task-table").DataTable({
        'ajax': '/sir/courses/viewlist',
        rowReorder: {
            dataSrc: 'sort'
        },
        columns: [ 
            {data: 'sort', name: 'sort', width: '10px', title: "{{ __('Sort') }}", searchable: false},
            {data: 'id', name: 'id', title: "{{ __('ID') }}"},
            {data: 'name', name: 'name', title: "{{ __('Name') }}"},
            {data: 'action', name: 'action', width: '110px', title: "{{ __('Actions') }}", orderable: false, searchable: false}
        ]
    });
    
    table.on( 'row-reorder', function ( e, diff, edit ) {
        result = [];
 
        for ( var i=0, ien=diff.length ; i<ien ; i++ ) {
            var rowData = table.row( diff[i].node ).data();
            result.push({
                id: rowData.id, 
                sort: diff[i].newData
            });
        }
        
        if(result.length > 0){
            console.log("reorder => ", result);
            $.ajax({
                url: '/sir/courses/ajax?type=reorder',
                type: 'post',
                data: {
                    "_token": '{{ csrf_token() }}',
                    "result": result
                },
                succes: function(res){
                    console.log(res);
                }
            });
        }
    });


    @if (!empty($coursesEdit) || count($errors) > 0)
    $(".btn-add").trigger("click");
    @endif

});
</script>
@endsection