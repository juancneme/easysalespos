<!--Modal add payment -->
<div class="modal fade" tabindex="-1" role="dialog" id="cashModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #b5eaf7e0;">
            <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                <span class="log-cls close">&times;</span>
            </button>
            <div class="modal-header" style="background-color: #00a2e8;
                    align-items: center;
                    margin-top: -20px;margin-left: -20px;margin-right: -21px;">
                <h4 class="modal-title modal_header_font" style="color: #fff"
                    >{{ __('Payment with cash') }}</h4>

                <div class="bb">
                    <h3 class="text_modal" style="color: #fff">{{ __('Total Value') }}</h3>
                    <h2 id="valortotalefectivo" class="total_price_modal" style="color: #423e3e"><span class="total_price"></span></h2>
                </div>

            </div>
            <!--valor total-->
            <!--valor recibido modal-->
            <div class="col-md-12 col-sm-12 mb-6 bb">
                <h3 class="text_modal" style="margin-top: 17px;">{{ __('Received value') }}</h3>
                <div class="payment_add submit_bttn">
                   <form>
                   <input autofocus type="currency" placeholder="$" 
                            tabindex="-1"  name="valor_recibido" 
                            id="valor_recibido" value="0"
                            class="form-control total_price_input_modal" 
                            style="text-align:end;" data-type="currency" 
                            onchange="" 
                            inputmode="numeric"  />
            
                    <button class="btn btn-primary" 
                            id="btnAddEfectivo" type="submit" 
                            data-dismiss="modal" style="background-color: #00a2e8; margin:1%;padding-top: 4px;">
                        <h3 class="text_add text_modal_pr text_modal_pago">{{ __('Add payment') }}</h3>
                    </button>
                    </form>   
                    
                </div>
            </div>
            <!--cambio modal-->
            <div class="change_section">
                <h3 class="text_modal">{{ __('Change') }}</h3>
                <div>
                    <h2 id="valor_cambio" class="total_change_modal">$<span class="total_change">0</span></h2>
                </div>
            </div>

            <div class="modal-footer col-12" 
                    style="right: 6px; margin-top: 16px; border-top-width: 3px;">                            

                <i id="btnHowtopay" class="fa fa-fw fa-cogs" style="color: #00a2e8; font-size: 50px; 
                        margin: 3px;margin-top: 3px;margin-left: 27px;
                        margin-top: -37px; margin-right: 328px; margin-bottom: -61px;"></i>

                <button style="width:7rem;margin-top: 0px;padding-top: 6px;margin-bottom: -19px;" 
                    type="button" class="btn btn-danger" data-dismiss="modal">
                    {{ __('Cancel') }}
                </button>





            </div>

        </div>

    </div>
</div>
<!--Fin Modal-->
