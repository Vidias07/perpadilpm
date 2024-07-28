<?php
namespace App\Http\Livewire\Admin\Perpadi;

use App\Models\Perpadi as ModelsPerpadi;
use Livewire\Component;

class Delete extends Component
{
    public $perpadiUuid;
    public $confirmingDeletion = false;

    public function mount($perpadiUuid)
    {
        $this->perpadiUuid = $perpadiUuid;
    }

    public function deletePerpadi()
    {
        $perpadi = ModelsPerpadi::where('uuid', $this->perpadiUuid)->firstOrFail();
        $perpadi->delete();

        session()->flash('message', 'Perpadi deleted successfully.');

        return redirect()->route('perpadi');
    }

    public function confirmDeletion()
    {
        $this->confirmingDeletion = true;
    }

    public function render()
    {
        return view('livewire.admin.perpadi.delete');
    }
}
