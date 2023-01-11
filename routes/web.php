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
Route::post('admin/insert', [DashboardController::class, 'insertAdmin']);
Route::get('admin/edit/{kd_admin}', [DashboardController::class, 'editAdmin']);
Route::post('admin/update/{kd_admin}', [DashboardController::class, 'updateAdmin']);
Route::get('admin/hapus/{kd_admin}', [DashboardController::class, 'hapusAdmin']);

Route::get('warung-makan', [DashboardController::class, 'warungMakan']);
Route::get('warung-makan/tambah', [DashboardController::class, 'tambahWarungMakan']);

Route::get('fasilitas', [DashboardController::class, 'fasilitas']);
Route::post('fasilitas/insert', [DashboardController::class, 'insertFasilitas']);
Route::get('fasilitas/edit/{kd_fasilitas}', [DashboardController::class, 'editFasilitas']);
Route::post('fasilitas/update/{kd_fasilitas}', [DashboardController::class, 'updateFasilitas']);
Route::get('fasilitas/hapus/{kd_fasilitas}', [DashboardController::class, 'hapusFasilitas']);

Route::get('menu', [DashboardController::class, 'menu']);
Route::get('bobot', [DashboardController::class, 'bobot']);

Route::get('kriteria', [DashboardController::class, 'kriteria']);
Route::post('kriteria/insert', [DashboardController::class, 'insertKriteria']);
Route::get('kriteria/edit/{kd_kriteria}', [DashboardController::class, 'editKriteria']);
Route::post('kriteria/update/{kd_kriteria}', [DashboardController::class, 'updateKriteria']);
Route::get('kriteria/hapus/{kd_kriteria}', [DashboardController::class, 'hapusKriteria']);