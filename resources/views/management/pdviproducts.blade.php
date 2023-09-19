@if ($categories != '')
    @foreach ($categories as $category)
        @foreach ($category->ProductsCatalog as $product)
        <div  id="divprod{{ $product->id }}" 
            class="addprod gallery_product filter  {{ $product->idcategory }} category{{ $category->id }}"
            data-full="{{ $product }}"
            data-id="{{ $product->id }}"
            data-tax="{{ $product->ValorImpuesto->value }}"
            data-price="{{ $product->inventoryprice }}"
            data-name="{{ strtoupper($product->name) }}"
            data-code="{{ $product->barcode }}"

            data-quantity="{{ $product->inventory_quantity }}"
            data-inventory ="{{ $product->inventory_control }}"
            data-inventoryc = "{{ $inventory_control }}"

            style="cursor:pointer; border: 2px solid #00a2e8; border-radius: 5px; box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51);-webkit-box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51); -moz-box-shadow: 8px 9px 15px -1px rgba(0,0,0,0.51); 
            @if($typetransaction == 'sales')
            <?= !empty($product->specialprice) ? "background-color:#FFD212;"  : "background-color:#ffffff;" ?>
            @endif
            display: inline-block;
            max-width:2.8vw; min-width:134px; min-height:160px; padding-top: 15px; padding-left: 7px; padding-right: 5px;
            margin: 1.03vh; margin-left: 0.6vh; margin-right: 1vh;">

            @if($typetransaction == 'sales')
            @if (!empty($product->specialprice))
            <div   style="background-color: #f52c11;color: white;letter-spacing: 0.71px;z-index: 3;width: 26px;height: 70px;margin-left: -7px;font-size: 13px;
                font-weight: bold;padding-left: 4px;writing-mode: vertical-lr;transform: rotate(180deg);padding-top: 11px;margin-top: 18px;position: absolute;">Promo
            </div>
            <!-- Revisar label promo position absolute-->
            <!-- 
            <div style="background-color: #f52c11;color: white;letter-spacing: 0.71px;z-index: 3;width: 26px;height: 70px;margin-left: -7px;font-size: 13px;
                font-weight: bold;padding-left: 4px;writing-mode: vertical-lr;transform: rotate(180deg);padding-top: 11px;margin-top: 18px;position: absolute;">Promo
            </div>
            -->
            @endif
            @if($inventory_control == 1 || $product->inventory_control == 1)
                @if ($product->inventory_quantity == 0)
                    <div style="background-color: #57961a; color: white; letter-spacing: 0.71px; left: 0px;z-index: 1;
                        width: 100%; height: 19px;margin-left: auto; margin-right: auto; text-align: center;
                        margin-top:-15px; font-size:12px; font-weight:bold; padding-left:3px">{{__('Out Of Stock')}}
                    </div>
                @endif
            @endif
            @endif
                
            <img data-category="{{$category->name}}" id="prod{{ $product->id }}"
                @if($product->image == '')
                src = '/support/pictures/products/prod000000.png'
                @else
                src="{{file_exists(public_path($path .$product->catalog_id .'/'. str_pad($product->category_id, 3, "0", STR_PAD_LEFT). '/' . $product->image))
                        ? $path .$product->catalog_id .'/'. str_pad($product->category_id, 3, "0", STR_PAD_LEFT). '/' . $product->image
                        : '/support/pictures/products/prod000000.png'}}"
                @endif
                    class="img-responsive">
            <div style="height: 30px; position: relative;">
                <div style="font-weight:bold; font-size: smaller; color:#6A6A6A; text-align: left; height: 80%; line-height:103%; text-transform: lowercase;"
                        class="perfectScrollbarContainer">
                        {{ ucfirst(strtolower($product->name)) }}
                </div>
                <p>
                <div id="code" style="font-weight:bold; color:#585858; text-align: justify; height: 90%; line-height:60%"
                        class="perfectScrollbarContainer">
                        {{!empty(explode("|",$product->UnidadVenta->code)[1]) ? explode("|",$product->UnidadVenta->code)[1] : '???' }}
                </div>
            </div>
            
            <div id="price{{ $product->id }}" style="font-weight:bold; font-size: large; text-align: right;<?= !empty($product->specialprice) ? "color:#f52c11" : "color:#585858" ?> " >
                @if($typetransaction == 'sales')
                $<?= $product->specialprice != null ? $product->specialprice : $product->saleprice ?>
                @else
                $<?= $product->purchaseprice ?>
                @endif
            </div>

        </div>
        @endforeach
    @endforeach
@endif 

<script>
    $('.perfectScrollbarContainer').perfectScrollbar();

    // console.log("dat llego ",'{{$tot}}', '{{$codprod}}');
    if ('{{$tot}}' == 1)
        $('#divprod{{$codprod}}').trigger('click');

</script>
