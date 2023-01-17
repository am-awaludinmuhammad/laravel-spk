<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function beranda()
    {
        // memanggil view beranda.blade.php
        return view('beranda');
    }

    public function formLogin()
    {
        // memanggil view login.blade.php
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = [
            'username' => $request->username, 
            'password' => $request->password
        ];

        // redirect ke beranda jika data sesuai
        if (auth()->attempt($credentials)) {
            return redirect('/beranda');
        };

        // redirect ke beranda jika data tidak sesuai
        return redirect('/login');
    }

    public function logout(Request $request)
    {
        // hapus sesi login
        $request->session()->flush();
        auth()->logout();

        // redirect ke halaman login
        return redirect('/login');
    }

    public function listAdmin()
    {
        // mengambil data dari table admin
        $dataAdmin = DB::table('admin')->get();

        // mengirim data admin ke view
        return view('admin.list', compact('dataAdmin'));
    }

    public function tambahAdmin()
    {
        // memanggil view admin/tambah.blade.php
        return view('admin.tambah');
    }

    public function insertAdmin(Request $request)
    {
        // insert data ke table admin
        DB::table('admin')->insert([
            'kd_admin' => $request->kd_admin,
            'nama_admin' => $request->nama_admin,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        // alihkan halaman ke halaman admin
        return redirect('/admin');
    }

    public function editAdmin($kdAdmin, Request $request)
    {
        // mengambil data admin berdasarkan kode yang dipilih
        $dataAdmin = DB::table('admin')->where('kd_admin', $kdAdmin)->first();
        // mengirim data admin ke view admin/edit.blade.php
        return view('admin.edit', compact('dataAdmin'));
    }

    public function updateAdmin($kdAdmin, Request $request)
    {
        // update data admin
        DB::table('admin')->where('kd_admin', $kdAdmin)->update([
            'kd_admin' => $request->kd_admin,
            'nama_admin' => $request->nama_admin,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'username' => $request->username,
            'password' => $request->password,
        ]);

        // alihkan halaman ke halaman admin
        return redirect('/admin');
    }

    public function hapusAdmin($kdAdmin)
    {
        // menghapus data admin berdasarkan kode yang dipilih
        DB::table('admin')->where('kd_admin', $kdAdmin)->delete();
        
        // alihkan halaman ke halaman admin
        return redirect('/admin');
    }
}
