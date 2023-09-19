<?php $page_title = __('Promotions') ?>
@extends('pike_template')
@section('content')
<!-- Display Validation Errors -->
@include('common.errors')
<div class="panel-body form-add" style="margin-top: 110px;">
    
    <!-- New Form -->
    <form action="/{{ $group . '/' . $page }}" method="POST" class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
        <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Promotion') }}</div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
     
        <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">

        <div class="form-group row">
            <label for="company" class="col-sm-3 col-form-label">{{ __('Company') }}*</label>
            <div class="col-sm-6">
                <select name="company" id="company" class="form-control selectpicker"  data-live-search="true" required>
                    <option value="">{{ __('Select a Company') }}</option>
                   @foreach ($companies as $c)
                        <option <?= !empty( $promotionEdit ) ? 'selected' : '' ?> value="{{$c->id}}">{{$c->name}}</option>
                   @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="product" class="col-sm-3 col-form-label">{{ __('Product') }}*</label>
            <div class="col-sm-6">
                <select name="product" id="product-name" class="selectpicker form-control"  data-live-search="true" required>
                    <option value="">{{ __('Select a Product') }}</option>
                    @foreach($products as $p)
                        @if(!empty($promotionEdit))
                            <option selected value="{{ $p->id }}">{{ $p->name }} </option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>


        <div class="form-group row">
            <label for="price" class="col-sm-3 col-form-label">{{ __('Price') }}*</label>
            <div class="col-sm-6">
                <input type="text" disabled name="price" id="price" class="form-control"
                            value=<?= !empty( $promotionEdit ) ? "{$p->saleprice}" : ''?> >
            </div>
        </div>


        <div class="form-group row">
            <label for="price_sale" class="col-sm-3 col-form-label">{{ __('Special Price') }}*</label>
            <div class="col-sm-6">
                <input type="text"  name="saleprice" id="special_price" class="form-control" required value="{{ !empty($promotionEdit) ? $promotionEdit->saleprice : '' }}"/>
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-3 col-form-label">{{ __('Description') }}*</label>
            <div class="col-sm-6">
                <input type="text"  name="description" id="description" class="form-control" required value="{{ !empty($promotionEdit) ? $promotionEdit->description : '' }}"/>
            </div>
        </div>

        <div class="form-group row">
            <label for="starttime" class="col-sm-3 col-form-label">{{ __('Start Date') }}*</label>
            <div class="col-sm-6">
                <input type="date" required name="startdate" id="startdate-name" class="form-control"
                        value=<?= !empty( $promotionEdit ) ? "$promotionEdit->startdate" : ''?> 
                        required min="<?php $hoy = date('Y-m-d'); echo $hoy;?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="enddate" class="col-sm-3 col-form-label">{{ __('End Date') }}*</label>
            <div class="col-sm-6">
                <input type="date" required name="enddate" id="enddate-name" class="form-control"
                value=<?= !empty( $promotionEdit ) ? "$promotionEdit->enddate" : ''?> 
                       required min="<?php $hoy = date('Y-m-d'); echo $hoy;?>">
            </div>
        </div>

        <!-- Add Task Button -->
        <div style="height:42px"></div> 
        <div class="form-group row">
            <div class="col-sm-offset-3 col-sm-6">
                @if(!empty($promotionEdit))
                <div style="height: 8px"></div> 
                <input type="hidden" name="catalogId" value="{{ $promotionEdit->id }}" />
                @endif
                <button type="button" class="btn btn-primary btn-cancel" data-placement="top" data-toggle="tooltip" title="{{ __('Cancel') }}">
                    <i class="fa fa-reply"></i> 
                </button>
                <button type="submit" class="btn btn-primary" <?= !empty( $promotionEdit ) && $promotionEdit=='disabled' ? 'disabled' : '' ?>
                        data-placement="top" data-toggle="tooltip" title="{{ __('Save Changes') }}">
                    <i class="fa fa-save"></i> 
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Current Users -->
<div class="panel panel-default" style="margin-top: 110px;">
    <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Promotions') }}
      
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
                {data: 'id', name: 'id', title: "{{ __('ID') }}"},
                {data: 'companyname', name: 'companies.name', title: "{{ __('Company') }}"},
                {data: 'name', name: 'catalog_products.name', title: "{{ __('Product') }}"},
                {data: 'startdate', name: 'startdate', title: "{{ __('Start date') }}"},
                {data: 'enddate', name: 'enddate', title: "{{ __('End date') }}"},
                {data: 'saleprice', name: 'saleprice', title: "{{ __('Special Price') }}"},
                {data: 'estado', name: 'estado', title: "{{ __('Status') }}"},
                {data: 'action', name: 'action', title: "{{ __('Actions') }}",
                    orderable: false, searchable: false}
            ],
            "order": [[0, "desc"]]


        });

        @if (!empty($promotionEdit) || count($errors) > 0)
            $(".btn-add").trigger("click");
            price = $('#price').val();
            console.log(price);
            $('#price').val(Number(price).formatMoney(2));
        @endif
    });

    $('#company').on('change', function(e){
        var company = e.target.value;

        $('#product-name').empty();
        $("#product-name").append('<option value="">{{ __('Select a Product') }}</option>');

        $.ajax({
            url:"/"+ $("#url").val()+"/ajax?type=selectCompany",
            type:'get',
            data:{
                "id" : company
            },
            async: false,
            success: function (response) {
                res = JSON.parse(response);
                if(res.success){
                    $.each(res.data,function(index,datas){
                        $("#product-name").append('<option value="'+datas.id+'">'+datas.name+'</option>');
                    });
                    $('#product-name').selectpicker('refresh');
                    $('#price').val('');

                }else{
                    console.log('error en la consulta');
                }
            }
        });
    });


    $('#product-name').on('change', function(e){
        var product = e.target.value;

        $.ajax({
            url:"/"+ $("#url").val()+"/ajax?type=selectProduct",
            type:'get',
            data:{
                "id" : product,
                "company": $('#company').val()
            },
            async: false,
            success: function (response) {
                res = JSON.parse(response);
                if(res.success){
                    $.each(res.data,function(index,datas){
                        $price = datas.price != undefined ? datas.price : datas.saleprice;
                       document.getElementById('price').value= $price.formatMoney(2);
                   });
                }else{
                    console.log('error en la consulta');
                }
            }
        });
    });


</script>

@endsection
