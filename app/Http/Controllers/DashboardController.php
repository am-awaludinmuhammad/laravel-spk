<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function formLogin()
    {
        return view('login');
    }

    public function beranda()
    {
        return view('beranda');
    }

    public function listAdmin()
    {
        $dataAdmin = DB::table('admin')->get();
        return view('admin/list', compact('dataAdmin'));
    }

    public function tambahAdmin()
    {
        return view('admin/tambah');
    }

    public function insertAdmin(Request $request)
    {
        DB::table('admin')->insert([
            'kd_admin' => $request->kd_admin,
            'nama_admin' => $request->nama_admin,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'username' => $request->username,
            'password' => $request->password,
        ]);

        return redirect('/admin');
    }

    public function editAdmin($kdAdmin, Request $request)
    {
        $dataAdmin = DB::table('admin')->where('kd_admin', $kdAdmin)->first();
        return view('admin/edit', compact('dataAdmin'));
    }

    public function updateAdmin($kdAdmin, Request $request)
    {
        $dataAdmin = DB::table('admin')
        ->where('kd_admin', $kdAdmin)
        ->update([
            'kd_admin' => $request->kd_admin,
            'nama_admin' => $request->nama_admin,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'username' => $request->username,
            'password' => $request->password,
        ]);

        return redirect('/admin');
    }

    public function hapusAdmin($kdAdmin)
    {
        $dataAdmin = DB::table('admin')
        ->where('kd_admin', $kdAdmin)
        ->delete();

        return redirect('/admin');
    }

    public function warungMakan()
    {
        return view('warung/list');
    }

    public function tambahWarungMakan()
    {
        return view('warung/tambah');
    }

    public function fasilitas()
    {
        return view('fasilitas');
    }

    public function menu()
    {
        return view('menu');
    }

    public function bobot()
    {
        return view('bobot');
    }

    public function kriteria()
    {
        $dataKriteria = DB::table('kriteria')->get();
        return view('kriteria', compact('dataKriteria'));
    }

    public function insertKriteria(Request $request)
    {
        // insert ke tabel kriteria
        DB::table('kriteria')->insert([
            'kd_kriteria' => $request->kd_kriteria,
            'nama_kriteria' => $request->nama_kriteria
        ]);
        return redirect('/kriteria');
    }

    public function editKriteria($kdKriteria, Request $request)
    {
        // ambil data kriteria sesuai kode kriteria
        $dataKriteria = DB::table('kriteria')->where('kd_kriteria', $kdKriteria)->first();
        return view('kriteria-edit', compact('dataKriteria'));
    }

    public function updateKriteria($kdKriteria, Request $request)
    {
        $dataKriteria = DB::table('kriteria')->where('kd_kriteria', $kdKriteria)->update([
            'kd_kriteria' => $request->kd_kriteria,
            'nama_kriteria' => $request->nama_kriteria
        ]);
        return redirect('/kriteria');
    }

    public function hapusKriteria($kdKriteria)
    {
        $dataKriteria = DB::table('kriteria')->where('kd_kriteria', $kdKriteria)->delete();
        return redirect('/kriteria');
    }
}
