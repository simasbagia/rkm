<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Warga;
use App\Models\Periode;

use App\Exports\ExportPdRt; //download excel
use App\Models\Kel;
use App\Models\Kec;
use App\Models\Rt;
use App\Models\Rw;
use App\Models\User;
use Excel;


class AkunTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    //deklarasi properti
    public $search = '';
    public $caricalon;
    public $jalur = '';
    public $pilih_periode = '';
    public $pilih_usr = '';
    public $pilih_kel = '';
    public $pilih_rw = '';
    public $pilih_rt = '';
    public $perPage = 15;
    public $sortField = 'id';
    public $sortAsc = false;
    public $id_delete = null;

    public $id_edit = null;
    public $data_edit = null;
    public $field_edit = null;

    public $selectedData = [];
    public $selectAll = false;
    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['refreshTable' => '$refresh'];
    public function rset_usr()
    {
        $this->pilih_usr = '';
    }
    //render file blade
    public function render()
    {
        $search = $this->search;
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
                if (strlen($caricalon) <= 7) {
                    $caricalon = '---';
                }
            }
        }


        $pilih_usr = $this->pilih_usr;
        if (!$pilih_usr) {
            $user = User::where('level', '!=',  'SuperAdmin')
                ->where('level', '!=', 'Pendamping_RT')
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        } else {
            $user = User::where('level', '=', $pilih_usr)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        }
        if (!empty($search)) $user = $user->where(function ($q) use ($search) {
            $q->where('name', 'LIKE', '%' . $search . '%');
        });

        return view('livewire.admin.akun-table', [
            'user' => $user->paginate($this->perPage),
            // 'level' => $level,
            'pilih_usr' => $pilih_usr,
        ]);
    }
    public function save()
    {

        //validasi data sebelum disimpan
        $validated = $this->validate([
            'rw' => 'required',
        ]);

        if ($this->id) {
            //update jika id tidak null 
            $user = Rt::find($this->id);
            $user->kk = $this->kk;
            $user->deskripsi = $this->deskripsi;
            $user->update();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil diperbarui']);
        } else {
            //create jika id null
            $user = new Rt();
            $user->kk = $this->kk;
            $user->deskripsi = $this->deskripsi;
            $user->save();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil ditambahkan']);
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }

    public function delete()
    {
        //hapus data dan kirim pesan keberhasilan melalui event browser
        Rt::find($this->id_delete)->delete();
        $this->id_delete = null;
        $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil dihapus']);
    }

    public function sortBy($field)
    {
        //mengatur kolom data yang diurutkan beserta metode pengurutanya sesuai judul kolom tabel diklik
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    //buka dialog konfirmasi sebelum hapus data
    public function openConfirm($id)
    {
        $this->id_delete = $id;
    }

    //tutup dialog konfirmasi ketika klik batal
    public function closeConfirm()
    {
        $this->id_delete = null;
    }

    //menentukan field yang akan diedit ketika data diklik
    public function setEdit($id, $field)
    {
        $user = User::find($id);
        $this->id_edit = $id;
        $this->data_edit = $user->$field;
        $this->field_edit = $field;

        //akses listener untuk menampilkan input edit pada data sesuai id dan field data yang diklik
        $this->dispatchBrowserEvent('show-edit', ['id' => $id, 'field' => $field]);
    }

    //simpan data yang diedit
    public function saveEdit()
    {
        $field = $this->field_edit;
        $informasi = User::find($this->id_edit);
        $informasi->$field = $this->data_edit;
        $informasi->update();
    }

    //simpan data yang diedit ketika selectbox dipilih
    public function updatedDataEdit()
    {
        $field = $this->field_edit;
        $user = User::find($this->id_edit);
        $user->$field = $this->data_edit;
        $user->update();
    }

    //update property select-all ketika checkbox select all diklik
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedData = Rt::where([
                ['kel_id', '=', $this->pilih_kel],
                ['kec_id', '=', $this->pilih_usr],
                ['rw_id', '=', $this->pilih_rw]
            ])
                ->pluck('id');
        } else {
            $this->selectedData = [];
        }
    }

    //download excel
    public function downloadExcel()
    {
        $user = new ExportPdRt();
        return Excel::download($user, 'PendampingRT.xlsx');
    }
    //update status aktif tampile beranda
    public function setActive($id, $aktif)
    {
        $user = User::find($id);
        $user->aktif = $aktif;
        $user->update();
    }
}
