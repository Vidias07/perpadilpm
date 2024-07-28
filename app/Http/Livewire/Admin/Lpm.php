<?php

namespace App\Livewire\Admin;

use App\Models\Lpm as ModelsLpm;
use Livewire\Component;

class Lpm extends Component
{
    public $lpms, $nama_lumbung, $alamat, $tahun, $bulan, $minggu_ke, $komoditas, $stok_awal, $pengadaan, $penyaluran, $akhir, $lpm_id;
    public $modal = false;

    public function render()
    {
        $this->lpms = ModelsLpm::all();
        return view('livewire.admin.lpm');
    }

    public function resetFields()
    {
        $this->nama_lumbung = '';
        $this->alamat = '';
        $this->tahun = '';
        $this->bulan = '';
        $this->minggu_ke = '';
        $this->komoditas = '';
        $this->stok_awal = '';
        $this->pengadaan = '';
        $this->penyaluran = '';
        $this->akhir = '';
        $this->lpm_id = '';
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
        $this->dispatch('pg:eventRefresh-LpmTable');
    }

    public function store()
    {
        $this->validate([
            'nama_lumbung' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'bulan' => 'required|integer|min:1|max:12',
            'minggu_ke' => 'required|integer|min:1|max:5',
            'komoditas' => 'required|string|max:255',
            'stok_awal' => 'required|numeric',
            'pengadaan' => 'required|numeric',
            'penyaluran' => 'required|numeric',
            'akhir' => 'required|numeric',
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
            'nama_lumbung' => $this->nama_lumbung,
            'alamat' => $this->alamat,
            'tahun' => $this->tahun,
            'bulan' => $this->bulan,
            'minggu_ke' => $this->minggu_ke,
            'komoditas' => $this->komoditas,
            'stok_awal' => $this->stok_awal,
            'pengadaan' => $this->pengadaan,
            'penyaluran' => $this->penyaluran,
            'akhir' => $this->akhir,
        ]);

        session()->flash('message', 'LPM created successfully.');
    }

    public function updateLpm()
    {
        $lpm = ModelsLpm::find($this->lpm_id);
        $lpm->update([
            'nama_lumbung' => $this->nama_lumbung,
            'alamat' => $this->alamat,
            'tahun' => $this->tahun,
            'bulan' => $this->bulan,
            'minggu_ke' => $this->minggu_ke,
            'komoditas' => $this->komoditas,
            'stok_awal' => $this->stok_awal,
            'pengadaan' => $this->pengadaan,
            'penyaluran' => $this->penyaluran,
            'akhir' => $this->akhir,
        ]);

        session()->flash('message', 'LPM updated successfully.');
    }

    public function edit($id)
    {
        $lpm = ModelsLpm::findOrFail($id);
        $this->lpm_id = $id;
        $this->nama_lumbung = $lpm->nama_lumbung;
        $this->alamat = $lpm->alamat;
        $this->tahun = $lpm->tahun;
        $this->bulan = $lpm->bulan;
        $this->minggu_ke = $lpm->minggu_ke;
        $this->komoditas = $lpm->komoditas;
        $this->stok_awal = $lpm->stok_awal;
        $this->pengadaan = $lpm->pengadaan;
        $this->penyaluran = $lpm->penyaluran;
        $this->akhir = $lpm->akhir;
        $this->modal = true;
    }

    public function delete($id)
    {
        ModelsLpm::find($id)->delete();
        session()->flash('message', 'LPM deleted successfully.');
        $this->refreshTable();
    }
}
