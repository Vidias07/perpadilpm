<?php

namespace App\Http\Controllers;

use App\Models\DataLumbung;
use App\Models\DataPenggilingan;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function editPenggilingan($uuid)
    {
        $dataPenggilingan = DataPenggilingan::where('uuid', $uuid)->first();
        return view('master.data-penggilingan-edit', ['penggilingan' => $dataPenggilingan]);
    }
    public function editLumbung($uuid)
    {
        $dataLumbung = DataLumbung::where('uuid', $uuid)->first();

        return view('master.data-lumbung-edit', ['lumbung' => $dataLumbung]);
    }
}
