<?php

namespace App\Http\Livewire\Admin;

use App\Models\W_link;
use App\Models\W_links;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Widget;
use Livewire\WithPagination;
use Storage;

class WidgetForm extends Component
{
    use WithPagination;
    use WithFileUploads;
    //deklarasi properti
    public $perPage = 5;
    public $sortField = 'id';
    public $sortAsc = false;

    public $id_widget;
    public $id_subjudul;
    public $judul;
    public $linkbaru = '';
    public $subjudulbaru = '';
    public $subjudul = '';
    public $konten;
    public $link;
    public $posisi = "Bawah";
    public $gambar;
    public $file;
    public $pesan = '';
    public $subs;
    public $namalink;
    public $linksbaru;


    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];
    public function rset()
    {
        $this->linkbaru = '';
        $this->subjudulbaru = '';
    }

    public function tambahLink()
    {
        $nolink = $this->linkbaru;
        if (!$nolink) {
            $this->pesan = "Kolom link belum diisi";
            // $this->dispatchBrowserEvent('show-message', ['msg' => 'Data kosong, gagal disimpan']);
        } else {

            $v = Widget::where('id', '=', $this->id_widget)->first();
            if ($v) {
                $r = new W_link();
                $r->widget_id = $this->id_widget;
                $r->subjudul = $this->subjudulbaru;
                $r->link = $this->linkbaru;
                $r->save();
                $this->pesan = "Link berhasil ditambahkan";
            } else {
                $this->pesan = "Kolom link belum diisi";
            }
        }
        // rset();
        $this->linkbaru = '';
        $this->subjudulbaru = '';
        $this->emitUp('refreshTable');
    }
    public function tambahLinks()
    {
        $nolink = $this->linksbaru;
        if (!$nolink) {
            $this->pesan = "Kolom link belum diisi";
            // $this->dispatchBrowserEvent('show-message', ['msg' => 'Data kosong, gagal disimpan']);
        } else {
            $v = W_link::where('widget_id', '=', $this->id_widget)->first();
            if ($v) {
                $r = new W_links();
                $r->subjudul_id = $v->id;
                $r->namalink = $this->namalink;
                $r->link = $this->linksbaru;
                $r->save();
                // $this->pesan = "Link berhasil ditambahkan";
            } else {
                $this->pesan = "Kolom link belum diisi";
            }
        }
        // rset();
        $this->linksbaru = '';
        $this->namalink = '';
        $this->emitUp('refreshTable');
    }

    //render file blade
    public function render()
    {
        if ($this->subs == 0) {
            $wlink = W_link::where('widget_id', '=', $this->id_widget)
                ->orderBy('id', 'desc')
                ->get();
            // $wlinks =[];
        } else {
            // $wlink = W_link::where('widget_id', '=', $this->id_widget)
            // ->orderBy('id', 'desc')
            // ->get();
            $wlink = W_links::where('subjudul_id', '=', $this->id_subjudul)
                ->orderBy('id', 'desc')
                ->get();
        }
        return view('livewire.admin.widget-form', [
            'wlink' => $wlink,
            'pesan' => $this->pesan,
            'subs' => $this->subs,
            'link' => $this->link,
        ]);
    }

    public function hapus($id)
    {
        if ($this->subs == 0) {
            W_link::find($id)->delete();
            $this->emitUp('refreshTable');
        } else {
            W_links::find($id)->delete();
            // $this->emitUp('refreshTable');
        }
    }

    public function save()
    {
        if ($this->subs == 0) {
            //validasi data sebelum disimpan
            $validated = $this->validate([
                'judul' => 'required',
                'posisi' => 'required',
                // 'file' => 'image|max:2048',
            ]);
            $namafile = time() . '_' . $this->file->getClientOriginalName();
            $this->file->storeAs('widget', $namafile);

            if ($this->id_widget) {
                //update jika id tidak null       
                $widget = Widget::find($this->id_widget);
                Storage::delete('widget/' . $widget->gambar); //upload gambar            

                $widget->judul = $this->judul;
                $widget->konten = $this->konten;
                // $widget->link = $this->link;
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
                // $widget->link = $this->link;
                $widget->urut = $max + 1;
                $widget->gambar = $namafile;
                $widget->save();

                //kirim pesan keberhasilan melalui event browser
                $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil ditambahkan']);
            }            
        } else{
            //validasi data sebelum disimpan
            $validated = $this->validate([
                'subjudul' => 'required',
            ]);
            if ($this->id_subjudul) {
                //update jika id tidak null       
                $wlink = W_link::find($this->id_subjudul);
                $wlink->subjudul = $this->subjudul;
                $wlink->link = $this->link;
                $wlink->update();

                //kirim pesan keberhasilan melalui event browser
                $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil diperbarui']);
            }
        }
        $this->resetForm(); //kosongkan form (cek method resetForm())//kosongkan form (cek method resetForm())
            $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }

    public function editData($id, $subs)
    {
        //ambil data dari database untuk diedit
        if ($subs == 0) {
            $widget = Widget::find($id);
            $this->id_widget = $id;
            $this->judul = $widget->judul;
            $this->konten = $widget->konten;
            $this->link = $widget->link;
            $this->posisi = $widget->posisi;
            $this->gambar = $widget->gambar;
        } else {
            $wlink = W_link::find($id);
            $this->id_widget = $wlink->widget_id;
            $this->subjudul = $wlink->subjudul;
            $this->id_subjudul = $wlink->id;
            $this->link = $wlink->link;
            $this->subs = $subs;
        }
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
        $this->subs = null;
    }
}
