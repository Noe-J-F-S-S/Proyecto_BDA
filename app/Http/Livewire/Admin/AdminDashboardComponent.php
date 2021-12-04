<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class AdminDashboardComponent extends Component
{

    public function render()
    {
        $nombres = array();
        $cantidad = array();
        $tabla = Product::select('name','quantity')->get();
        $filas = Product::select('name','quantity')->count();
        for($i=0; $i<$filas; $i++)
        {
            $nombres[] = $tabla[$i]['name'];
            $cantidad[] = $tabla[$i]['quantity'];
        }

        return view('livewire.admin.admin-dashboard-component',compact('tabla','filas','nombres','cantidad'))->layout('layouts.base');
    }
}
