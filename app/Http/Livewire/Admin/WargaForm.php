<?php

namespace App\Http\Livewire\Admin;

use App\Models\Kk;
use Livewire\Component;

class WargaForm extends Component
{
    //deklarasi properti
    public $id_kk;
    public $kec_id;
    public $kel_id;
    public $rw_id;
    public $rt_id;
    public $kk;
    public $aktif;
    public $ekonomi = '-';
    public $dtks;
    public $rumah = '-';
    public $koordinat = '-';
    public $bangunan = '-';
    public $atap = '-';
    public $lantai = '-';
    public $minum = '-';
    public $hunian = '-';
    public $sanitasi = '-';
    public $urban_farming = '-';
    public $bidang = '-';
    public $pengalaman = '-';
    public $nama_kelompok = '-';
    public $lokasi_usaha = '-';
    public $luas_lahan = '-';
    public $bentuk_lahan = '-';
    public $status_lahan = '-';

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];

    //render file blade
    public function render()
    {
        return view('livewire.admin.warga-form', [
            'urban' => $this->urban_farming
        ]);
    }
    //menyiapkan data warga untuk ditampilkan pada modal detail ketika tombol tampil detail diklik
    public function showData($id)
    {
        $this->warga = Kk::find($id);

        $this->dispatchBrowserEvent('detail-ready');
    }
    public function save()
    {
        //validasi data sebelum disimpan
        $validated = $this->validate([

            'kk' => 'required',
        ]);

        if ($this->id_kk) {
            //update jika id tidak null 
            $kk = Kk::find($this->id_kk);
            $kk->kk = $this->kk;
            $kk->aktif = $this->aktif;
            $kk->ekonomi = $this->ekonomi;
            $kk->dtks = $this->dtks;
            $kk->rumah = $this->rumah;
            $kk->koordinat = $this->koordinat;
            $kk->bangunan = $this->bangunan;
            $kk->atap = $this->atap;
            $kk->lantai = $this->lantai;
            $kk->minum = $this->minum;
            $kk->hunian = $this->hunian;
            $kk->sanitasi = $this->sanitasi;
            $kk->urban_farming = $this->urban_farming;
            $kk->bidang = $this->bidang;
            $kk->pengalaman = $this->pengalaman;
            $kk->nama_kelompok = $this->nama_kelompok;
            $kk->lokasi_usaha = $this->lokasi_usaha;
            $kk->luas_lahan = $this->luas_lahan;
            $kk->bentuk_lahan = $this->bentuk_lahan;
            $kk->status_lahan = $this->status_lahan;
            $kk->update();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil diperbarui']);
        } else {
            //create jika id null
            $kk = new Kk;
            $kk->kk = $this->kk;
            $kk->aktif = $this->aktif;
            $kk->ekonomi = $this->ekonomi;
            $kk->dtks = $this->dtks;
            $kk->rumah = $this->rumah;
            $kk->koordinat = $this->koordinat;
            $kk->bangunan = $this->bangunan;
            $kk->atap = $this->atap;
            $kk->lantai = $this->lantai;
            $kk->minum = $this->minum;
            $kk->hunian = $this->hunian;
            $kk->sanitasi = $this->sanitasi;
            $kk->urban_farming = $this->urban_farming;
            $kk->bidang = $this->bidang;
            $kk->pengalaman = $this->pengalaman;
            $kk->nama_kelompok = $this->nama_kelompok;
            $kk->lokasi_usaha = $this->lokasi_usaha;
            $kk->luas_lahan = $this->luas_lahan;
            $kk->bentuk_lahan = $this->bentuk_lahan;
            $kk->status_lahan = $this->status_lahan;
            $kk->save();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil ditambahkan']);
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }

    public function editData($id)
    {
        //ambil data dari database untuk diedit
        $kk = Kk::find($id);
        $this->id_kk = $id;
        $this->kk = $kk->kk;
        $this->aktif = $kk->aktif;
        $this->ekonomi = $kk->ekonomi;
        $this->dtks = $kk->dtks;
        $this->rumah = $kk->rumah;
        $this->koordinat = $kk->koordinat;
        $this->bangunan = $kk->bangunan;
        $this->atap = $kk->atap;
        $this->lantai = $kk->lantai;
        $this->minum = $kk->minum;
        $this->hunian = $kk->hunian;
        $this->sanitasi = $kk->sanitasi;
        $this->urban_farming = $kk->urban_farming;
        $this->bidang = $kk->bidang;
        $this->pengalaman = $kk->pengalaman;
        $this->nama_kelompok = $kk->nama_kelompok;
        $this->lokasi_usaha = $kk->lokasi_usaha;
        $this->luas_lahan = $kk->luas_lahan;
        $this->bentuk_lahan = $kk->bentuk_lahan;
        $this->status_lahan = $kk->status_lahan;

        //kirim pesan melalui event browser bahwa data siap diedit untuk kemudian ditampilkan modal form
        $this->dispatchBrowserEvent('edit-ready');
    }

    public function resetForm()
    {
        //reset data untuk kosongkan form
        // $this->id_unit = null;
        // $this->periode_id = null;
        // $this->unit_id = null;
        // $this->jenjang_id = null;
    }
}
