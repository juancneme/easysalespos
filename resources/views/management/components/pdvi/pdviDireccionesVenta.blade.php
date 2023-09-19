<!--Modal Direcciones-->
<div class="modal fade" id="modalAddress" tabindex="-1" role="dialog" id="modalNewClient"
        data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: beige;">
            <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                <span class="log-cls close">&times;</span>
            </button>
            <div class="modal-header">
                <h5 class="modal-title modal_header_font">{{ __('Home Order') }}</h5>
            </div>
         <!--   <div id="alertAddress" class="alert alert-info" role="alert">
                <a href="#" onclick="addNewAddress()" class="alert-link">{{__('Add a new address')}}</a>
            </div>-->
            <div class="modal-body">
                
                <div class="form-group row">
                          <label for="name">{{ __('Delivery address') }}</label>
                    <div style="display: flex; align-items: center; justify-content: center; padding-left:13px; padding-right:0px" class="col-sm-12">
                        <select name="addresses" id="addresses" class="form-control">
                            @if(auth()->guard('client')->user() != null)
                                @foreach ($addresses as $a)
                                    <option value="{{ $a->id }}">{{$a->type->name}} : {{ $a->address }}, {{$a->city}}</option>
                                @endforeach
                            @endif
                        </select>

                        <div class="col-sm-2" style="display: flex; justify-content: center;">
                            <a id="alertAddress" type="submit" href="#" onclick="addNewAddress()" role="alert"  class="btn btn-success"  data-toggle="tooltip" title="{{__('New Adress')}}">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>



                    </div>
                </div>
                
                
                 <div>
                    <button  type="button" style="height:36px; width:100%;"
                            class="btn btn-primary btn-consultar" onclick="generateDelivery()">
                        {{__('Confirm')}}
                    </button>
                </div>

                <br>
                
                <div class="modal-footer col-12" style="right: 6px;">
          
                        
                        <button style="width:7rem;" type="submit" id="search" value="search" data-dismiss="modal"
                        onclick="showAddressModal()" class="btn btn-danger">{{__('Return')}} </button>
                </div>

            </div>

        </div>
    </div>
</div>
