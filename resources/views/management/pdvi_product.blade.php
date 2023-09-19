<style>
/*Ocultar flechas input */
/*  Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>

<div class="clone-prod hide">
    <article selected id="filaXXidelemento" 
             style="display:grid; grid-template-columns:70px calc(100% - 170px) 100px;
                    padding:10px 15px; border-bottom:1px solid #ccc; 
                    background-color:#00a2e812; height:90px; ">

        <input type="hidden" id="IdElementoXXidelemento" name="IdElemento[]" value="XXidelemento" typeproduct="XXtypeProduct">
        <input type="hidden" id="IdArticuloXXidelemento" name="idarticulo[]" value="XXidarticulo" typeproduct="XXtypeProduct">
        <input type="hidden" id="ArticuloXXidelemento" name="articulo[]" value="XXarticulo" typeproduct="XXtypeProduct">
        <input type="hidden" id="pventaXXidelemento" name="pventa[]" value="XXpventa" typeproduct="XXtypeProduct">
        <input type="hidden" id="pcompraXXidelemento" name="pcompra[]" value="XXpcompra" typeproduct="XXtypeProduct">

        <div style="height: 84px;width: 84px; margin-top: -9px; margin-left: 11px;">
            <img src="XXimage_product" 
                 alt="EasySalesPOS" 
                 style="width:100%;pointer-events:none;">
        </div>

        <div  style="min-width:40%; padding:5px; font-size:1rem; font-weight:600; margin:0; font-size:.875rem; 
                font-weight:300; color:grey; height: 75px; margin-left: 24px; margin-top: -12px;">
             
            @if($esvirtual)
            <h1 style="font-size:0.84rem; font-weight:600; margin:0;">
            @else
            <h1 style="font-size:1rem; font-weight:600; margin:0;">
            @endif
            XXarticulo
            </h1>

            <h2 style="font-size:.875rem; font-weight:300; color:grey">
            @if ($typetransaction != 'sales')
            PC XXpcompraT - 
            @endif
            PV XXpventaT
            </h2>

            <!-- NO USADO EN ESTE MOMENTO, VARIABOLES DE INFORMACION USUARIO -->
            <div style="font-size:10px; padding:6px 0 0; display: none;">
                <p class="tx-black400">
                Mililitro a $ 2
                </p> 
                <p class="tx-pink500 f-bold" style="display: none;">
                Ahorro: $0
                </p> 
                <p class="f-bold" style="display: none;">
                En descuento: $0 (Cant: 0)
                </p> 
                <p class="f-bold">
                En precio normal: $11.990 (Cant: 1)
                </p>
            </div>
        </div> 

        <div style="display:-webkit-box;
                    display:-ms-flexbox;
                    display:flex;
                    -webkit-box-orient:vertical;
                    -webkit-box-direction:normal;
                    -ms-flex-direction:column;
                    flex-direction:column;
                    -webkit-box-align:end;
                    -ms-flex-align:end;
                    align-items:flex-end;
                    -webkit-box-pack:center;
                    -ms-flex-pack:center;
                    justify-content:center;
                    width:100%;
                    padding:5px 0;">

            <button style="-webkit-box-pack:start; -ms-flex-pack:start; justify-content:flex-start;
                            background-color:transparent; width:40px; height:40px; margin-top: -5px;
                            margin-right: 449px;margin-bottom: -57px; border: none"
                    title="Botón borrar producto" 
                    aria-label="Botón borrar producto"
                    data-index="XXidelemento"
                    data-code="XXtaxcode"
                    id-articulo="XXidarticulo"
                    onclick="deleteItem(XXidelemento, XXtaxcode)";
                })
                >
                <i class="fa fa-trash" style="width:40px; height:40px;"></i>
            </button>

            <h6 id="subtXXidelemento" style="margin-top: 22px;margin-bottom: 19px;">XXsubtotal</h6>

            <div style="width:100%;
                        display:-webkit-box;
                        display:-ms-flexbox;
                        display:flex;
                        -webkit-box-align:center;
                        -ms-flex-align:center;
                        align-items:center;
                        -webkit-box-pack:justify;
                        -ms-flex-pack:justify;
                        justify-content:space-between;">

                <aside data-id="132680" data-name="XXarticulo" data-price="11990" 
                        class="btn-add mq-cart" style="padding:0 0 5px">
                    <div style="width:100%;
                            display:-webkit-box;
                            display:-ms-flexbox;
                            display:flex;
                            -webkit-box-align:center;
                            -ms-flex-align:center;
                            align-items:center;
                            -webkit-box-pack:justify;
                            -ms-flex-pack:justify;
                            justify-content:space-between; margin-top: -12px;">
                        <!-- 
                        @if ($typetransaction != 'sales')
                        <label style="margin-top: -45px; margin-left: -263px;">P.Compra</label>
                        <input  style="width:92px; 
                                       background:transparent; 
                                       border:1px solid #999; 
                                       color:#111; 
                                       margin-top: 18px; 
                                       margin-left: -60px;
                                       padding: 5px 5px 5px 5px; 
                                       text-align:right; 
                                       border-color: #9a9a9a; 
                                       border-style: solid; 
                                       border-width:1px; "


                                type="number" id="pcompraXXidelemento" name="pcompra[]" value="XXpcompra" min="0" data-index="XXidelemento" class="btn-cant" 
                                data-code="XXtaxcode" min="1" typeproduct="XXtypeProduct"  
                                onchange="incrementa_mismo_producto(XXidelemento, XXidarticulo, XXtaxcode3)">
                                            
                        <label style="margin-top: -45px; margin-left: 31px;">P.Venta</label>
                        @else
                        <label style="margin-top: -45px; margin-left: -136px;">P.Venta</label>
                        @endif
                        <input  style="width:85px; 
                                       background:transparent; 
                                       border:1px solid #999; 
                                       color:#999; 
                                       margin-top: 1px; 
                                       margin-left: -46px; 
                                       margin-right: -3px; 
                                       padding: 5px 5px 5px 5px; 
                                       text-align:right; 
                                       border-color: #9a9a9a; 
                                       border-style: solid; 
                                       border-width:1px; "
                                       <?= !empty( $typetransaction ) && $typetransaction=='sales' ? 'readonly' : '' ?>
                                
                                type="number" id="pventaXXidelemento" name="pventa[]" value="XXpventa" min="0" data-index="XXidelemento" class="btn-cant" 
                                data-code="XXtaxcode" min="1" typeproduct="XXtypeProduct"
                                onchange="incrementa_mismo_producto(XXidelemento, XXidarticulo, XXtaxcode3)"> 
                        -->
                        <button style="width:30px; height:30px; border-radius:50%; background:transparent; 
                                border:1px solid #999; color:#999; margin-left: -20px;" 
                                id="btn_decreaseProduct" data-testid="remove-to-cart" 
                                title="Botón remover una cantidad del carrito" 
                                aria-label="Botón remover una cantidad del carrito"
                                onclick="decreaseProduct(XXidelemento)">
                                <i class="fa fa-minus"></i>
                        </button>
                        <p style="font-size:1rem!important; color:#0071ed!important; 
                                        margin-left: 10px; margin-right: 10px; margin-top: -3px;">

                        <input type="number" id="cantXXidelemento" name="cantidad[]" value="XXcantidad" min="0" data-index="XXidelemento" class="btn-cant" 
                                data-code="XXtaxcode" min="1" typeproduct="XXtypeProduct" 
                                required
                                style="width: 60px; padding: 5px 5px 5px 5px; text-align:right; border-color: #9a9a9a; 
                                       border-style: solid; border-width:1px;margin-left: -6px; margin-top: 10px;" 
                                onchange="incrementa_mismo_producto(XXidelemento, XXidarticulo, XXtaxcode3)">
                        </p>
                        <button style="width:30px; height:30px; border-radius:50%; background:transparent; 
                                       border:1px solid #999; color:#999;margin-left: -5px;"
                                id="btn_increaseProduct" data-testid="remove-to-cart" 
                                title="Botón adicionar una cantidad del carrito" 
                                aria-label="Botón adicionar una cantidad del carrito"
                                onclick="increaseProduct(XXidelemento)">
                                <i class="fa fa-plus"></i>
                        </button>

                    </div>
                </aside>
            </div> 
        </div>
    </article>
</div>



