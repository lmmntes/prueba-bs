<?php

namespace App\Livewire\Clientes;

use Livewire\Component;
use App\Models\Cliente;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Attributes\On; 


class IndexList extends Component
{
    use WithPagination,WithoutUrlPagination;

    public $search='';

    protected function clientes()
    {
        return $this->search === ''
            ? Cliente::paginate(5)
            : Cliente::where('nombre', 'like', '%'.$this->search.'%')->paginate(5);
    }

    #[On('refreshv2')]
    public function render()
    {

        $data = $this->clientes();
        return view('livewire.clientes.index-list',compact('data'));
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function delete(Cliente $cliente){
        $cliente->delete();

    }
}
