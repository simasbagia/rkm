<?php

namespace App\Imports;

use App\Models\Kel;
use App\Models\Keluarga;
use App\Models\Kk;
use App\Models\Rt;
use App\Models\Rw;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use phpDocumentor\Reflection\Types\Null_;

class ImportKk implements ToModel, WithHeadingRow
{
    public $kec_id;
    public $kel_id;
    public $rw_id;
    public $rt_id;
    public $kk_id;
    public $kk;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
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
        if ($row['posisi'] == '') $this->posisi = '-';
        elseif ($row['posisi'] == 'KEPALA KELUARGA') $this->posisi = 'Kepala';
        else $this->posisi = 'Anggota'; 

        if ($this->kk != NULL) {
            $k_id = Kk::where('kk', '=', $row['kk'])->first();
            if ($k_id!=null) {
                // return new Keluarga([
                //     'kec_id' => $this->kec_id,
                //     'kel_id' => $this->kel_id,
                //     'rw_id' => $this->rw_id,
                //     'rt_id' => $this->rt_id,
                //     'kk_id' => $k_id->id,
                //     'aktif' => 'Y',
                //     'nama' => $row['nama'],
                //     'tgl_lahir' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tgl_lahir'])->format('Y-m-d'),
                //     'jk' => $row['jk'],
                //     'agama' => $row['agama'],
                //     'pendidikan' => '-',
                //     'pekerjaan' => '-',
                //     'dtks' => '-',
                //     'posisi' => $this->posisi,
                //     'warneg' => 'WNI',
                //     'disabilitas' => '-',
                //     'stunting' => '-',
                //     'jamkes' => '-',
                //     'gangguan_jiwa' => '-',
                //     'jkn_kis' => '-',
                //     'vaksin' => '-',
                //     'imunisasi' => '-',
                //     'terlantar' => '-',
                // ]);
                $this->kk_id=='';
                
            } else {
                return new Kk([
                    'kk' => $this->kk,
                    'kec_id' => $this->kec_id,
                    'kel_id' => $this->kel_id,
                    'rw_id' => $this->rw_id,
                    'rt_id' => $this->rt_id,
                    'aktif' => 'Y',
                    'ket' => '--'
                ]);
            }
        }
    }
}
