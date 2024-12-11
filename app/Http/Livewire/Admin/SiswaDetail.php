<?php

namespace App\Http\Livewire\Admin;

use App\Models\Siswa;
use Livewire\Component;

class SiswaDetail extends Component
{
    //deklarasi properti
    public $siswa;

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['showData'];

    public function render()
    {
        return view('livewire.admin.siswa-detail');
    }
    //menyiapkan data siswa untuk ditampilkan pada modal detail ketika tombol tampil detail diklik
    public function showData($id)
    {
        $this->siswa = Siswa::find($id);

        $this->dispatchBrowserEvent('detail-ready');
    }
}
