<?php

namespace App\Http\Livewire\Table;

use App\Models\DataLumbung;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DataLumbungTable extends LivewireDatatable
{
    public function builder()
    {
        return DataLumbung::query();
    }

    public function columns()
    {
        return [

            Column::name('nama_lumbung')
                ->label('Nama Lumbung')
                ->searchable(),
            Column::name('alamat')
                ->label('Alamat')
                ->searchable(),

            Column::callback(['uuid'], function ($uuid) {
                return view('datatables::link', [
                    'href' => 'data-lumbung/' . $uuid,
                    'slot' => 'Edit'
                ]);
            })
                ->label('Action')

        ];
    }
}
