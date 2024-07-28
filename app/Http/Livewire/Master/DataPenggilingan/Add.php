<?php

namespace App\Http\Livewire\Master\DataPenggilingan;

use Livewire\Component;
use App\Models\DataPenggilingan;
use Illuminate\Support\Str;

class Add extends Component
{
    public $nama_penggilingan;
    public $pemilik;
    public $lokasi;
    public $no_telepon;
    public $showModal = false;

    protected $rules = [
        'nama_penggilingan' => 'required|string|max:255',
        'pemilik' => 'nullable|string|max:255',
        'lokasi' => 'nullable|string|max:255',
        'no_telepon' => 'nullable|string|max:15',
    ];

    public function openModal()
    {
        $this->reset(['nama_penggilingan', 'pemilik', 'lokasi', 'no_telepon']);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function addPenggilingan()
    {
        $this->validate();

        DataPenggilingan::create([
            'uuid' => (string) Str::uuid(),
            'nama_penggilingan' => $this->nama_penggilingan,
            'pemilik' => $this->pemilik,
            'lokasi' => $this->lokasi,
            'no_telepon' => $this->no_telepon,
        ]);

        session()->flash('message', 'Penggilingan added successfully.');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.master.data-penggilingan.add');
    }
}
