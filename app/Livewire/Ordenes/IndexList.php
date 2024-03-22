<?php

namespace App\Livewire\Ordenes;

use Livewire\Component;
use App\Models\Orden;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use Livewire\Attributes\On; 


class IndexList extends Component
{
    use WithPagination,WithoutUrlPagination;

    public $search='';

    protected function ordenes()
    {
        return $this->search === ''
            ? Orden::paginate(5)
            : Orden::where('nombre', 'like', '%'.$this->search.'%')->paginate(5);
    }

    #[On('refreshv2')]
    public function render()
    {
        $data = $this->ordenes();
        return view('livewire.ordenes.index-list',compact('data'));
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function delete(Orden $ordenes){
        $ordenes->delete();

    }
}
