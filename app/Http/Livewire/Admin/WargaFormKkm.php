<?php

namespace App\Http\Livewire\Admin;

use App\Models\Kkm;
use Livewire\Component;
use Livewire\WithPagination;

class WargaFormKkm extends Component
{
    use WithPagination;
    //deklarasi properti
    public $id_kkm;
    public $rt_id;
    public $perPage = 5;
    public $sortField = 'id';
    public $sortAsc = false;
    public $aktif;
    public $nama;
    public $pj;
    public $jenis;
    public $jml_anggota;
    public $kegiatan;

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];

    //menyiapkan data warga untuk ditampilkan pada modal detail kegiatanika tombol tampil detail diklik
    public function showData($id)
    {
        $this->warga = Kkm::find($id);

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
            $kkm = Kkm::find($this->id_kkm);
            $kkm->rt_id = $this->rt_id;
            $kkm->nama = $this->nama;
            $kkm->pj = $this->pj;
            $kkm->jenis = $this->jenis;
            $kkm->aktif = $this->aktif;
            $kkm->jml_anggota = $this->jml_anggota;
            $kkm->kegiatan = $this->kegiatan;
            $kkm->update();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil diupdate']);
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }
    public function editData($id)
    {
        //ambil data dari database untuk diedit
        $kkm = Kkm::find($id);
        $this->nama = $kkm->nama;
        $this->rt_id = $kkm->rt_id;
        $this->aktif = $kkm->aktif;
        $this->id_kkm = $id;
        $this->nama = $kkm->nama;
        $this->pj = $kkm->pj;
        $this->jenis = $kkm->jenis;
        $this->jml_anggota = $kkm->jml_anggota;
        $this->kegiatan = $kkm->kegiatan;

        //kirim pesan melalui event browser bahwa data siap diedit untuk kemudian ditampilkan modal form
        $this->dispatchBrowserEvent('edit-ready');
    }

    public function resetForm()
    {
        //reset data untuk kosongkan form
        $this->nama = null;
        $this->rt_id = null;
        $this->pj = null;
        $this->jenis = null;
        $this->jml_anggota = null;
        $this->aktif = null;
    }
}
