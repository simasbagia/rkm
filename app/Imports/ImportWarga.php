<?php

namespace App\Imports;

use App\Models\Kel;
use App\Models\Keluarga;
// use App\Models\Keluarga_import;
use App\Models\Kk;
use App\Models\Rt;
use App\Models\Rw;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ImportWarga implements ToModel, WithHeadingRow, WithChunkReading
{
    public $kec_id;
    public $kel_id;
    public $rw_id;
    public $rt_id;
    public $kk_id;
    public $kk;
    public $nama;
    public $tgl_lahir;
    public $jk;
    public $agama;
    public $pendidikan;
    public $lulus;
    public $pekerjaan;
    public $posisi;

    public function model(array $row)
    {

        $id_id = Kel::where('nama_kel', '=', $row['kel'])->get();
        foreach ($id_id as $id_) {
            $this->kec_id = $id_->kec_id;
            $this->kel_id = $id_->id;
        }
        $w_id = Rw::where('rw', '=', $row['rw'])
            ->where('kel_id', '=', $this->kel_id)
            ->get();
        foreach ($w_id as $idw) {
            $this->rw_id = $idw->id;
        }
        $t_id = Rt::where('rt', '=', $row['rt'])
            ->where('rw_id', '=', $this->rw_id)
            ->where('kel_id', '=', $this->kel_id)->get();
        foreach ($t_id as $idt) {
            $this->rt_id = $idt->id;
        }
        $this->kk = $row['kk'];
        $this->nama = $row['nama'];
        $this->tgl_lahir = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tgl_lahir'])->format('Y-m-d');
        $this->jk = $row['jk'];
        $this->agama = $row['agama'];
        $this->pendidikan = $row['pendidikan'];
        $this->lulus = $row['lulus'];
        $this->pekerjaan = $row['pekerjaan'];
        if ($row['posisi'] == '') $this->posisi = '-';
        elseif ($row['posisi'] == 'KEPALA KELUARGA') $this->posisi = 'Kepala';
        else $this->posisi = 'Anggota';
        if ($this->kk != NULL) {
            $k_id = Kk::where('kk', '=', $row['kk'])
                ->where('rw_id', '=', $this->rw_id)
                ->where('kel_id', '=', $this->kel_id)->first();
            $kl_id = Keluarga::where('kk_id', '=', $k_id->id)
                ->where('nama', '=', $this->nama)
                ->where('rw_id', '=', $this->rw_id)
                ->where('kel_id', '=', $this->kel_id)->first();
            // if(preg_match("/BLM TAMAT SD/i", $row['kk'])) {
            //     echo 'Kata <b>'.$dicari.'</b> ditemukan.';
            // }
            // dd($kl_id);
            if ($kl_id == null) {
                return new Keluarga([
                    // 'kk' => $this->kk,
                    'kec_id' => $this->kec_id,
                    'kel_id' => $this->kel_id,
                    'rw_id' => $this->rw_id,
                    'rt_id' => $this->rt_id,
                    'kk_id' => $k_id->id,
                    'aktif' => 'Y',
                    'nama' => $this->nama,
                    'tgl_lahir' => $this->tgl_lahir,
                    'jk' => $this->jk,
                    'agama' => $this->agama,
                    'pendidikan' => $this->pendidikan,
                    'lulus' => $this->lulus,
                    'pekerjaan' => $this->pekerjaan,
                    'dtks' => '-',
                    'posisi' => $this->posisi,
                    'warneg' => 'WNI',
                    'disabilitas' => '-',
                    'stunting' => '-',
                    'jamkes' => '-',
                    'gangguan_jiwa' => '-',
                    'jkn_kis' => '-',
                    'vaksin' => '-',
                    'imunisasi' => '-',
                    'terlantar' => '-',
                    'ket' => '--',
                ]);
            }
        }
    }

    public function chunkSize(): int
    {
        return 5000;
    }
}
