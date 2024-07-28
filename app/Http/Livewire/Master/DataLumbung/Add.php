<?php

namespace App\Http\Livewire\Master\DataLumbung;

use Livewire\Component;
use App\Models\DataLumbung;
use Illuminate\Support\Str;

class Add extends Component
{
    public $nama_lumbung;
    public $alamat;
    public $showModal = false;

    protected $rules = [
        'nama_lumbung' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
    ];

    public function openModal()
    {
        $this->reset(['nama_lumbung']);

        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function addLumbung()
    {
        $this->validate();

        DataLumbung::create([
            'uuid' => (string) Str::uuid(),
            'nama_lumbung' => $this->nama_lumbung,
            'alamat' => $this->alamat,
        ]);


        $this->emit('refreshLivewireDatatable');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.master.data-lumbung.add');
    }
}
