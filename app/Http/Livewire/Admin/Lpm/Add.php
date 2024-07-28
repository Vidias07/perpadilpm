<?php

namespace App\Http\Livewire\Admin\Lpm;

use App\Models\Lpm as ModelsLpm;
use App\Models\DataLumbung; // Import model DataLumbung
use Livewire\Component;
use Illuminate\Support\Str; // Import Str facade

class Add extends Component
{
    public $lpms, $dataLumbungs, $lumbung_id, $harga_gabah, $stok_gabah, $harga_beras, $stok_beras, $lpm_id;
    public $modal = false; // Initial state of the modal
    public $search = ''; // Search term for lumbung
    public $filteredLumbung = []; // Filtered lumbung results
    public $showResults = false; // Flag to control the visibility of search results

    public function render()
    {
        // Filter lumbung based on search term
        if ($this->showResults && $this->search) {
            $this->filteredLumbung = DataLumbung::when($this->search, function ($query) {
                $query->where('nama_lumbung', 'like', '%' . $this->search . '%');
            })->limit(5)->get(); // Limit results to 5
        }

        return view('livewire.admin.lpm.add');
    }

    public function resetFields()
    {
        $this->lumbung_id = '';
        $this->harga_gabah = '';
        $this->stok_gabah = '';
        $this->harga_beras = '';
        $this->stok_beras = '';
        $this->lpm_id = '';
        $this->search = '';
        $this->filteredLumbung = [];
        $this->showResults = false;
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
            'lumbung_id' => 'required|exists:data_lumbungs,id',
            'harga_gabah' => 'required|numeric',
            'stok_gabah' => 'required|numeric',
            'harga_beras' => 'required|numeric',
            'stok_beras' => 'required|numeric',
        ]);

        if ($this->lpm_id) {
            $this->updateLpm();
        } else {
            $this->createLpm();
        }

        $this->closeModal();
        $this->resetFields();
        $this->refreshTable();
    }

    public function createLpm()
    {
        ModelsLpm::create([
            'lumbung_id' => $this->lumbung_id,
            'harga_gabah' => $this->harga_gabah,
            'stok_gabah' => $this->stok_gabah,
            'harga_beras' => $this->harga_beras,
            'stok_beras' => $this->stok_beras,
            // UUID will be automatically generated
        ]);
    }

    public function updateLpm()
    {
        $lpm = ModelsLpm::find($this->lpm_id);
        $lpm->update([
            'lumbung_id' => $this->lumbung_id,
            'harga_gabah' => $this->harga_gabah,
            'stok_gabah' => $this->stok_gabah,
            'harga_beras' => $this->harga_beras,
            'stok_beras' => $this->stok_beras,
        ]);
    }

    public function delete($id)
    {
        ModelsLpm::find($id)->delete();
        session()->flash('message', 'Lpm deleted successfully.');
        $this->refreshTable();
    }

    public function selectLumbung($id)
    {
        $this->lumbung_id = $id;
        $this->search = DataLumbung::find($id)->nama_lumbung; // Set the search term to the selected lumbung name
        $this->filteredLumbung = [];
        $this->showResults = false;
    }

    public function updatedSearch()
    {
        $this->showResults = !empty($this->search);
    }
}
