<?php

namespace App\Http\Livewire\Admin;
use App\Models\Rt;
use Livewire\Component;
use Barryvdh\DomPDF\Facade as PDF;
use App\Exports\ExportPendaftar; //download excel
use App\Models\Keluarga;
use App\Models\Rw;
use Excel;
use Auth;

class WargaDetail extends Component
{
    //deklarasi properti
    public $warga;
    public $idp;
    public $wil='rt';
    public $rw;
    public $nrw;
    public $lvl;

    //Mendaftarkan listener agar dapat diakses dari komponen lain
    protected $listeners = ['showData'];
    public function __construct()
    {
        $this->lvl = Auth::user()->level;
    }

    public function render()
    {
        $this->warga ='';
        if($this->wil=='rt'){
        $this->warga = Rt::find($this->idp);
        return view('livewire.admin.warga-detail',
        [
            'id' => $this->idp,
            'wil' => $this->wil,
            'lvl' => $this->lvl,
            'warga' => $this->warga,
        ]);
    }
        elseif($this->wil=='rw'){
            // $this->rw = Rw::select('rw')->where('id','=', $this->idp)->get();
            $this->warga ='';
            $this->warga = Rw::find($this->idp);
            return view('livewire.admin.warga-detailrw',
                    [
                        'id' => $this->idp,
                        'wil' => $this->wil,
                        'rw' => $this->rw,
                        'warga' => $this->warga,
                        'nrw' => $this->nrw
                    ]);
        }
        
    }
    //menyiapkan data warga untuk ditampilkan pada modal detail ketika tombol tampil detail diklik
    public function showData($id,$wil)
    {
        $this->idp = $id;
        $this->wil = $wil;
        
            
            // $this->warga=Rt::whereIn('id',$rw->id);

            // dd($rw->rt);
        
        $this->dispatchBrowserEvent('detail-ready');
    }
    public function cetak($id)
    {
        $this->warga = Rt::find($id);
        $nfile='Profil_RT_'.$this->warga->rt.'_RW_'.$this->warga->rw->rw.'_'.$this->warga->kel->singkatan.'.pdf';
        $pdf = PDF::loadView('cetak.profil', ['warga' => $this->warga])->output();
        return response()->streamDownload(
            fn() => print($pdf),
            "$nfile"
        );
    }
    public function cetakrw($id)
    {
        $nfile='Profil_RW_'.$this->warga->rw.'_'.$this->warga->kel->singkatan.'.pdf';
        $pdf = PDF::loadView('cetak.profilrw', ['warga' => $this->warga])->output();
        return response()->streamDownload(
            fn() => print($pdf),
            "$nfile"
        );
    }
    public function set_id($id){
        $kk = Keluarga::where('rt_id','=', $id)->get();
        foreach($this->rw as $rw){
            $rw_id=$rw->rw_id;
            $kel_id=$rw->kel_id;
            $kec_id=$rw->kec_id;
        }
        foreach($kk as $k){
            $sid = Keluarga::find($k->id);
            $sid->rw_id = $rw_id;
            $sid->kel_id = $kel_id;
            $sid->kec_id = $kec_id;
            $sid->update();
            $this->emitUp('refreshTable');
        }

    }
    //download excel
    public function downloadExcel()
    {
        $pendaftar = new ExportPendaftar();
        return Excel::download($pendaftar, 'Data Pendaftar.xlsx');
    }
}
