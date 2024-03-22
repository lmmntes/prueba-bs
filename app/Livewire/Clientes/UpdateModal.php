<?php

namespace App\Livewire\Clientes;

use Livewire\Component;
use App\Models\Cliente;
use Illuminate\Http\Request;



class UpdateModal extends Component
{
    public $nombre;
    public $cedula;
    public $telefono;
    public $direccion;
    public $id;

    public function update(Request $request){
        $data=Cliente::find($this->id);
        dd($this->descuento);
        $data->nombre=$this->nombre;
        $data->cedula=$this->cedula;
        $data->telefono=$this->telefono;
        $data->direccion=$this->direccion;
        $data->update();
    }
    public function render()
    {
        return view('livewire.clientes.update-modal');
    }
}
