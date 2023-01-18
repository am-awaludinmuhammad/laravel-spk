<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function menu()
    {
        // mengambil data dari table menu
        $dataMenu = DB::table('menu')->get();
        // mengirim data menu ke view menu.blade.php
        return view('menu', compact('dataMenu'));
    }

    public function insertMenu(Request $request)
    {
        // insert data ke table menu
        DB::table('menu')->insert([
            'nama_menu' => $request->nama_menu,
        ]);
        // alihkan halaman ke halaman menu
        return redirect('/menu');
    }

    public function editMenu($kdMenu)
    {
        // mengambil data menu berdasarkan kode yang dipilih
        $menu = DB::table('menu')->where('kd_menu', $kdMenu)->first();
        // mengirim data menu ke view menu-edit.blade.php
        return view('menu-edit', compact('menu'));
    }

    public function updateMenu($kdMenu, Request $request)
    {
        // update data menu
        DB::table('menu')->where('kd_menu', $kdMenu)->update([
            'nama_menu' => $request->nama_menu,
        ]);
        // alihkan halaman ke halaman menu
        return redirect('/menu');
    }

    public function hapusMenu($kdMenu)
    {
        // menghapus data menu berdasarkan kode yang dipilih
        DB::table('menu')->where('kd_menu', $kdMenu)->delete();
        // alihkan halaman ke halaman menu
        return redirect('/menu');
    }
}
