@if (!empty($products))
@foreach ($products as $product)

<div  id="divprod{{ $product->id }}"
      class="addprod gallery_product filter productscombos"
      data-full="{{$product}}"
      data-id="{{ $product->id }}"
      data-price="{{ $product->saleprice }}"
      data-name="{{ strtoupper($product->name) }}"

      style="cursor:pointer; border: 2px solid #D2CFCF; border-radius: 5px; background-color:#91d121;  display: inline-block;
                      max-width:2.8vw; min-width:115px; min-height:160px; padding-top: 15px; padding-left: 7px; padding-right: 5px;
                      margin: 1.03vh; margin-left: 0.6vh; margin-right: 1vh;">

    <div id="code" style="font-weight:bold; color:#585858; text-align: center; position: sticky ">
        <p>{{$product->quantity}}</p>
    </div>

    <img  data-category="promotion"
          id="prod{{ $product->id }}"
      
        src="{{'/support/pictures/productscatalogs/'
        .str_pad($product->catalog_id, 3, "0", STR_PAD_LEFT) 
        .'/'
        .str_pad($product->category_id, 3, "0", STR_PAD_LEFT) 
        .'/'
        .$product->image }}"

        class="img-responsive">

    <div style="height: 30px; position: relative;">
        <div style="font-weight:bold; font-size: smaller; color:#6A6A6A; text-align: left; height: 80%; line-height:103%"
             class="perfectScrollbarContainer">
            {{ ucfirst(strtolower($product->name)) }}
        </div>
        <p>
        <div id="code" style="font-weight:bold; color:#585858; text-align: justify; height: 90%; line-height:60%"
             class="perfectScrollbarContainer">
            @if(!empty(explode("|",$product->UnidadVenta->code)[1]))
            {{explode("|",$product->UnidadVenta->code)[1]}}
            @else
            ???
            @endif
        </div>
    </div>

    <div style="font-weight:bold; font-size: large; text-align: right; color:#585858 " >
        ${{$product->saleprice}}
    </div>
</div>

@endforeach
@endif

<script>
    $('.perfectScrollbarContainer').perfectScrollbar();
</script>
