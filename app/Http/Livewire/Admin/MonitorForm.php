<?php

namespace App\Http\Livewire\Admin;

use App\Models\B_kegiatan;
use App\Models\Realisasi;
use App\Models\Usulan;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Storage;

class MonitorForm extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    use WithFileUploads;
    //deklarasi properti
    public $id_usulan;
    public $kontrak;
    public $swadaya;
    public $ket;
    public $realisasi;
    public $tanggal_serah;
    public $opd;
    public $p_id;
    public $j_id;
    public $b_id;
    public $tahun_id;
    public $rt_id;
    public $rw_id;
    public $kec_id;
    public $kel_id;
    public $pokmas_id;
    public $nama;
    public $c_nama;
    public $kode;
    public $pesan;
    public $keterangan;
    public $usulan;
    public $volume = 0;
    public $satuan;
    public $harga = 0;
    public $jumlah = 0;
    public $gambar;
    public $file;
    public $perPage = 5;
    public $sortField = 'id';
    public $sortAsc = false;



    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];
    public function realisasi()
    {
        //validasi data sebelum disimpan
        $validated = $this->validate([
            'realisasi' => 'required',
        ]);
        
        // dd($this->realisasi);
        if ($this->realisasi != null) {

            //create jika id null
            $realisasi = new Realisasi();
            $realisasi->realisasi = $this->realisasi;
            $realisasi->usulan_id = $this->id_usulan;
            $realisasi->tahun_id = $this->tahun_id;
            $realisasi->kec_id = $this->kec_id;
            $realisasi->kel_id = $this->kel_id;
            $realisasi->rw_id = $this->rw_id;
            $realisasi->rt_id = $this->rt_id;
            $realisasi->pokmas_id = $this->pokmas_id;
            // dd($keluarga);
            $realisasi->save();
            $this->pesan = "Realisasi berhasil ditambahkan";
            //kirim pesan keberhasilan melalui event browser
            // $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil ditambahkan']);
        } else {
            $this->pesan = "Realisasi gagal ditambahkan";
            //kirim pesan keberhasilan melalui event browser
            // $this->dispatchBrowserEvent('show-message', ['msg' => 'Data sudah ada']);
        }
        $this->resetRealisasi(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }

    public function pilih_b_keg($id)
    {
        $this->rkm = B_kegiatan::where('id', '=', $id)->first();
        $this->kode = $this->rkm->j_kegiatan->p_kegiatan->kode . '.' . $this->rkm->j_kegiatan->kode . '.' . $this->rkm->kode . ' ~ ' . ucFirst($this->rkm->nama) . ' ';
        $this->b_id = $this->rkm->id;
    }

    public function render()
    {
        $realisasi = Realisasi::where([
            ['usulan_id', '=', $this->id_usulan]
        ]);

        return view('livewire.admin.monitor-form', [
            'real' => $realisasi->paginate($this->perPage, ['*'], 'commentsPage'),
            'kode' => $this->kode,
            'pesan' => $this->pesan,

        ]);
    }

    public function hapus($id)
    {
        Realisasi::find($id)->delete();
        $this->emitUp('refreshTable');
    }

    //menyiapkan data warga untuk ditampilkan pada modal detail ketika tombol tampil detail diklik
    public function showData($id)
    {
        $this->warga = Usulan::find($id);
        $this->dispatchBrowserEvent('detail-ready');
    }

    public function save()
    {
        //validasi data sebelum disimpan
        $validated = $this->validate([
            'nama' => 'required',
            // 'volume' => 'required|numeric',
            // 'harga' => 'required|numeric',
            // 'file' => 'image|max:2048',
        ]);

        if ($this->nama) {
            //update jika id tidak null 
            if($this->kontrak=='')$this->kontrak=0;
            if($this->swadaya=='')$this->swadaya=0;
            $usulan = Usulan::find($this->id_usulan);
            $usulan->kontrak = $this->kontrak;
            $usulan->swadaya = $this->swadaya;
            $usulan->tanggal_serah = $this->tanggal_serah;
            $usulan->opd = $this->opd;
            $usulan->ket = $this->ket;
            $usulan->update();
// dd($usulan);
            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil diupdate']);
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }
    public function editData($id)
    {
        //ambil data dari database untuk diedit
        $usulan = Usulan::find($id);
        $this->nama = $usulan->nama;
        // $this->rt = $usulan->rt->rt . '/' . $usulan->rt->rw->rw . ', ' . $usulan->rt->rw->kel->nama_kel . ', th. ' . $usulan->periode->tahun;
        $this->id_usulan = $id;
        $this->kec_id = $usulan->kec_id;
        $this->kel_id = $usulan->kel_id;
        $this->rw_id = $usulan->rw_id;
        $this->rt_id = $usulan->rt_id;
        $this->pokmas_id = $usulan->pokmas_id;
        $this->tahun_id = $usulan->tahun_id;
        $this->kontrak = $usulan->kontrak;
        $this->swadaya = $usulan->swadaya;
        $this->ket = $usulan->ket;
        $this->opd = $usulan->opd;
        $this->tanggal_serah = $usulan->tanggal_serah;
        $this->keterangan = $usulan->keterangan;
        //kirim pesan melalui event browser bahwa data siap diedit untuk kemudian ditampilkan modal form
        $this->dispatchBrowserEvent('edit-ready');
    }

    public function resetForm()
    {
        //reset data untuk kosongkan form
        $this->nama = null;
        $this->rkm = null;
        $this->volume = null;
        $this->satuan = null;
        $this->harga = null;
        $this->gambar = null;
        $this->file = null;
        $this->pesan = null;
        $this->keterangan = null;
    }
    public function resetRealisasi()
    {
        //reset data untuk kosongkan form
        $this->realisasi = null;
    }
}
