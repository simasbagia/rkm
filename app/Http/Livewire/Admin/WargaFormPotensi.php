<?php

namespace App\Http\Livewire\Admin;

use App\Models\Kkm;
use App\Models\Potensi;
use Livewire\Component;
use Livewire\WithPagination;

class WargaFormPotensi extends Component
{
    use WithPagination;
    //deklarasi properti
    public $id_pot;
    public $rt_id;
    public $perPage = 5;
    public $sortField = 'id';
    public $sortAsc = false;
    public $pengembangan;
    public $nama;
    public $ket;

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];

    //menyiapkan data warga untuk ditampilkan pada modal detail kegiatanika tombol tampil detail diklik
    public function showData($id)
    {
        $this->warga = Potensi::find($id);

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
            $pot = Potensi::find($this->id_pot);
            $pot->rt_id = $this->rt_id;
            $pot->nama = $this->nama;
            $pot->pengembangan = $this->pengembangan;
            $pot->ket = $this->ket;
            $pot->update();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil diupdate']);
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }
    public function editData($id)
    {
        //ambil data dari database untuk diedit
        $pot = Potensi::find($id);
        $this->nama = $pot->nama;
        $this->rt_id = $pot->rt_id;
        $this->pengembangan = $pot->pengembangan;
        $this->id_pot = $id;
        $this->ket = $pot->ket;

        //kirim pesan melalui event browser bahwa data siap diedit untuk kemudian ditampilkan modal form
        $this->dispatchBrowserEvent('edit-ready');
    }

    public function resetForm()
    {
        //reset data untuk kosongkan form
        $this->nama = null;
        $this->rt_id = null;
        $this->pengembangan = null;
        $this->ket = null;
    }
}
