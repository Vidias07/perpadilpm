<?php

namespace App\Http\Livewire\Admin\Lpm;

use App\Models\Lpm as ModelsLpm;
use App\Models\DataLumbung;
use Livewire\Component;

class Edit extends Component
{
    public $lpm;
    public $dataLumbungs = [];
    public $lumbung_id, $harga_gabah, $stok_gabah, $harga_beras, $stok_beras;
    public $search = '';
    public $filteredLumbung = [];
    public $showResults = false;

    public function mount($uuid)
    {
        $this->lpm = ModelsLpm::where('uuid', $uuid)->first();
        $this->dataLumbungs = DataLumbung::all();

        if ($this->lpm) {
            $this->lumbung_id = $this->lpm->lumbung_id;
            $this->harga_gabah = $this->lpm->harga_gabah;
            $this->stok_gabah = $this->lpm->stok_gabah;
            $this->harga_beras = $this->lpm->harga_beras;
            $this->stok_beras = $this->lpm->stok_beras;
        }
    }

    public function updatedSearch()
    {
        $this->showResults = !empty($this->search);
        $this->filteredLumbung = DataLumbung::when($this->search, function ($query) {
            $query->where('nama_lumbung', 'like', '%' . $this->search . '%')
            ;
        })->limit(5)->get();
    }

    public function selectLumbung($id)
    {
        $this->lumbung_id = $id;
        $this->search = DataLumbung::find($id)->nama_lumbung;
        $this->filteredLumbung = [];
        $this->showResults = false;
    }

    public function updateLpm()
    {
     
        $this->validate([
            'lumbung_id' => 'required|exists:data_lumbungs,id',
            'harga_gabah' => 'required|numeric',
            'stok_gabah' => 'required|numeric',
            'harga_beras' => 'required|numeric',
            'stok_beras' => 'required|numeric',
        ]);

        $this->lpm->update([
            'lumbung_id' => $this->lumbung_id,
            'harga_gabah' => $this->harga_gabah,
            'stok_gabah' => $this->stok_gabah,
            'harga_beras' => $this->harga_beras,
            'stok_beras' => $this->stok_beras,
        ]);
        $this->emit('refreshLivewireDatatable');
   
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.admin.lpm.edit');
    }
}
