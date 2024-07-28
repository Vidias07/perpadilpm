<?php

namespace App\Http\Livewire\Admin\Perpadi;

use App\Models\Perpadi as ModelsPerpadi;
use App\Models\DataPenggilingan;
use Livewire\Component;

class Edit extends Component
{
    public $nama_penggilingan, $pemilik, $lokasi, $no_telepon, $harga_gabah, $stok_gabah, $harga_beras, $stok_beras, $perpadi_id, $penggilingan_id;
    public $penggilinganOptions = [];
    public $search = '';
    public $filteredPenggilingan = [];

    protected $rules = [
        'penggilingan_id' => 'required|exists:data_penggilingans,id',
        'harga_gabah' => 'required|numeric',
        'stok_gabah' => 'required|numeric',
        'harga_beras' => 'required|numeric',
        'stok_beras' => 'required|numeric',
    ];

    public function mount($perpadiUuid = null)
    {
        if ($perpadiUuid) {
            $perpadi = ModelsPerpadi::where('uuid', $perpadiUuid)->firstOrFail();
            $this->perpadi_id = $perpadi->uuid;
            $this->penggilingan_id = $perpadi->penggilingan_id;
            $this->harga_gabah = $perpadi->harga_gabah;
            $this->stok_gabah = $perpadi->stok_gabah;
            $this->harga_beras = $perpadi->harga_beras;
            $this->stok_beras = $perpadi->stok_beras;
            $this->search = DataPenggilingan::find($perpadi->penggilingan_id)->nama_penggilingan ?? '';
        }

        $this->penggilinganOptions = DataPenggilingan::all()->pluck('nama_penggilingan', 'id')->toArray();
    }

    public function updatedSearch()
    {
        $this->filteredPenggilingan = DataPenggilingan::where('nama_penggilingan', 'like', "%{$this->search}%")
            ->orWhere('pemilik', 'like', "%{$this->search}%")
            ->orWhere('lokasi', 'like', "%{$this->search}%")
            ->get();
    }

    public function selectPenggilingan($id)
    {
        $this->penggilingan_id = $id;
        $this->search = DataPenggilingan::find($id)->nama_penggilingan ?? '';
        $this->filteredPenggilingan = [];
    }

    public function submitForm()
    {
        $this->validate();

        ModelsPerpadi::updateOrCreate(
            ['uuid' => $this->perpadi_id],
            [
                'penggilingan_id' => $this->penggilingan_id,
                'harga_gabah' => $this->harga_gabah,
                'stok_gabah' => $this->stok_gabah,
                'harga_beras' => $this->harga_beras,
                'stok_beras' => $this->stok_beras,
            ]
        );

        $this->emit('saved');
    }

    public function deletePerpadi()
    {
        ModelsPerpadi::where('uuid', $this->perpadi_id)->firstOrFail()->delete();
        $this->emit('deleted');
    }

    public function render()
    {
        return view('livewire.admin.perpadi.edit');
    }
}
