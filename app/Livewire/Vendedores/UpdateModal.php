<?php

namespace App\Livewire\Vendedores;

use Livewire\Component;
use App\Models\Vendedor;
use Illuminate\Http\Request;



class UpdateModal extends Component
{
    public $nombre;
    public $cedula;
    public $id;

    public function update(Request $request){
        $data=Vendedor::find($this->id);
        dd($this->descuento);
        $data->nombre=$this->nombre;
        $data->cedula=$this->cedula;
        $data->update();
    }
    public function render()
    {
        return view('livewire.vendedores.update-modal');
    }
}
