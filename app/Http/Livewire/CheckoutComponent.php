<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Illuminate\Support\Facades\DB;

class CheckoutComponent extends Component
{

    public $prueba;

    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;
    public $paymentmode;
    public $thankyou;

/*
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zipcode' => 'required'
        ]);

    }
*/
    public function save(){
        DB::table('orders')->insert([
            'user_id' => Auth::user()->id,
            'subtotal' => Cart::subtotal(),
            'tax' => Cart::tax(),
            'total' => Cart::total(),
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'line1' => $this->line1,
            'line2' => $this->line2,
            'city' => $this->city,
            'province' => $this->province,
            'country' => $this->country,
            'zipcode'=> $this->zipcode,
        ]);

        $orderid= Order::select('id')->latest('id')->first();
        // $data = Modelo::latest('id')->first();

        foreach(Cart::content() as $item)
        {

            DB::table('order_items')->insert([
                'product_id'=> $item->model->id,
                'order_id'=> $orderid['id'],
                'price'=> $item->model->regular_price,
                'quantity'=> $item->qty
            ]);

            DB::table('products')->where('id','=',($item->model->id))->update([
                'quantity' => $item->model->quantity - $item->qty

            ]);

        }

        $this->thankyou = 1;
        Cart::destroy();
        session()->forget('checkout');
    }
/*
    public function placeOrder()
    {
        $this->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zipcode' => 'required',
            'paymentmode' => 'required'
        ]);

        $order = New Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];

        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->email = $this->email;
        $order->mobile = $this->mobile;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->city = $this->city;
        $order->province = $this->province;
        $order->country = $this->country;
        $order->zipcode = $this->zipcode;

        $order->status = 'ordered';
        $order->save();

        foreach(Car::instance('cart')->content() as $item)
        {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        if($this->paymentmode === 'cod')
        {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'cod';
            $transaction->status = 'pending';
            $transaction->save();
        }

        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');



    }
*/

    public function verifyForCheckout()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        else if($this->thankyou)
        {
            return redirect()->route('thankyou');
        }
        // else if(!session()->get('checkout')){
        //     return redirect()->route('product.cart');
        // }
        // #Se agrego lo de arriba

    }

    public function render()
    {
        $cart=Cart::content();
        $this->verifyForCheckout();
        return view('livewire.checkout-component',compact('cart'))->layout("layouts.base");
    }
}
