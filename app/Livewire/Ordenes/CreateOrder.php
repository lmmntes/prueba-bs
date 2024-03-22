<?php

namespace App\Livewire\Ordenes;
use Illuminate\Support\Facades\App;
use Livewire\Attributes\On; 
use App\Models\Cliente;
use App\Models\Vendedor;
use App\Models\Producto;
use App\Models\Orden;
use App\Models\Venta;





use Livewire\Component;

class CreateOrder extends Component
{
    public $items=[];
    public $item_id,$cant,$id_cliente,$nombre,$vendedores,$vendedor,$subtotal,$total;
    public function render()
    { 
        $data =$this->items;
        $this->vendedores=Vendedor::all();

        return view('livewire.ordenes.create-order',compact('data'));
    }
    #[On('producto_send')] 
    public function add_producto($id,$cant){
        $producto=Producto::find($id);
        $arr['id']=$producto->id;
        $arr['nombre']=$producto->nombre;
        $arr['categoria']=$producto->categoria;
        $arr['cant']=$cant;
        $arr['precio']=$producto->precio;
        $arr['subtotal']=$producto->precio*$cant;
        $this->subtotal=$this->subtotal+$arr['subtotal'];
        $arr['descuento']=$producto->descuento;
        if($producto->descuento==1){
            $arr['total']=$arr['subtotal'];
            $this->total=$this->total+$arr['total'];
        }else{
            $arr['total']=$arr['subtotal']+($arr['subtotal']*0.16);
            $this->total=$this->total+$arr['total'];
        }
        $object = (object) $arr;
        $this->items[]=$object;        
    }
    #[On('client_send')] 
    public function sel_client($cedula){
        $cliente=Cliente::where('cedula',$cedula)->first();
        $this->nombre=$cliente->nombre;
        $this->id_cliente=$cliente->id;
    }

    public function save(){
        $orden=new Orden;
        $orden->subtotal=$this->subtotal;
        $orden->iva=$this->subtotal*0.16;
        $orden->total=$this->total;
        $orden->id_cliente=$this->id_cliente;
        $orden->id_vendedor=$this->vendedor;
        $orden->save();
        foreach ($this->items as $item) {
            $venta=new Venta;
            $venta->id_orden=$orden->id;
            $venta->id_producto=$item->id;
            $venta->cant=$item->cant;
            $venta->precio=$item->precio;
            $venta->descuento=$item->descuento;
            $venta->id_cliente=$this->id_cliente;
            $venta->id_vendedor=$this->vendedor;
            $venta->save();
        }
        session()->flash('success', 'Orden Creada');
        $this->clearInputs();
        
    }
    public function clearInputs(){
        $this->items=[];
        $this->total=null;
        $this->subtotal=null;
        $this->nombre=null;
        $this->id_cliente=null;
        $this->vendedor=null;
        $this->cant=null;


    }
}
