<?php

namespace App\Http\Livewire\Master\DataLumbung;

use Livewire\Component;
use App\Models\DataLumbung;

class Delete extends Component
{
    public $lumbungId;
    public $showModal = false;

    public function mount($id)
    {
        $this->lumbungId = $id;
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function deleteLumbung()
    {
        $lumbung = DataLumbung::findOrFail($this->lumbungId);
        $lumbung->delete();

        session()->flash('message', 'Lumbung deleted successfully.');
        $this->emit('refreshLivewireDatatable ');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.master.data-lumbung.delete');
    }
}
