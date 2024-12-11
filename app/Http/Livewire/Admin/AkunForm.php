<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AkunForm extends Component
{
    //deklarasi properti

    public $id_user;
    public $name;
    public $email;
    public $password;
    public $selected_data;

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];

    //render file blade
    public function render()
    {
        return view('livewire.admin.akun-form');
    }
    public function save()
    {
        //validasi data sebelum disimpan
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            // 'confirm_password' => 'same:password',
        ]);

        //update data
        $user = User::find($this->id_user);
        $user->name = $this->name;
        $user->email = $this->email;
        if ($this->password) $user->password = Hash::make($this->password);
        else $user->password = Hash::make(123456);
        $user->update();

        //kirim pesan keberhasilan melalui event browser
        $this->dispatchBrowserEvent('show-message', ['msg' => 'Data telah disimpan']);

        //reset data
        $this->password = null;
        $this->confirm_password = null;
    }
    public function editData($selected_data)
    {
        //ekstraksi data terseleksi dari format JSON
        $this->selected_data = json_decode($selected_data, true);

        $user = User::find($selected_data);
        $this->id_user = $selected_data;
        $this->name = $user->name;
        $this->email = $user->email;
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
