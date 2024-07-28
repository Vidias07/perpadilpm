<?php

namespace App\Http\Livewire\Master\DataPenggilingan;

use Livewire\Component;
use App\Models\DataPenggilingan;

class Edit extends Component
{
    public $uuid;
    public $nama_penggilingan, $pemilik, $lokasi, $no_telepon;

    protected $rules = [
        'nama_penggilingan' => 'required|string|max:255',
        'pemilik' => 'required|string|max:255',
        'lokasi' => 'required|string|max:255',
        'no_telepon' => 'required|string|max:20',
    ];

    public function mount($uuid)
    {
        $this->uuid = $uuid;
        $data = DataPenggilingan::where('uuid', $uuid)->firstOrFail();

        $this->nama_penggilingan = $data->nama_penggilingan;
        $this->pemilik = $data->pemilik;
        $this->lokasi = $data->lokasi;
        $this->no_telepon = $data->no_telepon;
    }

    public function render()
    {
        return view('livewire.master.data-penggilingan.edit');
    }

    public function update()
    {
        $this->validate();

        $data = DataPenggilingan::where('uuid', $this->uuid)->firstOrFail();

        $data->update([
            'nama_penggilingan' => $this->nama_penggilingan,
            'pemilik' => $this->pemilik,
            'lokasi' => $this->lokasi,
            'no_telepon' => $this->no_telepon,
        ]);

        $this->emit('refreshDataPenggilinganList');
        return redirect()->route('data-penggilingan.index');
    }
}
