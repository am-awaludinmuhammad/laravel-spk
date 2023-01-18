<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarungController extends Controller
{
    public function warungMakan()
    {
        // mengambil data dari table warung_bakso
        $dataWarung = DB::table('warung_bakso')->get();
        
        // mengirim data warung ke view warung/list.blade.php
        return view('warung/list', compact('dataWarung'));
    }

    public function tambahWarungMakan()
    {
        // menmanggil view warung/tambah.blade.php
        return view('warung/tambah');
    }

    public function insertWarungMakan(Request $request) {
        // menyimpan data foto1 yang diupload ke variabel $fileFoto1
        $fileFoto1 = $request->file('foto_1');
        $namaFoto1 = time()."_".$fileFoto1->getClientOriginalName();

        // menyimpan data foto1 yang diupload ke variabel $fileFoto2
        $fileFoto2 = $request->file('foto_2');
        $namaFoto2 = time()."_".$fileFoto2->getClientOriginalName();

        // simpan file ke folder public/img/upload
        $tujuan = 'img/upload';
        $fileFoto1->move($tujuan,$namaFoto1);
        $fileFoto2->move($tujuan,$namaFoto2);

        // insert data ke table warung_bakso
        DB::table('warung_bakso')->insert([
            'kd_warung' => $request->kd_warung,
            'nama_warung' => $request->nama_warung,
            'foto_1' => $namaFoto1,
            'foto_2' => $namaFoto2,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        // redirect ke halaman warung makan
        return redirect('/warung-makan');
    }

    public function editWarungMakan($kdWarung) {
        // ambil data warung sesuai kd warung
        $warung = DB::table('warung_bakso')->where('kd_warung', $kdWarung)->first();
        // mengirim data warung ke view warung/edit.blade.php
        return view('warung/edit', compact('warung'));
    }

    public function updateWarungMakan($kdWarung, Request $request) {
        // update data warung bakso
        DB::table('warung_bakso')->where('kd_warung', $kdWarung)->update([
            'kd_warung' => $request->kd_warung,
            'nama_warung' => $request->nama_warung,
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

        // redirect ke halaman warung makan
        return redirect('/warung-makan');
    }

    public function hapusWarungMakan($kdWarung) {
        // hapus warung makan sesuai kd warung
        DB::table('warung_bakso')->where('kd_warung', $kdWarung)->delete();
        // redirect ke halaman warung makan
        return redirect('/warung-makan');
    }
}
