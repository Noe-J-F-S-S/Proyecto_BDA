<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrderItem;

class BotonDetalleFactura extends Component
{

    public $idOrder;
    public $tabla;
    public $open=false;

    protected $listeners=['cargar'];

    public function cargar(){
        $this->open=true;
    }

    public function render()
    {
        $this->tabla=OrderItem::select('products.image','products.name','order_items.quantity','order_items.price','order_items.order_id')->join('products','products.id','=','order_items.product_id')->where('order_id','=',$this->idOrder)->get();
        return view('livewire.boton-detalle-factura');
    }
}
