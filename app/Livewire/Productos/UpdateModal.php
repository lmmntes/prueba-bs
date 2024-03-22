<?php

namespace App\Livewire\Productos;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;



class UpdateModal extends Component
{
    public $nombre;
    public $precio;
    public $categoria;
    public $descuento;
    public $id;
    public $cat;

    public function update(Request $request){
        $data=Producto::find($this->id);
        dd($this->descuento);
        $data->nombre=$this->nombre;
        $data->categoria=$this->categoria;
        $data->precio=$this->precio;
        $data->descuento=$this->descuento;
        $data->update();
    }
    public function render()
    {
        $this->cat=Categoria::all();
        return view('livewire.productos.update-modal');
    }
}
