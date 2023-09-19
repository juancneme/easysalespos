<?php $page_title = __('Catalogs') ?>
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
        <form action="/{{ $group . '/' . $page }}" method="POST" autocomplete="off" enctype="multipart/form-data"
              class="form-horizontal" style="padding-right: 15px;padding-left: 15px">

            <input id="url" type="hidden" name="url" value="{{ strtolower($group . '/' . $page) }}">

            <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ $page_title }}:
                {{ $catalog }} - {{ $namecatalog }}
            </div>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="catalog" id="catalog" value="{{ $catalog }}">

            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">{{ __('Name Product') }}*</label>
                <div class="col-sm-6">
                    <input type="text" onkeypress="return check(event)" name="name" id="name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                           value="{{ !empty($catalogproductEdit) ? $catalogproductEdit->name : '' }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="category_id" class="col-sm-3 col-form-label">{{ __('Category') }}*</label>
                <div class="col-sm-6">
                    <select name="category_id" id="category-name" class="form-control"
                            <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                        @foreach ($categories as $category)
                            <option
                                <?= !empty($catalogproductEdit) && $catalogproductEdit->category_id == $category->id ? 'selected' : '' ?> value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="supplier_id" class="col-sm-3 col-form-label">{{ __('Distributor') }} *</label>
                <div class="col-sm-6">
                    <select name="supplier_id" id="supplier-name" class="form-control"
                            <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                        @foreach ($suppliers as $supplier)
                            <option
                                <?= !empty($catalogproductEdit) && $catalogproductEdit->supplier_id == $supplier->id ? 'selected' : '' ?> value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="salesunit_id" class="col-sm-3 col-form-label">{{ __('Sales Unit') }}*</label>
                <div class="col-sm-6">
                    <select name="salesunit_id" id="salesunit" class="form-control"
                            <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                        @foreach ($salesunits as $salesunit)
                            <option
                                <?= !empty($catalogproductEdit) && $catalogproductEdit->salesunit_id == $salesunit->id ? 'selected' : '' ?>   value="{{ $salesunit->id }}">{{ $salesunit->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="purchaseprice" class="col-sm-3 col-form-label">{{ __('Purchase Price') }}*</label>
                <div class="col-sm-6">
                    <input type="number" name="purchaseprice" id="purchaseprice-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                           value="{{ !empty($catalogproductEdit) ? $catalogproductEdit->purchaseprice : '' }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="saleprice" class="col-sm-3 col-form-label">{{ __('Sales Price') }}*</label>
                <div class="col-sm-6">
                    <input type="number" name="saleprice" id="saleprice-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                           value="{{ !empty($catalogproductEdit) ? $catalogproductEdit->saleprice : '' }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="barcode" class="col-sm-3 col-form-label">{{ __('Barcode') }}*</label>
                <div class="col-sm-6">
                    <input type="text" name="barcode" id="barcode-name" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                           value="{{ !empty($catalogproductEdit) ? $catalogproductEdit->barcode : '' }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="barcode" class="col-sm-3 col-form-label">{{ __('Volume') }}*</label>
                <div class="col-sm-6">
                    <input type="number"  name="volume" id="volume" class="form-control"
                           <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required
                           value="{{ !empty($catalogproductEdit) ? $catalogproductEdit->volume : '' }}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="salesunit_id" class="col-sm-3 col-form-label">{{ __('Iva') }}*</label>
                <div class="col-sm-6">
                    <select name="taxe" id="taxe" class="form-control"
                            <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?> required>
                        @foreach ($taxes as $tax)
                            <option
                                <?= !empty($catalogproductEdit) && $catalogproductEdit->products_taxe_id == $tax->id ? 'selected' : '' ?>   value="{{ $tax->id }}">{{ $tax->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="status" class="col-sm-3 col-form-label">{{ __('Status') }}*</label>
                <div class="col-sm-6">
                    <select name="status" id="estado-name" class="form-control select-status"
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

                <label for="imageLabel" class="col-sm-3 col-form-label">{{ __('Image') }}*</label>
                <div class="col-md-6">
                    <input type="hidden" name="image"
                           value="{{ !empty($catalogproductEdit) ? $catalogproductEdit->image : '' }}">
                    <img name="image-ppal" id="image-ppal" type='hidden'
                         src="{{ '/support/pictures/config/cate000000.png'}}"
                         class="col-sm-2" style="height: 200px; display: block; max-width:200px;">

                    @if(!empty($catalogproductEdit))
                        <img name="image-view" id="image-view"
                             src="{{$path}}"
                             style="height: 200px;" value="{{ $path.'../products/'.$catalogproductEdit->image }}">
                    @else
                        <img name="image-view" id="image-view" src="{{ $defaultPath }}" style="height: 200px;"
                             value="{{ $defaultPath }}">
                    @endif

                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview fileinput-exists thumbnail" style=" max-height: 200px;"></div>
                        <div style="height: 30px"></div>

                        <div class="row">

                            <div class="col-md-6">
                                <label for="image" class="subir file-inputpdv" title="Buscar tu imagen"
                                       style="width:100%; height:82%; text-align: center;">
                                    <i style="padding-right: 0px"
                                       class="fa fa-search btn btn-primary btn-file fileinput-new"></i> {{__('Select Image')}}
                                    <input style="display: none" type="file" name="image_file" accept=".png,image/png"
                                           id="image" <?= !empty($perEdit) && $perEdit == 'disabled' ? 'disabled' : '' ?>>
                                </label>
                            </div>

                            <div class="col-md-6">
                                @if(!empty($catalogproductEdit))
                                    <button id="quitarimagen"
                                            <?= $catalogproductEdit->image_temporary == '' ? 'disabled' : '' ?> type="button"
                                            title="Subir y ver tu imagen"
                                    <i class="fa fa-trash-o btn btn-success" style="width:100%"
                                       data-dismiss="fileinput"></i> {{__('Remove')}}
                                    </button>
                                @else
                                    <button id="quitarimagen" disabled type="button" title="Subir y ver tu imagen"
                                    <i class="fa fa-trash-o btn btn-success" style="width:100%"
                                       data-dismiss="fileinput"></i> {{__('Remove')}}
                                    </button>
                                @endif
                            </div>

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
                                <button type="submit" class="btn btn-primary"
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
        <div style="padding-top:0px; margin-top:5px" class="panel-heading">{{ $page_title }}: {{ $catalog }}
            - {{ $namecatalog }}

            <button type="button" class="btn btn-primary btn-add"
                <?= !validatePermission("add", $page) ? "disabled" : "" ?>
                data-placement="top" data-toggle="tooltip" title="{{ __('Add') }}">
                <i class="fa fa-plus"></i>
            </button>
{{--            @if(!empty($type))--}}
{{--                @if($type)--}}
{{--                    @if($existproducts)--}}
                        @component('management.components.modalImportExcel.modalImportExcel')
                            @slot('page',$page)
                            @slot('group',$group)
                            @slot('units','53')  // LISTA DE UNIDADES DE VENTA
                            @slot('nametable','catalog_products')
                            @slot('exceptionfields', 'product_id|image_temporary|status|idpartner')
                            @slot('catalog', $catalog)
                        @endcomponent
{{--                    @endif--}}
{{--                @endif--}}
{{--            @endif--}}
        </div>

        @if(auth()->user()->hasRole('admin'))
            <form type="get" action="/{{ strtolower( $group . '/' . $page.'/deleteallproducts/'. $catalog)}}  " >
                <button type="submit" class="btn btn-danger btn-rounded btn-lg">Borrar productos</button>
            </form>
        @endif

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-en task-table">
                </table>
            </div>
        </div>
    </div>

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


        jQuery(document).ready(function ($) {

            $(".task-table").DataTable({
                'serverSide': true,
                'ajax': '/' + $("#url").val() + '/viewlist?id={{ $catalog }}',
                'processing': false,
                'stateSave': false,
                columns: [
                    //{data: 'catalogo.name', name: 'Catalogo.name', title: "{{ __('Catalog') }}"},
                    {data: 'categoria', name: 'categoria', title: "{{ __('Category') }}"},
                    {data: 'name', name: 'name', title: "{{ __('Product') }}"},
                    {data: 'saleprice', name: 'saleprice', title: "{{ __('Sales Price') }}"},
                    {data: 'image', name: 'image', title: "{{ __('Image') }}"},
                    {data: 'barcode', name: 'barcode', title: "{{ __('Barcode') }}"},
                    {data: 'estado', name: 'estado', title: "{{ __('Status') }}"}, 
                    {
                        data: 'action', name: 'action', title: "{{ __('Actions') }}",
                        orderable: false, searchable: false
                    }
                ],
                "order": [[0, "asc"]]
            });

            @if (!empty($catalogproductEdit) || count($errors) > 0)
            $(".btn-add").trigger("click");
//        $("#ocultarCargaImagen").show();
            @endif

            $('#image-ppal').hide();

            function readURL(input) {
                if (input.files && input.files[0]) {

                    $('#image-ppal').hide();
                    $("#image-view").hide();
                    $("#quitarimagen").removeAttr('disabled');

                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#image").change(function () {
                readURL(this);
            });

            $(document).on('click', "#quitarimagen", function () {
                $('#image-ppal').show();
                $("#image-view").hide();
                $("#quitarimagen").attr('disabled', 'disabled');
            });

            $(".btn-cancel").on('click', function () {
                location.href = "/" + $("#url").val() + "/?id={{ $catalog }}";
            });

            $('#salesunit-name option:not(:selected)').attr('disabled', true);
            $('#product-name').on('change', function (e) {
                var product = e.target.value;
                console.log(product);

                $.ajax({
                    url: "/" + $("#url").val() + "/ajax?type=selectProduct",
                    type: 'get',
                    data: {
                        "id": product
                    },
                    async: false,
                    success: function (response) {
                        res = JSON.parse(response);
                        if (res.success) {
                            $.each(res.data, function (index, datas) {
                                console.log('datas: ' + datas);
                                document.getElementById('barcode-name').value = datas.barcode;
                                document.getElementById('salesunit').value = datas.sales_unit.id;
                                document.getElementById('name').value = datas.name;
                                document.getElementById('image-view').src = "/support/pictures/products/" + datas.pictures.name;
                            });
                        } else {
                            console.log('error en la consulta');
                        }
                    }
                });
            });
        });

    </script>

@endsection
