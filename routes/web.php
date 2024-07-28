<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\MenuRestoranController;
use App\Http\Controllers\DaftarRestoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RestoController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\RestomuController;
use App\Http\Controllers\DetailRestoController;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/rekomendasi', [RekomendasiController::class, 'index'])->name('rekomendasi');
Route::get('/restoran', [MenuRestoranController::class, 'index'])->name('menurestoran');
Route::get('/detailresto', [DetailRestoController::class, 'index'])->name('detailresto');
Route::get('/administrator', [AdminController::class, 'index'])->name('admin');

Route::get('/daftar_resto', [DaftarrestoController::class, 'index'])->name('daftarresto');
Route::get('/daftar_resto/create', [DaftarrestoController::class, 'create'])->name('daftarresto.create');
Route::post('/daftar_resto', [DaftarrestoController::class, 'store'])->name('daftarresto.store');

//Profil
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::post('/profil/update/{id}', [ProfilController::class, 'update'])->name('profil.update');

//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class ,'store'])->name('register.store');

// pengguna (Admin)
Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
Route::get('/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create');
Route::post('/pengguna/store', [PenggunaController::class, 'store'])->name('pengguna.store');
Route::get('/pengguna/edit/{id}', [PenggunaController::class, 'edit'])->name('pengguna.edit');
Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])->name('pengguna.update');
Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');

//Restoran (Admin)
Route::get('/restaurant', [RestoController::class, 'index'])->name('resto');
Route::get('/restaurant/create', [RestoController::class, 'create'])->name('resto.create');
Route::post('/restaurant/store', [RestoController::class, 'store'])->name('resto.store');
Route::get('/restaurant/edit/{id}', [RestoController::class, 'edit'])->name('resto.edit');
Route::put('/restaurant/{id}', [RestoController::class, 'update'])->name('resto.update');
Route::delete('/restaurant/{id}', [RestoController::class, 'destroy'])->name('resto.destroy');

//Pemilik (Admin)
Route::get('/pemilik', [PemilikController::class, 'index'])->name('pemilik');
Route::get('/pemilik/create', [PemilikController::class, 'create'])->name('pemilik.create');
Route::post('/pemilik/store', [PemilikController::class, 'store'])->name('pemilik.store');
Route::get('/pemilik/edit/{id}', [PemilikController::class, 'edit'])->name('pemilik.edit');
Route::put('/pemilik/{id}', [PemilikController::class, 'update'])->name('pemilik.update');
Route::delete('/pemilik/{id}', [PemilikController::class, 'destroy'])->name('pemilik.destroy');

//(Pemilik Resto)
Route::get('/owner', [OwnerController::class, 'index'])->name('owner');
Route::get('/restomu', [RestomuController::class, 'index'])->name('restomu');

// Route::get('/', function () {
//     return view('welcome');
// });
