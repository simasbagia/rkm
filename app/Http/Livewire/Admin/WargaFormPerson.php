<?php

namespace App\Http\Livewire\Admin;

use App\Models\Keluarga;
use App\Models\Kk;
use Livewire\Component;
use Livewire\WithPagination;

class WargaFormPerson extends Component
{
    use WithPagination;
    //deklarasi properti
    public $id_person;
    public $no_kk;
    public $rt_id;
    public $kk_id;
    public $perPage = 5;
    public $sortField = 'id';
    public $sortAsc = false;
    public $kk;
    public $aktif;
    public $nama;
    public $c_nama = null;
    public $tgl_lahir;
    public $jk;
    public $warneg;
    public $agama;
    public $pendidikan;
    public $lulus;
    public $pekerjaan;
    public $posisi;
    public $warneg;
    public $disabilitas;

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];

    //menyiapkan data warga untuk ditampilkan pada modal detail ketika tombol tampil detail diklik
    public function showData($id)
    {
        $this->warga = Keluarga::find($id);

        $this->dispatchBrowserEvent('detail-ready');
    }
    public function save()
    {

        //validasi data sebelum disimpan
        $validated = $this->validate([

            'nama' => 'required',
        ]);

        if ($this->nama && $this->tgl_lahir) {
            //update jika id tidak null 
            $keluarga = Keluarga::find($this->id_person);
            $keluarga->kk_id = $this->kk_id;
            $keluarga->rt_id = $this->rt_id;
            $keluarga->nama = $this->nama;
            $keluarga->tgl_lahir = $this->tgl_lahir;
            $keluarga->jk = $this->jk;
	    $keluarga->warneg = $this->warneg;
            $keluarga->agama = $this->agama;
            $keluarga->pendidikan = $this->pendidikan;
            $keluarga->lulus = $this->lulus;
            $keluarga->pekerjaan = $this->pekerjaan;
            $keluarga->posisi = $this->posisi;
            $keluarga->warneg = $this->warneg;
            $keluarga->disabilitas = $this->disabilitas;
            $keluarga->update();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil diupdate']);
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }
    public function editData($id)
    {
        //ambil data dari database untuk diedit
        $keluarga = Keluarga::find($id);
        $this->keluarga = $keluarga->nama;
        $this->kk = $keluarga->kk->kk;
        $this->kk_id = $keluarga->kk_id;
        $this->rt_id = $keluarga->rt_id;
        $this->id_person = $id;
        $this->nama = $keluarga->nama;
        $this->tgl_lahir = $keluarga->tgl_lahir;
	$keluarga->warneg = $this->warneg;
        $this->jk = $keluarga->jk;
        $this->agama = $keluarga->agama;
        $this->pendidikan = $keluarga->pendidikan;
        $this->lulus = $keluarga->lulus;
        $this->pekerjaan = $keluarga->pekerjaan;
        $this->posisi = $keluarga->posisi;
        $this->warneg = $keluarga->warneg;
        $this->disabilitas = $keluarga->disabilitas;

        //kirim pesan melalui event browser bahwa data siap diedit untuk kemudian ditampilkan modal form
        $this->dispatchBrowserEvent('edit-ready');
    }

    public function resetForm()
    {
        //reset data untuk kosongkan form
        $this->nama = null;
        $this->kk_id = null;
        $this->tgl_lahir = null;
        $this->jk = null;
        $this->posisi = null;
    }
}
