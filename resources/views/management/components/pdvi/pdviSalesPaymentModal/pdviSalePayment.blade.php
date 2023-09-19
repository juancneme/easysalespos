<div data-m-box="cmodal" class="cmodal" id="salepaymentmodal" >
    <div>
        <div class="row payment_values bb justify-content-between">
            <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                <span class="log-cls close">&times;</span>
            </button>
            <div class="headers_numbers_1">
                <h3 class="text_modal_total">{{__('Total sale')}}</h3>
                <div>
                    <h2 id="txpagototal" class="total_price_section"><span class="total_price" data-dismiss="modal"></span></h2>
                </div>
            </div>
            <div class="headers_numbers_2">
                <h3 class="text_modal_pend totalToPay">{{__('Outstanding balance')}}</h3>
                <div>
                    <h4 id="txremainingprice" class="remaining_price_section"><span class="remaining_price"></span></h4>
                </div>
            </div>
        </div>

        {{-- <bodyd></bodyd> --}}

        <div class="pl bb" style="display: grid">
            <ul class="list-group  flex-md-row">
                <bodyd>
                    <div class="input-group control-group increment-item">
                    </div>
                </bodyd>
            </ul>
        </div>

        <div class="payment_buttons" style="padding-bottom: 6px; height:47px; margin-right:2px">
            <div class="text_modal_pr" style="font-size: max(1.3rem, 1.6vw); max-width:100vw;" >{{__('Select the payment method')}}</div>
        </div>

        <div id="add_buttons" class="payment_buttons bb" style="padding-bottom: 6px;">
            @foreach ($itemstypepay[$indice_mp] as $ItemsLists)
                <button class="btnpayments" id="btnpayment{{ $ItemsLists->id }}" paymentname="{{ $ItemsLists->name }}"
                        title="{{ $ItemsLists->name }}" paymentid="{{ $ItemsLists->id }}"
                        type="button" data-type="cash" >
                    <img class="images_button" src="<?= file_exists(public_path('/support/pictures/config/payments/'. $ItemsLists->id . '.png'))
                        ? '/support/pictures/config/payments/' .  $ItemsLists->id . '.png'
                        : '/support/pictures/config/payments/default.png'?>"/>
                    <h3 class="text_buttons">{{ $ItemsLists->name }}</h3>
                </button>
            @endforeach
        </div>

        <div id="add_buttons1" class="payment_buttons bb" style="padding-bottom: 6px;">
            @foreach ($itemstypepay[1] as $ItemsLists)
                <button class="btnpayments" id="btnpayment{{ $ItemsLists->id }}" paymentname="{{ $ItemsLists->name }}"
                        title="{{ $ItemsLists->name }}" paymentid="{{ $ItemsLists->id }}"
                        type="button" data-type="cash" >
                    <img class="images_button" src="<?= file_exists(public_path('/support/pictures/config/payments/'. $ItemsLists->id . '.png'))
                        ? '/support/pictures/config/payments/' .  $ItemsLists->id . '.png'
                        : '/support/pictures/config/payments/default.png'?>"/>
                    <h3 class="text_buttons">{{ $ItemsLists->name }}</h3>
                </button>
            @endforeach
        </div>

        <div class="email bb" style="margin-top:8px; height:59px; display: flex;justify-content: flex-start;">
            <div style="width:15vw; margin-bottom:8px; display:flex; justify-content:flex-end;">
                <h3 class="text_modal_pr emaillabel" for="email">{{__('eMailClient')}}</h3> 
            </div>
            <input type="email" class="form-control" id="emailUser" placeholder="informacion@easynet.com" value="informacion@easynet.com" required style="font-size: 2.7vh; min-width: auto; height: 50px; width:67vw;" />
            <div class="invalid-feedback">
                {{__('Write the customers valid email address')}}
            </div>
        </div>

        <div class="email bb" style="height:59px; display: flex; justify-content: flex-start;">
            <div style="width:15vw; display:flex; justify-content:flex-end;">
                <h3 style="margin-bottom:-10px;" class="text_modal_pr emaillabel" for="sellers">{{__('Select Seller')}}</h3>
            </div>
            <select style="height: 50px; align-self: center; width:67vw;" name="sellers" id="sellers" class="form-control" required>
                @foreach ($sellers as $seller)
                    <option 
                            <?= $seller->id == $userid->id ? 'selected' : '' ?>
                            <?= !empty($oldsale->seller_id) && $seller->id == $oldsale->seller_id ? 'selected' : '' ?>
                            value="{{$seller->id}}">{{$seller->firstname}} {{$seller->lastname}}</option>
                @endforeach
            </select>
        </div>

        <div class="row payment_values bb justify-content-between">

            <div class="nonfacesale">
                @if(!$esvirtual)
                <label class="containercheck" style="top: 7px;left: 24px; width:297px;">
                    <h3 class="text_modal_pr text_modal_ce">{{__('Non-Presential Sale')}}</h3>
                    <input type="checkbox" name="non_face_to_face_sale" id="non_face_to_face_sale" />
                    <span class="checkmark"></span>
                </label>
                @endif
            </div>

            @if(in_array('107', $payments_id))
            <div class="applysistecredit">
                <button type="button" onclick="openModalChat()" style="height: 50px; margin-right: 9px; width: 90vw; font-size: 1.1rem; max-width: 316px;" class="btn btn-rounded btn-warning btn-lg">
                    <div style="color:#fff;" class="modal-title modal_header_font">{{ __('Request here the electronic deposit') }}</div>
                </button>
            </div>
            @endif
            <form action="/management/pdvi/downloadCarnet" method="GET">
            {{--<div class="applysistecredit">--}}
            {{--    <button type="submit" style="height: 50px; margin-right: 24px;" class="btn btn-rounded btn-primary btn-lg">--}}
            {{--        <h5 style="color:#fff;" class="modal-title modal_header_font">   {{ __('Tarjeta recaudo') }}                 <i class="fa fa-file-pdf-o"></i>--}}
            {{--        </h5>--}}
            {{--    </button>--}}
            {{--</div>--}}
            </form>

        </div>

        <div  class="bb">
            <div class="row" style="display: flex;justify-content: space-around;">
                <div class="col-lg-1 col-sm-12" style="margin-top: 10px;">
                    <button type="button" id="btguardarventa"
                            class="btn btn-secondary btn-lg btn-block text_modal_pr text_modal_pago"
                            data-id="hold"
                            style="margin-right: -50px">
                        <i class="fa fa-save"></i>
                    </button>
                </div>
                <div class="col-lg-11 col-sm-12" style="margin-top: 10px;">
                    <button type="button" id="btfinventa" style="font-size:2.5vh; min-width: 1vw;"
                            class="btn btn-primary btn-lg btn-block text_modal_pr text_modal_pago"
                            data-id="sale">
                       <div>{{ __('Finalize Sale') }}</div> 
                    </button>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
