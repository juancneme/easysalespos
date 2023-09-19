
@if (!empty($combos))
    @foreach ($combos as $combo)

            <div  id="divprod{{ $combo->id }}"
                  class="addprod gallery_product filter combo"
                  data-full="{{$combo}}"
                  data-id="{{ $combo->id }}"
                  data-price="{{ $combo->saleprice }}"
                  data-name="{{ strtoupper($combo->name) }}"
                  style="cursor:pointer; border: 2px solid #D2CFCF; border-radius: 5px; 
                        <?= !empty($combo->specialprice) ? "background-color:#e7e26a;" : "background-color:#91d121;" ?>  display: inline-block;
                        max-width:2.8vw; min-width:115px; min-height:160px; padding-top: 15px; 
                        padding-left: 7px; padding-right: 5px;
                        margin: 1.03vh; margin-left: 0.6vh; margin-right: 1vh;">

                <div style="text-align: end; height: 5px">
                    <button style="color:#ffff;  position: sticky;" id="viewCombos" class="btn btn-link" value="view"
                            onclick="viewComboProduct('{{$combo->id}}','{{$combo->name}}')"><i class="fa fa-edit"></i>
                    </button>
                </div>

                <img  data-category="combo"
                      id="combo{{ $combo->id }}"
                      src="{{ '/support/pictures/products/prod000000.png' }}"
                      class="img-responsive">

                <div style="height: 30px; position: relative;">
                    <div style="font-weight:bold; font-size: smaller; color:#6A6A6A; text-align: left; height: 80%; line-height:103%"
                         class="perfectScrollbarContainer">
                        {{ ucfirst(strtolower($combo->name)) }}
                    </div>
                    <p>
                    <div id="code" style="font-weight:bold; color:#585858; text-align: justify; height: 90%; line-height:60%"
                         class="perfectScrollbarContainer"> <p><small><i>Combo</i></small></p>
                    </div>
                </div>

                <div style="font-weight:bold; font-size: large; text-align: right;<?= !empty($product->specialprice) ? "color:#e76a6a" : "color:#585858" ?> " >
                    ${{$combo->saleprice}}
                </div>
            </div>
        @endforeach
@endif

<script>
    $('.perfectScrollbarContainer').perfectScrollbar();
</script>
