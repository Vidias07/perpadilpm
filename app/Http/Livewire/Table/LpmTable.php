<?php

namespace App\Http\Livewire\Table;

use App\Models\Lpm;
use App\Models\Perpadi;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class LpmTable extends LivewireDatatable
{
    public function builder()
    {
        return Lpm::query();
    }

    public function columns()
    {
        return [
            Column::callback('lumbung_id', function ($lumbungId) {

                $perpadi = Lpm::with('lumbung')->where('lumbung_id', $lumbungId)->first();

                if ($perpadi && $perpadi->lumbung) {
                    return $perpadi->lumbung->nama_lumbung .' - '.$perpadi->lumbung->alamat;
                }

                return 'N/A';
            })
                ->label('Data Lumbung'),



            Column::name('harga_gabah')
                ->label('Harga Gabah (IDR)'),

            Column::name('stok_gabah')
                ->label('Stok Gabah (ton)'),

            Column::name('harga_beras')
                ->label('Harga Beras  (IDR)'),

            Column::name('stok_beras')
                ->label('Stok Beras (ton)'),

            NumberColumn::callback('uuid', function ($value) {
                return view('datatables::link', [
                    'href' => 'lpm/' . $value,
                    'slot' => 'Edit'
                ]);
            }),
        ];
    }
}
