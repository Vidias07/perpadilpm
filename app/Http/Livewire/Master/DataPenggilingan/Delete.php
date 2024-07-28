<?php

namespace App\Http\Livewire\Master\DataPenggilingan;

use Livewire\Component;
use App\Models\DataPenggilingan;

class Delete extends Component
{
    public $uuid;
    public $confirmingDeletion = false;

    public function mount($uuid)
    {
        $this->uuid = $uuid;
    }

    public function render()
    {
        return view('livewire.master.data-penggilingan.delete');
    }

    public function confirmDeletion()
    {
        $this->confirmingDeletion = true;
    }

    public function delete()
    {
        $data = DataPenggilingan::where('uuid', $this->uuid)->firstOrFail();
        $data->delete();

        $this->emit('refreshDataPenggilinganList');
        $this->confirmingDeletion = false;
        return redirect()->route('data-penggilingan.index');
    }

    public function cancelDeletion()
    {
        $this->confirmingDeletion = false;
    }
}
