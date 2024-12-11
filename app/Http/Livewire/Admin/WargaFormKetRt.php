<?php

namespace App\Http\Livewire\Admin;

use App\Models\Pokmas;
use Livewire\Component;
use App\Models\Rt;

class WargaFormKetRt extends Component
{
    //deklarasi properti
    public $id_rt;
    public $rt;
    public $ketua;
    public $koordinat;
    // public $pokmas;
    public $jalan_lingkungan;
    public $perlu_penerangan;
    public $drainase;
    public $proteksi_kebakaran;
    public $apkr;
    public $kebutuhan_apkr;
    public $poskamling;
    public $sarpras_kamling;
    public $bale_warga;
    public $sarpras_bale;

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];

    //render file blade
    public function render()
    {
        return view('livewire.admin.warga-form-ket-rt');
    }
    //menyiapkan data warga untuk ditampilkan pada modal detail ketika tombol tampil detail diklik
    public function showData($id)
    {
        $this->warga = Rt::find($id);

        $this->dispatchBrowserEvent('detail-ready');
    }
    public function save()
    {
        //validasi data sebelum disimpan
        $validated = $this->validate([

            'rt' => 'required',
        ]);

        if ($this->id_rt) {
            //update jika id tidak null 
            $rt = Rt::find($this->id_rt);
            $rt->rt = $this->rt;
            $rt->ketua = $this->ketua;
            $rt->koordinat = $this->koordinat;
            // $rt->pokmas = $this->pokmas;
            $rt->jalan_lingkungan = $this->jalan_lingkungan;
            $rt->perlu_penerangan = $this->perlu_penerangan;
            $rt->drainase = $this->drainase;
            $rt->proteksi_kebakaran = $this->proteksi_kebakaran;
            $rt->apkr = $this->apkr;
            $rt->kebutuhan_apkr = $this->kebutuhan_apkr;
            $rt->poskamling = $this->poskamling;
            $rt->sarpras_kamling = $this->sarpras_kamling;
            $rt->bale_warga = $this->bale_warga;
            $rt->sarpras_bale = $this->sarpras_bale;
            $rt->update();
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
        $rt = Rt::find($id);
        $this->pokmas=Pokmas::where([
            ['aktif','=','Y'],
            ['id','=',$rt->pokmas_id]
        ])->first();
        $this->id_rt = $id;
        $this->rt = $rt->rt;
        $this->ketua = $rt->ketua;
        $this->koordinat = $rt->koordinat;
        // $this->pokmas = ($this->pokmas)?$this->pokmas->pokmas:'-';
        $this->jalan_lingkungan = $rt->jalan_lingkungan;
        $this->perlu_penerangan = $rt->perlu_penerangan;
        $this->drainase = $rt->drainase;
        $this->proteksi_kebakaran = $rt->proteksi_kebakaran;
        $this->apkr = $rt->apkr;
        $this->kebutuhan_apkr = $rt->kebutuhan_apkr;
        $this->poskamling = $rt->poskamling;
        $this->sarpras_kamling = $rt->sarpras_kamling;
        $this->bale_warga = $rt->bale_warga;
        $this->sarpras_bale = $rt->sarpras_bale;

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
