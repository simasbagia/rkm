<?php

namespace App\Http\Livewire\Admin;

use App\Models\Rw;
use Livewire\Component;

class WargaFormKetRw extends Component
{
    //deklarasi properti
    public $id_rw;
    public $rw;
    public $ketua;

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];

    //render file blade
    public function render()
    {
        return view('livewire.admin.warga-form-ket-rw');
    }
    public function save()
    {
        //validasi data sebelum disimpan
        $validated = $this->validate([

            'rw' => 'required',
        ]);

        if ($this->id_rw) {
            //update jika id tidak null 
            $rw = Rw::find($this->id_rw);
            $rw->ketua = $this->ketua;
            $rw->update();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil diperbarui']);
        } else {

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Edit gagal']);
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }

    public function editData($id)
    {
        //ambil data dari database untuk diedit
        $rw = Rw::find($id);
        $this->id_rw = $id;
        $this->rw = $rw->rw;
        $this->ketua = $rw->ketua;

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
