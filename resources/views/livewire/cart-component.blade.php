<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Cart</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            @if (Cart::count() > 0)
                <div class="wrap-iten-in-cart">
                    @if(Session::has('success_message'))
                        <div class="alert alert-success">
                            <strong>Success </strong>{{Session::get('success_message')}}
                        </div>
                    @endif
                    @if(Cart::count() > 0)
                    <h3 class="box-title">Products Name</h3>
                    <ul class="products-cart">
                        @foreach(Cart::content() as $item)

                        <li class="pr-cart-item">
                            <div class="product-image">
                                <figure><img src="{{ ('assets/images/products') }}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                            </div>
                            <div class="product-name">
                                <a class="link-to-product" href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a>
                            </div>
                            <div class="price-field produtc-price"><p class="price">${{$item->model->regular_price}}</p></div>
                            <div class="quantity">
                                <div class="quantity-input">
                                    <input type="text" name="product-quatity" value="{{$item->qty}}" data-max="120" pattern="[0-9]*" >
                                    <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')"></a>
                                    <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"></a>
                                </div>
                            </div>
                            <div class="price-field sub-total"><p class="price">${{$item->subtotal}}</p></div>
                            <div class="delete">
                                <a href="#" wire:click.prevent="destroy('{{$item->rowId}}')" class="btn btn-delete" title="">
                                    <span>Delete from your cart</span>
                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                </a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @else
                        <p>No items in cart</p>
                    @endif
                </div>

                <div class="summary">
                    <div class="order-summary">
                        <h4 class="title-box">Order Summary</h4>
                        <p class="summary-info"><span class="title">Subtotal</span><b class="index">${{Cart::subtotal()}}</b></p>
                        @if (Session::has('coupon'))
                            <p class="summary-info"><span class="title">Descuento ({{Session::get('coupon')['code']}}) <a href="#" wire:click.prevent="removeCoupon"><i class="fa fa-times text-danger"></i></a></span><b class="index"> -${{number_format($discount,2)}}</b></p>
                            <p class="summary-info"><span class="title">Subtotal con Descuento</span><b class="index">${{number_format($subtotalAfterDiscount,2)}}</b></p>
                            <p class="summary-info"><span class="title">IGV ({{config('cart.tax')}}%)</span><b class="index">${{number_format($taxAfterDiscount,2)}}</b></p>
                            <p class="summary-info total-info "><span class="title">Total</span><b class="index">${{number_format($totalAfterDiscount,2)}}</b></p>
                        @else
                            <p class="summary-info"><span class="title">IGV</span><b class="index">${{Cart::tax()}}</b></p>
                            <p class="summary-info"><span class="title">Envio</span><b class="index">Envio Gratis</b></p>
                            <p class="summary-info total-info "><span class="title">Total</span><b class="index">${{Cart::total()}}</b></p>
                        @endif
                    </div>

                    <div class="checkout-info">
                        @if (!Session::has('coupon'))
                        <label class="checkbox-field">
                            <input class="frm-input " name="have-code" id="have-code" value="1" type="checkbox" wire:model="haveCouponCode"><span>Tengo Cupon Promocional</span>
                        </label>

                        @if ($haveCouponCode == 1)
                            <div class="summary-item">
                                <form wire:submit.prevent="applyCouponCode">
                                    <h4 class="title-box">Código de Cupon</h4>

                                    @if (Session::has('coupon_message'))
                                        <div class="alert alert-danger" role="danger">{{Session::get('coupon_message')}}</div>
                                    @endif

                                    <p class="row-in-form">
                                        <label for="coupon-code">Ingrese su código: </label>
                                        <input type="text" name="coupon-code" wire:model="couponCode">
                                    </p>
                                    <button type="submit" class="btn btn-small">Aplicar</button>
                                </form>
                            </div>
                        @endif
                    @endif
                        <a class="btn btn-checkout" href="#" wire:click.prevent="checkout">Verificar</a>
                        <a class="link-to-shop" href="{{route('shop')}}">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>

                    <div class="update-clear">
                        <a class="btn btn-clear" href="#" wire:click.prevent="destroyAll()">Clear Shopping Cart</a>
                    </div>
                </div>
            @else
                <div class="text-center" style="padding: 30px 0;">
                    <h1>Tu carrito está vacio!</h1>
                    <p>Añade productos ahora</p>
                    <a href="/shop" class="btn btn-success">Comprar</a>
                </div>
            @endif

            <div class="wrap-show-advance-info-box style-1 box-in-site">
                <h3 class="title-box">Productos más vistos</h3>
                <div class="wrap-products">
                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ ('assets/images/products/digital_4.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Bate de Beisbol [Negro con Detalles Amarillos]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ ('assets/images/products/digital_17.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Gafas de Buceo [Azul - Azul Oscuro]</span></a>
                                <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ ('assets/images/products/digital_15.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Bate de Beisbol [Rojo]</span></a>
                                <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ ('assets/images/products/digital_1.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item bestseller-label">Bestseller</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Gafas de Buceo para Hombre [Negro]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ ('assets/images/products/digital_21.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Polo Manga Corta [Negro]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ ('assets/images/products/digital_3.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Pelota de Futbol [Blanco]</span></a>
                                <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ ('assets/images/products/digital_4.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ ('assets/images/products/digital_5.jpg') }}" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item bestseller-label">Bestseller</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>
                    </div>
                </div><!--End wrap-products-->
            </div>

        </div><!--end main content area-->
    </div><!--end container-->

</main>
