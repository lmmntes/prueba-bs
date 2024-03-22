<?php

namespace App\Livewire\Categorias;

use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Attributes\On; 


class IndexList extends Component
{
    use WithPagination,WithoutUrlPagination;

    public $search='';

    protected function categorias()
    {
        return $this->search === ''
            ? Categoria::paginate(5)
            : Categoria::where('nombre', 'like', '%'.$this->search.'%')->paginate(5);
    }

    #[On('refreshv2')]
    public function render()
    {

        $data = $this->categorias();
        return view('livewire.categorias.index-list',compact('data'));
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function delete(Categoria $categoria){
        $categoria->delete();

    }
}
