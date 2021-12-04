<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{

    // Variables de los cupones
    public $haveCouponCode;
    public $couponCode;

    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;

    // Funciones para añadir producto cada vez que presione + en el carrito de compras
    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
    }

    // Funciones para reducir producto cada vez que presione - en el carrito de compras
    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId,$qty);
    }

    // Función para eliminar un producto del carrito
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        session()->flash('success_message','El producto fue eliminado');
    }

    // Función para eliminar todos los productos del carrito
    public function destroyAll()
    {
        Cart::destroy();
    }

    public function applyCouponCode()
    {
        $coupon = Coupon::where('code',$this->couponCode)->where('cart_value','<=',Cart::instance('cart')->subtotal())->first();
        if(!$coupon)
        {
            session()->flash('coupon_message','Cupon Invalido');
            return;
        }

        session()->put('coupon',[
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'cart_value' => $coupon->cart_value,
        ]);
    }

    public function calculateDiscounts()
    {
        if(session()->has('coupon'))
        {
            if(session()->get('coupon')['type'] == 'fixed')
            {
                $this->discount = session()->get('coupon')['value'];
            }
            else
            {
                $this->discount = (Cart::instance('cart')->subtotal() * session()->get('coupon')['value'])/100;
            }
            $this->subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $this->discount;
            $this->taxAfterDiscount = ($this->subtotalAfterDiscount * config('cart.tax'))/100;
            $this->totalAfterDiscount = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
        }
    }

    public function removeCoupon()
    {
        session()->forget('coupon');
    }


    // Si no esta logeado, no puede verificar la compra
    public function checkout()
    {
        if(Auth::check())
        {
            return redirect()->route('checkout');
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function setAmountForCheckout()
    {
        if(!Cart::count() > 0)
        {
            session()->forget('checkout');
            return;
        }

        session()->put('checkout',[
            'subtotal' => Cart::instance('cart')->subtotal(),
            'tax' => Cart::instance('cart')->tax(),
            'total' => Cart::instance('cart')->total()
        ]);

    }

    public function render()
    {
        // Si el precio a pagar supera al cart_value o sea la compra minima debe superar para canjear el cupon
        if(session()->has('coupon'))
        {
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value'])
            {
                session()->forget('coupon');
            }
            else
            {
                $this->calculateDiscounts();
            }
            $this->setAmountForCheckout();
        }
        return view('livewire.cart-component')->layout("layouts.base");
    }
}
