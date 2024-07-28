<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Perpadi;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class PerpadiController extends Controller
{
    public function edit($uuid)
    {
        $perpadi = Perpadi::where('uuid', $uuid)->firstOrFail();

        return view('perpadi.edit', ['perpadi' => $perpadi]);
    }
}
