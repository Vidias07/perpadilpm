<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\Roles;
use App\Models\UserRoles;
use Livewire\Component;

class AsignRoles extends Component
{
    public $users;
    public $roles;
    public $selectedUser;
    public $selectedRoles = [];

    public function mount()
    {
        $this->users = User::all();
        $this->roles = Roles::all();
    }

    public function render()
    {
        return view('livewire.admin.asign-roles');
    }

    public function assignRoles()
    {
        $this->validate([
            'selectedUser' => 'required|exists:users,id',
            'selectedRoles' => 'required|array',
            'selectedRoles.*' => 'exists:roles,id',
        ]);

        // Remove all roles assigned to the user
        UserRoles::where('user_id', $this->selectedUser)->delete();

        // Assign selected roles to the user
        foreach ($this->selectedRoles as $roleId) {
            UserRoles::create([
                'user_id' => $this->selectedUser,
                'role_id' => $roleId,
            ]);
        }

        session()->flash('message', 'Roles assigned successfully.');
        $this->reset('selectedUser', 'selectedRoles');
    }
}
