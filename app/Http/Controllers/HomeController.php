<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Informasi;
use App\Models\Jurusan;
use App\Models\Periode;
use App\Models\Widget;

class HomeController extends Controller
{
    public function index()
    {
        //siapkan semua data diperlukan
        $slide = Slide::all();
        $periode = Periode::where('aktif', '=', 'Y')->first();
        $informasi = Informasi::where('tampil_beranda', '=', 'Y')->get();
        $widget = Widget::where('posisi', '=', 'Tengah')->get();

        //return view beserta datanya
        return view('front.home', [
            'slide' => $slide,
            'periode' => $periode,
            'informasi' => $informasi,
            'widget' => $widget
        ]);
    }

    public function informasi($id)
    {
        //menampilkan detail informasi ketika judul informasi pada widget diklik
        $informasi = Informasi::where('id', '=', $id)->first();
        return view('front.informasi', [
            'informasi' => $informasi
        ]);
    }
    public function link($id)
    {
        //menampilkan detail informasi ketika judul informasi pada widget diklik
        $link = Widget::where('id', '=', $id)->first();
        return view('front.link', [
            'link' => $link
        ]);
    }

    public function jurusan($id)
    {
        //menampilkan detail jurusan ketika nama jurusan pada widget diklik
        $jurusan = Jurusan::where('id', '=', $id)->first();
        return view('front.jurusan', [
            'jurusan' => $jurusan
        ]);
    }
}
