<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Kelas;

class KelasForm extends Component
{
    //deklarasi properti
    public $id_kelas;
    public $nama_kelas;
    public $deskripsi;

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];

    //render file blade
    public function render()
    {
        return view('livewire.admin.kelas-form');
    }

    public function save()
    {
        //validasi data sebelum disimpan
        $validated = $this->validate([
            'nama_kelas' => 'required',
        ]);

        if ($this->id_kelas) {
            //update jika id tidak null 
            $kelas = kelas::find($this->id_kelas);
            $kelas->nama_kelas = $this->nama_kelas;
            $kelas->deskripsi = $this->deskripsi;
            $kelas->update();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil diperbarui']);
        } else {
            //create jika id null
            $kelas = new Kelas;
            $kelas->nama_kelas = $this->nama_kelas;
            $kelas->deskripsi = $this->deskripsi;
            $kelas->save();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil ditambahkan']);
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }

    public function editData($id)
    {
        //ambil data dari database untuk diedit
        $kelas = Kelas::find($id);
        $this->id_kelas = $id;
        $this->nama_kelas = $kelas->nama_kelas;
        $this->deskripsi = $kelas->deskripsi;

        //kirim pesan melalui event browser bahwa data siap diedit untuk kemudian ditampilkan modal form
        $this->dispatchBrowserEvent('edit-ready', ['data' => $this->deskripsi]);
    }

    public function resetForm()
    {
        //reset data untuk kosongkan form
        $this->id_kelas = null;
        $this->nama_kelas = null;
        $this->deskripsi = null;
    }
}
