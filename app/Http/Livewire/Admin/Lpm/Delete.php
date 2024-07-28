<?php

namespace App\Http\Livewire\Admin\Lpm;

use App\Models\Lpm as ModelsLpm;
use Livewire\Component;

class Delete extends Component
{
    public $lpmId;
    public $confirmingDeletion = false;

    public function mount($lpmId)
    {
        $this->lpmId = $lpmId;
    }

    public function deleteLpm()
    {
        $lpm = ModelsLpm::findOrFail($this->lpmId);
        $lpm->delete();

        session()->flash('message', 'Lpm deleted successfully.');

        return redirect()->route('lpm');
    }

    public function confirmDeletion()
    {
        $this->confirmingDeletion = true;
    }

    public function render()
    {
        return view('livewire.admin.lpm.delete');
    }
}
