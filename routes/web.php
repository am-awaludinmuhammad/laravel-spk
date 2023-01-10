<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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
    return redirect('/login');
});

Route::get('login', [DashboardController::class, 'formLogin']);
Route::get('beranda', [DashboardController::class, 'beranda']);
Route::get('admin', [DashboardController::class, 'listAdmin']);
Route::get('admin/tambah', [DashboardController::class, 'tambahAdmin']);
Route::get('warung-makan', [DashboardController::class, 'warungMakan']);
Route::get('warung-makan/tambah', [DashboardController::class, 'tambahWarungMakan']);
Route::get('fasilitas', [DashboardController::class, 'fasilitas']);
Route::get('menu', [DashboardController::class, 'menu']);
Route::get('bobot', [DashboardController::class, 'bobot']);
Route::get('kriteria', [DashboardController::class, 'kriteria']);