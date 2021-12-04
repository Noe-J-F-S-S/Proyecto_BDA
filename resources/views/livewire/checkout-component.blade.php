<!--main area-->
<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">Inicio</a></li>
                <li class="item-link"><span>Verificación</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <form wire:submit.prevent="placeOrder">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                        <h3 class="box-title">Dirección de Envío</h3>
                            <div class="billing-address">
                                <p class="row-in-form">
                                    <label for="fname">Nombres<span>*</span></label>
                                    <input type="text" name="fname" value="" placeholder="Nombres" wire:model="firstname">
                                    @error('firstname') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="lname">Apellidos<span>*</span></label>
                                    <input type="text" name="lname" value="" placeholder="Apellidos" wire:model="lastname">
                                    @error('lastname') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Correo Electrónico:</label>
                                    <input type="email" name="email" value="" placeholder="Correo Electrónico" wire:model="email">
                                    @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Número Celular<span>*</span></label>
                                    <input type="number" name="phone" value="" placeholder="123456789" wire:model="mobile">
                                    @error('mobile') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Dirección:</label>
                                    <input type="text" name="add" value="" placeholder="Dirección de vivienda" wire:model="line1">
                                    @error('line1') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="linea2">Segunda Dirección (Opcional):</label>
                                    <input type="text" name="linea2" value="" placeholder="Dirección de segunda vivienda" wire:model="line2">
                                </p>
                                <p class="row-in-form">
                                    <label for="country">Pais<span>*</span></label>
                                    <input type="text" name="country" value="" placeholder="Pais" wire:model="country">
                                    @error('country') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Ciudad<span>*</span></label>
                                    <input type="text" name="city" value="" placeholder="Ciudad" wire:model="city">
                                    @error('city') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="provincia">Provincia<span>*</span></label>
                                    <input type="text" name="provincia" value="" placeholder="Provincia" wire:model="province">
                                    @error('province') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="zip-code">Postcode / ZIP:</label>
                                    <input type="number" name="zip-code" value="" placeholder="Código Postal" wire:model="zipcode">
                                    @error('zipcode') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="summary summary-checkout">
                    <div class="summary-item payment-method">
                        <h4 class="title-box">Metodo de Pago</h4>
                        <p class="summary-info"><span class="title">Check / Money order</span></p>
                        <p class="summary-info"><span class="title">Tarjeta de Crédito (saved)</span></p>
                        <div class="choose-payment-methods">
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model="paymentmode">
                                <span>Contra Pago</span>
                                <span class="payment-desc">Pague en efectivo cuando el producto este en su puerta</span>
                            </label>
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model="paymentmode">
                                <span>Tarjeta de Credito o Debito</span>
                                <span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
                            </label>
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-paypal" value="paypal" type="radio" wire:model="paymentmode">
                                <span>Paypal</span>
                                <span class="payment-desc">You can pay with your credit</span>
                                <span class="payment-desc">card if you don't have a paypal account</span>
                            </label>
                            @error('paymentmode') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        @if (Cart::count() > 0)
                            <p class="summary-info grand-total"><span>Total</span> <span class="grand-total-price">${{Cart::total()}}</span></p>
                        @endif
                        <button type="submit" class="btn btn-medium" wire:click.prevent="save">Solicitar pedido ahora</button>
                    </div>
                    <div class="summary-item shipping-method">
                        <h4 class="title-box f-title">Shipping method</h4>
                        <p class="summary-info"><span class="title">Flat Rate</span></p>
                        <p class="summary-info"><span class="title">Fixed $0</span></p>
                    </div>
                </div>
            </form>


        </div>

    </div>
</main>
