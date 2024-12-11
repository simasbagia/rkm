<?php

namespace App\Http\Livewire\Admin;

use App\Models\Umkm;
use Livewire\Component;
use Livewire\WithPagination;

class WargaFormUmkm extends Component
{
    use WithPagination;
    //deklarasi properti
    public $id_umkm;
    public $rt_id;
    public $perPage = 5;
    public $sortField = 'id';
    public $sortAsc = false;
    public $aktif;
    public $nama;
    public $mulai;
    public $jenis;
    public $terdaftar;
    public $ket;

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];

    //menyiapkan data warga untuk ditampilkan pada modal detail ketika tombol tampil detail diklik
    public function showData($id)
    {
        $this->warga = Umkm::find($id);

        $this->dispatchBrowserEvent('detail-ready');
    }
    public function save()
    {

        //validasi data sebelum disimpan
        $validated = $this->validate([

            'nama' => 'required',
        ]);

        if ($this->nama) {
            //update jika id tidak null 
            $umkm = Umkm::find($this->id_umkm);
            $umkm->rt_id = $this->rt_id;
            $umkm->nama = $this->nama;
            $umkm->mulai = $this->mulai;
            $umkm->jenis = $this->jenis;
            $umkm->aktif = $this->aktif;
            $umkm->terdaftar = $this->terdaftar;
            $umkm->ket = $this->ket;
            $umkm->update();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil diupdate']);
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }
    public function editData($id)
    {
        //ambil data dari database untuk diedit
        $umkm = Umkm::find($id);
        $this->nama = $umkm->nama;
        $this->rt_id = $umkm->rt_id;
        $this->aktif = $umkm->aktif;
        $this->id_umkm = $id;
        $this->nama = $umkm->nama;
        $this->mulai = $umkm->mulai;
        $this->jenis = $umkm->jenis;
        $this->terdaftar = $umkm->terdaftar;
        $this->ket = $umkm->ket;

        //kirim pesan melalui event browser bahwa data siap diedit untuk kemudian ditampilkan modal form
        $this->dispatchBrowserEvent('edit-ready');
    }

    public function resetForm()
    {
        //reset data untuk kosongkan form
        $this->nama = null;
        $this->rt_id = null;
        $this->mulai = null;
        $this->jenis = null;
        $this->terdaftar = null;
        $this->aktif = null;
    }
}
