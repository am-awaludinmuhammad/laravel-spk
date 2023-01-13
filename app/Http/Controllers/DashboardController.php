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
        DB::table('admin')->where('kd_admin', $kdAdmin)->update([
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
        DB::table('admin')->where('kd_admin', $kdAdmin)->delete();
        return redirect('/admin');
    }

    public function warungMakan()
    {
        $dataWarung = DB::table('warung_bakso')->get();
        return view('warung/list', compact('dataWarung'));
    }

    public function tambahWarungMakan()
    {
        return view('warung/tambah');
    }

    public function insertWarungMakan(Request $request) {
        // menyimpan data foto1 yang diupload ke variabel $fileFoto1
        $fileFoto1 = $request->file('foto_1');
        $namaFoto1 = time()."_".$fileFoto1->getClientOriginalName();

        // menyimpan data foto1 yang diupload ke variabel $fileFoto2
        $fileFoto2 = $request->file('foto_2');
        $namaFoto2 = time()."_".$fileFoto2->getClientOriginalName();

        $tujuan = 'img/upload';
        $fileFoto1->move($tujuan,$namaFoto1);
        $fileFoto2->move($tujuan,$namaFoto2);

        // simpan ke database
        DB::table('warung_bakso')->insert([
            'kd_warung' => $request->kd_warung,
            'nama_warung' => $request->kd_warung,
            'foto_1' => $namaFoto1,
            'foto_2' => $namaFoto2,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect('/warung-makan');
    }

    public function editWarungMakan($kdWarung) {
        $warung = DB::table('warung_bakso')->where('kd_warung', $kdWarung)->first();
        return view('warung/edit', compact('warung'));
    }

    public function updateWarungMakan($kdWarung, Request $request) {
        // update data warung bakso
        DB::table('warung_bakso')->where('kd_warung', $kdWarung)->update([
            'kd_warung' => $request->kd_warung,
            'nama_warung' => $request->kd_warung,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        // cek apakah ada foto 1 yang diupload
        if ($request->hasFile('foto_1')) {
            // jika ada, update data
            $fileFoto1 = $request->file('foto_1');
            $namaFoto1 = time()."_".$fileFoto1->getClientOriginalName();
            $tujuan = 'img/upload';
            $fileFoto1->move($tujuan,$namaFoto1);
            DB::table('warung_bakso')->where('kd_warung', $kdWarung)->update([
                'foto_1' => $namaFoto1,
            ]);
        }
        
        // cek apakah ada foto 2 yang diupload
        if ($request->hasFile('foto_2')) {
            // jika ada, update data
            $fileFoto2 = $request->file('foto_2');
            $namaFoto2 = time()."_".$fileFoto2->getClientOriginalName();
            $tujuan = 'img/upload';
            $fileFoto2->move($tujuan,$namaFoto2);
            
            DB::table('warung_bakso')->where('kd_warung', $kdWarung)->update([
                'foto_2' => $namaFoto2,
            ]);
        }

        return redirect('/warung-makan');
    }

    public function hapusWarungMakan($kdWarung) {
        DB::table('warung_bakso')->where('kd_warung', $kdWarung)->delete();
        return redirect('/warung-makan');
    }

    public function fasilitas()
    {
        $dataFasilitas = DB::table('fasilitas')->get();
        return view('fasilitas', compact('dataFasilitas'));
    }
    
    public function insertFasilitas(Request $request)
    {
        DB::table('fasilitas')->insert([
            'kd_fasilitas' => $request->kd_fasilitas,
            'nama_fasilitas' => $request->nama_fasilitas
        ]);
        return redirect('/fasilitas');
    }

    public function editFasilitas($kdFasilitas)
    {
        $fasilitas = DB::table('fasilitas')->where('kd_fasilitas', $kdFasilitas)->first();
        return view('fasilitas-edit', compact('fasilitas'));
    }

    public function updateFasilitas($kdFasilitas, Request $request)
    {
        DB::table('fasilitas')->where('kd_fasilitas', $kdFasilitas)->update([
            'kd_fasilitas' => $request->kd_fasilitas,
            'nama_fasilitas' => $request->nama_fasilitas
        ]);
        return redirect('/fasilitas');
    }

    public function hapusFasilitas($kdFasilitas)
    {
        DB::table('fasilitas')->where('kd_fasilitas', $kdFasilitas)->delete();
        return redirect('/fasilitas');
    }

    public function menu()
    {
        $dataMenu = DB::table('menu')->get();
        return view('menu', compact('dataMenu'));
    }

    public function insertMenu(Request $request)
    {
        DB::table('menu')->insert([
            'kd_menu' => $request->kd_menu,
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
        ]);
        return redirect('/menu');
    }

    public function editMenu($kdMenu)
    {
        $menu = DB::table('menu')->where('kd_menu', $kdMenu)->first();
        return view('menu-edit', compact('menu'));
    }

    public function updateMenu($kdMenu, Request $request)
    {
        DB::table('menu')->where('kd_menu', $kdMenu)->update([
            'kd_menu' => $request->kd_menu,
            'nama_menu' => $request->nama_menu,
            'harga' => $request->harga,
        ]);
        return redirect('/menu');
    }

    public function hapusMenu($kdMenu)
    {
        DB::table('menu')->where('kd_menu', $kdMenu)->delete();
        return redirect('/menu');
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
        DB::table('kriteria')->where('kd_kriteria', $kdKriteria)->update([
            'kd_kriteria' => $request->kd_kriteria,
            'nama_kriteria' => $request->nama_kriteria
        ]);
        return redirect('/kriteria');
    }

    public function hapusKriteria($kdKriteria)
    {
        DB::table('kriteria')->where('kd_kriteria', $kdKriteria)->delete();
        return redirect('/kriteria');
    }
}
