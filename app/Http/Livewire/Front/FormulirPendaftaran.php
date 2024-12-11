<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Pendaftar;
use App\Models\Periode;
use App\Models\Unit;
use App\Models\Jurusan;
use Auth;

class FormulirPendaftaran extends Component
{
    //deklarasi semua properti
    public $id_pendaftar;
    public $user_id;
    public $jurusan_id;
    public $unit_id;
    public $periode_id;
    public $no_pendaftar;
    public $status_seleksi = 'Belum Verifikasi';
    public $nama;
    public $nisn;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $jenis_kelamin = 'L';
    public $anak_ke;
    public $jumlah_saudara;
    public $agama;
    public $hp;
    public $hobi;
    public $cita_cita;

    public $jenis_tempat_tinggal;
    public $alamat;
    public $desa;
    public $kecamatan;
    public $kota;
    public $propinsi;
    public $rt;
    public $rw;
    public $kode_pos;
    public $jarak;
    public $transportasi;

    public $no_kk;
    public $nama_kk;
    public $no_kks;
    public $no_pkh;
    public $no_kip;
    public $nama_ayah;
    public $nik_ayah;
    public $tahun_lahir_ayah;
    public $status_ayah;
    public $pekerjaan_ayah;
    public $penghasilan_ayah;
    public $pendidikan_ayah;
    public $nama_ibu;
    public $nik_ibu;
    public $tahun_lahir_ibu;
    public $status_ibu;
    public $pekerjaan_ibu;
    public $penghasilan_ibu;
    public $pendidikan_ibu;
    public $nama_wali;
    public $nik_wali;
    public $tahun_lahir_wali;
    public $status_wali;
    public $pekerjaan_wali;
    public $penghasilan_wali;
    public $pendidikan_wali;
    public $hp_wali;

    public $nama_sekolah;
    public $jenjang_sekolah;
    public $status_sekolah;
    public $lokasi_sekolah;
    public $tahun_lulus;
    public $no_un;
    public $prestasi;

    public $step = 0;

    //menentukan nilai awal properti sesuai setatus pendaftaran (baru atau edit)
    public function __construct()
    {
        $this->user_id = Auth::user()->id;
        $this->nama = Auth::user()->name;

        //cek periode aktif
        $periode = Periode::where('aktif', '=', 'Y')->first();
        if ($periode) $this->periode_id = $periode->id;

        $pendaftar = Pendaftar::where('user_id', '=', $this->user_id)->first();
        if ($pendaftar) {
            $this->id_pendaftar = $pendaftar->id;

            $this->jurusan_id = $pendaftar->jurusan_id;
            $this->nisn = $pendaftar->nisn;
            $this->tempat_lahir = $pendaftar->tempat_lahir;
            $this->tanggal_lahir = $pendaftar->tanggal_lahir;
            $this->jenis_kelamin = $pendaftar->jenis_kelamin;
            $this->anak_ke = $pendaftar->anak_ke;
            $this->jumlah_saudara = $pendaftar->jumlah_saudara;
            $this->agama = $pendaftar->agama;
            $this->hp = $pendaftar->hp;
            $this->hobi = $pendaftar->hobi;
            $this->cita_cita = $pendaftar->cita_cita;

            $this->jenis_tempat_tinggal = $pendaftar->jenis_tempat_tinggal;
            $this->alamat = $pendaftar->alamat;
            $this->desa = $pendaftar->desa;
            $this->kecamatan = $pendaftar->kecamatan;
            $this->kota = $pendaftar->kota;
            $this->propinsi = $pendaftar->propinsi;
            $this->rt = $pendaftar->rt;
            $this->rw = $pendaftar->rw;
            $this->kode_pos = $pendaftar->kode_pos;
            $this->jarak = $pendaftar->jarak;
            $this->transportasi = $pendaftar->transportasi;


            $this->no_kk = $pendaftar->no_kk;
            $this->nama_kk = $pendaftar->nama_kk;
            $this->no_kks = $pendaftar->no_kks;
            $this->no_pkh = $pendaftar->no_pkh;
            $this->no_kip = $pendaftar->no_kip;
            $this->nama_ayah = $pendaftar->nama_ayah;
            $this->nik_ayah = $pendaftar->nik_ayah;
            $this->tahun_lahir_ayah = $pendaftar->tahun_lahir_ayah;
            $this->status_ayah = $pendaftar->status_ayah;
            $this->pekerjaan_ayah = $pendaftar->pekerjaan_ayah;
            $this->penghasilan_ayah = $pendaftar->penghasilan_ayah;
            $this->pendidikan_ayah = $pendaftar->pendidikan_ayah;
            $this->nama_ibu = $pendaftar->nama_ibu;
            $this->nik_ibu = $pendaftar->nik_ibu;
            $this->tahun_lahir_ibu = $pendaftar->tahun_lahir_ibu;
            $this->status_ibu = $pendaftar->status_ibu;
            $this->pekerjaan_ibu = $pendaftar->pekerjaan_ibu;
            $this->penghasilan_ibu = $pendaftar->penghasilan_ibu;
            $this->pendidikan_ibu = $pendaftar->pendidikan_ibu;
            $this->nama_wali = $pendaftar->nama_wali;
            $this->nik_wali = $pendaftar->nik_wali;
            $this->tahun_lahir_wali = $pendaftar->tahun_lahir_wali;
            $this->status_wali = $pendaftar->status_wali;
            $this->pekerjaan_wali = $pendaftar->pekerjaan_wali;
            $this->penghasilan_wali = $pendaftar->penghasilan_wali;
            $this->pendidikan_wali = $pendaftar->pendidikan_wali;
            $this->hp_wali = $pendaftar->hp_wali;


            $this->nama_sekolah = $pendaftar->nama_sekolah;
            $this->jenjang_sekolah = $pendaftar->jenjang_sekolah;
            $this->status_sekolah = $pendaftar->status_sekolah;
            $this->lokasi_sekolah = $pendaftar->lokasi_sekolah;
            $this->tahun_lulus = $pendaftar->tahun_lulus;
            $this->no_un = $pendaftar->no_un;
            $this->prestasi = $pendaftar->prestasi;
        }
    }

    //render view blade
    public function render()
    {
        $jurusan = Jurusan::all();
        $unit = Unit::all();
        $periode = Periode::where('aktif', '=', 'Y')->first();
        return view('livewire.front.formulir-pendaftaran', [
            'jurusan' => $jurusan,
            'unit' => $unit,
            'periode' => $periode
        ]);
    }

    public function save()
    {
        $periode = Periode::where('aktif', '=', 'Y')->first();
        if ($this->step == 0) { //cek tahapan pendaftaran
            //validasi tahap pertama
            $this->validate([
                'user_id' => 'required',
                // 'jurusan_id' => 'required',
                'unit_id' => 'required',
                'periode_id' => 'required',
                'status_seleksi' => 'required',
                'nama' => 'required',
                'nisn' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'anak_ke' => 'required',
                'jumlah_saudara' => 'required',
                'agama' => 'required',
                'hp' => 'required',
                'hobi' => 'required',
                'cita_cita' => 'required',
            ]);

            //cek data pendaftar dan tentukan mode penyimpanan
            $pendaftar = Pendaftar::where('user_id', '=', $this->user_id)->first();
            $save_mode = ($pendaftar) ? 'update' : 'create';

            //pengaturan jika mode simpan create
            if ($save_mode == 'create') {
                $pendaftar = new Pendaftar;

                $max = Pendaftar::where('periode_id', '=', $periode->id)->max('no_pendaftar');
                $pendaftar->no_pendaftar = $max + 1;
            }

            //simpan data tahap pertama
            $pendaftar->user_id = $this->user_id;
            // $pendaftar->jurusan_id = $this->jurusan_id;
            $pendaftar->unit_id = $this->unit_id;
            $pendaftar->periode_id = $this->periode_id;
            $pendaftar->status_seleksi = $this->status_seleksi;
            $pendaftar->nama = $this->nama;
            $pendaftar->nisn = $this->nisn;
            $pendaftar->tempat_lahir = $this->tempat_lahir;
            $pendaftar->tanggal_lahir = $this->tanggal_lahir;
            $pendaftar->jenis_kelamin = $this->jenis_kelamin;
            $pendaftar->anak_ke = $this->anak_ke;
            $pendaftar->jumlah_saudara = $this->jumlah_saudara;
            $pendaftar->agama = $this->agama;
            $pendaftar->hp = $this->hp;
            $pendaftar->hobi = $this->hobi;
            $pendaftar->cita_cita = $this->cita_cita;

            //simpan data sesuai mode penyimpanan
            if ($save_mode == 'create') $pendaftar->save();
            else $pendaftar->update();
        } elseif ($this->step == 1) {
            //validasi penyimpanan tahapan kedua
            $this->validate([
                'jenis_tempat_tinggal' => 'required',
                'alamat' => 'required',
                'desa' => 'required',
                'kecamatan' => 'required',
                'kota' => 'required',
                'propinsi' => 'required',
                'rt' => 'required',
                'rw' => 'required',
                'kode_pos' => 'required',
                'jarak' => 'required',
                'transportasi' => 'required',
            ]);

            //simpan data tahapan kedua
            $pendaftar = Pendaftar::find($this->id_pendaftar);
            $pendaftar->jenis_tempat_tinggal = $this->jenis_tempat_tinggal;
            $pendaftar->alamat = $this->alamat;
            $pendaftar->desa = $this->desa;
            $pendaftar->kecamatan = $this->kecamatan;
            $pendaftar->kota = $this->kota;
            $pendaftar->propinsi = $this->propinsi;
            $pendaftar->rt = $this->rt;
            $pendaftar->rw = $this->rw;
            $pendaftar->kode_pos = $this->kode_pos;
            $pendaftar->jarak = $this->jarak;
            $pendaftar->transportasi = $this->transportasi;
            $pendaftar->update();
        } elseif ($this->step == 2) {
            //validasi tahapan ketiga
            $this->validate([
                'no_kk' => 'required',
                'nama_kk' => 'required',
                'nama_ayah' => 'required',
                'nik_ayah' => 'required',
                'tahun_lahir_ayah' => 'required',
                'status_ayah' => 'required',
                'pekerjaan_ayah' => 'required',
                'penghasilan_ayah' => 'required',
                'pendidikan_ayah' => 'required',
                'nama_ibu' => 'required',
                'nik_ibu' => 'required',
                'tahun_lahir_ibu' => 'required',
                'status_ibu' => 'required',
                'pekerjaan_ibu' => 'required',
                'penghasilan_ibu' => 'required',
                'pendidikan_ibu' => 'required',
            ]);

            //simpan data tahapan ketiga
            $pendaftar = Pendaftar::find($this->id_pendaftar);
            $pendaftar->no_kk = $this->no_kk;
            $pendaftar->nama_kk = $this->nama_kk;
            $pendaftar->no_kks = $this->no_kks;
            $pendaftar->no_pkh = $this->no_pkh;
            $pendaftar->no_kip = $this->no_kip;
            $pendaftar->nama_ayah = $this->nama_ayah;
            $pendaftar->nik_ayah = $this->nik_ayah;
            $pendaftar->tahun_lahir_ayah = $this->tahun_lahir_ayah;
            $pendaftar->status_ayah = $this->status_ayah;
            $pendaftar->pekerjaan_ayah = $this->pekerjaan_ayah;
            $pendaftar->penghasilan_ayah = $this->penghasilan_ayah;
            $pendaftar->pendidikan_ayah = $this->pendidikan_ayah;
            $pendaftar->nama_ibu = $this->nama_ibu;
            $pendaftar->nik_ibu = $this->nik_ibu;
            $pendaftar->tahun_lahir_ibu = $this->tahun_lahir_ibu;
            $pendaftar->status_ibu = $this->status_ibu;
            $pendaftar->pekerjaan_ibu = $this->pekerjaan_ibu;
            $pendaftar->penghasilan_ibu = $this->penghasilan_ibu;
            $pendaftar->pendidikan_ibu = $this->pendidikan_ibu;
            $pendaftar->nama_wali = $this->nama_wali;
            $pendaftar->nik_wali = $this->nik_wali;
            $pendaftar->tahun_lahir_wali = $this->tahun_lahir_wali;
            $pendaftar->status_wali = $this->status_wali;
            $pendaftar->pekerjaan_wali = $this->pekerjaan_wali;
            $pendaftar->penghasilan_wali = $this->penghasilan_wali;
            $pendaftar->pendidikan_wali = $this->pendidikan_wali;
            $pendaftar->hp_wali = $this->hp_wali;
            $pendaftar->update();
        } elseif ($this->step == 3) {
            //validasi tahapan terakhir
            $this->validate([
                'nama_sekolah' => 'required',
                'jenjang_sekolah' => 'required',
                'status_sekolah' => 'required',
                'lokasi_sekolah' => 'required',
                'tahun_lulus' => 'required',
                'no_un' => 'required',
                'prestasi' => 'required',
            ]);

            //simpan data tahapan terakhir
            $pendaftar = Pendaftar::find($this->id_pendaftar);
            $pendaftar->nama_sekolah = $this->nama_sekolah;
            $pendaftar->jenjang_sekolah = $this->jenjang_sekolah;
            $pendaftar->status_sekolah = $this->status_sekolah;
            $pendaftar->lokasi_sekolah = $this->lokasi_sekolah;
            $pendaftar->tahun_lulus = $this->tahun_lulus;
            $pendaftar->no_un = $this->no_un;
            $pendaftar->prestasi = $this->prestasi;
            $pendaftar->update();
        }

        $this->step += 1; //naikan tahapan pendaftaran

        //kirim pesan keberhasilan melalui event browser
        $this->dispatchBrowserEvent('show-message', ['msg' => 'Data telah disimpan']);

        //redirect ke dashboard jika pada penyimpanan tahapan terakhir
        if ($this->step > 3) {
            return redirect('/dashboard');
        }
    }

    //ke tahapan sebelumnya
    public function prevStep()
    {
        if ($this->step > 0) $this->step -= 1;
    }
}
