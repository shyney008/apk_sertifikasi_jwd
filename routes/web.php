<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\PesertaController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/dashboard', function () {

    $totalPeserta = \App\Models\Peserta::count();
    $totalSkema = \App\Models\Skema::count();

    return view('dashboard', compact('totalPeserta', 'totalSkema'));

})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('skemas', SkemaController::class);
    Route::resource('pesertas', PesertaController::class);
});