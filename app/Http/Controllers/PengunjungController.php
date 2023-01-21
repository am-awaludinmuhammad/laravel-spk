<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengunjungController extends Controller
{
    public function home()
    {
        $listWarung = DB::table('warung_bakso')->get();
        return view('guest.index', compact('listWarung'));
    }

    public function hitungNilaiHarga($harga)
    {
        $murah = 1;
        $sedang = 2;
        $mahal = 3;

        if ($harga < 15000) {
            $nilai = $murah;
        } elseif ($harga >= 15000 && $harga <= 20000) {
            $nilai = $sedang;
        } elseif ($harga > 20000) {
            $nilai = $mahal;
        }

        return $nilai;
    }

    public function hitungNilaiRagamMenu($jumlahMenu)
    {
        $sangatKurang = 1;
        $kurang = 2;
        $cukup = 3;
        $banyak = 4;
        $sangatBanyak = 5;

        if ($jumlahMenu < 5) {
            $nilai = $sangatKurang;
        } elseif ($jumlahMenu>=5 && $jumlahMenu<10) {
            $nilai = $kurang;
        } elseif ($jumlahMenu>=10 && $jumlahMenu < 15) {
            $nilai = $cukup;
        } elseif ($jumlahMenu>=15 && $jumlahMenu<=20) {
            $nilai = $banyak;
        } elseif ($jumlahMenu>20) {
            $nilai = $sangatBanyak;
        }

        return $nilai;
    }

    public function hitungNilaiFasilitas($jumlahFasilitas)
    {
        $sangatKurang = 1;
        $kurang = 2;
        $cukup = 3;
        $banyak = 4;
        $sangatBanyak = 5;

        if ($jumlahFasilitas < 2) {
            $nilai = $sangatKurang;
        } elseif ($jumlahFasilitas>=2 && $jumlahFasilitas<5) {
            $nilai = $kurang;
        } elseif ($jumlahFasilitas>=5 && $jumlahFasilitas < 7) {
            $nilai = $cukup;
        } elseif ($jumlahFasilitas>=7 && $jumlahFasilitas<=9) {
            $nilai = $banyak;
        } elseif ($jumlahFasilitas>9) {
            $nilai = $sangatBanyak;
        }

        return $nilai;
    }

    public function hitung(Request $request)
    {
        $kdWarungTerpilih = [];
        if ($request->has('kd_warung')) {
            foreach ($request->kd_warung as $kdWarung => $value) {
                $kdWarungTerpilih[] = $kdWarung;
            }
        }

        $bobotHarga = 20;
        $bobotJarak = 10;
        $bobotRagamMenu = 25;
        $bobotFasilitas = 20;
        $bobotKenyamanan = 20;

        // tampung nilai di array untuk memudahkan perhitungan
        $arrayNilaiHarga = [];
        $arrayNilaiJarak = [];
        $arrayNilaiMenu = [];
        $arrayNilaiFasilitas = [];
        $arrayNilaiKenyamanan = [];

        $hasil = [];

        $listWarung = DB::table('warung_bakso')
        ->select('*')
        ->selectRaw("(6371 * acos(cos(radians(?)) 
            * cos(radians(latitude))
            * cos(radians(longitude) - radians(?)) 
            + sin(radians(?))
            * sin(radians(latitude)))) AS jarak", [$request->latitude, $request->longitude, $request->latitude])
        ->selectRaw('(SELECT COUNT(*) FROM menu_warung WHERE menu_warung.kd_warung = warung_bakso.kd_warung) as jumlah_menu')
        ->selectRaw('(SELECT COUNT(*) FROM fasilitas_warung WHERE fasilitas_warung.kd_warung = warung_bakso.kd_warung) as jumlah_fasilitas')
        ->selectRaw('(SELECT ROUND(AVG(harga)) FROM menu_warung WHERE menu_warung.kd_warung = warung_bakso.kd_warung) as avg_harga')
        ->whereIn('warung_bakso.kd_warung', $kdWarungTerpilih)
        ->get();

        foreach ($listWarung as $i => $warung) {
            $nilaiHarga = $this->hitungNilaiHarga($warung->avg_harga);
            $nilaiRagamMenu = $this->hitungNilaiRagamMenu($warung->jumlah_menu);
            $nilaiFasilitas = $this->hitungNilaiFasilitas($warung->jumlah_fasilitas);

            // simpan ke array untuk memudahkan perhitungan max min
            $arrayNilaiHarga[] = $nilaiHarga;
            $arrayNilaiJarak[] = $warung->jarak;
            $arrayNilaiMenu[] = $nilaiRagamMenu;
            $arrayNilaiFasilitas[] = $nilaiFasilitas;
            $arrayNilaiKenyamanan[] = $warung->kenyamanan;

            // array data hasil
            $hasil[$i]['kd_warung'] = $warung->kd_warung;
            $hasil[$i]['nama_warung'] = $warung->nama_warung;
            $hasil[$i]['alamat'] = $warung->alamat;
            $hasil[$i]['latitude'] = $warung->latitude;
            $hasil[$i]['longitude'] = $warung->longitude;
            $hasil[$i]['jarak'] = $warung->jarak;
            $hasil[$i]['nilai_harga'] = $nilaiHarga;
            $hasil[$i]['nilai_ragam_menu'] = $nilaiRagamMenu;
            $hasil[$i]['nilai_fasilitas'] = $nilaiFasilitas;
            $hasil[$i]['kenyamanan'] = $warung->kenyamanan;
        }

        foreach ($hasil as $i => $warung) {
            // normalisasi
            $normalisasiHarga = min($arrayNilaiHarga) / $warung['nilai_harga'];
            $normalisasiJarak = min($arrayNilaiJarak) / $warung['jarak'];
            $normalisasiMenu = $warung['nilai_ragam_menu'] / max($arrayNilaiMenu);
            $normalisasiFasilitas = $warung['nilai_fasilitas'] / max($arrayNilaiFasilitas);
            $normalisasiKenyamanan = $warung['kenyamanan'] / max($arrayNilaiKenyamanan);
            $hasilAkhir = ($bobotHarga * $normalisasiHarga) + ($bobotJarak + $normalisasiJarak) + ($bobotRagamMenu * $normalisasiMenu) + ($bobotFasilitas*$normalisasiFasilitas) + ($bobotKenyamanan*$normalisasiKenyamanan);

            // simpan ke array data warung
            $hasil[$i]['normalisasi_harga'] = $normalisasiHarga;
            $hasil[$i]['normalisasi_jarak'] = $normalisasiJarak;
            $hasil[$i]['normalisasi_ragam_menu'] = $normalisasiMenu;
            $hasil[$i]['normalisasi_fasilitas'] = $normalisasiFasilitas;
            $hasil[$i]['normalisasi_kenyamanan'] = $normalisasiKenyamanan;
            $hasil[$i]['nilai_ranking'] = $hasilAkhir;
        }

        // urutkan hasil dari ranking terbesar ke terkecil
        usort($hasil, function ($item1, $item2) {
            return $item2['nilai_ranking'] <=> $item1['nilai_ranking'];
        });

        // simpan hasil perhitungan ke dalam session
        $request->session()->put('hasil', $hasil);
        // redirect ke halaman rekomendasi
        return redirect('/rekomendasi');
    }
    
    public function hasil()
    {
        // ambil hasil rekomendasi dari session 
        $listWarung = session('hasil');
        return view('guest.hasil', compact('listWarung'));
    }

    public function map($kdWarung)
    {
        $warung = DB::table('warung_bakso')->where('kd_warung', $kdWarung)->first();
        return view('guest.map', compact('warung'));
    }
}
