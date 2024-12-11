<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Charts\DashboardChart;

use App\Models\Kk;
use App\Models\Pendaftar;

class Dashboard extends Component
{
    public function render()
    {

        $kk = Kk::all();
        $label = [];
        $lakilaki = [];
        $perempuan = [];
        $total = [];

        //ambil data tiap jurusan
        foreach ($kk as $k) {
            // $jmllakilaki = Kk::where(['id_jurusan' => $k->id, 'jenis_kelamin' => 'L'])->count();
            // $jmlperempuan = Kk::where(['id_jurusan' => $k->id, 'jenis_kelamin' => 'P'])->count();
            // $jmlpendaftar = Kk::where(['id_jurusan' => $k->id])->count();

            // $label[] = $jur->nama_jurusan;
            // $lakilaki[] = $jmllakilaki;
            // $perempuan[] = $jmlperempuan;
            // $total[] = $jmlpendaftar;
            $lakilaki[] = 1;
            $perempuan[] = 2;
            $total[] = 3;
        }

        //membuat chart dari data jurusan
        $chart = new DashboardChart;
        $chart->labels($label);
        $chart->dataset("Laki-laki", "bar", $lakilaki)->backGroundColor('#3490dc');
        $chart->dataset("Perempuan", "bar", $perempuan)->backGroundColor('#f66d9b');
        $chart->dataset("Total", "bar", $total)->backGroundColor('#6574cd');

        //Data untuk ditampilkan pada card
        // $blmdikonfirmasi = Pendaftar::where(['status_seleksi' => 'Belum Dikonfirmasi'])->count();
        // $diterima = Pendaftar::where(['status_seleksi' => 'Diterima'])->count();
        // $ditolak = Pendaftar::where(['status_seleksi' => 'Ditolak'])->count();
        $pendaftar = Kk::count();

        //return view beserta data yang dibutuhkan
        return view('livewire.admin.dashboard', [
            'chart' => $chart,
            'blmdikonfirmasi' => "1",
            'diterima' => 2,
            'ditolak' => 3,
            'pendaftar' => $pendaftar,
        ]);
    }
}
