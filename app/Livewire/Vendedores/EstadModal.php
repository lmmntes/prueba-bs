<?php

namespace App\Livewire\Vendedores;

use Livewire\Component;
use App\Models\Vendedor;
use App\Models\Venta;
use App\Models\Orden;
use Illuminate\Support\Facades\DB;


class EstadModal extends Component
{
    public $vendedor;
    public $vendedores;
    public $id;
    public $ventas;
    public $total;
    public $top;



  
    
    public function render()
    {
      
        $this->vendedores=Vendedor::all();
        return view('livewire.vendedores.estad-modal');
    }
}
