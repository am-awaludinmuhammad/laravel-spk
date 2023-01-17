<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FasilitasWarungController extends Controller
{
    public function fasilitasWarung($kdWarung)
    {
        // mengambil data dari table fasilitas
        $masterFasilitas = DB::table('fasilitas')->get();

        // mengambil data dari table warung_bakso sesuai kode warung yang dipilih
        $warung = DB::table('warung_bakso')->where('kd_warung', $kdWarung)->first();

        // mengambil data fasilitas warung sesuai kode warung yang dipilih
        $dataFasilitasWarung = DB::table('fasilitas_warung')
            ->select('fasilitas_warung.*', 'fasilitas.nama_fasilitas')
            ->join('fasilitas', 'fasilitas_warung.kd_fasilitas', '=', 'fasilitas.kd_fasilitas')
            ->where('fasilitas_warung.kd_warung', $kdWarung)
            ->get();
        
        // mengirim data ke view warung/list-fasilitas.blade.php
        return view('warung.list-fasilitas', compact('masterFasilitas', 'dataFasilitasWarung', 'warung'));
    }

    public function insertFasilitasWarung($kdWarung, Request $request)
    {
        // insert data ke table fasilitas_warung
        DB::table('fasilitas_warung')->insert([
            'kd_warung' => $kdWarung,
            'kd_fasilitas' => $request->kd_fasilitas
        ]);

        // redirect ke halaman list fasilitas warung makan terpilih
        return redirect('warung-makan/'.$kdWarung.'/fasilitas');
    }

    public function editFasilitasWarung($kdWarung, $id)
    {
        // mengambil data dari table warung_bakso sesuai kode warung yang dipilih
        $warung = DB::table('warung_bakso')->where('kd_warung', $kdWarung)->first();

        // mengambil data dari table fasilitas_warung sesuai fasilitas yang dipilih
        $dataFasilitasWarung = DB::table('fasilitas_warung')->where('id', $id)->first();

        // mengambil data dari table fasilitas
        $masterFasilitas = DB::table('fasilitas')->get();

        // mengirim data ke view warung/edit-fasilitas.blade.php
        return view('warung.edit-fasilitas', compact('warung', 'masterFasilitas', 'dataFasilitasWarung'));
    }

    public function updateFasilitasWarung($kdWarung, $id, Request $request)
    {
        // update data fasilitas warung
        DB::table('fasilitas_warung')->where('id', $id)->update([
            'kd_fasilitas' => $request->kd_fasilitas
        ]);

        // redirect ke halaman list fasilitas warung makan terpilih
        return redirect('warung-makan/'.$kdWarung.'/fasilitas');
    }

    public function hapusFasilitasWarung($kdWarung, $id)
    {
        // menghapus data fasilitas warung sesuai yang dipilih
        DB::table('fasilitas_warung')->where('id', $id)->delete();
        
        // redirect ke halaman list fasilitas warung makan terpilih
        return redirect('warung-makan/'.$kdWarung.'/fasilitas');
    }
}
