<?php

namespace App\Http\Livewire\Admin;

use App\Models\Keluarga;
use App\Models\Kk;
use Livewire\Component;
use Livewire\WithPagination;

class WargaFormKel extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    //deklarasi properti
    public $id_kk;
    public $id_edit;
    public $data_edit;
    public $field_edit;
    public $no_kk;
    public $kec_id;
    public $kel_id;
    public $rw_id;
    public $rt_id;
    public $perPage = 25;
    public $sortField = 'id';
    public $sortAsc = false;
    public $kk;
    public $nama;
    public $c_nama = null;
    public $tgl_lahir;
    public $jk = 'L';
    public $aktif = 'Y';
    public $warneg = 'WNI';
    public $agama = '-';
    public $pendidikan = '-';
    public $lulus = '-';
    public $pekerjaan = '-';
    public $posisi = '-';
    public $disabilitas = '-';
    public $dtks = '-';
    public $jkn_kis = '-';
    public $stunting = '-';
    public $jamkes = '-';
    public $gangguan_jiwa = '-';
    public $vaksin = '-';
    public $imunisasi = '-';
    public $terlantar = '-';

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['editData'];

    //menyiapkan data warga untuk ditampilkan pada modal detail ketika tombol tampil detail diklik
    public function showData($id)
    {
        $this->warga = Kk::find($id);

        $this->dispatchBrowserEvent('detail-ready');
    }
    public function save()
    {
    }
    public function tambah()
    {
        //validasi data sebelum disimpan
        $validated = $this->validate([

            'nama' => 'required',
            'tgl_lahir' => 'required',
        ]);

        if (!$this->nama && !$this->tgl_lahir) {
            //update jika id tidak null 
            $kk = Kk::find($this->id_kk);
            $kk->kk = $this->kk;
            $kk->update();

            //kirim pesan keberhasilan melalui event browser
            $this->dispatchBrowserEvent('show-message', ['msg' => 'Tanggal belum diisi']);
        } else {
            $nm = Keluarga::select('id')
                ->where([
                    ['kk_id', '=', $this->id_kk],
                    ['nama', '=', $this->nama]
                ])->get();
            $c_nama = $this->c_nama;
            foreach ($nm as $n) $c_nama = $n->id;
            // dd($c_nama);
            if ($c_nama == null) {

                //create jika id null
                $keluarga = new Keluarga();
                $keluarga->kec_id = $this->kec_id;
                $keluarga->kel_id = $this->kel_id;
                $keluarga->rw_id = $this->rw_id;
                $keluarga->rt_id = $this->rt_id;
                $keluarga->kk_id = $this->id_kk;
                $keluarga->nama = $this->nama;
                $keluarga->tgl_lahir = $this->tgl_lahir;
                $keluarga->aktif = $this->aktif;
                $keluarga->warneg = $this->warneg;
                $keluarga->jk = $this->jk;
                $keluarga->agama = $this->agama;
                $keluarga->pendidikan = $this->pendidikan;
                $keluarga->lulus = $this->lulus;
                $keluarga->pekerjaan = $this->pekerjaan;
                $keluarga->posisi = $this->posisi;
                $keluarga->disabilitas = $this->disabilitas;
                $keluarga->dtks = $this->dtks;
                $keluarga->jkn_kis = $this->jkn_kis;
                $keluarga->stunting = $this->stunting;
                $keluarga->jamkes = $this->jamkes;
                $keluarga->gangguan_jiwa = $this->gangguan_jiwa;
                $keluarga->vaksin = $this->vaksin;
                $keluarga->imunisasi = $this->imunisasi;
                $keluarga->terlantar = $this->terlantar;
                $keluarga->save();

                //kirim pesan keberhasilan melalui event browser
                // $this->dispatchBrowserEvent('show-message', ['msg' => 'Data berhasil ditambahkan']);
            } else {
                //kirim pesan keberhasilan melalui event browser
                $this->dispatchBrowserEvent('show-message', ['msg' => 'Data sudah ada']);
            }
        }

        $this->resetForm(); //kosongkan form (cek method resetForm())
        $this->emitUp('refreshTable'); //refresh tabel dengan mengakses listener refresTable komponen induk (emitUp)
    }
    public function editData($id)
    {
        //ambil data dari database untuk diedit
        $kk = Kk::find($id);
        $this->kk = $kk->kk;
        $this->kec_id = $kk->kec_id;
        $this->kel_id = $kk->kel_id;
        $this->rw_id = $kk->rw_id;
        $this->rt_id = $kk->rt_id;
        $this->id_kk = $id;
        // $keluarga = Keluarga::find($id);
        // $this->nama = $keluarga->nama;
        // $this->aktif = $keluarga->aktif;
        // $this->agama = $keluarga->agama;
        // $this->pendidikan = $keluarga->pendidikan;
        // $this->lulus = $keluarga->lulus;
        // $this->pekerjaan = $keluarga->pekerjaan;
        // $this->disabilitas = $keluarga->disabilitas;

        //kirim pesan melalui event browser bahwa data siap diedit untuk kemudian ditampilkan modal form
        $this->dispatchBrowserEvent('edit-ready');
    }

    public function resetForm()
    {
        //reset data untuk kosongkan form
        $this->nama = null;
        $this->kk_id = null;
        $this->tgl_lahir = null;
        $this->jk = 'L';
        $this->posisi = null;
        $this->aktif = 'Y';
        $this->agama = '-';
        $this->pendidikan = '-';
        $this->lulus = '-';
        $this->pekerjaan = '-';
        $this->posisi = '-';
        $this->disabilitas = '-';
        $this->dtks = '-';
        $this->warneg = 'WNI';
        $this->stunting = '-';
        $this->jamkes = '-';
        $this->gangguan_jiwa = '-';
        $this->jkn_kis = '-';
        $this->vaksin = '-';
        $this->imunisasi = '-';
        $this->terlantar = '-';
    }
    public function hapus($id)
    {
        Keluarga::find($id)->delete();
        $this->emitUp('refreshTable');
    }

    //menentukan field yang akan diedit ketika data diklik
    public function setEdit($id, $field)
    {
        $this->id_edit = 0;
        $this->data_edit = '';
        $this->field_edit = '';

        $kel = Keluarga::find($id);
        $this->id_edit = $id;
        $this->data_edit = $kel->$field;
        $this->field_edit = $field;

        //akses listener untuk menampilkan input edit pada data sesuai id dan field data yang diklik
        $this->dispatchBrowserEvent('show-edit', ['id' => $id, 'field' => $field]);
    }
    //simpan data yang diedit 
    public function saveEdit()
    {
        $field = $this->field_edit;
        $kel = Keluarga::find($this->id_edit);
        $kel->$field = $this->data_edit;
        $kel->update();
    }
    //simpan data yang diedit ketika selectbox dipilih
    public function updatedDataEdit()
    {
        $field = $this->field_edit;
        $kel = Keluarga::find($this->id_edit);
        $kel->$field = $this->data_edit;
        $kel->update();  
              $this->emitTo('Components.WargaDetail','showData');
            // $this->dispatchBrowserEvent('showData');
    }
    //render file blade
    public function render()
    {
        $keluarga = Keluarga::where([
            ['kk_id', '=', $this->id_kk]
        ]);

        return view('livewire.admin.warga-form-kel', [
            // 'keluarga' => $keluarga->paginate($this->perPage, ['*'], 'a'),
            'keluarga' => $keluarga->paginate($this->perPage, ['*'], 'a'),
        ]);
    }
}
