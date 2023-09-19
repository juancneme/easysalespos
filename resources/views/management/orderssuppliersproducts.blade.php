<?php $page_title = __('Products of the supplier') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<!-- Current Users -->
<div class="panel panel-default" style="margin-top: 110px;">
    <div class="panel-heading">
        <div>
           {{__('Products of the supplier')}} - {{__('Supplier')}} - {{$nombre}}
        </div>
    </div>


    <button type="button" class="btn btn-primary btn-cancel" data-placement="top" data-toggle="tooltip" title="{{ __('Cancel') }}">
      <i class="fa fa-reply"></i> 
    </button>
    <div class="panel-body">
        <table class="table table-striped table-en task-table">
        </table>
    </div>





{{-- prueba --}}

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{__('New Quantity')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form action="/{{ $group . '/' . $page.'/newquantity' }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
          <label for="recipient-name" class="col-form-label">{{__('Quantity')}}</label>
            <input type="text" class="form-control" id="cantidad" name="cantidad">

            <input id="url" type="hidden" name="idtd" value="2" >
           
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Send message</button>
          </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
</div>

<script>
    jQuery(document).ready(function ($) {
        $(".task-table").DataTable({
            'ajax': '/{{ strtolower($group . '/' . $page) }}/viewlist?id={{ $pedido }}',
            'stateSave': false,
            columns: [
                {data: 'orderpro.name', name: 'orderpro.name', title: "{{  __('Name')  }}"},
                {data: 'estado', name: 'estado', title: "{{ __('Status') }}"},
                {data: 'totalpro', name: 'totalpro', title: "{{ __('Total Products') }}"},
                {data: 'unit_price', name: 'unit_price', title: "{{ __('valor unitario') }}"},
                {data: 'total_value', name: 'total_value', title: "{{ __('total value') }}"},
                {data: 'action', name: 'action', title: "{{ __('Actions') }}",
                 orderable: false, searchable: false},
                    ],

                    
            "order": [[0, "asc"]]
        });

        $(".btn-cancel").on('click', function () {
            location.href="/{{ strtolower($group . '/orderssuppliers'  ) }}";
        });
        
    });
</script>

@endsection