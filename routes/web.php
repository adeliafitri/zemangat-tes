<?php

use App\Http\Controllers\CutiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;

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

Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan');

Route::get('/', [KaryawanController::class, 'dashboard'])->name('home');
// Route::get('/karyawan', function () {
//     return view('pages.karyawan');
// })->name('karyawan');
Route::get('/cuti', [CutiController::class, 'index'])->name('cuti');
Route::post('/addcuti', [CutiController::class, 'store'])->name('addcuti');
