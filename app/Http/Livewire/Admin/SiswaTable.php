<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Siswa;
use App\Models\Periode;

use App\Exports\ExportSiswa; //download excel
use App\Models\Jenjang;
use App\Models\Kelas;
use App\Models\Pendaftar;
use App\Models\Unit;
use Excel;

class SiswaTable extends Component
{
    use WithPagination;

    //deklarasi properti
    public $search = '';
    public $caricalon;
    public $pilih_periode = '';
    public $pilih_unit = '';
    public $pilih_jenjang = '';
    public $pilih_kelas = '';
    public $perPage = 10;
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
    public function tambah(
        $id,
        $prd,
        $unt,
        $jjg,
        $kls,
    ) {
        $cek = Siswa::where('pendaftar_id', '=', $id)->first();

        if (!$cek) {
            $siswa = new Siswa();
            $siswa->pendaftar_id = $id;
            $siswa->periode_id = $prd;
            $siswa->kode_unit_id = $unt;
            $siswa->jenjang_id = $jjg;
            $siswa->kelas_id = $kls;
            $siswa->save();
            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil ditambahkan']);
        } else {
            //kirim pesan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Proses gagal']);
        }
        // var_dump($cek);
    }
    public function rset()
    {
        $this->caricalon = '';
    }
    public function rset_prd()
    {
        $this->pilih_unit = '';
        $this->pilih_jenjang = '';
        $this->pilih_kelas = '';
    }
    public function rset_unit()
    {
        $this->pilih_jenjang = '';
        $this->pilih_kelas = '';
    }
    public function rset_jjg()
    {
        $this->pilih_kelas = '';
    }
    public function skl($a)
    {
        $sklh = Unit::where('kode_unit', '=', $a)->get();
        foreach ($sklh as $skl) {
            return  $skl->sekolah_id;
        }
    }
    //render file blade
    public function render()
    {
        $search = $this->search;
        $caricalon = $this->caricalon;
        if (strlen($caricalon) <= 2) {
            $caricalon = '0';
        }
        $pendaftar = Pendaftar::where('nama', 'LIKE', '%' . $caricalon . '%')->get();

        $tapel = Periode::all();
        $pilih_periode = $this->pilih_periode;
        if (!$pilih_periode) {
            $siswa = Siswa::where('periode_id', '=', null)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        } else {
            $siswa = Siswa::where('periode_id', '=', $this->pilih_periode)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        }
        $unit = Unit::where('aktif', '=', 'Y')->get();
        $pilih_unit = $this->pilih_unit;
        if (!$pilih_unit) {
            $siswa = Siswa::where('sekolah', '=', null)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        } else {
            $siswa = Siswa::where('sekolah', '=', $pilih_unit)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        }
        $skl = $this->skl($pilih_unit);
        $jenjang = Jenjang::where('sekolah_id', '=', $skl)->get();
        $pilih_jenjang = $this->pilih_jenjang;
        if (!$pilih_jenjang) {
            $siswa = Siswa::where('jenjang_id', '=', null)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        } else {
            $siswa = Siswa::where('sekolah', '=', $pilih_unit)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        }
        $kelas = Kelas::where('jenjang_id', '=', $this->pilih_jenjang)->get();
        $pilih_kelas = $this->pilih_kelas;
        if (!$pilih_kelas) {
            $siswa = Siswa::where('kelas_id', '=', null)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        } else {
            $siswa = Siswa::where('kelas_id', '=', $pilih_kelas)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        }
        if (!empty($search)) $siswa = $siswa->where(function ($q) use ($search) {
            $q->where('nama', 'LIKE', '%' . $search . '%')
                ->where('nama_sekolah', 'LIKE', '%' . $search . '%')
                ->where('nisn', 'LIKE', '%' . $search . '%')
                ->where('alamat', 'LIKE', '%' . $search . '%')
                ->where('desa', 'LIKE', '%' . $search . '%')
                ->where('kecamatan', 'LIKE', '%' . $search . '%')
                ->where('kota', 'LIKE', '%' . $search . '%');
        });

        return view('livewire.admin.siswa-table', [
            'siswa' => $siswa->paginate($this->perPage),
            'tapel' => $tapel,
            'pilih_periode' => $pilih_periode,
            'unit' => $unit,
            'pilih_unit' => $pilih_unit,
            'jenjang' => $jenjang,
            'pilih_jenjang' => $pilih_jenjang,
            'kelas' => $kelas,
            'skl' => $skl,
            'pilih_kelas' => $pilih_kelas,
            'pendaftar' => $pendaftar,
        ]);
    }
    public function save()
    {

        //validasi data sebelum disimpan
        $validated = $this->validate([
            'nama_kelas' => 'required',
        ]);

        if ($this->id) {
            //update jika id tidak null 
            $siswa = siswa::find($this->id);
            $siswa->nama_siswa = $this->nama_siswa;
            $siswa->deskripsi = $this->deskripsi;
            $siswa->update();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil diperbarui']);
        } else {
            //create jika id null
            $siswa = new Siswa();
            $siswa->nama_siswa = $this->nama_siswa;
            $siswa->deskripsi = $this->deskripsi;
            $siswa->save();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil ditambahkan']);
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }

    public function delete()
    {
        //hapus data dan kirim pesan keberhasilan melalui event browser
        Siswa::find($this->id_delete)->delete();
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
        $pendaftar = Siswa::find($id);
        $this->id_edit = $id;
        $this->data_edit = $pendaftar->$field;
        $this->field_edit = $field;

        //akses listener untuk menampilkan input edit pada data sesuai id dan field data yang diklik
        $this->dispatchBrowserEvent('show-edit', ['id' => $id, 'field' => $field]);
    }

    //simpan data yang diedit ketika selectbox dipilih
    public function updatedDataEdit()
    {
        $field = $this->field_edit;
        $pendaftar = Siswa::find($this->id_edit);
        $pendaftar->$field = $this->data_edit;
        $pendaftar->update();
    }

    //update property select-all ketika checkbox select all diklik
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedData = Siswa::pluck('id');
        } else {
            $this->selectedData = [];
        }
    }

    //download excel
    public function downloadExcel()
    {
        $pendaftar = new ExportSiswa();
        return Excel::download($pendaftar, 'Data Siswa.xlsx');
    }
}
