<?php

namespace App\Http\Livewire\Table;

use App\Models\Laporan;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class LaporanTable extends LivewireDatatable
{
    public function builder()
    {
        return Laporan::query();
    }

    public function columns()
    {
        return [
            Column::name('name')->label('Name')->searchable(),
            DateColumn::name('tanggal')->label('Tanggal')->sortable(),
            Column::name('sumber')->label('Sumber')->filterable(['perpadi',]),
            Column::name('status')->label('Status'),
            Column::callback(['preview','sumber' ,'id'], function ($preview, $sumber, $id) {
                return '<a href="' . route('laporan.preview.'.$sumber, $id) . '" class="text-blue-500 hover:underline">Preview</a>';
            })->label('Preview')->unsortable(),

            DateColumn::name('single_date')->label('Single Date'),
            DateColumn::name('start_date')->label('Start Date'),
            DateColumn::name('end_date')->label('End Date'),
            Column::callback(['id'], function ($id) {
                return '<button wire:click="delete(' . $id . ')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Delete</button>';
            })->label('Actions')->unsortable(),
            Column::callback(['id', 'status'], function ($id, $status) {
                if ($status == 'pending') {
                    return '<div class="flex">
                                <button wire:click="approve(' . $id . ')" class="bg-green-500 hover:bg-green-700 text-yellow-500 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Approve</button>
                                <button wire:click="reject(' . $id . ')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2">Reject</button>
                            </div>';
                } elseif ($status == 'rejected') {
                    return '<span class="text-red-500 font-bold">Rejected</span>';
                } else {
                    return '<span class="text-green-500 font-bold">Approved</span>';
                }
            })->label('Approve/Reject')->unsortable(),


         Column::name('note')->label('Note')->editable()
        ];
    }

    public function delete($id)
    {
        // Lakukan proses penghapusan data berdasarkan ID yang diterima dari tabel
        Laporan::find($id)->delete();
    }

    public function approve($id)
    {
        // Temukan laporan berdasarkan ID
        $laporan = Laporan::findOrFail($id);

        // Lakukan proses approve, misalnya set statusnya menjadi 'approved'
        $laporan->status = 'approved';
        $laporan->save();
    }

    public function reject($id)
    {
        // Temukan laporan berdasarkan ID
        $laporan = Laporan::findOrFail($id);

        // Lakukan proses approve, misalnya set statusnya menjadi 'approved'
        $laporan->status = 'rejected';
        $laporan->save();
    }
}
