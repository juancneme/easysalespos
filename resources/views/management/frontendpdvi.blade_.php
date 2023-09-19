    <!-- INICIO FROTEND PDVi -->
    <div id="main" class="row" style='height:auto; margin-top: 110px;'>
        <input type="hidden" name="esvirtual" id="esvirtual" value="{{ $esvirtual }}"/>

        <div style="height: 2%"></div>

        @if ($typetransaction == 'sales')
        <!--Carrito pdvi fisico responsive inicio-->
        @if (!$esvirtual)
        <div class="row col-sm-12 tab_class">
            <button style="background-color:#57961a; border-color: #57961a; color:#ffff" class="col-sm-5 view_product">{{ __('The Products') }}
            </button>
            <button class="col-sm-5 view_purchase" style="background-color:#57961a; border-color: #57961a; color:#ffff">
                <div style="display: flex; justify-content: center;">
                    <div>{{ __('The purchase') }}</div> 
                    <div style="display: flex;align-items:center; justify-content:center; width:7vw;">
                        <img src="/support/pictures/config/carrito.svg" style="position: absolute; vertical-align:middle; height:9vh; max-width:35px;" alt="Carrito de compras">
                        <div id="canttotal2" style="display:flex; align-items:center; justify-content: center; height: 18px; width: 18px; border-radius: 50%; background-color: #D00000; color: #FFFFFF; margin-top:-18px; margin-left:3.4px;">
                            <p style="margin-top:13px;">0</p>
                        </div>
                        <br>
                    </div>
                </div> 
            </button>
        </div>
        <!--Carrito pdvi fisico responsive fin-->
        @endif
        @endif

        <div style="height: 2%"></div>

        <!--FRAMEWORK PRODUCTOS inicio-->
        @if($esvirtual)
        <div class="col-lg-12 col-md-12 col-sm-12 product_class" 
             style="height:auto;padding-left: 2px;padding-right: 2px;">
        @else
        <div class="col-lg-8 col-md-12 col-sm-12 product_class" 
             style="height:auto;padding-left: 2px;padding-right: 2px;">
            @endif

            <!--CARROUSEL CATEGORIAS inicio--> 
            <!--BORDE-->
            @if($esvirtual)
            <div class="barProd" style="background:#FFF; border: #d2cfcf 2px solid;border-bottom-width: 1px;">
            @else
            <div class="barProd" style="background:#E5E5E5; border: #d2cfcf 2px solid;border-bottom-width: 1px; 
                        height: 16%; min-height:126px; max-height:144px; margin-bottom: -45px;">
                @endif

                <input type="hidden" name="txidpago" id="txidpago" class="form-control" value="0"/>
                @if ($shiftid != '')
                <input type="hidden" name="txidturno" id="txidturno" class="form-control" value="{{ $shiftid->id }}"/>
                @else
                <input type="hidden" name="txidturno" id="txidturno" class="form-control" value="0"/>
                @endif

                <!--CARROUSEL PRODUCTOS INICIO-->
                <!--BARRA BUSCAR POR CODEBAR-->
                @if ($typetransaction == 'sales')                        
                <div class="col-12" id="divbarcode" style="background-color:#E5E5E5">
                    <div class="row">
                        <div class="col-10 item">
                            <input type="text" name="name-code" id="name-code" class="form-control"
                                    style="font-size: 1em; border: 1px solid #585858; margin-top: 20px;
                                    background-image:url('/support/pictures/config/codebars.png'); 
                                    box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51);
                                    -webkit-box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51); 
                                    -moz-box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51);" />
                        </div>
                        <div title="Regresar a los productos" class="col-2"
                                style="text-align: right; padding-right: 24px;">
                            <i class="fa fa-times fa-5x img-responsive btnback" data-filter="find"
                                    style="cursor:pointer; margin-right: 15px; color: #424242;">
                            </i>
                        </div>
                    </div>
                </div>
                @endif
                <input type="hidden" name="person_id" id="person_id"
                        class="form-control"
                        @if(!empty(auth()->guard('client')->user()))
                        value="{{ auth()->guard('client')->user()->person_id }}"
                        @endif
                        />

                <!--INCLUIR CATEGORIAS-->
                @if(!$esvirtual)
                <div id="divcategorias" style="margin-bottom:0%; text-align: center; margin-top: 5vh; height: 130px" class="divcategoriasf container-fluid">
                @else
                <div id="divcategorias" style="margin-bottom:0%; text-align: center; margin-top: 5vh; height: 130px" class="divcategoriasv container-fluid">
                @endif
                

                    <!--ini-->
                    <div class="categorias owl-carousel" style="line-height: 0.6;font-weight: 100; width:100%;  margin-right:5%;">

                        @if(!$esvirtual)
                        <!-- BOTON BUSCAR -->
                        <div title="Buscar escribiendo">
                            <figure>
                                <img name="btnbuscar" id="btnbuscar" src="{{ '/support/pictures/config/search000000.png' }}"
                                    class="filter-button" data-filter="find"
                                    style='border: 1px #0074a5; height:85px; width:85px; margin:auto; box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51);-webkit-box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51); -moz-box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51);'>
                            <figcaption style="cursor:pointer; font-weight:bold; color: #5d5d5d; margin-top: 10px;">{{ strtoupper(__('Search')) }}</figcaption>
                            </figure>
                        </div>

                        <!--
                        BOTON BUSCAR CODIGO DE BARRAS
                        @if ($typetransaction == 'sales')                        
                        <div title="Buscar código de barras" class="bar-code">
                            <figure>
                                <img name="btnbarcode" id="btnbarcode"
                                    src="{{ '/support/pictures/config/searchcode00.png' }}"
                                    class="filter-button" data-filter="barcode"
                                    style='border: 1px #0074a5; height:85px; width:85px; margin:auto; box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51);-webkit-box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51); -moz-box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51);'>
                            <figcaption style="cursor:pointer; font-weight:bold; color: #5d5d5d; margin-top: 10px;">{{ strtoupper(__('Code')) }}</figcaption>
                            </figure>
                        </div>
                        @endif
                        -->
                        @endif

                        <!-- BOTON COMBOS cuando tiene combos defindos -->
                        @if ($typetransaction == 'sales')                        
                        @if(count($combos)>0)
                        @if(!is_null($catalog) || !is_null($masterCatalog))
                        <div>
                            <figure>
                                    <img name="btncombos" id="btncombos"
                                    src="{{ '/support/pictures/categories/cate000034.png' }}"
                                    class="filter-button" data-filter="combos"
                                    style='border: 1px #0074a5; height:85px; width:85px; margin:auto; box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51);-webkit-box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51); -moz-box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51);'>
                                    <figcaption style="cursor:pointer; font-weight:bold; color: #5d5d5d; margin-top: 10px;">{{ strtoupper(__('Combos')) }}</figcaption>
                            </figure>
                        </div>
                        @endif
                        @endif

                        <!-- BOTON PROMOCIONES cuando tiene promociones definidos -->
                        @if(count($promotions)>0)
                        @if(!is_null($catalog) || !is_null($masterCatalog))
                        <div>
                            <figure>
                                    <img name="btncombos" id="btncombos"
                                    src="{{ '/support/pictures/categories/cate000035.png' }}"
                                    class="filter-button" data-filter="promotions"
                                    style='border: 1px #0074a5; height:85px; width:85px; margin:auto; box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51);-webkit-box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51); -moz-box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51);'>
                            <figcaption style="cursor:pointer; font-weight:bold; color: #5d5d5d; margin-top: 10px;">{{ strtoupper(__('Promotions')) }}</figcaption>
                            </figure>
                        </div>
                        @endif
                        @endif
                        @endif

                        <!-- ICONOS CATEGORIAS -->
                        @if ($categories != '')
                        @foreach ($categories as $category)
                        @if(count($category->ProductsCatalog)> 0 || $category->tienehijos)
                        @if(!$category->eshijo)
                        <div class="img-cate">
                            @if ($esvirtual)
                            <figure class="" style="margin-bottom: 3px;">
                                <a class="container-img"
                                        data-filter="{{ $category->id }}"
                                        data-padre="{{ $category->tienehijos }}"
                                        >
                                    <img src="{{ empty($category->image) || !file_exists(public_path().'/support/pictures/categories/'.$category->image)
                                            ? '/support/pictures/config/cate000000.png'
                                            : '/support/pictures/categories/'.$category->image }}" 
                                        class="filter-button cat{{ $category->id }} " 
                                        style='font-weight:bold; height:85px; width:85px; margin:auto; box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51);-webkit-box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51); -moz-box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51);'
                                        alt="Seleccione categoria"
                                        data-filter="{{ $category->id }}"
                                        data-padre="{{ $category->tienehijos }}"
                                    >
                                </a>
                                <a class="filter-button cat{{ $category->id }} btn" style='font-weight:bold; 
                                        background-color: #C3BFBE;
                                        border: 5px #ff0000;
                                        margin-top: 5px;
                                        margin-right: 2px;
                                        width:100px;
                                        border-radius:5px;
                                        box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51);-webkit-box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51); -moz-box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51);
                                        '>{{ strtoupper($category->shortname) }}</a>
                            </figure>
                            @else
                            <figure>
                                <img src="{{ empty($category->image) || !file_exists(public_path().'/support/pictures/categories/'.$category->image)
                                            ? '/support/pictures/config/cate000000.png'
                                            : '/support/pictures/categories/'.$category->image }}"
                                    class="filter-button cat{{ $category->id }}" 
                                    data-filter="{{ $category->id }}"
                                    data-padre="{{ $category->tienehijos }}"
                                    style='font-weight:bold; height:85px; width:85px; margin:auto; box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51);-webkit-box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51); -moz-box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51);'>
                                <figcaption style="cursor:pointer; font-weight:bold; color: #5d5d5d; margin-top: 10px;">{{ strtoupper($category->shortname) }}</figcaption>
                            </figure>
                            @endif
                        </div>
                        @endif
                        @endif
                        @endforeach
                        @endif
                    </div>
                </div>

                <!--INCLUIR SUB-CATEGORIAS inicio-->
                @if ($typetransaction == 'sales')
                <div id="divsubcategorias"
                        style="margin-top:0%; margin-bottom:0%; text-align: center; margin-top: 2%; height: 20%"
                        class="container-fluid">
                    <div class="categorias owl-carousel" style="line-height: 0.6;font-weight: 100; width: 785px">
                        @foreach ($subcategories as $subcategorie)
                        @if(count($subcategorie->ProductsCatalog)> 0)
                        <div class="img-subcate  subcategory{{$subcategorie->idowner}}">
                            <figure>
                                <img
                                    @if(strpos($subcategorie->image,'https://')!== false)
                                    src="{{$subcategorie->image }}"
                                    @else
                                    src="{{ '/support/pictures/categories/'.$subcategorie->image }}"
                                    @endif
                                    class="filter-button" data-filter="{{ $subcategorie->id }}"
                                    style='border: 1px #0074a5; font-weight:bold; height:85px; width:85px; margin:auto;'>
                            <figcaption style="cursor:pointer; font-weight:bold; color: #5d5d5d; margin-top: 10px;">{{ strtoupper($subcategorie->shortname) }}</figcaption>
                            </figure>

                        </div>
                        @endif
                        @endforeach
                    </div>
                    <div class="col-2" style="text-align: right;width: 700px; margin-top: -80px">
                        <i class="fa fa-times fa-5x img-responsive btnback" data-filter="find" style="cursor:pointer; margin-left: 710px; margin-top: -170px;
                        color: #424242; visibility:hidden; "></i>
                    </div>
                </div>
                @endif
                <!--INCLUIR SUB-CATEGORIAS fin-->

                <!--BUSCAR DENTRO DEL CARROUSEL inicio-->
                <div class="col-12" id="divbuscar">
                    <div class="row" style="display:flex; flex-direction:row; align-content:center; align-items:flex-end;">
                        <div class="col-9 input-bar-item">
                            <input tabindex="0"  placeholder="{{ __('What are you looking for?') }}" name="name-buscar"
                                    id="name-buscar" class="form-control"
                                    style="font-size: 1em; border: 1px solid #585858; margin-top: 20px" />
                                    
                        </div>

                        <div class="row">
                            <div title="Buscar Productos" class="col-4"
                                    style="text-align: right; padding-right: 10px; float: left;">
                                <i class="fa fa-4x img-responsive fa-search btn_search" data-filter="find"
                                    style="cursor:pointer; margin-right: 15px; color: #5d5d5d; padding-top:22px;"></i>
                            </div>
                            
                            <div title="Regresar a los productos" class="col-4"
                                    style="text-align: right; padding-right: 34px;">
                                <i class="fa fa-times fa-3x img-responsive btnback" data-filter="find"
                                    style="cursor:pointer; margin-right: 15px; color: #00a2e8; "></i>
                            </div>
                        </div>

                    </div>
                </div>
                <!--BUSCAR DENTRO DEL CARROUSEL fin-->
            </div>
            <!--CARROUSEL CATEGORIAS inicio-->

            <!--GALERIA PRODUCTOS inicio-->
            <!--Fondo productos-->
            @if($esvirtual)
            <div style="border: #D2CFCF 2px solid; background-color:#FFF;border-top-width: 1px; 
                        height: 63.622vh;">
            @else
            <div style="border: #D2CFCF 2px solid; background-color:#F0EEEE;border-top-width: 1px; 
                        height: 63.622vh;">
                @endif
                <div class="row" style="height: 66vh;">
                    <div class="perfectScrollbarContainer" style="height: 63.2vh;">
                        <div id='category0' style="display: none; padding-left: 7px;padding-right: 7px; 
                                 display: flex; flex-wrap: wrap; justify-content: space-evenly; ">
                        </div>
                    </div>
                </div>
            </div>
            <!--GALERIA PRODUCTOS fin-->
        </div>
        <!--FRAMEWORK PRODUCTOS fin-->

        <!--FRAMEWORK TIRILLA inicio-->
        @if($esvirtual)
        <div id="mySidenav" class="sidenav col-lg-6 col-md-12 col-sm-12 sales_class" 
             style="height:80.6vh !important; padding-left: 2px;padding-right: 2px; right:11px; 
                    width: 96vw; top: 109px; padding-top: 0px; max-height:601;">
        <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">x</a>-->
        @else
        <div class="col-lg-4 col-md-12 col-sm-12 sales_class" 
             style="height:80vh; padding-left: 2px;padding-right: 2px;">
            @endif
            <!--CABECERA CLIENTE inicio-->
            @if ($typetransaction == 'sales')
            <div class='row' style="border-color:#D2CFCF; border-left-width: 2px; 
                    border-left-style: solid;border-top-width: 2px;
                    border-top-style: solid;border-bottom-width: 2px;border-bottom-style: 
                    solid;border-right-width: 2px;
                    border-right-style: solid;margin-left: 0px;margin-right: 0px;">

                <div id="clientdiv" class="col-10" style="margin-top:0px; padding-left: 5px; 
                        padding-top: 0.5vh; padding-bottom: 0.5vh; display:flex;" >

                    @if(in_array('107', $payments_id))
                    <div class="applysistecredit">
                            <button type="button" id="fiado" onclick="openModalChatFiado()" style="height: 36px; margin-right: 9px; width: 90vw; font-size: 1.1rem; max-width: 77px;padding-left: 15px; 
                                                                                        padding-top: 4px" class="btn btn-rounded btn-warning btn-lg">
                                <div style="color:#fff;" class="modal-title modal_header_font">{{ __('Fiado') }}</div>
                            </button>
                    </div>
                    @endif

                    <select name="client_name" id="client_name" class="form-control" data-live-search="true">
                        @if(!empty($client))
                            @foreach($client as $c)
                                <option value="{{auth()->guard('client')->user()->client_id}}">{{$c->socialreason}} {{$c->firstname}} {{$c->othernames}}
                                    {{$c->lastname}} {{$c->otherlastname}}
                                </option>
                            @endforeach
                        @else
                            @if ($typetransaction == 'sales')
                            <option value="default">Cliente Mostrador</option>
                            @else
                            <option value="default">Proveedor Productos</option>
                            @endif
                        @endif
                    </select>
                </div>

                @if ($esvirtual)
                <div class="col-2 view_product" style="padding-top: 0.5vh; padding-bottom: 0.5vh; padding-right: 0px; padding-left: 0px;">
                    <button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Regresar a los productos" style="border-radius: 5px; width: 92%;"><i class="fa fa-undo" aria-hidden="true" style="font-size:21px;" ></i>
                    </button>
                </div>  
                @else

                @if(empty(auth()->guard('client')->user()))
                <div class="col-2 " style="padding-top: 0.5vh; padding-bottom: 0.5vh; padding-right: 0px; padding-left: 0px;">
                    <a class="add-client" 
                        id="searchClient" 
                        onclick="addNewClientModal()">
                        <i class="fa fa-search" style="color: #00a2e8; font-size: 20px; margin: 3px;"></i>
                    </abs>

                    <button class="btn-primary add-client" style="display: none; width:36px; border-radius:5px;" id="btn_clean"
                            onclick="cleanClient()">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
                @endif

                @if(auth()->guard('client')->user())
                @if($salesOnHold)
                <div class="col-2 " style="padding-top: 0.5vh; padding-bottom: 0.5vh; 
                                            padding-right: 0px; padding-left: 0px;">
                    <a type="button" href="/management/pdvi/edit/{{$salesOnHold[0]->id}}" 
                            class="btn-warning sale-on-hold" 
                            style="border-radius: 5px; width: 25px; height: 25px; 
                                    margin-top: 6px; margin-left: 0px;" 
                            title="Tienes compras pendientes">
                        <i class="fa fa-shopping-cart" style="margin-left:5px;"></i>
                    </a>
                </div>
                @endif
                @endif
                @endif
            </div>
            @endif
            <!--CABECERA CLIENTE fin-->

            <!--BOTON TUS PRODUCTOS-->
            <div style="border-color:#D2CFCF; border-left-width: 2px;border-left-style: 
                    solid;border-top-width: 0px;border-top-style: solid;border-bottom-width: 0px;
                    border-bottom-style: solid;border-right-width: 2px;border-right-style: solid;">
                <div class="col-lg-12" style="border-color: #D2CFCF;padding-top: 0.5vh;
                        padding-bottom: 0.5vh;border-left-width: 0px;border-top-width: 0px;
                        border-right-width: 0px;border-bottom-width: 0px;border-bottom-style:solid;
                        border-top-style: solid; border-left-style: solid;border-right-style: 
                        solid;
                        padding-left: 10px; border-bottom-width: 2px;">
                    <button class="btn btn-lg btn-block;" disabled 
                            style="padding-left: 0px;padding-right: 0px; font-weight: bold; 
                                   color: white; background-color: #5D9CFB; border-color: #5D9CFB;
                                   opacity: 1; width:100%;" 
                            id="titulo">
                        {{!auth()->guard('client')->user() ? __('Your ProductsABC') : __('Car BuyABC')}}
                    </button>
                </div>
            </div>

            <!--TIRILLA inicio-->
            @if ($esvirtual)
            <div class="Tirillaheight" style="height:64vh;">
                <div class="col-12" style="border-color: #D2CFCF; height: 68vh; padding-left: 1px;
                                           padding-right: 1px;border-left-width: 2px; border-left-style: solid;
                                           border-top-width: 0px; border-top-style: solid;
                                           border-right-width: 2px;border-right-style: solid;">
                    <table id="detalles"
                        class="table table-responsive table-striped table-border table-condensed table-hover"
                        style="max-height: 91%; padding-left: 1px; padding-right: 1px; margin-bottom: 0px;">
            @else 
            <div class="Tirillaheight" style="height:64vh;">
                <div class="col-12" style="border-color: #D2CFCF; height: 107%; padding-left: 1px;
                                           padding-right: 1px;border-left-width: 2px; border-left-style: solid;
                                           border-top-width: 0px; border-top-style: solid;
                                           border-right-width: 2px;border-right-style: solid;">
                    <table id="detalles"
                        class="table table-responsive table-striped table-border table-condensed table-hover"
                        style="max-height: 62vh; padding-left: 1px; padding-right: 1px;">
                @endif       
                        <thead style="background-color:#A9D0F5">
                        </thead>

                        <tbody id="tbdetalles" style="width:100%; overflow-y: scroll;">
                        </tbody>

                        <div class="input-group control-group increment-products" >
                        </div>
                    </table>
                </div>
            </div>
            <!--TIRILLA fin-->

            <!--BOTONES CONTROL TIRILLA inicio-->
            <!-- <div> -->
            @if ($esvirtual)
            <div class="container col-12" style="border-color: #D2CFCF;border-top-width: 2px;
                        border-top-style: solid;border-left-width: 2px;border-left-style: solid;
                        border-bottom-width: 2px;border-bottom-style: solid;border-right-width: 2px;
                        border-right-style: solid;padding-top: 3px;padding-bottom: 3px;
                        border-right-width: 2px;border-right-style: solid;padding-top: 17px;">


            @else
            <div class="container col-12" style="border-color: #D2CFCF;border-top-width: 2px;
                        border-top-style: solid;border-left-width: 2px;border-left-style: solid;
                        border-bottom-width: 2px;border-bottom-style: solid;border-right-width: 2px;
                        border-right-style: solid;padding-top: 3px;padding-bottom: 3px;
                        border-right-width: 2px;border-right-style: solid;padding-top: 3px;">
                @endif
                    <div class="container">
                        <div class="row" style="display: flex;align-items: center;">
                            <!--Cancelar Venta col-2 -->
                            <div class="col-2" style="bottom: 1px;">
                                <a id='cancelarVenta' role="button" 
                                    class="btn btn-danger btn-lg btn-block"
                                    data-toggle="modal" style="padding-left: 2px;padding-right: 2px; 
                                            font-weight: bold; color: white; font-size:14px; height:34px;">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>

                            @if ($escajero || $esvendedorback)  <!-- CAJERO TRUE O ES VENDEDOR BACK-->
                            <!--Cantidad total de articulos col-3 -->
                            <div class="col-3" style="bottom: 1px;">
                                <button class="btn btn-success btn-lg btn-block" 
                                        disabled id="canttotal"
                                        style="padding-left: 2px;padding-right: 2px; font-weight: bold; color: white;">0
                                </button>
                            </div>

                            <!--Boton Pagar + Valor Total de Venta col-7 -->
                            <div class="col-7" style="bottom: 1px;">
                                <button class="buttonPay btn btn-lg btn-block" 
                                        data-toggle="modal" 
                                        id="btpagar">{{ __('Pay') }}
                                </button>
                            </div>

                            @else <!-- VENDEDOR FALSE-->

                            <!--Cantidad total de articulos col-3 -->
                            <div class="col-2" style="bottom: 1px;">
                                <button class="btn btn-success btn-lg btn-block" 
                                        disabled id="canttotal"
                                        style="padding-left: 2px;padding-right: 2px; 
                                               font-weight: bold; color: white;">0
                                </button>
                            </div>

                            <!--Boton Pagar + Valor Total de Venta col-7 -->
                            <div class="col-6" style="bottom: 1px;">
                                <button class="buttonPay btn btn-lg btn-block" 
                                        data-toggle="modal" 
                                        disabled
                                        id="btpagar">{{ __('Pay') }}
                                </button>
                            </div>

                            <!--Boton Guardar Venta Vendedor col-2 -->
                            <div class="col-2" style="bottom: 1px;">
                                <button type="button" id="btguardar"
                                        class="btn btn-secondary btn-lg btn-block text_modal_pr text_modal_pago"
                                        data-id="hold"
                                        style="margin-right: -50px">
                                    <i class="fa fa-save"></i>
                                </button>
                            </div>

                            @endif

                        </div>
                    </div>
                <!-- </div> -->
            </div>
            <!--BOTONES CONTROL TIRILLA fin-->
        </div>
        <!--FRAMEWORK TIRILLA fin-->
    </div>
    <!-- FIN FROTEND PDVi -->

    <script>
        alert("dos");
        // $(".btn_search").on('click', function(){
        //     buscaritem($("#name-buscar").val(), 1, 'sales');
        // })

        $("#name-buscar").keypress(function(e) {
            let code = (e.keyCode ? e.keyCode : e.which);
            if(code==13){
                $(".btn_search").trigger('click');
            }
        })

        function buscaritem(busqueda, tipo, tipotran) {
            let token = '{{csrf_token()}}';

            $.ajax({
                url  :'/management/pdvi/ajax?type=search',
                type : 'post',
                data : {
                    filter: busqueda,
                    search_type  : tipo,
                    typetransaction : tipotran,
                    _token: token
                },
                success: function (response) {
                    console.log("response ",response);
                    res = JSON.parse(response);
                    $('#category0').html(res);
                    if(res.length === 75){
                        $("#lbmensaje").text("Producto No Encontrado");
                        $("#Notificacion").modal('show');
                    }
                },
                // error: function(xhr, status, error) {
                //     $("#lbmensaje").text("Se produjo un error, favor intentar más tarde");
                //     $("#Notificacion").modal('show');
                // }
            });
        }

    </script>