<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuWarungController extends Controller
{
    public function listWarungMenu($kdWarung)
    {
        // ambil data dari tabel menu
        $listMenu = DB::table('menu')->get();
        
        // ambil data dari tabel kategori_menu
        $listKategori = DB::table('kategori_menu')->get();
        
        // ambil data warung sesuai warung terpilih
        $warung = DB::table('warung_bakso')->where('kd_warung', $kdWarung)->first();

        // ambil data list menu warung
        $menuWarung = DB::table('menu_warung')
            ->select('menu_warung.*', 'menu.nama_menu', 'kategori_menu.nama_kategori')
            ->join('menu', 'menu_warung.kd_menu', '=', 'menu.kd_menu')
            ->join('kategori_menu', 'menu_warung.kd_kategori', '=', 'kategori_menu.kd_kategori')
            ->where('kd_warung', $kdWarung)
            ->get();

        // mengirim data ke view warung/list-menu.blade.php
        return view('warung.list-menu', compact('listMenu', 'warung', 'listKategori', 'menuWarung'));
    }

    public function insertWarungMenu($kdWarung, Request $request)
    {
        // insert ke tabel menu_warung
        DB::table('menu_warung')->insert([
            'kd_warung' => $kdWarung,
            'kd_menu' => $request->kd_menu,
            'kd_kategori' => $request->kd_kategori,
            'harga' => $request->harga,

        ]);
        // redirect ke halaman list menu warung terpilih 
        return redirect('warung-makan/'.$kdWarung.'/menu');
    }

    public function editWarungMenu($kdWarung, $id)
    {
        // ambil data dari tabel menu        
        $listMenu = DB::table('menu')->get();

        // ambil data  menu warung terpilih
        $menuWarung = DB::table('menu_warung')->where('id', $id)->first();

        // ambil data warung sesuai warung terpilih
        $warung = DB::table('warung_bakso')->where('kd_warung', $kdWarung)->first();
        
        // ambil data dari tabel kategori_menu
        $listKategori = DB::table('kategori_menu')->get();

        // mengirim data ke view warung/edit-menu.blade.php
        return view('warung.edit-menu', compact('menuWarung', 'warung', 'listKategori', 'listMenu'));
    }

    public function updateWarungMenu($kdWarung, $id, Request $request)
    {
        // update data
        DB::table('menu_warung')->where('id', $id)->update([
            'kd_menu' => $request->kd_menu,
            'kd_kategori' => $request->kd_kategori,
            'harga' => $request->harga,
        ]);

        // redirect ke halaman list menu warung terpilih 
        return redirect('warung-makan/'.$kdWarung.'/menu');
    }

    public function hapusWarungMenu($kdWarung, $id)
    {
        // hapus menu warung terpilih
        DB::table('menu_warung')->where('id', $id)->delete();
        // redirect ke halaman list menu warung terpilih 
        return redirect('warung-makan/'.$kdWarung.'/menu');
    }
}
