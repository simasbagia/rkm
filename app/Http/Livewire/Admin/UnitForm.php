<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Unit;

class UnitForm extends Component
{
    //deklarasi properti
    public $id_unit;
    public $nama_unit;
    public $singkatan;
    public $alamat;

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];

    //render file blade
    public function render()
    {
        return view('livewire.admin.unit-form');
    }

    public function save()
    {
        //validasi data sebelum disimpan
        $validated = $this->validate([
            'nama_unit' => 'required',
            'singkatan' => 'required',
        ]);

        if ($this->id_unit) {
            //update jika id tidak null 
            $unit = unit::find($this->id_unit);
            $unit->nama_unit = $this->nama_unit;
            $unit->singkatan = $this->singkatan;
            $unit->alamat = $this->alamat;
            $unit->update();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil diperbarui']);
        } else {
            //create jika id null
            $unit = new Unit;
            $unit->nama_unit = $this->nama_unit;
            $unit->singkatan = $this->singkatan;
            $unit->alamat = $this->alamat;
            $unit->save();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil ditambahkan']);
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }

    public function editData($id)
    {
        //ambil data dari database untuk diedit
        $unit = Unit::find($id);
        $this->id_unit = $id;
        $this->nama_unit = $unit->nama_unit;
        $this->singkatan = $unit->singkatan;
        $this->alamat = $unit->alamat;

        //kirim pesan melalui event browser bahwa data siap diedit untuk kemudian ditampilkan modal form
        $this->dispatchBrowserEvent('edit-ready', ['data' => $this->alamat]);
    }

    public function resetForm()
    {
        //reset data untuk kosongkan form
        $this->id_unit = null;
        $this->nama_unit = null;
        $this->singkatan = null;
        $this->alamat = null;
    }
}
