<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;

use App\Exports\ExportWarga; //download excel
use App\Models\B_kegiatan;
use App\Models\Kel;
use App\Models\Keluarga;
use App\Models\Kk;
use App\Models\Kkm;
use App\Models\Periode;
use App\Models\Pokmas;
use App\Models\Potensi;
use App\Models\Realisasi;
use App\Models\Rkm;
use App\Models\Rw;
use App\Models\Rt;
use App\Models\Umkm;
use App\Models\Usulan;
use Excel;
use Auth;

class MonitoringTable extends Component
{
    use WithPagination;

    //deklarasi properti
    public $search;
    public $caricalon;
    public $cari;
    public $cek;
    public $kec_rt;
    public $pilih_periode = '';
    public $pilih_kec = 0;
    public $pilih_kel = 0;
    public $pilih_pokmas = 0;
    public $pilih_rw = 0;
    public $pilih_rt = 0;
    public $pilih_kk = 5;
    public $perPage = 10;
    public $sortField = 'id';
    public $sortAsc = false;
    public $id_delete = null;
    public $kelid = null;

    public $id_edit = null;
    public $data_edit = null;
    public $field_edit = null;

    public $selectedData = [];
    public $selectAll = false;
    public $b_keg;
    public $level;
    public $tahun;
    public $pokmas = '';
    public $rspan = 2;
    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['refreshTable' => '$refresh'];
    public function __construct()
    {
        $tahun = $this->tahun;
        $this->user = Auth::user()->id;
        $this->level = Auth::user()->level;
        $tahun = Periode::where('aktif', '=', 'Y')->get();
        foreach ($tahun as $th) {
            $this->tahun = $th->id;
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
        $this->pilih_pokmas = 0;
        $this->pilih_rw = 0;
        $this->pilih_rt = 0;
    }
    public function rset_kel()
    {
        $this->pilih_pokmas = 0;
        $this->pilih_rw = 0;
        $this->pilih_rt = 0;
    }
    public function rset_pokmas()
    {
        $this->pilih_rw = 0;
        $this->pilih_rt = 0;
    }
    public function rset_rw()
    {
        // $this->pilih_pokmas = 0;
        $this->pilih_rw = 0;
        $this->pilih_rt = 0;
    }
    public function rset_rt()
    {
        $this->pilih_rt = 0;
        $this->pilih_kk = 5;
        $this->search = '';
    }
    public function rset_kk()
    {
        $this->pilih_kk = 5;
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
if($this->level=="Pendamping RT"){
        $kec = Rt::select('kec_id')
            ->where([
                ['pendamping_id', '=', $this->user],
            ])->groupBy('kec_id')->get();
        $pilih_kel = $this->pilih_kel;
        $kel = Rt::select('kel_id')
            ->where([
                ['pendamping_id', '=', $this->user],
                ['kec_id', '=', $pilih_kec]
            ])->groupBy('kel_id')->get();

        $pokmas = $this->pokmas;
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
                $pokmas = Pokmas::select('id', 'pokmas')
                    ->where([
                        ['aktif', '=', 'Y'],
                        ['kel_id', '=', $pilih_kel],
                    ])->get();;
            }
        }
        if ($this->pilih_pokmas == 0) {
            $rw = Rt::select('rw_id')
                ->where([
                    ['pendamping_id', '=', $this->user],
                    ['kec_id', '=', $pilih_kec],
                    ['kel_id', '=', $pilih_kel],
                    ['kel_id', '=', $pilih_kel]
                ])
                ->groupBy('rw_id')->get();
        } else {
            $rw = Rt::select('rw_id')
                ->where([
                    ['pendamping_id', '=', $this->user],
                    ['kec_id', '=', $pilih_kec],
                    ['kel_id', '=', $pilih_kel],
                    ['pokmas_id', '=', $this->pilih_pokmas]
                ])->groupBy('rw_id')->get();
        }

        $pilih_rw = $this->pilih_rw;
        if ($pilih_rw == 0) {
            $rt = Rt::where([
                ['pendamping_id', '=', $this->user],
            ])->orderBy('id', 'asc')
                ->get();
        } else {
            $rt = Rt::where([
                ['pendamping_id', '=', $this->user],
                ['rw_id', '=', $pilih_rw],
            ])->get();
        }
    } elseif($this->level=='OPD'||'SuperAdmin'||'Korkot'){
        $kec = Kel::select('kec_id')
            // ->where([
            //     ['pendamping_id', '=', $this->user],
            // ])
            ->groupBy('kec_id')->get();
            // $kelid = $this->kelid;
            $kelid=Kel::select('id')->where('pendamping_id', '=', $this->user)->first();
            $pilih_kel = $this->pilih_kel;
            $kel = Rt::select('kel_id')
                ->where([
                    // ['pendamping_id', '=', $this->user],
                    // ['kel_id', '=', $kelid->id],
                    ['kec_id', '=', $pilih_kec]
                ])->groupBy('kel_id')->get();
                $pokmas = $this->pokmas;
                if (!$pilih_kec) {
                    $rw = Rt::select('rw_id')
                        // ->where('pendamping_id', '=', $this->user)
                        ->groupBy('rw_id')
                        ->orderBy('id', 'asc')
                        ->get();
                } else {
                    if (!$pilih_kel) {
                        $rw = Rt::select('rw_id')
                            ->where([
                                // ['pendamping_id', '=', $this->user],
                                ['kec_id', '=', $pilih_kec]
                            ])
                            ->groupBy('rw_id')->get();
                    } else {
                        $pokmas = Pokmas::select('id', 'pokmas')
                            ->where([
                                ['aktif', '=', 'Y'],
                                ['kel_id', '=', $pilih_kel],
                            ])->get();;
                    }
                }
                if ($this->pilih_pokmas == 0) {
                    $rw = Rt::select('rw_id')
                        ->where([
                            // ['pendamping_id', '=', $this->user],
                            ['kec_id', '=', $pilih_kec],
                            ['kel_id', '=', $pilih_kel],
                            ['kel_id', '=', $pilih_kel]
                        ])
                        ->groupBy('rw_id')->get();
                } else {
                    $rw = Rt::select('rw_id')
                        ->where([
                            // ['pendamping_id', '=', $this->user],
                            ['kec_id', '=', $pilih_kec],
                            ['kel_id', '=', $pilih_kel],
                            ['pokmas_id', '=', $this->pilih_pokmas]
                        ])->groupBy('rw_id')->get();
                }
        
                $pilih_rw = $this->pilih_rw;
                if ($pilih_rw == 0) {
                    $rt = Rt::where([
                        // ['pendamping_id', '=', $this->user],
                    ])->orderBy('id', 'asc')
                        ->get();
                } else {
                    $rt = Rt::where([
                        // ['pendamping_id', '=', $this->user],
                        ['rw_id', '=', $pilih_rw],
                    ])->get();
                }
    } elseif($this->level=="Korkel"){
        $kec = Kel::select('kec_id')
            ->where([
                ['pendamping_id', '=', $this->user],
            ])
            ->groupBy('kec_id')->get();
            // $kelid = $this->kelid;
            $kelid=Kel::select('id')->where('pendamping_id', '=', $this->user)->first();
            $pilih_kel = $this->pilih_kel;
            $kel = Rt::select('kel_id')
                ->where([
                    // ['pendamping_id', '=', $this->user],
                    ['kel_id', '=', $kelid->id],
                    // ['kec_id', '=', $pilih_kec]
                ])->groupBy('kel_id')->get();
                $pokmas = $this->pokmas;
                if (!$pilih_kec) {
                    $rw = Rt::select('rw_id')
                        // ->where('pendamping_id', '=', $this->user)
                        ->groupBy('rw_id')
                        ->orderBy('id', 'asc')
                        ->get();
                } else {
                    if (!$pilih_kel) {
                        $rw = Rt::select('rw_id')
                            ->where([
                                // ['pendamping_id', '=', $this->user],
                                ['kec_id', '=', $pilih_kec]
                            ])
                            ->groupBy('rw_id')->get();
                    } else {
                        $pokmas = Pokmas::select('id', 'pokmas')
                            ->where([
                                ['aktif', '=', 'Y'],
                                ['kel_id', '=', $pilih_kel],
                            ])->get();;
                    }
                }
                if ($this->pilih_pokmas == 0) {
                    $rw = Rt::select('rw_id')
                        ->where([
                            // ['pendamping_id', '=', $this->user],
                            ['kec_id', '=', $pilih_kec],
                            ['kel_id', '=', $pilih_kel],
                            ['kel_id', '=', $pilih_kel]
                        ])
                        ->groupBy('rw_id')->get();
                } else {
                    $rw = Rt::select('rw_id')
                        ->where([
                            // ['pendamping_id', '=', $this->user],
                            ['kec_id', '=', $pilih_kec],
                            ['kel_id', '=', $pilih_kel],
                            ['pokmas_id', '=', $this->pilih_pokmas]
                        ])->groupBy('rw_id')->get();
                }
        
                $pilih_rw = $this->pilih_rw;
                if ($pilih_rw == 0) {
                    $rt = Rt::where([
                        // ['pendamping_id', '=', $this->user],
                    ])->orderBy('id', 'asc')
                        ->get();
                } else {
                    $rt = Rt::where([
                        // ['pendamping_id', '=', $this->user],
                        ['rw_id', '=', $pilih_rw],
                    ])->get();
                }
    }

        $pilih_rt = $this->pilih_rt;
        $usulan = Usulan::all();
        $realisasi = Realisasi::All();

        return view('livewire.admin.monitoring-table', [
            // 'warga' => $rkm->paginate($this->perPage),
            'kec' => $kec,
            'pilih_kec' => $pilih_kec,
            'kel' => $kel,
            'pilih_kel' => $pilih_kel,
            'rw' => $rw,
            'pilih_rw' => $pilih_rw,
            'pilih_rt' => $pilih_rt,
            'pilih_kk' => $this->pilih_kk,
            'rt' => $rt,
            'usulan' => $usulan,
            'realisasi' => $realisasi,
            'caricalon' => $caricalon,
            'pm' => $pokmas,
            'pilih_pokmas' => $this->pilih_pokmas,
            // 'kelid' => $kelid->id,
            'level' => $this->level,
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
