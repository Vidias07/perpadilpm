<?php

namespace App\Http\Livewire\Table;

use App\Models\DataPenggilingan;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class DataPenggilinganTable extends LivewireDatatable
{
    public function builder()
    {
        return DataPenggilingan::query();
    }

    public function columns()
    {
        return [


            Column::name('nama_penggilingan')
                ->label('Nama Penggilingan')
                ->searchable(),

            Column::name('pemilik')
                ->label('Pemilik'),

            Column::name('lokasi')
                ->label('Lokasi'),

            Column::name('no_telepon')
                ->label('No Telepon'),



            Column::callback(['uuid'], function ($uuid) {
                return view('datatables::link', [
                    'href' => 'data-penggilingan/' . $uuid,
                    'slot' => 'Edit'
                ]);
            })
                ->label('Action')

        ];
    }
}
