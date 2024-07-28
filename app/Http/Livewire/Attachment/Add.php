<?php

namespace App\Http\Livewire\Attachment;

use App\Models\Attachment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Add extends Component
{
    public $modal = false;
    public $attachment_id;
    public $attachments;
    public $signature;

    protected $listeners = ['saveSignature'];

    public function openModal()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function mount(){
        $this->attachments = Attachment::where('user_id', Auth::id())->latest()->first();
        if($this->attachments){
        $this->attachment_id=$this->attachments->id;}
    }

    public function saveSignature($dataUrl)
    {
        $image = str_replace('data:image/png;base64,', '', $dataUrl);
        $image = str_replace(' ', '+', $image);
        $imageName = 'signature-' . time() . '.png';

        Storage::disk('public')->put($imageName, base64_decode($image));

        // Save the path and user_id to the database
        Attachment::create([
            'signature' => $imageName,
            'user_id' => Auth::id(),
        ]);

        $this->closeModal();
    }


    public function render()
    {
        // Ambil attachment terbaru berdasarkan user yang sedang login
        $this->attachments = Attachment::where('user_id', Auth::id())
                                      ->latest()
                                      ->first();

        return view('livewire.attachment.add', [
            'attachments' => $this->attachments,
        ]);
    }
}
