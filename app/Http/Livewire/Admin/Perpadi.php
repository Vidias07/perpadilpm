<?php

namespace App\Http\Livewire\Admin;

use App\Models\Perpadi as ModelsPerpadi;
use Livewire\Component;

class Perpadi extends Component
{
    public $perpadis, $nama_penggilingan, $pemilik, $lokasi, $no_telepon, $harga, $tanggal, $perpadi_id;
    public $modal = false; // Initial state of the modal

    public function render()
    {
        $this->perpadis = ModelsPerpadi::all();
        return view('livewire.admin.perpadi');
    }

    public function resetFields()
    {
        $this->nama_penggilingan = '';
        $this->pemilik = '';
        $this->lokasi = '';
        $this->no_telepon = '';
        $this->harga = '';
        $this->tanggal = '';
        $this->perpadi_id = '';
    }

    public function openModal()
    {
        $this->resetFields();
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function refreshTable()
    {
        $this->emit('refreshLivewireDatatable');
    }

    public function store()
    {
        $this->validate([
            'nama_penggilingan' => 'required|string|max:255',
            'pemilik' => 'required|string|max:25php5',
            'lokasi' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
            'harga' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        if ($this->perpadi_id) {
            $this->updatePerpadi();
        } else {
            $this->createPerpadi();
        }

        $this->closeModal();
        $this->resetFields();
        $this->refreshTable();
    }

    public function createPerpadi()
    {
        ModelsPerpadi::create([
            'nama_penggilingan' => $this->nama_penggilingan,
            'pemilik' => $this->pemilik,
            'lokasi' => $this->lokasi,
            'no_telepon' => $this->no_telepon,
            'harga' => $this->harga,
            'tanggal' => $this->tanggal,
        ]);


    }

    public function updatePerpadi()
    {
        $perpadi = ModelsPerpadi::find($this->perpadi_id);
        $perpadi->update([
            'nama_penggilingan' => $this->nama_penggilingan,
            'pemilik' => $this->pemilik,
            'lokasi' => $this->lokasi,
            'no_telepon' => $this->no_telepon,
            'harga' => $this->harga,
            'tanggal' => $this->tanggal,
        ]);


    }

    public function edit($id)
    {
        $perpadi = ModelsPerpadi::findOrFail($id);
        $this->perpadi_id = $id;
        $this->nama_penggilingan = $perpadi->nama_penggilingan;
        $this->pemilik = $perpadi->pemilik;
        $this->lokasi = $perpadi->lokasi;
        $this->no_telepon = $perpadi->no_telepon;
        $this->harga = $perpadi->harga;
        $this->tanggal = $perpadi->tanggal;
        $this->modal = true;
    }

    public function delete($id)
    {
        ModelsPerpadi::find($id)->delete();
        session()->flash('message', 'Perpadi deleted successfully.');
        $this->refreshTable();
    }
}
