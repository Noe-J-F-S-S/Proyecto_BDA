<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;

class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
    }
    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        if($this->sorting=='date')
        {
            // Ordena de por orden de creación o insercción a la base de datos
            $products = Product::orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting=='price')
        {
            // Ordena por el precio de menor a mayor
            $products = Product::orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting=='price-desc')
        {
            // Ordena por el precio de mayor a menor
            $products = Product::orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else
        {
            // Selecciona la cantidad de productos a mostrarse en pantalla
            $products = Product::paginate($this->pagesize);
        }


        $categories = Category::all();
        return view('livewire.shop-component',['products'=> $products,'categories'=> $categories])->layout("layouts.base");
    }
}
