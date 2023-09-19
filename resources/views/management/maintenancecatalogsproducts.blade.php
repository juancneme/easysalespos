<?php $page_title = __('Inventory Control') ?>
@extends('pike_template')
@section('content')
    <!-- Display Validation Errors -->
    @include('common.errors')
    <div class="panel-body form-add" style="margin-top: 110px;">

        @if (session('message'))
            <div class="alert alert-success" role="alert">
                <strong>{{session('message')}}</strong>
            </div>
    @endif

    <!-- New Form -->
        <form id="form_control_inventory"action="/{{ $group . '/' . $page }}" method="POST" autocomplete="off" enctype="multipart/form-data"
              class="form-horizontal" style="padding-right: 15px;padding-left: 15px">

            <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">

            <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ $page_title }}:
                {{ $catalog }} - {{ $namecatalog }}
            </div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="catalog" id="catalog" value="{{ $catalog }}">
            <input type="hidden" name="productid" value="{{ !empty($catalogproductEdit) ? $catalogproductEdit->id : '' }}"/>

            <div class="form-group row">
                <label for="product" class="col-sm-3 col-form-label">{{ __('Product') }}*</label>
                <div class="col-sm-6">
                    <input type="text" readonly name="product" id="product-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                           value="{{ !empty($productname) ? $productname : '' }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="purchaseprice" class="col-sm-3 col-form-label">{{ __('Purchase Price') }}*</label>
                <div class="col-sm-6">
                    <input  type="text" name="purchaseprice" id="purchaseprice-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                           value="{{ !empty($catalogproductEdit) ? $catalogproductEdit->purchaseprice : '' }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="saleprice" class="col-sm-3 col-form-label">{{ __('Sales Price') }}*</label>
                <div class="col-sm-6">
                    <input  type="text" name="saleprice" id="saleprice-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                           value="{{ !empty($catalogproductEdit) ? $catalogproductEdit->saleprice : '' }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="saleprice" class="col-sm-3 col-form-label">{{ __('Available Quantity') }}*</label>
                <div class="col-sm-6">
                    <input type="text" name="quantity" id="quantity-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                           value="{{ !empty($catalogproductEdit) 
                                        ? ($catalogproductEdit->availablequantity)/explode('|', $catalogproductEdit->Producto->UnidadVenta->code)[3]
                                        : '' }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="status" class="col-sm-3 col-form-label">{{ __('Status') }}*</label>
                <div class="col-sm-6">
                    <select readonly name="status" id="estado-name" class="form-control select-status"
                            <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                        <option
                            <?= !empty($catalogproductEdit) && $catalogproductEdit->status == "1" ? 'selected' : '' ?> value="1">{{ __('Active') }}</option>
                        <option
                            <?= !empty($catalogproductEdit) && $catalogproductEdit->status == "0" ? 'selected' : '' ?> value="0">{{ __('Inactive') }}</option>
                    </select>
                </div>
            </div>

            {{--Agregar Imagen User--}}
            <div class="form-group row" id="ocultarCargaImagen">


                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview fileinput-exists thumbnail" style=" max-height: 200px;"></div>
                    <div style="height: 30px"></div>

                    <div class="row">


                        <div style="height:42px"></div>
                        <!-- Add Task Button -->

                        <div class="col-md-12">
                            @if(!empty($catalogproductEdit))
                                <div style="height: 8px"></div>
                                <input type="hidden" name="catalogproductId" value="{{ $catalogproductEdit->id }}"/>
                            @endif
                            <button type="button" class="btn btn-primary btn-cancel" data-placement="top"
                                    data-toggle="tooltip"
                                    title="{{ __('Cancel') }}">
                                <i class="fa fa-reply"></i>
                            </button>
                            <button id="btn-save" class="btn btn-primary"
                                    <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>
                                    data-placement="top" data-toggle="tooltip" title="{{ __('Save Changes') }}">
                                <i class="fa fa-save"></i>
                            </button>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    </form>
    </div>

    <!-- Current Users -->
    <div class="panel panel-default" style="margin-top: 110px;">
        <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ __('Catalog') }}: {{ $catalog }}
            - {{ $namecatalog }}

            <button type="button" class="btn btn-primary btn-add"
                style="display: none"
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
</div>

    <!-- Modal mensajes  -->
    <div id="NotificacionInventario" class="modal fade" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color:#F5F5DC">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="display:flex; justify-content: center;">
                    <label id="lbmensaje" class="col-form-label"></label>
                    <input type="text" name="price_new" id="price_new" class="form-control" data-type="currency" inputmode="numeric" style="display: none" placeholder="{{__('Price')}}">
                </div>
                <div class="modal-footer" style="display:block;">
                    <a type="submit" id="btnAccept"  class="edit-sale btn btn-primary" style="color: #ffff; width:100%">{{ __('Accept') }}</a> 
                    <br> 
                    <br> 
                    <div style="display:flex; justify-content:flex-end;"> 
                            <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="closeModal()" >{{ __('Close') }} 
                            </button> 
                    </div> 
                </div>
            </div>
        </div>
    </div>

    <script>


        jQuery(document).ready(function ($) {

            $(".task-table").DataTable({
                'serverSide': true,
                'ajax': '/' + $("#url").val() + '/viewlist?id={{ $catalog }}',
                'processing': false,
                'stateSave': false,
                columns: [
                    {data: 'updated_at', name: 'updated_at', title: "{{ __('ID') }}", "visible": false},
                    {data: 'name', name: 'name', title: "{{ __('Product') }}"},
                    {data: 'purchaseprice', name: 'purchaseprice', title: "{{ __('Purchase Price') }}"},
                    {data: 'saleprice', name: 'saleprice', title: "{{ __('Sales Price') }}"},       
                    {data: 'salesUnit', name: 'salesUnit', title: "{{ __('Sales Unit') }}"},
                    {data: 'availablequantity', name: 'availablequantity', title: "{{ __('Available Quantity') }}"},
                    {data: 'barcode', name: 'barcode', title: "{{ __('Barcode') }}"},
                    {data: 'estado', name: 'estado', title: "{{ __('Status') }}"},
                    {
                        data: 'action', name: 'action', title: "{{ __('Actions') }}",
                        orderable: false, searchable: false
                    }
                ],
                "order": [[0, "desc"]]
            });

            @if (!empty($catalogproductEdit) || count($errors) > 0)
                $(".btn-add").trigger("click");
            @endif

            $(".btn-cancel").on('click', function () {
                location.href = "/" + $("#url").val() + "/?id={{ $catalog }}";
            });

            $("#form_control_inventory").on('submit', function (e) {
                e.preventDefault();
                @if (!empty($catalogproductEdit) || count($errors) > 0)
                    let productName = $('#product-name').val();
                    let unit_value = "{{$catalogproductEdit->Producto->UnidadVenta->code}}";
                    unit_value = unit_value.split('|')[3];

                    let old_quantity = '{{$catalogproductEdit->availablequantity}}';
                    old_quantity = parseInt(old_quantity)/parseInt(unit_value);

                    let difference = parseInt($('#quantity-name').val()) - old_quantity;
                    let word = Math.sign(difference) == -1 ? 'menos' : 'más';

                    $('#lbmensaje').text('¡Vas a cambiar la cantidad disponible de  ' + productName + ', ');
                    $('#lbmensaje').append('ahora tendrás ' + Math.abs(difference) + ' productos '  + word + ' disponibles para la venta!');


                    $('#NotificacionInventario').modal('show');
                @endif
            });

            $("#btnAccept").on('click', function(){
                $("#form_control_inventory").unbind('submit');
                $("#form_control_inventory").submit();
            });

        });

    </script>

@endsection
