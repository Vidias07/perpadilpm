<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LpmController;
use App\Http\Controllers\PerpadiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', function () {
        return view('admin.user');
    })->name('admin.user');
    Route::get('/perpadi', function () {
        return view('admin.perpadi');
    })->name('perpadi');
    Route::get('/perpadi/pdf', [PerpadiController::class, 'generatePDF']);
    Route::get('perpadi/{perpadi}', [PerpadiController::class, 'edit'])->name('edit.perpadi');
    Route::get('/lpm', function () {
        return view('admin.lpm');
    })->name('lpm');
    Route::get('lpm/{lpm}', [LpmController::class, 'edit'])->name('edit.lpm');
    Route::get('/tanda-tangan', function () {
        return view('attachment.attachment');
    })->name('tanda-tangan');


    Route::get('/pelaporan', [LaporanController::class, 'index'])->name('laporan');
    Route::get('/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
    Route::post('/laporan/store', [LaporanController::class, 'store'])->name('laporan.store');
    // routes/web.php
    Route::get('/laporan/lpm/preview/{id}', [LaporanController::class, 'lpmReport'])->name('laporan.preview.lpm');

    Route::get('/laporan/perpadi/preview/{id}', [LaporanController::class, 'perpadiReport'])->name('laporan.preview.perpadi');
    Route::get('/laporan/perpadi/previe1w', [LaporanController::class, 'perpadiReport'])->name('laporan.perpadi');
    // Route::get('/laporan/lpm/preview',[LaporanController::class,'lpmReport'])->name('laporan.lpm');
    Route::get('/laporan/excel/perpadi', [LaporanController::class, 'exportPerpadiExcel'])->name('laporan.excel.perpadi');


    Route::post('/user/create', [UserController::class, 'store'])->name('users.store');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('edit.user');
    Route::put('/update-user/{id}', [UserController::class, 'update'])->name('users.update');

    Route::get('/data-penggilingan', function () {
        return view('master.data-penggilingan');
    })->name('data.penggilingan');
    Route::get('/data-lumbung', function () {
        return view('master.data-lumbung');
    })->name('data.lumbung');


    Route::get('data-penggilingan/{data}', [DataController::class, 'editPenggilingan'])->name('edit.penggilingan');
    Route::get('data-lumbung/{data}', [DataController::class, 'editLumbung'])->name('edit.lumbung');

});
