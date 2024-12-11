<?php

namespace App\Http\Livewire\Admin;

use App\Models\Kel;
use App\Models\Pokmas;
use App\Models\Rt;
use App\Models\User;
use Livewire\Component;
// use Livewire\WithPagination;

class PendampingForm extends Component
{
    //deklarasi properti
    // use WithPagination;

    //deklarasi properti
    public $caricalon;
    public $caripokmas;

    public $selected_data;
    public $pokmas;
    public $kode;

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];

    public function rset()
    {
        $this->caricalon = '';
        $this->caripokmas = '';
    }
    //render file blade
    public function render()
    {
        $caricalon = $this->caricalon;
        if (strlen($caricalon) <= 2) {
            $caricalon = 99999999;
        } else {
            // $caricalon = $caricalon + 0;
            if (intval($caricalon) == 0) {

                if (strlen($caricalon) <= 3) {
                    $caricalon = '---';
                }
            } else {
                if (strlen($caricalon) <= 4) {
                    $caricalon = '---';
                }
            }
        }
        $caripokmas = $this->caripokmas;
        if (strlen($caripokmas) <= 2) {
            $caripokmas = 99999999;
        } else {
            if (intval($caripokmas) == 0) {

                if (strlen($caripokmas) <= 3) {
                    $caripokmas = '---';
                }
            } else {
                if (strlen($caripokmas) <= 4) {
                    $caripokmas = '---';
                }
            }
        }
        $pendamping = User::where('name', 'LIKE', '%' . $caricalon . '%')
            ->orWhere('nip', 'LIKE', '%' . $caricalon . '%')
            ->get();
        $pm = Pokmas::where('pokmas', 'LIKE', '%' . $caripokmas . '%')->get();
        // $pokmas1 = Pokmas::all();

        return view('livewire.admin.pendamping-form', [
            'pendamping' => $pendamping,
            'pm' => $pm,
            'kode'=>$this->kode
        ]);
    }

    public function tambah($idp)
    {
        //validasi data sebelum disimpan
        $validated = $this->validate([
            // $idp => 'required',
            'selected_data' => 'required',
        ], [
            'selected_data.required' => "Tidak ada data dipilih"
        ]);

        //update rt
        if($this->kode==0){
        Rt::whereIn('id', $this->selected_data)->update([
            'pendamping_id' => $idp
        ]);
        } elseif($this->kode==2) {
            Kel::whereIn('id', $this->selected_data)->update([
                'pendamping_id' => $idp
            ]);
        } else {
            Rt::whereIn('id', $this->selected_data)->update([
                'pokmas_id' => $idp
            ]);
        }

        //kirim pesan keberhasilan melalui event browser
        $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil diperbarui']);

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }

    public function editData($selected_data, $kode)
    {
        //ekstraksi data terseleksi dari format JSON
        $this->selected_data = json_decode($selected_data, true);
        $this->kode = $kode;

        //kirim pesan melalui event browser bahwa data siap diedit untuk kemudian ditampilkan modal form
        $this->dispatchBrowserEvent('edit-ready');
    }

    public function resetForm()
    {
        //reset data untuk kosongkan form
        $this->selected_data = null;
        $this->status_seleksi = "Belum Dikonfirmasi";
    }
}
