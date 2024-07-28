<?php

namespace App\Http\Livewire\Table;

use App\Models\Perpadi;
use Maatwebsite\Excel\Facades\Excel;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Maatwebsite\Excel\Concerns\Exportable; // Import trait Exportable

class PerpadiTable extends LivewireDatatable
{
    use Exportable; // Use trait Exportable

    public function builder()
    {
        // Eager load relationships to optimize queries
        return Perpadi::query()->with('penggilingan');
    }

    public function columns()
    {
        return [
            // Display data from the related model
            Column::callback('penggilingan_id', function ($penggilinganId) {
                // Find the Perpadi model with its relation to DataPenggilingan
                $perpadi = Perpadi::with('penggilingan')->where('penggilingan_id', $penggilinganId)->first();
                return $perpadi && $perpadi->penggilingan ? $perpadi->penggilingan->nama_penggilingan . '  -   ' . $perpadi->penggilingan->no_telepon : 'N/A';
            })
                ->label('Data Penggilingan'),





            Column::name('harga_gabah')
                ->label('Harga Gabah (IDR)'),

            Column::name('stok_gabah')
                ->label('Stok Gabah (ton)'),

            Column::name('harga_beras')
                ->label('Harga Beras  (IDR)'),

            Column::name('stok_beras')
                ->label('Stok Beras (ton)'),


            Column::callback(['uuid'], function ($uuid) {
                return view('datatables::link', [
                    'href' => 'perpadi/' . $uuid,
                    'slot' => 'Edit'
                ]);
            })
                ->label('Action')
        ];
    }

    // Additional methods can be added here if needed for exporting
}
