<?php

namespace App\Http\Livewire\Admin;

use App\Models\Kec;
use App\Models\Kel;
use App\Models\Periode;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Pokmas;
use App\Models\Rt;


class PokmasTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    //deklarasi properti
    public $search = '';
    public $perPage = 10;
    public $sortField = 'id';
    public $sortAsc = false;
    public $pilih_kec = 0;
    public $pilih_kel = 0;
    public $tahun;

    public $id_delete = null;

    public $id_edit = null;
    public $data_edit = null;
    public $field_edit = null;
    public function rset_kec()
    {
        $this->pilih_kel = 0;
    }

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['refreshTable' => '$refresh'];

    public function __construct()
    {
        $tahun = $this->tahun;
        $tahun = Periode::where('aktif', '=', 'Y')->get();
        foreach ($tahun as $th) {
            $this->tahun = $th->id;
        }
    }
    //render file blade
    public function render()
    {
        $search = $this->search;
        $pilih_kec = $this->pilih_kec;
        $kec = Kec::all();
        $kel = Kel::select('id', 'kec_id', 'singkatan')
            ->where([
                ['kec_id', '=', $pilih_kec],
            ])->get();
        $pilih_kel = $this->pilih_kel;
        //query dengan pengaturan sorting dan search data
        if ($pilih_kec == 0) {
            $pokmas = Pokmas::where('kel_id', '!=', 0)->orderBy('id', 'desc');
        } else if ($pilih_kec == 1) {
            if ($pilih_kel == 0) {
                $pokmas = Pokmas::whereIn('kel_id', [1, 2, 3, 4, 5, 6])->orderBy('id', 'desc');
            } else {
                $pokmas = Pokmas::where('kel_id', '=', $pilih_kel)->orderBy('id', 'desc');
            }
        } else if ($pilih_kec == 2) {
            if ($pilih_kel == 0) {
                $pokmas = Pokmas::whereIn('kel_id', [7, 8, 9, 10, 11, 12])->orderBy('id', 'desc');
            } else {
                $pokmas = Pokmas::where('kel_id', '=', $pilih_kel)->orderBy('id', 'desc');
            }
        } else if ($pilih_kec == 3) {
            if ($pilih_kel == 0) {
                $pokmas = Pokmas::whereIn('kel_id', [13, 14, 15, 16, 17])->orderBy('id', 'desc');
            } else {
                $pokmas = Pokmas::where('kel_id', '=', $pilih_kel)->orderBy('id', 'desc');
            }
        }
        if (!empty($search)) $pokmas = $pokmas->where(function ($q) use ($search) {
            $q->where('pokmas', 'LIKE', '%' . $search . '%')
                ->orWhere('tanggal_buka', 'LIKE', '%' . $search . '%')
                ->orWhere('tanggal_tutup', 'LIKE', '%' . $search . '%');
        });

        return view('livewire.admin.pokmas-table', [
            'pokmas' => $pokmas->paginate($this->perPage),
            'kec' => $kec,
            'kel' => $kel,
            'tahun' => $this->tahun,
            'pilih_kec' => $pilih_kec,
            'pilih_kel' => $pilih_kel
        ]);
    }

    public function delete()
    {
        //hapus data dan kirim pesan keberhasilan melalui event browser
        Pokmas::find($this->id_delete)->delete();
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
        $pokmas = Pokmas::find($id);
        $this->id_edit = $id;
        $this->data_edit = $pokmas->$field;
        $this->field_edit = $field;

        //akses listener untuk menampilkan input edit pada data sesuai id dan field data yang diklik
        $this->dispatchBrowserEvent('show-edit', ['id' => $id, 'field' => $field]);
    }

    //simpan data yang diedit
    public function saveEdit()
    {
        $field = $this->field_edit;
        $pokmas = Pokmas::find($this->id_edit);
        $pokmas->$field = $this->data_edit;
        $pokmas->update();
    }

    //update data yang statusnya aktif
    public function setActive($id, $aktif)
    {
        // $pokmas = Pokmas::find($id);
        // Pokmas::where('kel_id', '=', $pokmas->kel_id)->update(['aktif' => 'N']); //nonaktifkan semua dulu
        $pokmas = Pokmas::find($id);
        $pokmas->aktif = $aktif; //baru atur yang aktif
        $pokmas->update();
    }
}
