<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Auth;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\TitipController;
use App\Http\Controllers\SewaController;

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


Route::get('login',[LoginController::class, 'index']);
Route::post('login/authenticate',[LoginController::class, 'authenticate']);

Route::get('register', [RegisterController::class, 'create']);
Route::post('register/store', [RegisterController::class, 'store']);
Route::get('logout', [LoginController::class, 'Logout'])->name('logout');

Route::middleware(['auth'])->group(function() {
    Route::get('/', function () {
        return view('layouts/blank');
    });
    Route::get('/blank', function () {
        return view('layouts/blank');
    });

    Route::resource('kendaraan', KendaraanController::class);
    Route::resource('titip', TitipController::class);
    Route::resource('sewa', SewaController::class);
    Route::post('sewa/findKendaraan', [SewaController::class, 'findKendaraan']);
    Route::post('sewa/store', [SewaController::class, 'sewastore']);
    Route::get('sewa/findKendaraan/{awal}/{akhir}', [SewaController::class, 'findKendaraan'])->name('choose.kendaraan');
    Route::post('sewa/findKendaraan/store', [SewaController::class, 'store'])->name('sewa.findKendaraan.store');

    Route::get('/findKendaraan', [SewaController::class, 'findKendaraan']);
});

