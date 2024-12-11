<?php

namespace App\Http\Livewire\Admin;

use App\Models\Kel;
use App\Models\Periode;
use Livewire\Component;
use App\Models\Pokmas;

class PokmasForm extends Component
{
    //deklarasi properti
    public $id_pokmas;
    public $pokmas;
    public $kel_id;
    public $periode_id;
    public $tanggal_buka;
    public $tanggal_tutup;
    public $aktif = 'N';

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];

    //render file blade
    public function render()
    {
        $kel = Kel::select('id', 'nama_kel')
            ->get();
        return view('livewire.admin.pokmas-form', ['kel' => $kel]);
    }

    public function save()
    {
        //validasi data sebelum disimpan
        $validated = $this->validate([
            'pokmas' => 'required',
            'tanggal_buka' => 'required',
            'tanggal_tutup' => 'required',
        ]);
        // $pokmas = Pokmas::find($this->kel_id);
        // Pokmas::where('kel_id', '=', $pokmas->kel_id)->update(['aktif' => 'N']); //nonaktifkan semua dulu
        //update aktif menjadi N pada semua data 
        // if ($this->aktif == 'Y') Pokmas::query()->update(['aktif' => 'N']);

        if ($this->id_pokmas) {
            //update jika id tidak null         
            $pokmas = Pokmas::find($this->id_pokmas);
            $pokmas->pokmas = $this->pokmas;
            $pokmas->kel_id = $this->kel_id;
            $pokmas->kec_id = $this->kec_id;
            $pokmas->periode_id = $this->periode_id;
            $pokmas->tanggal_buka = $this->tanggal_buka;
            $pokmas->tanggal_tutup = $this->tanggal_tutup;
            if ($this->aktif == 'Y') {
                $this->setActive($this->id_pokmas);
            } else $pokmas->aktif = 'N';

            $pokmas->update();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil diperbarui']);
        } else {
            //create jika id null
            $pokmas = new Pokmas;
            $pokmas->pokmas = $this->pokmas;
            $pokmas->kel_id = $this->kel_id;
            $pokmas->kec_id = $this->kec_id;
            $pokmas->periode_id = $this->periode_id;
            $pokmas->tanggal_buka = $this->tanggal_buka;
            $pokmas->tanggal_tutup = $this->tanggal_tutup;
            $pokmas->aktif = 'N';
            $pokmas->save();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil ditambahkan']);
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }

    public function editData($id, $pilih_kel, $pilih_kec, $tahun)
    {
        // dd($id);
        //ambil data dari database untuk diedit
        
        if ($id != 0) {
            $pokmas = Pokmas::find($id);
            $this->id_pokmas = $id;
            $this->pokmas = $pokmas->pokmas;
            $this->periode_id = $pokmas->periode_id;
            $this->kel_id = $pokmas->kel_id;
            $this->kec_id = $pokmas->kec_id;
            $this->tanggal_buka = $pokmas->tanggal_buka;
            $this->tanggal_tutup = $pokmas->tanggal_tutup;
            $this->aktif = $pokmas->aktif;
        } else {
            $this->kel_id = $pilih_kel;
            $this->kec_id = $pilih_kec;
            $this->periode_id = $tahun;
            // dd($this->periode_id);
        }
        //kirim pesan melalui event browser bahwa data siap diedit untuk kemudian ditampilkan modal form
        $this->dispatchBrowserEvent('edit-ready');
    }

    public function resetForm()
    {
        //reset data untuk kosongkan form
        $this->id_pokmas = null;
        $this->pokmas = null;
        $this->kel_id = null;
        $this->tanggal_buka = null;
        $this->tanggal_tutup = null;
        $this->aktif = 'N';
    }
    //update data yang statusnya aktif
    public function setActive($id)
    {
        // $pokmas = Pokmas::find($id);
        // Pokmas::where('kel_id', '=', $pokmas->kel_id)->update(['aktif' => 'N']); //nonaktifkan semua dulu
        $pokmas = Pokmas::find($id);
        $pokmas->aktif = 'Y'; //baru atur yang aktif
        $pokmas->update();
    }
}
