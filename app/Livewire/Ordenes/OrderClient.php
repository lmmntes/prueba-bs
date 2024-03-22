<?php

namespace App\Livewire\Ordenes;

use Livewire\Component;
use App\Models\Cliente;

class OrderClient extends Component
{
    public $nombre;
    public $cedula;
    public $telefono;
    public $direccion;
    public $found=false;
    protected $cliente;

    public function render()
    {
        return view('livewire.ordenes.order-client');
    }
    public function buscar()
    {
        $this->cliente=Cliente::where('cedula',$this->cedula)->first();
        if(!empty($this->cliente)){
            $this->nombre=$this->cliente->nombre;
            $this->telefono=$this->cliente->telefono;
            $this->direccion=$this->cliente->direccion;
            $this->found=true;
            $this->cliente=null;
        }
    }
    public function changefound(){
        $this->found=false;
        $this->clearInputs();
    }
    
    public function clearInputs(){
        $this->nombre='';
        $this->cedula='';
        $this->telefono='';
        $this->direccion='';
    }

    public function send(){
        if(!Cliente::where('cedula',$this->cedula)->exists()){
        if(empty($this->cliente)){
            $cliente= new Cliente;
            $cliente->nombre=$this->nombre;
            $cliente->cedula=$this->cedula;
            $cliente->telefono=$this->telefono;
            $cliente->direccion=$this->direccion;
            $cliente->save();
        }else;
        $this->dispatch('client_send',$this->cedula);
    }else{
        $this->dispatch('client_send',$this->cedula);

    }
        
    }
}
