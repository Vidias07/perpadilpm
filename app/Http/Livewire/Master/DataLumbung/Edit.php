<?php

namespace App\Http\Livewire\Master\DataLumbung;

use Livewire\Component;
use App\Models\DataLumbung;

class Edit extends Component
{
    public $uuid;
    public $nama_lumbung;
    public $confirmingDeletion = false;

    protected $rules = [
        'nama_lumbung' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
    ];

    public function mount($uuid)
    {
        $this->uuid = $uuid;
        $data = DataLumbung::where('uuid', $uuid)->firstOrFail();

        $this->nama_lumbung = $data->nama_lumbung;
        $this->alamat = $data->alamat;
    }

    public function render()
    {
        return view('livewire.master.data-lumbung.edit');
    }

    public function update()
    {
        $this->validate();

        $data = DataLumbung::where('uuid', $this->uuid)->firstOrFail();

        $data->update([
            'nama_lumbung' => $this->nama_lumbung,
            'alamat' => $this->alamat,
        ]);

        $this->emit('refreshDataLumbungList');
        return redirect()->back();
    }

    public function confirmDeletion()
    {
        $this->confirmingDeletion = true;
    }

    public function delete()
    {
        $data = DataLumbung::where('uuid', $this->uuid)->firstOrFail();
        $data->delete();

        $this->emit('refreshDataLumbungList');
        $this->confirmingDeletion = false;
        return redirect()->back();
    }

    public function cancelDeletion()
    {
        $this->confirmingDeletion = false;
    }
}
