<?php

namespace App\Livewire\Vendedores;

use Livewire\Component;
use App\Models\Vendedor;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Attributes\On; 


class IndexList extends Component
{
    use WithPagination,WithoutUrlPagination;

    public $search='';

    protected function vendedores()
    {
        return $this->search === ''
            ? Vendedor::paginate(5)
            : Vendedor::where('nombre', 'like', '%'.$this->search.'%')->paginate(5);
    }

    #[On('refreshv2')]
    public function render()
    {

        $data = $this->vendedores();
        return view('livewire.vendedores.index-list',compact('data'));
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function delete(Vendedor $vendedor){
        $vendedor->delete();

    }
}
