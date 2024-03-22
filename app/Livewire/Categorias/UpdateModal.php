<?php

namespace App\Livewire\Categorias;

use Livewire\Component;
use App\Models\Categoria;
use Illuminate\Http\Request;



class UpdateModal extends Component
{
    public $nombre;  
    public $id;

    public function update(Request $request){
        $data=Categoria::find($this->id);
        $data->nombre=$this->nombre; 
        $data->update();
    }
    public function render()
    {
        return view('livewire.categorias.update-modal');
    }
}
