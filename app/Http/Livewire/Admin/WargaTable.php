<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

use App\Exports\ExportWarga; //download excel
use App\Models\B_kegiatan;
use App\Models\J_kegiatan;
use App\Models\Keluarga;
use App\Models\Kk;
use App\Models\Kkm;
use App\Models\P_kegiatan;
use App\Models\Periode;
use App\Models\Potensi;
use App\Models\Rkm;
use App\Models\Rw;
use App\Models\Rt;
use App\Models\Sumbangan;
use App\Models\Umkm;
use App\Models\Usulan;
use Excel;
use Auth;

class WargaTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    //deklarasi properti
    public $search;
    public $caricalon;
    public $cari;
    public $cek;
    public $kec_rt;
    public $pilih_periode = '';
    public $pilih_kec = 0;
    public $pilih_kel = 0;
    public $pilih_rw = 0;
    public $pilih_rt = 0;
    public $pilih_kk = 0;
    public $perPage = 10;
    public $sortField = 'id';
    public $sortAsc = false;
    public $id_delete = null;

    public $id_edit = null;
    public $data_edit = null;
    public $field_edit = null;

    public $selectedData = [];
    public $selectAll = false;
    public $b_keg;
    public $tahun;
    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['refreshTable' => '$refresh'];
    public function __construct()
    {
        $tahun = $this->tahun;
        $this->user = Auth::user()->id;
        $tahun = Periode::where('aktif', '=', 'Y')->get();
        foreach ($tahun as $th) {
            $this->tahun = $th->id;
        }
    }
    public function tambahKk()
    {
        $nokk = $this->caricalon;
        if (!$nokk) {
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data kosong, gagal disimpan']);
        } else {
            $v = Kk::where('kk', '=', $nokk)->first();
            if (!$v) {
                $r = new Kk();
                $r->kk = $nokk;
                $r->kec_id = $this->pilih_kec;
                $r->kel_id = $this->pilih_kel;
                $r->rw_id = $this->pilih_rw;
                $r->rt_id = $this->pilih_rt;
                $r->aktif = "Y";
                $r->save();
                $r = Kk::where('kk', '=', $nokk)->first();
                $this->caricalon = '';
                // $emitTo('admin.warga-form', 'editData', $r->id)
                // dd($r->id);
                // $this->dispatchBrowserEvent('edit-ready', 'editData', $r->id);
                $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil disimpan']);
            } else {
                $this->dispatchBrowserEvent('show-message', ['msg' => 'Data sudah ada, gagal disimpan']);
            }
        }
    }
    public function tambahUmkm()
    {
        $nokk = $this->caricalon;
        if (!$nokk) {
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data kosong, gagal disimpan']);
        } else {
            $w = Umkm::where('nama', '=', $nokk)->first();
            if (!$w) {
                $r = new Umkm();
                $r->nama = $nokk;
                $r->kec_id = $this->pilih_kec;
                $r->kel_id = $this->pilih_kel;
                $r->rw_id = $this->pilih_rw;
                $r->rt_id = $this->pilih_rt;
                $r->aktif = "Y";
                $r->save();
                // $r = Kk::where('kk', '=', $nokk)->first();
                $this->caricalon = '';
                // $emitTo('admin.warga-form', 'editData', $r->id)
                // dd($r->id);
                // $this->dispatchBrowserEvent('edit-ready', 'editData', $r->id);
                $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil disimpan']);
            } else {
                $this->dispatchBrowserEvent('show-message', ['msg' => 'Data sudah ada, gagal disimpan']);
            }
        }
    }
    public function tambahKkm()
    {
        $nokk = $this->caricalon;
        if (!$nokk) {
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data kosong, gagal disimpan']);
        } else {
            $x = Kkm::where('nama', '=', $nokk)->first();
            if (!$x) {
                $s = new Kkm();
                $s->nama = $nokk;
                $s->kec_id = $this->pilih_kec;
                $s->kel_id = $this->pilih_kel;
                $s->rw_id = $this->pilih_rw;
                $s->rt_id = $this->pilih_rt;
                $s->aktif = "Y";
                $s->save();
                $this->caricalon = '';
                $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil disimpan']);
            } else {
                $this->dispatchBrowserEvent('show-message', ['msg' => 'Data sudah ada, gagal disimpan']);
            }
        }
    }
    public function tambahPotensi()
    {
        $nokk = $this->caricalon;
        if (!$nokk) {
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data kosong, gagal disimpan']);
        } else {
            $y = Potensi::where([
                ['nama', '=', $nokk],
                ['rt_id', '=', $this->pilih_rt],
                // ['tahun_id', '=', $this->tahun],
            ])->first();
            if (!$y) {
                $s = new Potensi();
                $s->nama = $nokk;
                $s->kec_id = $this->pilih_kec;
                $s->kel_id = $this->pilih_kel;
                $s->rw_id = $this->pilih_rw;
                $s->rt_id = $this->pilih_rt;
                $s->save();
                $this->caricalon = '';
                $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil disimpan']);
            } else {
                $this->dispatchBrowserEvent('show-message', ['msg' => 'Data sudah ada, gagal disimpan']);
            }
        }
    }
    public function tambahSumbangan()
    {
        $nokk = $this->caricalon;
        if (!$nokk) {
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data kosong, gagal disimpan']);
        } else {
            $y = Sumbangan::where([
                ['sumbangan', '=', $nokk],
                ['rt_id', '=', $this->pilih_rt],
                // ['tahun_id', '=', $this->tahun],
            ])->first();
            if (!$y) {
                $s = new Sumbangan();
                $s->sumbangan = $nokk;
                $s->kec_id = $this->pilih_kec;
                $s->kel_id = $this->pilih_kel;
                $s->rw_id = $this->pilih_rw;
                $s->rt_id = $this->pilih_rt;
                $s->save();
                $this->caricalon = '';
                $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil disimpan']);
            } else {
                $this->dispatchBrowserEvent('show-message', ['msg' => 'Data sudah ada, gagal disimpan']);
            }
        }
    }
    public function pilih_b_keg($id)
    {
        $r = B_kegiatan::where('id', '=', $id)->first();
        $y = Rkm::where([
            ['b_id', '=', $id],
            ['rt_id', '=', $this->pilih_rt],
            ['tahun_id', '=', $this->tahun],
        ])->first();
        if (!$y) {
            $s = new Rkm();
            $s->p_id = $r->j_kegiatan->p_kegiatan->id;
            $s->j_id = $r->j_kegiatan->id;
            $s->b_id = $id;
            $s->rt_id = $this->pilih_rt;
            $s->rw_id = $this->pilih_rw;
            $s->kel_id = $this->pilih_kel;
            $s->kec_id = $this->pilih_kec;
            $s->tahun_id = $this->tahun;
            $s->save();
            $this->caricalon = '';
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil disimpan']);
        } else {
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data sudah ada, gagal disimpan']);
        }
    }
    public function rset()
    {
        $this->caricalon = '';
        $this->search = '';
    }
    public function rset_kec()
    {
        $this->pilih_kel = 0;
        $this->pilih_rw = 0;
        $this->pilih_rt = 0;
    }
    public function rset_rw()
    {
        $this->pilih_rw = 0;
        $this->pilih_rt = 0;
    }
    public function rset_rt()
    {
        $this->pilih_rt = 0;
        $this->pilih_kk = 0;
        $this->search = '';
    }
    public function rset_kk()
    {
        $this->pilih_kk = 0;
        $this->search = '';
    }
    public function rset_search()
    {
        $this->search = '';
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
                if (strlen($caricalon) <= 7) {
                    $caricalon = '---';
                }
            }
        }
        $search = $this->search;
        $pilih_kec = $this->pilih_kec;
        $kec = Rt::select('kec_id')
            ->where([
                ['pendamping_id', '=', $this->user],
            ])->groupBy('kec_id')->get();
        $pilih_kel = $this->pilih_kel;
        $kel = Rt::select('kel_id')
            ->where([
                ['pendamping_id', '=', $this->user],
                ['kec_id', '=', $pilih_kec]
            ])
            ->groupBy('kel_id')
            ->get();

        if (!$pilih_kec) {
            $rw = Rt::select('rw_id')
                ->where('pendamping_id', '=', $this->user)
                ->groupBy('rw_id')
                ->orderBy('id', 'asc')
                ->get();
        } else {
            if (!$pilih_kel) {
                $rw = Rt::select('rw_id')
                    ->where([
                        ['pendamping_id', '=', $this->user],
                        ['kec_id', '=', $pilih_kec]
                    ])
                    ->groupBy('rw_id')->get();
            } else {
                $rw = Rt::select('rw_id')
                    ->where([
                        ['pendamping_id', '=', $this->user],
                        ['kec_id', '=', $pilih_kec],
                        ['kel_id', '=', $pilih_kel]
                    ])
                    ->groupBy('rw_id')->get();
            }
        }
        $pilih_rw = $this->pilih_rw;
        $rt = Rt::where([
            ['pendamping_id', '=', $this->user],
            ['rw_id', '=', $pilih_rw],
        ])->orderBy('id', 'asc')
            ->get();
        $pilih_rt = $this->pilih_rt;
        if (!$pilih_rt) {
            $kk = Kk::where('id', '=', null);
            // ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        } else {
            $kk = Kk::where('rt_id', '=', $pilih_rt);
            // ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        }
        // $cr = Keluarga::where('nama', 'LIKE', '%' . $search . '%')->get();
        // foreach ($cr as $c) $this->cari = $c->kk_id;
        $cek = $this->cek;
        if (!empty($search)) {
            if (strlen($search) <= 2) {
                $search = 99999999;
            } else {
                // huruf
                if (intval($search) == 0) {

                    if (strlen($search) <= 3) {
                        $search = '----';
                    } else {
                        $cek = 'nama';
                        $kk = '';
                        $kk = Keluarga::where([
                            ['rt_id', '=', $pilih_rt],
                            ['nama', 'LIKE', '%' . $search . '%']
                        ]);
                    }
                } else {
                    if (strlen($search) <= 3) {
                        $search = '---';
                    } else {
                        $cek = 'nokk';
                        $kk = '';
                        $kk = Kk::where([
                            ['rt_id', '=', $pilih_rt],
                            ['kk', 'LIKE', '%' . $search . '%']
                        ]);
                    }
                }
            }
        }
        $b_keg = $this->b_keg;


        if ($this->pilih_kk <= 1) {
            return view('livewire.admin.warga-table', [
                'warga' => $kk->paginate($this->perPage),
                'kec' => $kec,
                'pilih_kec' => $pilih_kec,
                'kel' => $kel,
                'pilih_kel' => $pilih_kel,
                'rw' => $rw,
                'pilih_rw' => $pilih_rw,
                'pilih_rt' => $pilih_rt,
                'pilih_kk' => $this->pilih_kk,
                'rt' => $rt,
                'tipe' => $cek,
                'kec_rt' => [$pilih_kec, $pilih_kel, $pilih_rw]
            ]);
        } elseif ($this->pilih_kk == 2) {
            $umkm = Umkm::where([
                ['rt_id', '=', $pilih_rt]
            ]);
            return view('livewire.admin.warga-table', [
                'warga' => $umkm->paginate($this->perPage),
                'kec' => $kec,
                'pilih_kec' => $pilih_kec,
                'kel' => $kel,
                'pilih_kel' => $pilih_kel,
                'rw' => $rw,
                'pilih_rw' => $pilih_rw,
                'pilih_rt' => $pilih_rt,
                'pilih_kk' => $this->pilih_kk,
                'rt' => $rt,
                'tipe' => $cek,
            ]);
        } elseif ($this->pilih_kk == 3) {
            $kkm = Kkm::where([
                ['rt_id', '=', $pilih_rt]
            ]);
            return view('livewire.admin.warga-table', [
                'warga' => $kkm->paginate($this->perPage),
                'kec' => $kec,
                'pilih_kec' => $pilih_kec,
                'kel' => $kel,
                'pilih_kel' => $pilih_kel,
                'rw' => $rw,
                'pilih_rw' => $pilih_rw,
                'pilih_rt' => $pilih_rt,
                'pilih_kk' => $this->pilih_kk,
                'rt' => $rt,
                'tipe' => $cek,
            ]);
        } elseif ($this->pilih_kk == 4) {
            $pot = Potensi::where([
                ['rt_id', '=', $pilih_rt]
            ]);
            return view('livewire.admin.warga-table', [
                'warga' => $pot->paginate($this->perPage),
                'kec' => $kec,
                'pilih_kec' => $pilih_kec,
                'kel' => $kel,
                'pilih_kel' => $pilih_kel,
                'rw' => $rw,
                'pilih_rw' => $pilih_rw,
                'pilih_rt' => $pilih_rt,
                'pilih_kk' => $this->pilih_kk,
                'rt' => $rt,
                'tipe' => $cek,
            ]);
        } elseif ($this->pilih_kk == 5) {
            $caricalon = $this->caricalon;
            // $this->b_keg = B_kegiatan::where('nama', '=', null);
            if (strlen($caricalon) <= 2) {
                $this->b_keg = B_kegiatan::where('nama', 'LIKE', '%' . -9 . '%')->get();
            } else {
                if ($caricalon == 'all') {
                    $this->b_keg = B_kegiatan::all();
                } elseif ($caricalon == 'al1') {
                    $this->b_keg = B_kegiatan::where('p_id', '=', 1)->get();
                } elseif ($caricalon == 'al2') {
                    $this->b_keg = B_kegiatan::where('p_id', '=', 2)->get();
                } elseif (intval($caricalon) == 0) {
                    if (strlen($caricalon) <= 3) {
                        $caricalon = '---';
                    }
                    $this->b_keg = B_kegiatan::where('nama', 'LIKE', '%' . $caricalon . '%')->get();
                }
            }
            // $jkeg = Rkm::select('j_id')->where([
            //     ['rt_id', '=', $pilih_rt],
            //     ['tahun_id', '=', $this->tahun],
            // ])->groupBy('j_id')->get();


            $usulan = Usulan::whereIn('rkm_id', function ($query) {
                $query->select('id')->from('rkm')->where([
                    ['rt_id', '=', $this->pilih_rt],
                    ['tahun_id', '=', $this->tahun],
                ])->groupBy('id');
            })->get();
            $pkeg = P_kegiatan::whereIn('id', function ($query) {
                $query->select('p_id')->from('rkm')->where([
                    ['rt_id', '=', $this->pilih_rt],
                    ['tahun_id', '=', $this->tahun],
                ])->groupBy('p_id');
            })->get();
            $jkeg = J_kegiatan::whereIn('id', function ($query) {
                $query->select('j_id')->from('rkm')->where([
                    ['rt_id', '=', $this->pilih_rt],
                    ['tahun_id', '=', $this->tahun],
                ])->groupBy('j_id');
            })->get();
            $bkeg = B_kegiatan::whereIn('id', function ($query) {
                $query->select('b_id')->from('rkm')->where([
                    ['rt_id', '=', $this->pilih_rt],
                    ['tahun_id', '=', $this->tahun],
                ])->groupBy('b_id');
            })->get();
            $rkm = Rkm::where([
                ['rt_id', '=', $pilih_rt],
                ['tahun_id', '=', $this->tahun],
            ]);
            return view('livewire.admin.warga-table', [
                'warga' => $rkm->paginate($this->perPage),
                'kec' => $kec,
                'pilih_kec' => $pilih_kec,
                'kel' => $kel,
                'pilih_kel' => $pilih_kel,
                'rw' => $rw,
                'pilih_rw' => $pilih_rw,
                'pilih_rt' => $pilih_rt,
                'pilih_kk' => $this->pilih_kk,
                'rt' => $rt,
                'tipe' => $cek,
                'b_keg' => $b_keg,
                'pkeg' => $pkeg,
                'jkeg' => $jkeg,
                'bkeg' => $bkeg,
                'usulan' => $usulan,
                'caricalon' => $caricalon,
            ]);
        } elseif ($this->pilih_kk == 6) {
            $sumb = Sumbangan::where([
                ['rt_id', '=', $pilih_rt]
            ]);
            return view('livewire.admin.warga-table', [
                'warga' => $sumb->paginate($this->perPage),
                'kec' => $kec,
                'pilih_kec' => $pilih_kec,
                'kel' => $kel,
                'pilih_kel' => $pilih_kel,
                'rw' => $rw,
                'pilih_rw' => $pilih_rw,
                'pilih_rt' => $pilih_rt,
                'pilih_kk' => $this->pilih_kk,
                'rt' => $rt,
                'tipe' => $cek,
            ]);
        }
    }
    public function save()
    {

        //validasi data sebelum disimpan
        $validated = $this->validate([
            'rw' => 'required',
        ]);

        if ($this->id) {
            //update jika id tidak null 
            $warga = kk::find($this->id);
            $warga->kk = $this->kk;
            $warga->deskripsi = $this->deskripsi;
            $warga->update();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil diperbarui']);
        } else {
            //create jika id null
            $warga = new Kk();
            $warga->kk = $this->kk;
            $warga->deskripsi = $this->deskripsi;
            $warga->save();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil ditambahkan']);
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }

    public function delete()
    {
        //hapus data dan kirim pesan keberhasilan melalui event browser
        if ($this->pilih_kk <= 1) {
            $cek = Keluarga::where('kk_id', '=', $this->id_delete)->first();
            // dd($cek);
            if (!$cek) {
                Kk::find($this->id_delete)->delete();
                $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil dihapus']);
            } else {
                $this->dispatchBrowserEvent('show-message', ['msg' => 'Data gagal dihapus']);
            }
        } else if ($this->pilih_kk == 2) Umkm::find($this->id_delete)->delete();
        else if ($this->pilih_kk == 3) Kkm::find($this->id_delete)->delete();
        else if ($this->pilih_kk == 4) Potensi::find($this->id_delete)->delete();
        else if ($this->pilih_kk == 5) {
            $cek = Usulan::where('rkm_id', '=', $this->id_delete)->first();
            // dd($cek);
            if (!$cek) {
                Rkm::find($this->id_delete)->delete();
                $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil dihapus']);
            } else {
                $this->dispatchBrowserEvent('show-message', ['msg' => 'Data gagal dihapus']);
            }
        }
        else if ($this->pilih_kk == 6) Sumbangan::find($this->id_delete)->delete();
        $this->id_delete = null;
        $this->emitUp('refreshTable');
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
        $this->id_edit = 0;
        $this->data_edit = '';
        $this->field_edit = '';
        if ($this->pilih_rw == 0) {
            $rw = Rw::find($id);
            $this->id_edit = $id;
            $this->data_edit = $rw->$field;
            $this->field_edit = $field;
        } else {
            if ($this->pilih_rt == 0) {
                $rt = Rt::find($id);
                $this->id_edit = $id;
                $this->data_edit = $rt->$field;
                $this->field_edit = $field;
            } else {
                $kk = Kk::find($id);
                $this->id_edit = $id;
                $this->data_edit = $kk->$field;
                $this->field_edit = $field;
            }
        }
        //akses listener untuk menampilkan input edit pada data sesuai id dan field data yang diklik
        $this->dispatchBrowserEvent('show-edit', ['id' => $id, 'field' => $field]);
    }

    //simpan data yang diedit 
    public function saveEdit()
    {
        $field = $this->field_edit;
        if (!$this->pilih_rw) {
            $rw = Rw::find($this->id_edit);
            $rw->$field = $this->data_edit;
            $rw->update();
        } else {
            if (!$this->pilih_rt) {
                $rt = Rt::find($this->id_edit);
                $rt->$field = $this->data_edit;
                $rt->update();
            } else {
                $kk = Kk::find($this->id_edit);
                $kk->$field = $this->data_edit;
                $kk->update();
            }
        }
    }

    //update property select-all ketika checkbox select all diklik
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedData = Kk::pluck('id');
        } else {
            $this->selectedData = [];
        }
    }

    //download excel
    public function downloadExcel()
    {
        $pendaftar = new ExportKk();
        return Excel::download($pendaftar, 'Data Warga.xlsx');
    }
}
