<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('admin/list');
    }

    public function tambahAdmin()
    {
        return view('admin/tambah');
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
        return view('kriteria');
    }
}
