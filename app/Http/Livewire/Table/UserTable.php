<?php

namespace App\Http\Livewire\Table;

use App\Models\Lpm;
use App\Models\Perpadi;
use App\Models\User;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class UserTable extends LivewireDatatable
{
    public function builder()
    {
        return User::query();
    }

    public function columns()
    {
        return [
            Column::name('name')->label('Nama')->searchable(),
            Column::name('email')->label('Email'),
            Column::name('isAdmin')->label('is Admin'),
            Column::callback(['id'], function ($id) {
                return view('livewire.table.actions', ['id' => $id]);
            })->label('Actions'),
        ];
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->delete();
            session()->flash('message', 'User deleted successfully.');
        }
    }
}
