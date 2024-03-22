<?php

namespace App\Livewire\Ordenes;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\Producto;

class OrderCat extends Component
{
    public $cats;
    public $cat;
    public $productos;
    public $producto;
    public $cant;
    public $precio;
    public $descuento;

    public function render()
    {
        $this->cats=Categoria::all();
        $this->productos=Producto::where('categoria',$this->cat)->get();
        $producto=Producto::find($this->producto);
        if($producto!=null){
            $this->precio=$producto->precio;
            $this->descuento=$producto->descuento;
        }
        return view('livewire.ordenes.order-cat');
    }

    public function send(){
        
        $this->dispatch('producto_send',$this->producto,$this->cant);
        
    }
}
