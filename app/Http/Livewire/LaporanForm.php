<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Laporan;

class LaporanForm extends Component
{
    public $name;
    public $tanggal;
    public $sumber;
    public $note;
    public $status = 'pending';
    public $single_date;
    public $start_date;
    public $end_date;
    public $preview;

    protected $rules = [
        'name' => 'required|string|max:255',
        'tanggal' => 'required|date',
        'sumber' => 'required|in:perpadi,lpm',
        'note' => 'nullable|string',
        'status' => 'required|string',
        'single_date' => 'required|date',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'preview' => 'nullable|url',
    ];

    public function submit()
    {
        $this->validate();

        Laporan::create([
            'name' => $this->name,
            'tanggal' => $this->tanggal,
            'sumber' => $this->sumber,
            'note' => $this->note,
            'status' => $this->status,
            'single_date' => $this->single_date,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'preview' => $this->preview,
        ]);

        session()->flash('message', 'Laporan created successfully.');

        // Reset form fields
        $this->reset();
    }

    public function render()
    {
        return view('livewire.laporan-form');
    }
}
