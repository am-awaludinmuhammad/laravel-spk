<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    public function kriteria()
    {
        // mengambil data dari table kriteria
        $dataKriteria = DB::table('kriteria')->get();
        // mengirim data kriteria ke view kriteria.blade.php
        return view('kriteria', compact('dataKriteria'));
    }

    public function insertKriteria(Request $request)
    {
        // insert ke tabel kriteria
        DB::table('kriteria')->insert([
            'nama_kriteria' => $request->nama_kriteria
        ]);
        // alihkan halaman ke halaman kriteria
        return redirect('/kriteria');
    }

    public function editKriteria($kdKriteria, Request $request)
    {
        // mengambil data kriteria berdasarkan kode yang dipilih
        $dataKriteria = DB::table('kriteria')->where('kd_kriteria', $kdKriteria)->first();
        // mengirim data kriteria ke view kriteria.blade.php
        return view('kriteria-edit', compact('dataKriteria'));
    }

    public function updateKriteria($kdKriteria, Request $request)
    {
        // update data kriteria
        DB::table('kriteria')->where('kd_kriteria', $kdKriteria)->update([
            'nama_kriteria' => $request->nama_kriteria
        ]);
        // alihkan halaman ke halaman kriteria
        return redirect('/kriteria');
    }

    public function hapusKriteria($kdKriteria)
    {
        // menghapus data kriteria berdasarkan kode yang dipilih
        DB::table('kriteria')->where('kd_kriteria', $kdKriteria)->delete();
        // alihkan halaman ke halaman kriteria
        return redirect('/kriteria');
    }
}
