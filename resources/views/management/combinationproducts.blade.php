<?php $page_title = __('Products of the combo') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<!-- Current Users -->
<div class="panel panel-default" style="margin-top: 110px;">
    <div class="panel-heading">
        <div>
           {{__('Products of the combo')}}
        
      
        </div>
             
           
            <a  type="button"  data-placement="top" data-toggle="tooltip" title="{{ __('Cancel') }}" class="btn btn-primary btn-cancel" href="javascript:window.history.back();"  >  <i class="fa fa-reply"></i> </a>
    
    </div>

    <div class="panel-body">
        <table class="table table-striped table-en task-table">
        </table>
    </div>
</div>

<script>
    jQuery(document).ready(function ($) {
        $(".task-table").DataTable({
            'ajax': '/{{ strtolower($group . '/' . $page) }}/viewlist?id={{ $comboid }}',
            'stateSave': false,
            columns: [
                {data: 'name', name: 'name', title: "{{  __('Product')  }}"},
                
                {data: 'quantity', name: 'quantity', title: "{{ __('Quantity') }}",

                 orderable: false, searchable: false},
                    ]
        });

        $(".btn-cancel").on('click', function () {
            location.href="/{{ strtolower($group . '/combination'  ) }}";
        });
        
    });
</script>

@endsection