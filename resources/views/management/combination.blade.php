<?php $page_title = __('Combos') ?>
@extends('pike_template')
@section('content')
    <!-- Display Validation Errors -->
    @include('common.errors')
    <div class="panel-body form-add" style="margin-top: 110px;">

        <!-- New Form -->
        <form action="/{{ $group . '/' . $page }}" method="POST" class="form-horizontal" style="padding-right: 15px;padding-left: 15px">
            <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Combos') }}</div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">
            <div class="form-group row">
                <label for="company" class="col-sm-3 col-form-label">{{ __('Company') }}*</label>
                <div class="col-sm-6">
                    <input type="text"  class="form-control" readonly required value="{{ $companies[0]->name}}"/>
                </div>
            </div>
            <div class="form-group row" style="display: none">
                <label for="company" class="col-sm-3 col-form-label">{{ __('Company') }}*</label>
                <div class="col-sm-6">
                    <select name="company" id="company" class="form-control selectpicker"  data-live-search="true" required>
                        @foreach ($companies as $c)
                            <option selected <?= !empty( $comboEdit ) ? 'selected' : '' ?> value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">{{ __('Name') }}*</label>
                <div class="col-sm-6">
                    <input type="text"  name="name" id="name" class="form-control" required value="{{ !empty($comboEdit) ? $comboEdit->name : '' }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="price_sale" class="col-sm-3 col-form-label">{{ __('Price') }}*</label>

                <div class="col-sm-3">
                    <input type="text" name="calculatedprice" id="calculated_price" class="form-control" readonly/>
                </div>

                <div class="col-sm-3">
                    <input type="text"  name="saleprice" id="special_price" class="form-control" required value="{{ !empty($comboEdit) ? $comboEdit->saleprice : '' }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="status" class="col-sm-3 col-form-label">{{ __('Status') }}*</label>
                <div class="col-sm-6">
                    <select name="status" id="status-name" class="form-control select-status" <?= !empty( $perEdit ) && $perEdit=='disabled' ? 'disabled' : '' ?> required>
                        <option <?= !empty($comboEdit) && $comboEdit->status == "1" ? 'selected' : '' ?> value="1">{{ __('Active') }}</option>
                        <option <?= !empty($comboEdit) && $comboEdit->status == "0" ? 'selected' : '' ?> value="0">{{ __('Inactive') }}</option>
                    </select>
                </div>
            </div>

            <div>
                @include('management.combinationAdd')
            </div>

            <!-- Add Task Button -->
            <div style="height:42px"></div>
            <div class="form-group row">
                <div class="col-sm-offset-3 col-sm-6">
                    @if(!empty($comboEdit))
                        <div style="height: 8px"></div>
                        <input type="hidden" name="catalogId" value="{{ $comboEdit->id }}" />
                    @endif
                    <button type="button" class="btn btn-primary btn-cancel" data-placement="top" data-toggle="tooltip" title="{{ __('Cancel') }}">
                        <i class="fa fa-reply"></i>
                    </button>
                    <button type="submit" class="btn btn-primary" <?= !empty( $comboEdit ) && $comboEdit=='disabled' ? 'disabled' : '' ?>
                    data-placement="top" data-toggle="tooltip" title="{{ __('Save Changes') }}">
                        <i class="fa fa-save"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Current Users -->
    <div class="panel panel-default" style="margin-top: 110px;">
        <div style="padding-top:0px; margin-top:5px" class="panel-heading">Combos

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
            getProducts();

            $(".task-table").DataTable({
                'ajax': '/' + $("#url").val() + '/viewlist',
                columns: [
                    {data: 'id', name: 'combination.id', title: "{{ __('ID') }}"},
                    {data: 'coname', name: 'companies.name', title: "{{ __('Company') }}"},
                    {data: 'cname', name: 'combination.name', title: "{{ __('Name') }}"},
                    {data: 'saleprice', name: 'saleprice', title: "{{ __('Price') }}"},
                    {data: 'estado', name: 'estado', title: "{{ __('Status') }}"},
                    {data: 'action', name: 'action', title: "{{ __('Actions') }}",
                        orderable: false, searchable: false}
                ],
                "order": [[0, "desc"]]
            });

            if($('#company').val() === ''){
                $("#products").append('<option value="">{{ __('Select a Product') }}</option>');
                $("#products").prop('disabled',true);
                $("#quantity").val('1');
                $("#quantity").prop('disabled',true);
            }

            document.getElementById('special_price').setAttribute('type','number');
            $('.quantities_name').attr('type','number');

            @if (!empty($comboEdit) || count($errors) > 0)
                $(".btn-add").trigger("click");
            @endif

            @if(!empty($comboEdit))
                var company = $('#company').val();
                $("#add").prop('disabled',false);
                $('.quantities_name').attr('type','number');

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
                            let calculatedEditPrice = document.getElementById('newcalculatedprice').value;
                            $('#calculated_price').val(Number(calculatedEditPrice).formatMoney(2));
                            $("#products_name").append('<option value="">{{ __('Select a Product') }}</option>');

                            $.each(res.data,function(index,datas){
                                $("#products_name").append('<option value="'+datas.id+'">'+datas.name+'</option>');
                            });
                        }else{
                            console.log('error en la consulta');
                        }
                    }
                });
            @endif

            var productscont = 0;
            var calculatedprice = 0;
            var valueprice = 0;
            var valuepricename = 0;

            function incrementid(classname, count){
                $(".clone-add").find('.'+classname).attr('id', classname+count);
                $(".clone-add").find('.'+classname).attr('cont', count);
                $(".clone-add").find('.btn-delpdf').attr('cont',count);
            }

            function getProducts(){
                var company = $('#company').val();

                $("#products").prop('disabled',false);
                $("#products_name").prop('disabled',false);
                $("#quantity").prop('disabled',false);
                $("#add").prop('disabled',false);

                $('#products_name').empty();
                $("#products_name").append('<option value="">{{ __('Select a Product') }}</option>');

                $('#products').empty();
                $("#products").append('<option value="">{{ __('Select a Product') }}</option>');

                $('#quantity').attr('type','number');

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
                                $("#products_name").append('<option value="'+datas.id+'">'+datas.name+'</option>');
                                $("#products").append('<option value="'+datas.id+'">'+datas.name+'</option>');
                            });
                            $('#products').selectpicker('refresh');
                        }else{
                            console.log('error en la consulta');
                        }
                    }
                });
            }


        $(document).on("click", ".btn-addpdf",function() {
            @if(!empty($comboProduct))
                productscont = $('#totalproducts').val();
            @endif
            productscont++;
            console.log(productscont);
            incrementid('products_name',productscont);
            incrementid('quantities_name',productscont);
            incrementid('prices_name',productscont);
            var html = $(".clone-add").html();
            $('#quantities_name'+productscont).attr('type','number');
        });

        $(document).on("click", ".btn-delpdf",function() {

            var delcont = this.getAttribute('cont');
            var delprice = $('#prices_name'+delcont).val();

            @if(!empty($comboProduct))
                value = Number($('#newcalculatedprice').val());
                value -= Number(delprice);
                $('#newcalculatedprice').val(value);
                $('#calculated_price').val(Number(value).formatMoney(2));
            @else
                valuepricename -= Number(delprice);
                $('#calculated_price').val(Number(valuepricename + valueprice).formatMoney(2));
            @endif

            $(this).parents(".control-group").remove();
        });

        $(document).on("change", ".products_name",function() {
            product = $(this).val();
            cont = $(this).attr('cont');
            quantity = $('#quantities_name'+cont).val();

            $.ajax({
                url:"/"+ $("#url").val()+"/ajax?type=productPrice",
                type:'get',
                data:{
                    "product" : product,
                    "company" : $('#company').val()
                },
                async: false,
                success: function (response) {
                    res = JSON.parse(response);
                    if(res.success){
                        $('#quantities_name'+cont).val(1);

                        if($('#products_name'+cont).attr('product') == 'true') valuepricename -= $('#prices_name'+cont).val();

                        $('#prices_name'+cont).val(Number(res.saleprice));

                        @if(!empty($comboProduct))
                            valuepricename = Number($('#newcalculatedprice').val());
                        @endif

                        valuepricename += Number($('#prices_name'+cont).val());
                        $('#newcalculatedprice').val(valuepricename);

                        $('#products_name'+cont).attr('product',true);
                        $('#products_name'+cont).attr('productprice',res.saleprice);
                        $('#prices_name'+cont).trigger('change');

                        $('#calculated_price').val(Number(valuepricename + valueprice).formatMoney(2));
                    }
                    else{
                        console.log('error en la consulta');
                    }
                }
            });
        });

        $(document).on("change", ".quantities_name",function() {
            quantitycont = $(this).attr('cont');
            saleprice = $('#prices_name'+quantitycont).val();
            quantities = $('#quantities_name'+quantitycont).val();
            productprice = $('#products_name'+quantitycont).attr('productprice');

            @if(!empty($comboEdit))
                valuepricename = Number($('#newcalculatedprice').val());
            @endif

            valuepricename -= $('#prices_name'+quantitycont).val();

            $('#prices_name'+quantitycont).val(Number(productprice * quantities));
            $('#prices_name'+quantitycont).trigger('change');

            valuepricename += Number($('#prices_name'+quantitycont).val());
            $('#calculated_price').val(Number(valuepricename + valueprice).formatMoney(2));
            $('#newcalculatedprice').val(valuepricename);
        });

        $(document).on("change", ".prices_name",function() {
            pricecont = $(this).attr('cont');
            txcalculatedprice = $('#calculated_price').val();
            $('#calculated_price').val(Number(txcalculatedprice).formatMoney(2));
        });

        $(document).on("change", ".prices",function() {
            $('#calculated_price').val(Number(valueprice + valuepricename).formatMoney(2));
        });

        $(".btn-addpdf").click(function(){
            @if(!empty($comboProduct))
                productscont = $('#totalproducts').val();
            @endif
            productscont++;
            $('#totalproducts').val(productscont);
            incrementid('products_name',productscont);
            incrementid('quantities_name',productscont);
            incrementid('prices_name',productscont);
            var html = $(".clone-add").html();
            $(".increment").before(html);
            $('#quantities_name'+productscont).attr('type','number');
        });

        $('#products').on('change',function(){
            product = $(this).val();
            cont = $(this).attr('cont');
            quantity = $('#quantity').val();

            $.ajax({
                url:"/"+ $("#url").val()+"/ajax?type=productPrice",
                type:'get',
                data:{
                    "product" : product,
                },
                async: false,
                success: function (response) {
                    res = JSON.parse(response);
                    if(res.success){
                        $('#products').attr('productprice',res.saleprice);
                        $('#prices').val(Number(res.saleprice));
                        $('#prices').trigger('change');
                        $('#quantity').val(1);
                    }
                    else{
                        console.log('error en la consulta');
                    }
                }
            });
        });

        $('#quantity').on('change',function(){
            quantitycont = $(this).attr('cont');
            saleprice = $('#prices').val();
            quantities = $('#quantity').val();
            productprice = $('#products').attr('productprice');
            $('#prices').val(Number(productprice * quantities));
            $('#prices').trigger('change');
        });

         $('#prices').on('change',function(){
            calculatedprice = Number($('#prices').val());
            valueprice = calculatedprice;
        });
    });

    </script>

@endsection