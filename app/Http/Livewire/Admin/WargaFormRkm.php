<?php

namespace App\Http\Livewire\Admin;

use App\Models\B_kegiatan;
use App\Models\Realisasi;
use App\Models\Rkm;
use App\Models\Usulan;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Storage;

class WargaFormRkm extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    use WithFileUploads;
    //deklarasi properti
    public $id_rkm;
    public $p_id;
    public $j_id;
    public $b_id;
    public $tahun_id;
    public $rt_id;
    public $rw_id;
    public $kel_id;
    public $kec_id;
    public $pokmas_id;
    public $nama;
    public $c_nama;
    public $kode;
    public $pesan;
    public $keterangan;
    public $rkm;
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
    public function tambah()
    {
        //validasi data sebelum disimpan
        $validated = $this->validate([
            'nama' => 'required',
        ]);
        $nm = Usulan::select('id')
            ->where([
                ['rkm_id', '=', $this->id_rkm],
                ['nama', '=', $this->nama]
            ])->get();
        $c_nama = $this->c_nama;
        foreach ($nm as $n) $c_nama = $n->id;
        // dd($c_nama);
        if ($c_nama == null) {

            //create jika id null
            $usulan = new Usulan();
            $usulan->p_id = $this->p_id;
            $usulan->j_id = $this->j_id;
            $usulan->b_id = $this->b_id;
            $usulan->kec_id = $this->kec_id;
            $usulan->kel_id = $this->kel_id;
            $usulan->rw_id = $this->rw_id;
            $usulan->rt_id = $this->rt_id;
            $usulan->tahun_id = $this->tahun_id;
            $usulan->rkm_id = $this->id_rkm;
            $usulan->pokmas_id = $this->pokmas_id;
            $usulan->nama = $this->nama;
            $usulan->keterangan = $this->keterangan;
            $usulan->volume = $this->volume;
            $usulan->satuan = $this->satuan;
            $usulan->harga = $this->harga;
            $usulan->jumlah = $this->jumlah;
            $usulan->gambar = $this->gambar;
            // dd($keluarga);
            $usulan->save();
            $this->pesan = "Usulan berhasil ditambahkan";
            //kirim pesan keberhasilan melalui event browser
            // $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil ditambahkan']);
        } else {
            $this->pesan = "Usulan gagal ditambahkan";
            //kirim pesan keberhasilan melalui event browser
            // $this->dispatchBrowserEvent('show-message', ['msg' => 'Data sudah ada']);
        }
        $this->resetForm(); //kosongkan form (cek method resetForm())
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
        $r = B_kegiatan::all();
        $volume = $this->volume;
        $harga = $this->harga;
        if (!$volume || !$harga) {
            $this->jumlah = 0;
        } else      $this->jumlah = intval($volume * $harga);
        $usulan = Usulan::where([
            ['rkm_id', '=', $this->id_rkm]
        ]);

        return view('livewire.admin.warga-form-rkm', [
            'usulan' => $usulan->paginate($this->perPage, ['*'], 'commentsPage'),
            'vol' => $this->volume,
            'hrg' => $this->harga,
            'jml' => $this->jumlah,
            'kode' => $this->kode,
            'rkm' => $this->rkm,
            'b_keg' => $r,
            'pesan' => $this->rt_id,
        ]);
    }

    public function hapus($id)
    {
        $us=Realisasi::where('usulan_id','=',$id)->first();
        // dd($us);
        if(!$us){
        Usulan::find($id)->delete();
        $this->emitUp('refreshTable');
        }
    }

    //menyiapkan data warga untuk ditampilkan pada modal detail ketika tombol tampil detail diklik
    public function showData($id)
    {
        $this->warga = Rkm::find($id);

        $this->dispatchBrowserEvent('detail-ready');
    }

    public function save()
    {

        //validasi data sebelum disimpan
        $validated = $this->validate([

            'nama' => 'required',
            'volume' => 'required|numeric',
            'harga' => 'required|numeric',
            'file' => 'image|max:2048',
        ]);
        $namafile = time() . '_' . $this->file->getClientOriginalName();
        $this->file->storeAs('rkm', $namafile);


        if ($this->nama) {
            //update jika id tidak null 
            $rkm = Rkm::find($this->id_rkm);
            Storage::delete('rkm/' . $rkm->gambar); //upload gambar            
            $rkm->rt_id = $this->rt_id;
            $rkm->rw_id = $this->rw_id;
            $rkm->kel_id = $this->kel_id;
            $rkm->kec_id = $this->kec_id;
            $rkm->b_id = $this->b_id;
            $rkm->nama = $this->nama;
            $rkm->volume = $this->volume;
            $rkm->satuan = $this->satuan;
            $rkm->harga = $this->harga;
            $rkm->jumlah = $this->jumlah;
            $rkm->ket = $this->ket;
            $rkm->gambar = $namafile;

            $rkm->update();

            //kirim pesan keberhasilan melalui event browser
            // $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil diupdate']);
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }
    public function editData($id)
    {
        //ambil data dari database untuk diedit
        $rkm = Rkm::find($id);
        $this->nama = $rkm->nama;
        $this->rt = $rkm->rt->rt . '/' . $rkm->rt->rw->rw . ', ' . $rkm->rt->rw->kel->nama_kel . ', th. ' . $rkm->periode->tahun;
        $this->id_rkm = $id;
        $this->pokmas_id = $rkm->rt->pokmas->id;
        $this->p_id = $rkm->p_id;
        $this->j_id = $rkm->j_id;
        $this->b_id = $rkm->b_id;
        $this->tahun_id = $rkm->tahun_id;
        $this->rt_id = $rkm->rt_id;
        $this->rw_id = $rkm->rw_id;
        $this->kel_id = $rkm->kel_id;
        $this->kec_id = $rkm->kec_id;
        $this->kode = $rkm->b_kegiatan->j_kegiatan->p_kegiatan->kode . '.' . $rkm->b_kegiatan->j_kegiatan->kode . '.' . $rkm->b_kegiatan->kode . ' ~ ' . ucFirst($rkm->b_kegiatan->nama);
        // $this->b_kegiatan = ;
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
}
