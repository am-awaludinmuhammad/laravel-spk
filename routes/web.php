<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\WarungController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\MenuWarungController;
use App\Http\Controllers\FasilitasWarungController;

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
    return redirect('beranda');
});

Route::get('login', [AdminController::class, 'formLogin'])->name('login');
Route::post('login', [AdminController::class, 'login']);
Route::post('logout', [AdminController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('beranda', [AdminController::class, 'beranda']);
    Route::get('admin', [AdminController::class, 'listAdmin']);
    Route::get('admin/tambah', [AdminController::class, 'tambahAdmin']);
    Route::post('admin/insert', [AdminController::class, 'insertAdmin']);
    Route::get('admin/edit/{kd_admin}', [AdminController::class, 'editAdmin']);
    Route::post('admin/update/{kd_admin}', [AdminController::class, 'updateAdmin']);
    Route::get('admin/hapus/{kd_admin}', [AdminController::class, 'hapusAdmin']);
    
    Route::get('warung-makan', [WarungController::class, 'warungMakan']);
    Route::get('warung-makan/tambah', [WarungController::class, 'tambahWarungMakan']);
    Route::post('warung-makan/insert', [WarungController::class, 'insertWarungMakan']);
    Route::get('warung-makan/edit/{kd_warung}', [WarungController::class, 'editWarungMakan']);
    Route::post('warung-makan/update/{kd_warung}', [WarungController::class, 'updateWarungMakan']);
    Route::get('warung-makan/detail/{kd_warung}', [WarungController::class, 'detailWarungMakan']);
    Route::get('warung-makan/hapus/{kd_warung}', [WarungController::class, 'hapusWarungMakan']);
    
    Route::get('warung-makan/{kd_warung}/menu', [MenuWarungController::class, 'listWarungMenu']);
    Route::post('warung-makan/{kd_warung}/menu/insert', [MenuWarungController::class, 'insertWarungMenu']);
    Route::get('warung-makan/{kd_warung}/menu/hapus/{id}', [MenuWarungController::class, 'hapusWarungMenu']);
    Route::get('warung-makan/{kd_warung}/menu/edit/{id}', [MenuWarungController::class, 'editWarungMenu']);
    Route::post('warung-makan/{kd_warung}/menu/update/{id}', [MenuWarungController::class, 'updateWarungMenu']);
    
    Route::get('warung-makan/{kd_warung}/fasilitas', [FasilitasWarungController::class, 'fasilitasWarung']);
    Route::post('warung-makan/{kd_warung}/fasilitas/insert', [FasilitasWarungController::class, 'insertFasilitasWarung']);
    Route::get('warung-makan/{kd_warung}/fasilitas/edit/{id}', [FasilitasWarungController::class, 'editFasilitasWarung']);
    Route::post('warung-makan/{kd_warung}/fasilitas/update/{id}', [FasilitasWarungController::class, 'updateFasilitasWarung']);
    Route::get('warung-makan/{kd_warung}/fasilitas/hapus/{id}', [FasilitasWarungController::class, 'hapusFasilitasWarung']);
    
    Route::get('fasilitas', [FasilitasController::class, 'fasilitas']);
    Route::post('fasilitas/insert', [FasilitasController::class, 'insertFasilitas']);
    Route::get('fasilitas/edit/{kd_fasilitas}', [FasilitasController::class, 'editFasilitas']);
    Route::post('fasilitas/update/{kd_fasilitas}', [FasilitasController::class, 'updateFasilitas']);
    Route::get('fasilitas/hapus/{kd_fasilitas}', [FasilitasController::class, 'hapusFasilitas']);
    
    Route::get('menu', [MenuController::class, 'menu']);
    Route::post('menu/insert', [MenuController::class, 'insertMenu']);
    Route::get('menu/edit/{kd_menu}', [MenuController::class, 'editMenu']);
    Route::post('menu/update/{kd_menu}', [MenuController::class, 'updateMenu']);
    Route::get('menu/hapus/{kd_menu}', [MenuController::class, 'hapusMenu']);
    
    Route::get('bobot', [BobotController::class, 'bobot']);
    
    Route::get('kriteria', [KriteriaController::class, 'kriteria']);
    Route::post('kriteria/insert', [KriteriaController::class, 'insertKriteria']);
    Route::get('kriteria/edit/{kd_kriteria}', [KriteriaController::class, 'editKriteria']);
    Route::post('kriteria/update/{kd_kriteria}', [KriteriaController::class, 'updateKriteria']);
    Route::get('kriteria/hapus/{kd_kriteria}', [KriteriaController::class, 'hapusKriteria']);
});