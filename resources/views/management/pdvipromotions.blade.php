@if (!empty($promotions))
    @foreach ($promotions as $promotion)

    <div id="divprod{{ $promotion->id }}"
              class="addprod gallery_product filter promotion"
              data-full="{{$promotion}}"
              data-id="{{ $promotion->product_id }}"
              data-price="{{ $promotion->specialprice }}"
              data-name="{{ strtoupper($promotion->name) }}"
              
              style="cursor:pointer; border: 2px solid #D2CFCF; border-radius: 5px; background-color:#FFD212;  display: inline-block;
                      max-width:2.8vw; min-width:115px; min-height:160px; padding-top: 15px; padding-left: 7px; padding-right: 5px;
                      margin: 1.03vh; margin-left: 0.6vh; margin-right: 1vh;">
        
        <div   style="background-color: #f52c11;color: white;letter-spacing: 0.71px;z-index: 3;width: 26px;height: 70px;margin-left: -7px;font-size: 13px;
            font-weight: bold;padding-left: 4px;writing-mode: vertical-lr;transform: rotate(180deg);padding-top: 11px;margin-top: 18px;position: absolute;">Promo
        </div>
        <img  data-category="promotion"
            id="prod{{ $promotion->id }}"
            src="{{ '/support/pictures/productscatalogs/'. $promotion->catalog_id .'/'. str_pad($promotion->category_id, 3, '0', STR_PAD_LEFT). '/' . $promotion->image }}"
            class="img-responsive">

        <div style="height: 30px; position: relative;">
            <div style="font-weight:bold; font-size: smaller; color:#6A6A6A; text-align: left; height: 80%; line-height:103%"
                class="perfectScrollbarContainer">
                {{ ucfirst(strtolower($promotion->name)) }}
            </div>
            <p>
                <div id="code" style="font-weight:bold; color:#585858; text-align: justify; height: 90%; line-height:60%"
                        class="perfectScrollbarContainer">
                    @if(!empty(explode("|",$promotion->UnidadVenta->code)[1]))
                        {{explode("|",$promotion->UnidadVenta->code)[1]}}
                    @else
                        ???
                    @endif
                </div>
        </div>

        <div style="font-weight:bold; font-size: large; text-align: right; color:#f52c11;" >
            ${{$promotion->specialprice}}
        </div>
    </div>
    
    @endforeach
@endif

    

<script>
    $('.perfectScrollbarContainer').perfectScrollbar();
</script>
       