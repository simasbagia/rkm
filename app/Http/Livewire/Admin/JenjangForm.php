<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Jenjang;

class JenjangForm extends Component
{
    //deklarasi properti
    public $id_jenjang;
    public $nama_jenjang;
    public $deskripsi;

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];

    //render file blade
    public function render()
    {
        return view('livewire.admin.jenjang-form');
    }

    public function save()
    {
        //validasi data sebelum disimpan
        $validated = $this->validate([
            'nama_jenjang' => 'required',
            // 'deskripsi' => 'required',
        ]);

        if ($this->id_jenjang) {
            //update jika id tidak null 
            $jenjang = jenjang::find($this->id_jenjang);
            $jenjang->nama_jenjang = $this->nama_jenjang;
            $jenjang->deskripsi = $this->deskripsi;
            $jenjang->update();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil diperbarui']);
        } else {
            //create jika id null
            $jenjang = new Jenjang;
            $jenjang->nama_jenjang = $this->nama_jenjang;
            $jenjang->deskripsi = $this->deskripsi;
            $jenjang->save();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil ditambahkan']);
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }

    public function editData($id)
    {
        //ambil data dari database untuk diedit
        $jenjang = Jenjang::find($id);
        $this->id_jenjang = $id;
        $this->nama_jenjang = $jenjang->nama_jenjang;
        $this->deskripsi = $jenjang->deskripsi;

        //kirim pesan melalui event browser bahwa data siap diedit untuk kemudian ditampilkan modal form
        $this->dispatchBrowserEvent('edit-ready', ['data' => $this->deskripsi]);
    }

    public function resetForm()
    {
        //reset data untuk kosongkan form
        $this->id_jenjang = null;
        $this->nama_jenjang = null;
        $this->deskripsi = null;
    }
}
