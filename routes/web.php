<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoketController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/antrian', [AntrianController::class, 'index'])->name('antrian');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/loket', [LoketController::class, 'index'])->name('loket');
Route::get('/monitoring', [MonitoringController::class, 'index'])->name('monitoring');
Route::get('/monitoring/getAntrianByLoket', [MonitoringController::class, 'getAntrianByLoket'])->name('monitoring.getAntrianByLoket');

Route::get('/antrian/getAntrianByLoket', [AntrianController::class, 'getAntrianByLoket'])->name('antrian.getAntrianByLoket');
Route::post('/antrian/setAntrianByLoket', [AntrianController::class, 'setAntrianByLoket'])->name('antrian.setAntrianByLoket');
Route::post('/antrian/nextAntrianByLoket', [AntrianController::class, 'nextAntrianByLoket'])->name('antrian.nextAntrianByLoket');
Route::get('/antrian/cetak', [AntrianController::class, 'cetak'])->name('antrian.cetak');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
