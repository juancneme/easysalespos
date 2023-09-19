<!-- Modal Nueva dirección de entrega -->
<div class="modal fade" id="modalNewAddress" tabindex="-1" role="dialog"
        id="modalNewClient"
        data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: beige;">
            <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                <span class="log-cls close">&times;</span>
            </button>
            <div class="modal-header">
                <h5 class="modal-title modal_header_font">{{ __('New Delivery address') }}</h5>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <label for="surname">{{__('Type Address')}}</label>
                        </div>
                        <div class="col-sm">
                            <select name="typeaddress" id="typeaddress"
                                    class="form-control" required>
                                @foreach ($itemslocations as $itemslocation)
                                    <option value="{{ $itemslocation->id }}">{{ $itemslocation->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm">
                            <label for="name">{{ __('City') }}</label>
                        </div>
                        <div class="col-sm">
                            <select style="width:14rem;" name="city" id="city" class="form-control selectpicker" data-live-search="true">
                                    @foreach ($cities as $c)
                                        <option value="{{ $c->id }}">{{$c->name}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm">
                            <label for="name">{{ __('Neighborhood') }}</label>
                        </div>
                        <div class="col-sm">
                            <input type="text" name="neighborhood" id="neighborhood"
                                    class="form-control">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm">
                            <label for="surname">{{__('Address')}}</label>
                        </div>
                        <div class="col-sm">
                            <input type="text" name="address" id="address"
                                    class="form-control">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm">
                            <label for="surname">{{__('Address Default')}}</label>
                        </div>
                        <div class="col-sm">
                            <select name="default_address'" id="default"
                                    class="form-control" required>
                                <option value="1"> {{ __('Yes') }}</option>
                                <option value="0">{{ __('No') }}</option>
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm">
                            <label for="surname">{{__('Indications')}}</label>
                        </div>
                        <div class="col-sm">
                            <input type="text" name="indications" id="indications"
                                    class="form-control">
                        </div>
                    </div>

                </div>
                
                <br>
                  <div>   
                       <button style="width:100%; height:36px;" type="button" class="btn btn-primary" data-dismiss="modal"
                        onclick="saveAddress()">{{__('Save')}}</button>  
                </div>
                
                
                
            </div>
            <div class="modal-footer">
                <button style="width:7rem;" type="submit" id="search" value="search" data-dismiss="modal"
                        class="btn btn-danger">{{__('Cancel')}} </button>

               
            </div>
        </div>
    </div>
</div>
