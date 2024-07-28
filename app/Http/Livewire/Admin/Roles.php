<?php

namespace App\Livewire\Admin;

use App\Models\Roles as ModelsRoles;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RolesExport;
use Barryvdh\DomPDF\Facade\Pdf;

class Roles extends Component
{
    use WithPagination;

    public $name, $role_id;
    public $modal = false; // Initial state of the modal
    public $perPage = 10; // Number of records per page

    protected $rules = [
        'name' => 'required|string|max:255',
    ];

    protected $paginationTheme = 'tailwind'; // Ensure Tailwind CSS is used for pagination

    public function render()
    {
        return view('livewire.admin.roles', [
            'roles' => ModelsRoles::paginate($this->perPage),
        ]);
    }

    public function resetFields()
    {
        $this->name = '';
        $this->role_id = '';
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
        $this->render();
    }

    public function store()
    {
        $this->validate();

        if ($this->role_id) {
            $this->updateRole();
        } else {
            $this->createRole();
        }

        $this->closeModal();
        $this->resetFields();
        $this->refreshTable();
    }

    public function createRole()
    {
        ModelsRoles::create(['name' => $this->name]);

        session()->flash('message', 'Role created successfully.');
        $this->refreshTable();
    }

    public function updateRole()
    {
        $role = ModelsRoles::find($this->role_id);
        $role->update(['name' => $this->name]);

        session()->flash('message', 'Role updated successfully.');
        $this->refreshTable();
    }

    public function edit($id)
    {
        $role = ModelsRoles::findOrFail($id);
        $this->role_id = $id;
        $this->name = $role->name;
        $this->modal = true;
    }

    public function delete($id)
    {
        ModelsRoles::find($id)->delete();
        session()->flash('message', 'Role deleted successfully.');
    }

    public function exportToExcel()
    {
        return Excel::download(new RolesExport, 'roles.xlsx');
    }

    public function exportToPDF()
    {
        $roles = ModelsRoles::all();
        $pdf = Pdf::loadView('livewire.admin.roles-pdf', compact('roles'));
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->stream();
        }, 'roles.pdf');
    }
}
