<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Lpm;
use App\Models\Perpadi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function index(){
    $user = Auth::user();

    // Memeriksa apakah pengguna memiliki data Attachment

    if (!$user->attachment) {
        return redirect()->to('/tanda-tangan');
    }

$totalApproved=Laporan::where("status",'approved')->count();
    $totalUser=User::count();
    $totalLpm=Lpm::count();
    $totalPerpadi=Perpadi::count();
   return view("dashboard",compact("totalUser","totalLpm","totalPerpadi","totalApproved"));

   }
}
