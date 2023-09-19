<body>
    <div class="clone-add hide">
        <div class="control-group input-group col-12" style="margin-top:10px">
            <div class="col-md-6">
                <div>
                    <label for="tipo">{{ __('Product') }}</label>
                </div>
                <div>
                    <input type="hidden" name="idproduct[]">
                    <select type="hidden" name="products[]" id="products_name" class="form-control products_name">
                    </select>
                </div>
            </div>
            <div class="col-md-2 divquantities_name">
                <div>
                    <label>{{ __('Quantity') }}</label>
                </div>
                <div>
                    <input  name="quantities[]" id="quantities_name"
                           class="form-control quantities_name"
                           value="1"
                           maxlength="50" required/>
                </div>
            </div>
            <div id="divprices_name" class="col-md-2">
                <div>
                    <label>{{ __('Price') }}</label>
                </div>
                <div>
                    <input type="text" name="prices[]" id="prices_name"
                           class="form-control prices_name"
                           maxlength="50" readonly/>
                </div>
            </div>
            <div class="input-group-btn col-1" style="margin-top: 29px">
                <button class="btn btn-danger btn-delpdf" type="button" id="delete"><i
                            class="glyphicon glyphicon-remove"></i> {{ __('Delete') }}</button>
            </div>
        </div>
    </div>
</body>

<!-- START TO PRODUCTS LIST--->
<div class="form-group row">
    <label for="product" class="col-sm-6 col-form-label">{{ __('Products') }}</label>
</div>
<body>
<div>
    @if(!empty($comboProduct))
        <input type="hidden" name="editadd" id="idadd" value="true">
        <div style="display: none">{{$totalvalue = 0}}</div>
        <div style="display: none">{{$totalproducts = 0}}</div>

        <input type="hidden" name="calculatedprice" id="calculatedprice" value={{$totalvalue = 0}}>
        @foreach ($comboProduct as $p)
            <div class="">
                <div class="control-group input-group col-12" style="margin-top:10px">
                    {{--        {{ csrf_field() }}--}}
                    <div class="col-md-6">
                        <div>
                            <label for="tipo">{{ __('Product') }}</label>
                        </div>
                        <div>
                            <input type="hidden" name="idproduct[]" value="{{$p->id}}">
                            <select name="products[]" class="form-control" id="products_name{{$loop->iteration}}"
                                    cont="{{$loop->iteration}}" productprice="{{$p->saleprice}}">
                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div>
                            <label>{{ __('Quantity') }}</label>
                        </div>

                        <input type="text" name="quantities[]" id="quantities_name{{$loop->iteration}}"
                               class="form-control quantities_name"
                               value="{{ $p->quantity }}" maxlength="50" required cont= "{{$loop->iteration}}"/>
                    </div>
                    <div id="divprices_name" class="col-md-2">
                        <div>
                            <label>{{ __('Price') }}</label>
                        </div>
                        <div>
                            <input type="text" name="prices[]" id="prices_name{{$loop->iteration}}"
                                   class="form-control prices"
                                   maxlength="50" value = "{{$p->saleprice * $p->quantity}}"
                                   cont="{{$loop->iteration}}" readonly/>
                        </div>
                    </div>
                    <div class="input-group-btn col-1" style="margin-top: 29px">
                        <button class="btn btn-danger btn-delpdf" id="delete" cont="{{$loop->iteration}}"
                                type="button"><i class="glyphicon glyphicon-remove"></i> {{ __('Delete') }}</button>
                    </div>
                </div>
                <div style="display: none">{{$totalvalue += $p->saleprice * $p->quantity}}</div>
                <div style="display: none">{{$totalproducts = $loop->iteration}}</div>
                @endforeach
                <input type="hidden" id="newcalculatedprice" value={{$totalvalue}}>
                <input type="hidden" id="totalproducts" value={{$totalproducts}}>
                @endif
            </div>
            <div class="input-group control-group increment">
                <div class="col-md-4">
                    <button disabled class="btn btn-lg btn-block btn-addpdf col-md-12" id="add" style="background:#ccc; margin-top: 29px;"
                            type="button"><i class="glyphicon glyphicon-plus"></i>{{ __('Add Products') }}
                    </button>
                </div>
            </div>
</body>
<!---- END  PRODUCTS LIST--->
