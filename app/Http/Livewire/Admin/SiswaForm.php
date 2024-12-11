<?php

namespace App\Http\Livewire\Admin;

use App\Models\Jenjang;
use App\Models\Kelas;
use App\Models\Periode;
use Livewire\Component;
use App\Models\Siswa;
use App\Models\Unit;

class SiswaForm extends Component
{
    //deklarasi properti
    // public $id_siswa;
    public $siswa;
    public $periode_id;
    public $unit_id;
    public $jenjang_id;
    public $kelas_id;

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];

    //render file blade
    public function render()
    {
        $tapel = Periode::all();
        $unit = Unit::all();
        $jenjang = Jenjang::where('unit_id', '=', $this->unit_id)->get();
        $kelas = Kelas::where([
            ['unit_id', '=', $this->unit_id],
            ['jenjang_id', '=', $this->jenjang_id],
        ])->get();
        // $siswa = Siswa::all();
        return view('livewire.admin.siswa-form', [
            'tapel' => $tapel,
            'unit' => $unit,
            'jenjang' => $jenjang,
            'kelas' => $kelas,
        ]);
    }
    //menyiapkan data siswa untuk ditampilkan pada modal detail ketika tombol tampil detail diklik
    // public function showData($id)
    // {
    //     $this->siswa = Siswa::find($id);

    //     $this->dispatchBrowserEvent('detail-ready');
    // }
    public function save()
    {
        //validasi data sebelum disimpan
        $validated = $this->validate([

            'periode_id' => 'required',
            'unit_id' => 'required',
        ]);

        if ($this->id) {
            //update jika id tidak null 
            $siswa = Siswa::find($this->id);
            // $siswa->periode_id = '1';
            $siswa->unit_id = $this->unit_id;
            $siswa->jenjang_id = $this->jenjang_id;
            $siswa->update();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil diperbarui']);
        } else {
            //create jika id null
            $siswa = new Siswa;
            $siswa->periode_id = $this->periode_id;
            $siswa->unit_id = $this->unit_id;
            $siswa->jenjang_id = $this->jenjang_id;
            $siswa->save();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil ditambahkan']);
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }

    public function editData($id)
    {
        //ambil data dari database untuk diedit
        $siswa = Siswa::find($id);
        $this->id_unit = $id;
        $this->periode_id = $siswa->periode_id;
        $this->unit_id = $siswa->unit_id;
        $this->jenjang_id = $siswa->jenjang_id;

        //kirim pesan melalui event browser bahwa data siap diedit untuk kemudian ditampilkan modal form
        $this->dispatchBrowserEvent('edit-ready', ['data' => $this->jenjang_id]);
    }

    public function resetForm()
    {
        //reset data untuk kosongkan form
        $this->id_unit = null;
        $this->periode_id = null;
        $this->unit_id = null;
        $this->jenjang_id = null;
    }
}
