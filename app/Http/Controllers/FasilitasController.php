<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FasilitasController extends Controller
{
    public function fasilitas()
    {
        // mengambil data dari table fasilitas
        $dataFasilitas = DB::table('fasilitas')->get();
        
        // mengirim data fasilitas ke view fasilitas.blade.php
        return view('fasilitas', compact('dataFasilitas'));
    }
    
    public function insertFasilitas(Request $request)
    {
        // insert data ke table fasilitas
        DB::table('fasilitas')->insert([
            'nama_fasilitas' => $request->nama_fasilitas
        ]);

        // alihkan halaman ke halaman fasilitas
        return redirect('/fasilitas');
    }

    public function editFasilitas($kdFasilitas)
    {
        // mengambil data fasilitas berdasarkan kode yang dipilih
        $fasilitas = DB::table('fasilitas')->where('kd_fasilitas', $kdFasilitas)->first();

        // mengirim data fasilitas ke view fasilitas-edit.blade.php
        return view('fasilitas-edit', compact('fasilitas'));
    }

    public function updateFasilitas($kdFasilitas, Request $request)
    {
        // update data fasilitas
        DB::table('fasilitas')->where('kd_fasilitas', $kdFasilitas)->update([
            'nama_fasilitas' => $request->nama_fasilitas
        ]);
        // alihkan halaman ke halaman fasilitas
        return redirect('/fasilitas');
    }

    public function hapusFasilitas($kdFasilitas)
    {
        // menghapus data fasilitas berdasarkan kode yang dipilih
        DB::table('fasilitas')->where('kd_fasilitas', $kdFasilitas)->delete();
        // alihkan halaman ke halaman fasilitas
        return redirect('/fasilitas');
    }
}
