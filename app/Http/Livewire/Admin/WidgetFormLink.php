<?php

namespace App\Http\Livewire\Admin;

use App\Models\W_link;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Widget;
use Livewire\WithPagination;
use Storage;

class WidgetFormLink extends Component
{
    use WithPagination;
    use WithFileUploads;
    //deklarasi properti
    public $perPage = 5;
    public $sortField = 'id';
    public $sortAsc = false;

    public $id_widget;
    public $judul;
    public $konten;
    public $link;
    public $w_link;
    public $posisi = "Bawah";
    public $gambar;
    public $file;


    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];
    //menyiapkan data warga untuk ditampilkan pada modal detail ketika tombol tampil detail diklik
    public function showData($id)
    {
        $this->id_widget = Widget::find($id);

        $this->dispatchBrowserEvent('detail-ready');
    }

    public function save()
    {
        //validasi data sebelum disimpan
        $validated = $this->validate([
            'judul' => 'required',
            'konten' => 'required',
            'posisi' => 'required',
            'file' => 'image|max:2048',

        ]);
        $namafile = time() . '_' . $this->file->getClientOriginalName();
        $this->file->storeAs('widget', $namafile);

        if ($this->id_widget) {
            //update jika id tidak null       
            $widget = Widget::find($this->id_widget);
            Storage::delete('widget/' . $widget->gambar); //upload gambar            

            $widget->judul = $this->judul;
            $widget->konten = $this->konten;
            $widget->link = $this->link;
            $widget->posisi = $this->posisi;
            $widget->gambar = $namafile;
            $widget->update();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil diperbarui']);
        } else {
            //create jika id null
            $max = Widget::max('urut');
            $widget = new Widget;
            $widget->judul = $this->judul;
            $widget->konten = $this->konten;
            $widget->posisi = $this->posisi;
            $widget->link = $this->link;
            $widget->urut = $max + 1;
            $widget->gambar = $namafile;
            $widget->save();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil ditambahkan']);
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())//kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }

    public function editData($id)
    {
        //ambil data dari database untuk diedit
        $widget = Widget::find($id);
        $this->id_widget = $id;
        $this->judul = $widget->judul;
        $this->konten = $widget->konten;
        $this->link = $widget->link;
        $this->posisi = $widget->posisi;
        $this->gambar = $widget->gambar;

        //kirim pesan melalui event browser bahwa data siap diedit untuk kemudian ditampilkan modal form
        $this->dispatchBrowserEvent('edit-ready');
    }

    public function resetForm()
    {
        //reset data untuk kosongkan form
        $this->id_widget = null;
        $this->judul = null;
        $this->konten = null;
        $this->posisi = 'Bawah';
        $this->gambar = null;
        $this->file = null;
    }
    //render file blade
    public function render()
    {
        $wlink = W_link::where('widget_id', '=', $this->id_widget);
        return view('livewire.admin.widget-form-link', [
            'wlink' => $wlink->paginate($this->perPage),
        ]);
    }
}
