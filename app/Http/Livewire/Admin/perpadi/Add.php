<?php

namespace App\Http\Livewire\Admin\Perpadi;

use App\Models\Perpadi as ModelsPerpadi;
use App\Models\DataPenggilingan; // Import model DataPenggilingan
use Livewire\Component;
use Illuminate\Support\Str; // Import Str facade

class Add extends Component
{
    public $perpadis, $dataPenggilingans, $penggilingan_id, $harga_gabah, $stok_gabah, $harga_beras, $stok_beras, $perpadi_id;
    public $modal = false; // Initial state of the modal
    public $search = ''; // Search term for penggilingan
    public $filteredPenggilingan = []; // Filtered penggilingan results
    public $showResults = false; // Flag to control the visibility of search results

    public function render()
    {
        // Filter penggilingan based on search term
        if ($this->showResults && $this->search) {
            $this->filteredPenggilingan = DataPenggilingan::when($this->search, function ($query) {
                $query->where('nama_penggilingan', 'like', '%' . $this->search . '%')
                    ->orWhere('pemilik', 'like', '%' . $this->search . '%')
                    ->orWhere('lokasi', 'like', '%' . $this->search . '%');
            })->limit(5)->get(); // Limit results to 5
        }

        return view('livewire.admin.perpadi.add');
    }

    public function resetFields()
    {
        $this->penggilingan_id = '';
        $this->harga_gabah = '';
        $this->stok_gabah = '';
        $this->harga_beras = '';
        $this->stok_beras = '';
        $this->perpadi_id = '';
        $this->search = '';
        $this->filteredPenggilingan = [];
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
            'penggilingan_id' => 'required|exists:data_penggilingans,id',
            'harga_gabah' => 'required|numeric',
            'stok_gabah' => 'required|numeric',
            'harga_beras' => 'required|numeric',
            'stok_beras' => 'required|numeric',
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
            'penggilingan_id' => $this->penggilingan_id,
            'harga_gabah' => $this->harga_gabah,
            'stok_gabah' => $this->stok_gabah,
            'harga_beras' => $this->harga_beras,
            'stok_beras' => $this->stok_beras,
            'uuid' => Str::uuid(), // Generate a new UUID
        ]);
    }

    public function updatePerpadi()
    {
        $perpadi = ModelsPerpadi::find($this->perpadi_id);
        $perpadi->update([
            'penggilingan_id' => $this->penggilingan_id,
            'harga_gabah' => $this->harga_gabah,
            'stok_gabah' => $this->stok_gabah,
            'harga_beras' => $this->harga_beras,
            'stok_beras' => $this->stok_beras,
        ]);
    }

    public function delete($id)
    {
        ModelsPerpadi::find($id)->delete();
        session()->flash('message', 'Perpadi deleted successfully.');
        $this->refreshTable();
    }

    public function selectPenggilingan($id)
    {
        $this->penggilingan_id = $id;
        $this->search = DataPenggilingan::find($id)->nama_penggilingan; // Set the search term to the selected penggilingan name
        $this->filteredPenggilingan = [];
        $this->showResults = false;
    }

    public function updatedSearch()
    {
        $this->showResults = !empty($this->search);
    }
}
