<?php

namespace App\Http\Livewire\Admin;

use App\Models\Kkm;
use App\Models\Sumbangan;
use Livewire\Component;
use Livewire\WithPagination;

class WargaFormSumbangan extends Component
{
    use WithPagination;
    //deklarasi properti
    public $id_pot;
    public $rt_id;
    public $perPage = 5;
    public $sortField = 'id';
    public $sortAsc = false;
    public $kegiatan;
    public $sumbangan;
    public $ket;

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];

    //menyiapkan data warga untuk ditampilkan pada modal detail kegiatanika tombol tampil detail diklik
    public function showData($id)
    {
        $this->warga = Sumbangan::find($id);

        $this->dispatchBrowserEvent('detail-ready');
    }
    public function save()
    {

        //validasi data sebelum disimpan
        $validated = $this->validate([

            'sumbangan' => 'required',
        ]);

        if ($this->sumbangan) {
            //update jika id tidak null 
            $sumb = Sumbangan::find($this->id_pot);
            $sumb->rt_id = $this->rt_id;
            $sumb->sumbangan = $this->sumbangan;
            $sumb->kegiatan = $this->kegiatan;
            $sumb->update();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil diupdate']);
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }
    public function editData($id)
    {
        //ambil data dari database untuk diedit
        $sumb = Sumbangan::find($id);
        $this->sumbangan = $sumb->sumbangan;
        $this->rt_id = $sumb->rt_id;
        $this->kegiatan = $sumb->kegiatan;
        $this->id_pot = $id;

        //kirim pesan melalui event browser bahwa data siap diedit untuk kemudian ditampilkan modal form
        $this->dispatchBrowserEvent('edit-ready');
    }

    public function resetForm()
    {
        //reset data untuk kosongkan form
        $this->sumbangan = null;
        $this->rt_id = null;
        $this->kegiatan = null;
        $this->ket = null;
    }
}
