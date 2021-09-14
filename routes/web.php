<?php

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

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


Auth::routes();

Route::get('/home', function() { return view('home');})->name('home')->middleware('auth');

Route::resource('users', \App\Http\Controllers\UserController::class)
    ->middleware('auth');

Route::resource('kabupaten', \App\Http\Controllers\KabupatenController::class)
    ->middleware('auth');

Route::resource('pulau', \App\Http\Controllers\PulauController::class)
    ->middleware('auth');

Route::resource('kecamatan', \App\Http\Controllers\KecamatanController::class)
    ->middleware('auth');

Route::resource('kelurahan', \App\Http\Controllers\KelurahanController::class)
    ->middleware('auth');

Route::resource('profil', \App\Http\Controllers\profilController::class)
    ->middleware('auth');

Route::resource('bidang', \App\Http\Controllers\BidangController::class)
    ->middleware('auth');

Route::resource('kategori', \App\Http\Controllers\KategoriController::class)
    ->middleware('auth');

Route::resource('stakeholder', \App\Http\Controllers\StakeholderController::class)
    ->middleware('auth');