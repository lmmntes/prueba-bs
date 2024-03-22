<?php

namespace App\Livewire\Productos;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Categoria;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Attributes\On; 


class IndexList extends Component
{
    use WithPagination,WithoutUrlPagination;

    public $search='';

    protected function productos()
    {
        return $this->search === ''
            ? Producto::paginate(5)
            : Producto::where('nombre', 'like', '%'.$this->search.'%')->paginate(5);
    }

    #[On('refreshv2')]
    public function render()
    {
        $cat=Categoria::all();

        $data = $this->productos();
        return view('livewire.productos.index-list',compact('data','cat'));
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function delete(Producto $producto){
        $producto->delete();

    }
}
