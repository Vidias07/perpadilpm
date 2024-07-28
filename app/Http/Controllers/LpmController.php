<?php

namespace App\Http\Controllers;

use App\Models\Lpm;
use Illuminate\Http\Request;

class LpmController extends Controller
{
    public function edit($uuid)
    {

        $lpm = Lpm::where('uuid', $uuid)->first();

        return view("lpm.edit", ["lpm" => $lpm]);
    }


}
