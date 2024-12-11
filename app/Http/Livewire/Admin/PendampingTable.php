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
use Excel;


class PendampingTable extends Component
{
    use WithPagination;

    //deklarasi properti
    public $search = '';
    public $caricalon;
    public $pilih_periode = '';
    public $pilih_kec = '';
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

    public function tambahRt()
    {
        $nokk = $this->caricalon;
        $r = new Rt();
        $r->kk = $nokk;
        $r->kec_id = $this->pilih_kec;
        $r->kel_id = $this->pilih_kel;
        $r->rw_id = $this->pilih_rw;
        $r->rt_id = $this->pilih_rt;
        $r->aktif = "Y";
        $r->save();
        $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil disimpan']);
    }
    public function rset()
    {
        $this->caricalon = '';
    }
    public function rset_kec()
    {
        $this->pilih_kel = '';
        $this->pilih_rw = '';
        $this->pilih_rt = '';
    }
    public function rset_rw()
    {
        $this->pilih_rw = '';
        $this->pilih_rt = '';
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
        $kec = Kec::all();
        $pilih_kec = $this->pilih_kec;
        if (!$pilih_kec) {
            // $rt = Warga::where('kec_id', '=', null)
            //     ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        } else {
            // $rt = Warga::where('kec_id', '=', $pilih_kec)
            //     ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        }

        $kel = Kel::where('kec_id', '=', $this->pilih_kec)->get();
        $pilih_kel = $this->pilih_kel;
        if (!$pilih_kel) {
            // $rt = Warga::where('kel_id', '=', null)
            //     ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        } else {
            // $rt = Warga::where('kel_id', '=', $pilih_kel)
            //     ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        }

        $rw = Rw::where([
            ['kel_id', '=', $this->pilih_kel],
            ['kec_id', '=', $this->pilih_kec]
        ])->get();
        $pilih_rw = $this->pilih_rw;
        if (!$pilih_rw) {
            $rt = Rt::where('id', '=', null)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        } else {
            $rt = Rt::where([
                ['kel_id', '=', $this->pilih_kel],
                ['kec_id', '=', $this->pilih_kec],
                ['rw_id', '=', $this->pilih_rw]
            ])
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
            // $rt = Warga::where('id', '=', $pilih_rw)
            //     ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        }
        // $rt = Rt::where([
        //     
        // ])->get();
        // $pilih_rt = $this->pilih_rt;
        // if (!$pilih_rt) {
        //     $kk = Rt::where('id', '=', null)
        //         ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        // } else {
        //     $kk = Rt::where('rt_id', '=', $pilih_rt)
        //         ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        // }
        // $krw = Rw::where('id', '=', $pilih_rw)->get();
        // $krt = Rt::where('id', '=', $pilih_rt)->get();
        if (!empty($search)) $rt = $rt->where(function ($q) use ($search) {
            $q->where('rt', 'LIKE', '%' . $search . '%')
                // ->where('nama_sekolah', 'LIKE', '%' . $search . '%')
                // ->where('alamat', 'LIKE', '%' . $search . '%')
                // ->where('desa', 'LIKE', '%' . $search . '%')
                // ->where('kecamatan', 'LIKE', '%' . $search . '%')
                // ->where('kota', 'LIKE', '%' . $search . '%');
            ;
        });

        return view('livewire.admin.pendamping-table', [
            'rt' => $rt->paginate($this->perPage),
            // 'tapel' => $tapel,
            // 'pilih_periode' => $pilih_periode,
            'kec' => $kec,
            'pilih_kec' => $pilih_kec,
            'kel' => $kel,
            'pilih_kel' => $pilih_kel,
            'rw' => $rw,
            // 'krw' => $krw,
            // 'krt' => $krt,
            'pilih_rw' => $pilih_rw,
            // 'pilih_rt' => $pilih_rt,
            // 'rt' => $rt,
            // 'pendaftar' => $pendaftar->paginate(25),
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
            $rt = Rt::find($this->id);
            $rt->kk = $this->kk;
            $rt->deskripsi = $this->deskripsi;
            $rt->update();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil diperbarui']);
        } else {
            //create jika id null
            $rt = new Rt();
            $rt->kk = $this->kk;
            $rt->deskripsi = $this->deskripsi;
            $rt->save();

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
        $rt = Rt::find($id);
        $this->id_edit = $id;
        $this->data_edit = $rt->$field;
        $this->field_edit = $field;

        //akses listener untuk menampilkan input edit pada data sesuai id dan field data yang diklik
        $this->dispatchBrowserEvent('show-edit', ['id' => $id, 'field' => $field]);
    }

    //simpan data yang diedit ketika selectbox dipilih
    public function updatedDataEdit()
    {
        $field = $this->field_edit;
        $rt = Rt::find($this->id_edit);
        $rt->$field = $this->data_edit;
        $rt->update();
    }

    //update property select-all ketika checkbox select all diklik
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedData = Rt::where([
                ['kel_id', '=', $this->pilih_kel],
                ['kec_id', '=', $this->pilih_kec],
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
        $rt = new ExportPdRt();
        return Excel::download($rt, 'PendampingRT.xlsx');
    }
}
