<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class UserHistorialComponent extends Component
{
    public function render()
    {
        // $tabla= OrderItem::select('orders.id','orders.firstname','orders.lastname','orders.subtotal','orders.tax','orders.total','orders.email',"products.name","products.regular_price")
        // ->join("orders","orders.id","=","order_items.order_id")->join("products", "products.id", "=", "order_items.product_id")->where('orders.user_id','=',auth()->user()->id)->get();

        $tabla=Order::select('*')->where('user_id','=',auth()->user()->id)->get();

        return view('livewire.user.user-historial-component',compact('tabla'))->layout('layouts.base');
    }
}
