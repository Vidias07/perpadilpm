<?php

namespace App\Http\Livewire\Laporan;

use App\Models\Laporan as ModelsLaporan;
use Livewire\Component;

class Add extends Component
{
    public $laporans, $name, $tanggal, $sumber, $status, $start_date, $end_date, $laporan_id;
    public $modal = false; // Initial state of the modal

    public function render()
    {
        $this->laporans = ModelsLaporan::all();
        return view('livewire.laporan.add');
    }

    public function resetFields()
    {
        $this->name = '';
        $this->tanggal = '';
        $this->sumber = '';
        $this->status = '';

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
            'name' => 'required|string|max:255',
            'tanggal' => 'required|date',

            'status' => 'required|string|max:255',

        ]);

        if ($this->laporan_id) {
            $this->updateLaporan();
        } else {
            $this->createLaporan();
        }

        $this->closeModal();
        $this->resetFields();
        $this->refreshTable();
    }

    public function createLaporan()
    {
        ModelsLaporan::create([
            'name' => $this->name,
            'tanggal' => $this->tanggal,

            'status' => $this->status,

        ]);
    }

    public function updateLaporan()
    {
        $laporan = ModelsLaporan::find($this->laporan_id);
        $laporan->update([
            'name' => $this->name,
            'tanggal' => $this->tanggal,
                      'status' => $this->status,

        ]);
    }

    public function delete($id)
    {
        ModelsLaporan::find($id)->delete();
        session()->flash('message', 'Laporan deleted successfully.');
        $this->refreshTable();
    }

    public function edit($id)
    {
        $laporan = ModelsLaporan::find($id);
        $this->laporan_id = $laporan->id;
        $this->name = $laporan->name;
        $this->tanggal = $laporan->tanggal;
        $this->status = $laporan->status;

        $this->openModal();
    }
}
