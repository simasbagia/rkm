{{-- untuk koding preview sebelum cetak --}}

<x-form-modal>
    
    <x-slot name="header">
        <h5><b>Rekapitulasi Profil RT Di Wilayah RW  
            @if ($warga)
                    {{ $warga->rw->rw??'' }} / Rt {{ $warga->rt??'' }}, Kelurahan  {{ $warga->kel->nama_kel??'' }}
            @elseif($nrw)
                    @endif
            Tahun {{ now () -> year}}</b></h5>
    </x-slot>
    <x-slot name="close">
        <button type="button" class="btn-close" @click="showDetail = false"></button>
    </x-slot>
    <table class="table" border="0">
        @if ($warga)
            <tr>
                <td width="1"></td>
                <td> Ketua RT </td>
                <td colspan="6">: {{ ucwords(strtoupper($warga->ketua)) }}</td>
            </tr>
            <tr>
                <td></td>
                <td> Ketua RW </td>
                <td colspan="6">: {{ ucwords(strtoupper($warga->rw->ketua)) }}</td>
            </tr>
            <tr>
                <td></td>
                <td> Pendamping </td>
                <td colspan="6">: {{ ucwords(strtoupper($warga->pendamping->name)) }}</td>
            </tr>
            <tr>
                <td></td>
                <td> Pokmas </td>
                <td colspan="6">: {{ ucwords(strtoupper($warga->pokmas->pokmas??'')) }}</td>
            </tr>
            <tr>
                <td></td>
                <td> Koordinat </td>
                <td colspan="6">: {{ $warga->koordinat }}</td>
            </tr>
            <tr>
                <td colspan="8"><br/>
                    <h5><b>Potensi Sumber Daya Manusia</b></h5>
                </td>
            </tr>
            <tr>
                <td></td>
                <td> Jumlah KK </td>
                <td align="left" colspan="6">: {{ $warga->kk->where('aktif', '=', 'Y')->count() }}</td>
            </tr>
            <tr>
                <td colspan="8"><br/>
                    <h5>&nbsp;&nbsp;<b>A. Jumlah Penduduk</b></h5>
                </td>
            </tr>
            <tr>
                <td rowspan="2"></td>
                <td valign="middle" colspan="4"><b> Usia (th) </b></td>
                <td  align="center"><b>Laki-laki</b></td>
                <td  align="center"><b>Perempuan</b></td>
                <td  align="center"><b>Total</b></td>
            </tr>
            <tr>
                <td colspan="4"> 0 - 1 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(1))
			
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(1))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('tgl_lahir', '>', now()->subYears(1))
                    ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4"> 2 - 5 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(5))
                        ->where('tgl_lahir', '<', now()->subYears(1))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(5))
                        ->where('tgl_lahir', '<', now()->subYears(1))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(5))
                    ->where('tgl_lahir', '<', now()->subYears(1))
                    ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4"> 6 - 10 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(10))
                        ->where('tgl_lahir', '<', now()->subYears(5))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(10))
                        ->where('tgl_lahir', '<', now()->subYears(5))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(10))
                    ->where('tgl_lahir', '<', now()->subYears(5))
                    ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4"> 11 - 15 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(15))
                        ->where('tgl_lahir', '<', now()->subYears(10))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(15))
                        ->where('tgl_lahir', '<', now()->subYears(10))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(15))
                    ->where('tgl_lahir', '<', now()->subYears(10))
                    ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4"> 16 - 20 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(20))
                        ->where('tgl_lahir', '<', now()->subYears(15))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(20))
                        ->where('tgl_lahir', '<', now()->subYears(15))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(20))
                    ->where('tgl_lahir', '<', now()->subYears(15))
                    ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4"> 21- 25 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(25))
                        ->where('tgl_lahir', '<', now()->subYears(20))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(25))
                        ->where('tgl_lahir', '<', now()->subYears(20))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(25))
                    ->where('tgl_lahir', '<', now()->subYears(20))
                    ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4"> 26 - 30 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(30))
                        ->where('tgl_lahir', '<', now()->subYears(25))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(30))
                        ->where('tgl_lahir', '<', now()->subYears(25))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(30))
                    ->where('tgl_lahir', '<', now()->subYears(25))
                    ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4"> 31 - 35 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(35))
                        ->where('tgl_lahir', '<', now()->subYears(30))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(35))
                        ->where('tgl_lahir', '<', now()->subYears(30))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(35))
                    ->where('tgl_lahir', '<', now()->subYears(30))
                    ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4"> 36 - 40 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(40))
                        ->where('tgl_lahir', '<', now()->subYears(35))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(40))
                        ->where('tgl_lahir', '<', now()->subYears(35))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(40))
                    ->where('tgl_lahir', '<', now()->subYears(35))
                    ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4"> 41 - 45 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(45))
                        ->where('tgl_lahir', '<', now()->subYears(40))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(45))
                        ->where('tgl_lahir', '<', now()->subYears(40))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(45))
                    ->where('tgl_lahir', '<', now()->subYears(40))
                    ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4"> 46 - 50 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(50))
                        ->where('tgl_lahir', '<', now()->subYears(45))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(50))
                        ->where('tgl_lahir', '<', now()->subYears(45))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(50))
                    ->where('tgl_lahir', '<', now()->subYears(45))
                    ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4"> 51 - 55 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(55))
                        ->where('tgl_lahir', '<', now()->subYears(50))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(55))
                        ->where('tgl_lahir', '<', now()->subYears(50))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(55))
                    ->where('tgl_lahir', '<', now()->subYears(50))
                    ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4"> 56 - 60 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(60))
                        ->where('tgl_lahir', '<', now()->subYears(55))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(60))
                        ->where('tgl_lahir', '<', now()->subYears(55))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(60))
                    ->where('tgl_lahir', '<', now()->subYears(55))
                    ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4"> > 61  </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '<', now()->subYears(60))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '<', now()->subYears(60))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '<', now()->subYears(60))
                    ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td align="center" colspan="4"><b> Total </b></td>
                <td align="center"><b>{{ $warga->keluarga->where('jk', '=', 'L')->count() }}</b></td>
                <td align="center"><b>{{ $warga->keluarga->where('jk', '=', 'P')->count() }}</b></td>
                <td align="center"><b>{{ $warga->keluarga->count() }}</b></td>
            </tr>
            <tr>
                <td colspan="8"><br/>
                    <h5>&nbsp;&nbsp;<b>B. Pendidikan</b></h5>
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4"><b> Bersekolah di Usia (th) </b></td>
                <td  align="center"><b>Laki-laki</b></td>
                <td  align="center"><b>Perempuan</b></td>
                <td  align="center"><b>Total</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4"> 3-6 Belum TK/Paud </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(6))
                        ->where('tgl_lahir', '<', now()->subYears(3))
                        ->where('pendidikan', '=', '-')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(6))
                        ->where('tgl_lahir', '<', now()->subYears(3))
                        ->where('pendidikan', '=', '-')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(6))
                    ->where('tgl_lahir', '<', now()->subYears(3))
                    ->where('pendidikan', '=', '-')
                  ->count() }}
                </td>
            </tr>
            {{-- Sedang Menempuh Pendidikan PAUD --}}
            <tr>
                <td></td>
                <td colspan="4">3-6 Sedang Menempuh PAUD </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(6))
                        ->where('tgl_lahir', '<', now()->subYears(3))
                        ->where('pendidikan', '=', 'Paud')
                    /* ->where('pendidikan', '=', 'TK') */
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(6))
                        ->where('tgl_lahir', '<', now()->subYears(3))
                        // ->where('pendidikan', '=', 'Paud')
                        ->where('pendidikan', '=', 'Paud')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(6))
                    ->where('tgl_lahir', '<', now()->subYears(3))
                    // ->where('pendidikan', '=', 'Paud')
                    ->where('pendidikan', '=', 'Paud')
                  ->count() }}
                </td>
            </tr>
            {{-- Sedang Menempuh Pendidikan TK --}}
            <tr>
                <td></td>
                <td colspan="4">3-6 Sedang Menempuh Pendidikan TK </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(6))
                        ->where('tgl_lahir', '<', now()->subYears(3))
                        // ->where('pendidikan', '=', 'Paud')
                    ->where('pendidikan', '=', 'TK')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(6))
                        ->where('tgl_lahir', '<', now()->subYears(3))
                        // ->where('pendidikan', '=', 'Paud')
                    ->where('pendidikan', '=', 'TK')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(6))
                    ->where('tgl_lahir', '<', now()->subYears(3))
                    // ->where('pendidikan', '=', 'Paud')
                    ->where('pendidikan', '=', 'TK')
                  ->count() }}
                </td>
            </tr>
            {{-- --------------------------------------------- --}}



            <tr>
                <td></td>
                <td colspan="4">7-15 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(15))
                        ->where('tgl_lahir', '<', now()->subYears(7))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(15))
                        ->where('tgl_lahir', '<', now()->subYears(7))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(15))
                    ->where('tgl_lahir', '<', now()->subYears(7))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Belum')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4">16-20 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(20))
                        ->where('tgl_lahir', '<', now()->subYears(16))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(20))
                        ->where('tgl_lahir', '<', now()->subYears(16))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(20))
                    ->where('tgl_lahir', '<', now()->subYears(16))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Belum')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4">21-25 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(25))
                        ->where('tgl_lahir', '<', now()->subYears(21))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(25))
                        ->where('tgl_lahir', '<', now()->subYears(21))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(25))
                    ->where('tgl_lahir', '<', now()->subYears(21))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Belum')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4">26-30 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(30))
                        ->where('tgl_lahir', '<', now()->subYears(26))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(30))
                        ->where('tgl_lahir', '<', now()->subYears(26))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(30))
                    ->where('tgl_lahir', '<', now()->subYears(26))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Belum')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4">31-35 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(35))
                        ->where('tgl_lahir', '<', now()->subYears(31))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(35))
                        ->where('tgl_lahir', '<', now()->subYears(31))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(35))
                    ->where('tgl_lahir', '<', now()->subYears(31))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Belum')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4">36-40 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(40))
                        ->where('tgl_lahir', '<', now()->subYears(36))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(40))
                        ->where('tgl_lahir', '<', now()->subYears(36))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(40))
                    ->where('tgl_lahir', '<', now()->subYears(36))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Belum')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4">41-45 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(45))
                        ->where('tgl_lahir', '<', now()->subYears(41))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(45))
                        ->where('tgl_lahir', '<', now()->subYears(41))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(45))
                    ->where('tgl_lahir', '<', now()->subYears(41))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Belum')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4">46-50 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(50))
                        ->where('tgl_lahir', '<', now()->subYears(46))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(50))
                        ->where('tgl_lahir', '<', now()->subYears(46))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(50))
                    ->where('tgl_lahir', '<', now()->subYears(46))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Belum')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4">51-55 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(55))
                        ->where('tgl_lahir', '<', now()->subYears(51))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(55))
                        ->where('tgl_lahir', '<', now()->subYears(51))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(55))
                    ->where('tgl_lahir', '<', now()->subYears(51))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Belum')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4">56-60 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(60))
                        ->where('tgl_lahir', '<', now()->subYears(56))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(60))
                        ->where('tgl_lahir', '<', now()->subYears(56))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(60))
                    ->where('tgl_lahir', '<', now()->subYears(56))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Belum')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4">> 61  </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '<', now()->subYears(60))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '<', now()->subYears(60))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '<', now()->subYears(60))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Belum')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4"><b> Putus Sekolah di Usia (th) </b></td>
                <td  align="center"><b>Laki-laki</b></td>
                <td  align="center"><b>Perempuan</b></td>
                <td  align="center"><b>Total</b></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="4">7-15 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(15))
                        ->where('tgl_lahir', '<', now()->subYears(7))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Tidak')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(15))
                        ->where('tgl_lahir', '<', now()->subYears(7))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Tidak')
                  ->count() }}
                </td>
                <td align="center" x-data="{ dtl: false }">
                    <div @click="dtl=!dtl" >
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(15))
                    ->where('tgl_lahir', '<', now()->subYears(7))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Tidak')
                  ->count() }}
                    </div>
                    @can('ePdrt')                 
                  @forelse($warga->keluarga
                  ->where('tgl_lahir', '>', now()->subYears(15))
                  ->where('tgl_lahir', '<', now()->subYears(7))
                  ->where('pendidikan', '!=', '-')
                  ->where('lulus', '=', 'Tidak') as $a)
                  <div  x-show="dtl">{{$a->nama.'-'.$a->pendidikan  }}</div>
                  @empty @endforelse @endcan
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">15-20 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(20))
                        ->where('tgl_lahir', '<', now()->subYears(15))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Tidak')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(20))
                        ->where('tgl_lahir', '<', now()->subYears(15))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Tidak')
                  ->count() }}
                </td>
                <td align="center" x-data="{buka: false}">
                   <div @click="buka=!buka">
                       {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(20))
                    ->where('tgl_lahir', '<', now()->subYears(15))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Tidak')
                  ->count() }}</div>
                  @can('ePdrt')  
                  @forelse($warga->keluarga
                  ->where('tgl_lahir', '>', now()->subYears(20))
                  ->where('tgl_lahir', '<', now()->subYears(15))
                  ->where('pendidikan', '!=', '-')
                  ->where('lulus', '=', 'Tidak') as $a)
                  <div  x-show="buka">{{$a->nama.'-'.$a->pendidikan  }}</div>
                  @empty @endforelse @endcan
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">20-25 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(25))
                        ->where('tgl_lahir', '<', now()->subYears(20))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Tidak')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(25))
                        ->where('tgl_lahir', '<', now()->subYears(20))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Tidak')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(25))
                    ->where('tgl_lahir', '<', now()->subYears(20))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Tidak')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">25-30 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(30))
                        ->where('tgl_lahir', '<', now()->subYears(25))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Tidak')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(30))
                        ->where('tgl_lahir', '<', now()->subYears(25))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Tidak')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(30))
                    ->where('tgl_lahir', '<', now()->subYears(25))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Tidak')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">30-35 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(35))
                        ->where('tgl_lahir', '<', now()->subYears(30))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Tidak')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(35))
                        ->where('tgl_lahir', '<', now()->subYears(30))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Tidak')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(35))
                    ->where('tgl_lahir', '<', now()->subYears(30))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Tidak')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">35-40 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(40))
                        ->where('tgl_lahir', '<', now()->subYears(35))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Tidak')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(40))
                        ->where('tgl_lahir', '<', now()->subYears(35))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Tidak')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(40))
                    ->where('tgl_lahir', '<', now()->subYears(35))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Tidak')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">40-45 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(45))
                        ->where('tgl_lahir', '<', now()->subYears(40))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Tidak')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(45))
                        ->where('tgl_lahir', '<', now()->subYears(40))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Tidak')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(45))
                    ->where('tgl_lahir', '<', now()->subYears(40))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Tidak')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">45-50 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(50))
                        ->where('tgl_lahir', '<', now()->subYears(45))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Tidak')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(50))
                        ->where('tgl_lahir', '<', now()->subYears(45))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Tidak')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(50))
                    ->where('tgl_lahir', '<', now()->subYears(45))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Tidak')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">50-55 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(55))
                        ->where('tgl_lahir', '<', now()->subYears(50))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Tidak')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(55))
                        ->where('tgl_lahir', '<', now()->subYears(50))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Tidak')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(55))
                    ->where('tgl_lahir', '<', now()->subYears(50))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Tidak')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">55-60 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(60))
                        ->where('tgl_lahir', '<', now()->subYears(55))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Tidak')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(60))
                        ->where('tgl_lahir', '<', now()->subYears(55))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Tidak')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(60))
                    ->where('tgl_lahir', '<', now()->subYears(55))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Tidak')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">60 < </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '<', now()->subYears(60))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Tidak')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '<', now()->subYears(60))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Tidak')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '<', now()->subYears(60))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Tidak')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4"><b> Tamatan </b></td>
                <td  align="center"><b>Laki-laki</b></td>
                <td  align="center"><b>Perempuan</b></td>
                <td  align="center"><b>Total</b></td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">SD</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '<', now()->subYears(11))
                        ->where('pendidikan', '=', 'SD')
                        ->where('lulus', '=', 'Lulus')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '<', now()->subYears(11))
                        ->where('pendidikan', '=', 'SD')
                        ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center" x-data="{ dtl: false }">
                    <div @click="dtl=!dtl" >
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '<', now()->subYears(11))
                    ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                    </div>
                    @can('ePdrt')    
                  @forelse($warga->keluarga
                  ->where('tgl_lahir', '<', now()->subYears(11))
                  ->where('pendidikan', '=', 'SD')
                  ->where('lulus', '=', 'Lulus') as $a)
                  <div  x-show="dtl">{{$a->nama  }}</div>
                  @empty @endforelse
                  @endcan 
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">SMP</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '<', now()->subYears(14))
                        ->where('pendidikan', '=', 'SMP')
                        ->where('lulus', '=', 'Lulus')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '<', now()->subYears(14))
                        ->where('pendidikan', '=', 'SMP')
                        ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center" x-data="{ dtl: false }">
                    <div @click="dtl=!dtl" >
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '<', now()->subYears(14))
                    ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                    </div>
                    @can('ePdrt')   
                  @forelse($warga->keluarga
                  ->where('tgl_lahir', '<', now()->subYears(14))
                  ->where('pendidikan', '=', 'SMP')
                  ->where('lulus', '=', 'Lulus') as $a)
                  <div  x-show="dtl">{{$a->nama  }}</div>
                  @empty @endforelse 
                  @endcan 
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">SMA</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '<', now()->subYears(17))
                        ->where('pendidikan', '=', 'SMA')
                        ->where('lulus', '=', 'Lulus')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '<', now()->subYears(17))
                        ->where('pendidikan', '=', 'SMA')
                        ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center" x-data="{ dtl: false }">
                    <div @click="dtl=!dtl" >
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '<', now()->subYears(17))
                    ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                    </div>
                    @can('ePdrt')   
                  @forelse($warga->keluarga
                  ->where('tgl_lahir', '<', now()->subYears(17))
                  ->where('pendidikan', '=', 'SMA')
                  ->where('lulus', '=', 'Lulus') as $a)
                  <div  x-show="dtl">{{$a->nama  }}</div>
                  @empty @endforelse @endcan 
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">PT (D1-S3)</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '<', now()->subYears(18))
                        ->where('pendidikan', '=', 'PT')
                        ->where('lulus', '=', 'Lulus')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '<', now()->subYears(18))
                        ->where('pendidikan', '=', 'PT')
                        ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center" x-data="{ dtl: false }">
                    <div @click="dtl=!dtl" >
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '<', now()->subYears(18))
                    ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                    </div>
                    @can('ePdrt')  
                  @forelse($warga->keluarga
                  ->where('tgl_lahir', '<', now()->subYears(18))
                  ->where('pendidikan', '=', 'PT')
                  ->where('lulus', '=', 'Lulus') as $a)
                  <div  x-show="dtl">{{$a->nama  }}</div>
                  @empty @endforelse  @endcan 
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Tidak Sekolah (Usia min 7)</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '<', now()->subYears(7))
                        ->where('pendidikan', '=', '-')
                        ->where('lulus', '=', '-')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '<', now()->subYears(7))
                        ->where('pendidikan', '=', '-')
                        ->where('lulus', '=', '-')
                  ->count() }}
                </td>
                <td align="center" x-data="{ dtl: false }">
                    <div @click="dtl=!dtl" >
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '<', now()->subYears(7))
                    ->where('pendidikan', '=', '-')
                    ->where('lulus', '=', '-')
                  ->count() }}
                    </div>
                    @can('ePdrt')  
                  @forelse($warga->keluarga
                  ->where('tgl_lahir', '<', now()->subYears(7))
                  ->where('pendidikan', '=', '-')
                  ->where('lulus', '=', '-') as $a)
                  <div  x-show="dtl">{{$a->nama  }}</div>
                  @empty @endforelse  @endcan
                </td>
            </tr>
            <tr>
                <td colspan="8"><br/>
                    <h5><b>C. Mata Pencaharian Pokok</b></h5>
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4"><b> Jenis </b></td>
                <td  align="center"><b>Laki-laki</b></td>
                <td  align="center"><b>Perempuan</b></td>
                <td  align="center"><b>Total</b></td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Dosen </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('pekerjaan', '=', 'Dosen')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('pekerjaan', '=', 'Dosen')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Dosen')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Ibu Rumah Tangga</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('pekerjaan', '=', 'Ibu Rumah Tangga')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('pekerjaan', '=', 'Ibu Rumah Tangga')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Ibu Rumah Tangga')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Pelajar</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('pekerjaan', '=', 'Pelajar')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('pekerjaan', '=', 'Pelajar')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Pelajar')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Belum/tidak bekerja</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('pekerjaan', '=', 'Belum/tidak bekerja')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('pekerjaan', '=', 'Belum/tidak bekerja')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Belum/tidak bekerja')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Pedagang</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('pekerjaan', '=', 'Pedagang')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('pekerjaan', '=', 'Pedagang')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Pedagang')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Wiraswasta</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('pekerjaan', '=', 'Wiraswasta')
                        ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('pekerjaan', '=', 'Wiraswasta')
                        ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Wiraswasta')
                    ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">BUMN</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('pekerjaan', '=', 'BUMN')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('pekerjaan', '=', 'BUMN')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'BUMN')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Karyawan BUMD </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('pekerjaan', '=', 'Karyawan BUMD')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('pekerjaan', '=', 'Karyawan BUMD')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Karyawan BUMD')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Petani/Peternak </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('pekerjaan', '=', 'Petani/Peternak')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('pekerjaan', '=', 'Petani/Peternak')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Petani/Peternak')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Buruh Tani </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('pekerjaan', '=', 'Buruh Tani')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('pekerjaan', '=', 'Buruh Tani')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Buruh Tani')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Montir </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('pekerjaan', '=', 'Montir')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('pekerjaan', '=', 'Montir')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Montir')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Pengacara </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('pekerjaan', '=', 'Pengacara')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('pekerjaan', '=', 'Pengacara')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Pengacara')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">PRT </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('pekerjaan', '=', 'PRT')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('pekerjaan', '=', 'PRT')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'PRT')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">THL</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('pekerjaan', '=', 'THL')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('pekerjaan', '=', 'THL')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'THL')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">PNS</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('pekerjaan', '=', 'PNS')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('pekerjaan', '=', 'PNS')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'PNS')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">TNI</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('pekerjaan', '=', 'TNI')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('pekerjaan', '=', 'TNI')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'TNI')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">POLRI</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('pekerjaan', '=', 'POLRI')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('pekerjaan', '=', 'POLRI')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'POLRI')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Bidan</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('pekerjaan', '=', 'Bidan')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('pekerjaan', '=', 'Bidan')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Bidan')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Pensiunan</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('pekerjaan', '=', 'Pensiunan')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('pekerjaan', '=', 'Pensiunan')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Pensiunan')
                  ->count() }}     
                </td>
            </tr>
            {{-- Pekerjaan Tukang Parkir --}}
            <tr>
                <td ></td>
                <td  colspan="4">Tukang Parkir</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('pekerjaan', '=', 'Tukang Parkir')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('pekerjaan', '=', 'Tukang Parkir')
                ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Tukang Parkir')
                ->count() }}     
                </td>
            </tr>
            {{-- End --}}
            {{-- ----------------------------------------------------------------------- --}}
            {{-- Pekerjaan Sopir --}}
            <tr>
                <td ></td>
                <td  colspan="4">Sopir</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('pekerjaan', '=', 'Sopir')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('pekerjaan', '=', 'Sopir')
                ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Sopir')
                ->count() }}     
                </td>
            </tr>
            {{-- End --}}
{{-- ----------------------------------------------------------------------- --}}
            {{-- Pekerjaan Satpam --}}
            <tr>
                <td ></td>
                <td  colspan="4">Satpam</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('pekerjaan', '=', 'Satpam')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('pekerjaan', '=', 'Satpam')
                ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Satpam')
                ->count() }}     
                </td>
            </tr>
            {{-- End --}}




            <tr>
                <td ></td>
                <td  colspan="4">Lainnya</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('pekerjaan', '=', 'Lainnya')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('pekerjaan', '=', 'Lainnya')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Lainnya')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td colspan="8"><br/>
                    <h5><b>D. Agama/Aliran Kepercayaan</b></h5>
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4"><b> Nama </b></td>
                <td  align="center"><b>Laki-laki</b></td>
                <td  align="center"><b>Perempuan</b></td>
                <td  align="center"><b>Total</b></td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Islam</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('agama', '=', 'Islam')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('agama', '=', 'Islam')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('agama', '=', 'Islam')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Kristen</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('agama', '=', 'Kristen')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('agama', '=', 'Kristen')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('agama', '=', 'Kristen')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Katholik</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('agama', '=', 'Katholik')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('agama', '=', 'Katholik')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('agama', '=', 'Katholik')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Hindu</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('agama', '=', 'Hindu')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('agama', '=', 'Hindu')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('agama', '=', 'Hindu')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Budha</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('agama', '=', 'Budha')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('agama', '=', 'Budha')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('agama', '=', 'Budha')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Konghuchu</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('agama', '=', 'Konghuchu')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('agama', '=', 'Konghuchu')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('agama', '=', 'Konghuchu')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Aliran Kepercayaan</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('agama', '=', 'Aliran Kepercayaan')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('agama', '=', 'Aliran Kepercayaan')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('agama', '=', 'Aliran Kepercayaan')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td colspan="8"><br/>
                    <h5><b>E. Kewarganegaraan</b></h5>
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4"><b> Warga Negara </b></td>
                <td  align="center"><b>Laki-laki</b></td>
                <td  align="center"><b>Perempuan</b></td>
                <td  align="center"><b>Total</b></td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">WNI</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('warneg', '=', 'WNI')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('warneg', '=', 'WNI')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('warneg', '=', 'WNI')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">WNA</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('warneg', '=', 'WNA')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('warneg', '=', 'WNA')
                  ->count() }}
                </td>
                <td align="center" >
                    {{ $warga->keluarga
                    ->where('warneg', '=', 'WNA')
                  ->count() }}     
                </td>
            </tr>
            <tr>
                <td colspan="8"><br/>
                    <h5><b>F. Disabilitas</b></h5>
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4"><b> Jenis </b></td>
                <td  align="center"><b>Laki-laki</b></td>
                <td  align="center"><b>Perempuan</b></td>
                <td  align="center"><b>Total</b></td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Tunarungu</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('disabilitas', '=', 'Tunarungu')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('disabilitas', '=', 'Tunarungu')
                  ->count() }}
                </td>
                <td align="center" x-data="{dsb:false}">
                    <div @click="dsb=!dsb">
                    {{ $warga->keluarga
                    ->where('disabilitas', '=', 'Tunarungu')
                  ->count() }}     
                  </div>
                  @can('ePdrt')
                  @forelse($warga->keluarga
  ->where('disabilitas', '=', 'Tunarungu') as $a)
  <div  x-show="dsb">{{$a->nama  }}</div>
  @empty @endforelse  @endcan
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Tunanetra</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('disabilitas', '=', 'Tunanetra')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('disabilitas', '=', 'Tunanetra')
                  ->count() }}
                </td>
                <td align="center" x-data="{dsb:false}">
                    <div @click="dsb=!dsb">
                    {{ $warga->keluarga
                    ->where('disabilitas', '=', 'Tunanetra')
                  ->count() }}     
                  </div>
                  @can('ePdrt')
                  @forelse($warga->keluarga
  ->where('disabilitas', '=', 'Tunanetra') as $a)
  <div  x-show="dsb">{{$a->nama  }}</div>
  @empty @endforelse  @endcan
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Disabilitas Ganda</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('disabilitas', '=', 'Disabilitas Ganda')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('disabilitas', '=', 'Disabilitas Ganda')
                  ->count() }}
                </td>
                <td align="center" x-data="{dsb:false}">
                    <div @click="dsb=!dsb">
                    {{ $warga->keluarga
                    ->where('disabilitas', '=', 'Disabilitas Ganda')
                  ->count() }}     
                  </div>
                  @can('ePdrt')
                  @forelse($warga->keluarga
  ->where('disabilitas', '=', 'Disabilitas Ganda') as $a)
  <div  x-show="dsb">{{$a->nama  }}</div>
  @empty @endforelse  @endcan
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Tunawicara</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('disabilitas', '=', 'Tunawicara')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('disabilitas', '=', 'Tunawicara')
                  ->count() }}
                </td>
                <td align="center" x-data="{dsb:false}">
                    <div @click="dsb=!dsb">
                    {{ $warga->keluarga
                    ->where('disabilitas', '=', 'Tunawicara')
                  ->count() }}     
                  </div>
                  @can('ePdrt')
                  @forelse($warga->keluarga
  ->where('disabilitas', '=', 'Tunawicara') as $a)
  <div  x-show="dsb">{{$a->nama  }}</div>
  @empty @endforelse  @endcan
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Lumpuh</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('disabilitas', '=', 'Lumpuh')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('disabilitas', '=', 'Lumpuh')
                  ->count() }}
                </td>
                <td align="center" x-data="{dsb:false}">
                    <div @click="dsb=!dsb"> {{ $warga->keluarga
                    ->where('disabilitas', '=', 'Lumpuh')
                  ->count() }}  
                </div>
                @can('ePdrt')
                  @forelse($warga->keluarga
                  ->where('disabilitas', '=', 'Lumpuh') as $a)
                  <div  x-show="dsb">{{$a->nama  }}</div>
                  @empty @endforelse  @endcan  
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Bibir Sumbing</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('disabilitas', '=', 'Bibir Sumbing')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('disabilitas', '=', 'Bibir Sumbing')
                  ->count() }}
                </td>
                <td align="center" x-data="{dsb:false}">
                    <div @click="dsb=!dsb"> {{ $warga->keluarga
                    ->where('disabilitas', '=', 'Bibir Sumbing')
                  ->count() }} 
                </div>
                @can('ePdrt')  
                  @forelse($warga->keluarga
                  ->where('disabilitas', '=', 'Bibir Sumbing') as $a)
                  <div  x-show="dsb">{{$a->nama  }}</div>
                  @empty @endforelse @endcan 
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Tunadaksa</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('disabilitas', '=', 'Tunadaksa')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('disabilitas', '=', 'Tunadaksa')
                  ->count() }}
                </td>
                <td align="center" x-data="{dsb:false}">
                    <div @click="dsb=!dsb"> {{ $warga->keluarga
                    ->where('disabilitas', '=', 'Tunadaksa')
                  ->count() }}  
                </div>
                  @can('ePdrt')  
                  @forelse($warga->keluarga
                  ->where('disabilitas', '=', 'Tunadaksa') as $a)
                  <div  x-show="dsb">{{$a->nama  }}</div>
                  @empty @endforelse
                  @endcan 
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Keterbelakangan Mental</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('disabilitas', '=', 'Keterbelakangan Mental')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('disabilitas', '=', 'Keterbelakangan Mental')
                  ->count() }}
                </td>
                <td align="center" x-data="{dsb:false}">
                    <div @click="dsb=!dsb"> {{ $warga->keluarga
                    ->where('disabilitas', '=', 'Keterbelakangan Mental')
                  ->count() }} 
                </div>
                  @can('ePdrt')    
                  @forelse($warga->keluarga
                  ->where('disabilitas', '=', 'Keterbelakangan Mental') as $a)
                  <div  x-show="dsb">{{$a->nama  }}</div>
                  @empty @endforelse
                  @endcan
                </td>
            </tr>
            <tr>
                <td colspan="8"><br/>
                    <h5><b>G. Tenaga Kerja</b></h5>
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4"><b> Penduduk Usia Kerja </b></td>
                <td  align="center"><b>Laki-laki</b></td>
                <td  align="center"><b>Perempuan</b></td>
                <td  align="center"><b>Total</b></td>
            </tr>            
            <tr>
                <td ></td>
                <td  colspan="4">15-20 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(20))
                        ->where('tgl_lahir', '<', now()->subYears(15))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(20))
                        ->where('tgl_lahir', '<', now()->subYears(15))
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(20))
                    ->where('tgl_lahir', '<', now()->subYears(15))
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">20-25 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(25))
                        ->where('tgl_lahir', '<', now()->subYears(20))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(25))
                        ->where('tgl_lahir', '<', now()->subYears(20))
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(25))
                    ->where('tgl_lahir', '<', now()->subYears(20))
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">25-30 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(30))
                        ->where('tgl_lahir', '<', now()->subYears(25))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(30))
                        ->where('tgl_lahir', '<', now()->subYears(25))
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(30))
                    ->where('tgl_lahir', '<', now()->subYears(25))
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">30-35 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(35))
                        ->where('tgl_lahir', '<', now()->subYears(30))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(35))
                        ->where('tgl_lahir', '<', now()->subYears(30))
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(35))
                    ->where('tgl_lahir', '<', now()->subYears(30))
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">35-40 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(40))
                        ->where('tgl_lahir', '<', now()->subYears(35))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(40))
                        ->where('tgl_lahir', '<', now()->subYears(35))
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(40))
                    ->where('tgl_lahir', '<', now()->subYears(35))
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">40-45 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(45))
                        ->where('tgl_lahir', '<', now()->subYears(40))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(45))
                        ->where('tgl_lahir', '<', now()->subYears(40))
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(45))
                    ->where('tgl_lahir', '<', now()->subYears(40))
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">45-50 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(50))
                        ->where('tgl_lahir', '<', now()->subYears(45))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(50))
                        ->where('tgl_lahir', '<', now()->subYears(45))
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(50))
                    ->where('tgl_lahir', '<', now()->subYears(45))
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">50-55 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(55))
                        ->where('tgl_lahir', '<', now()->subYears(50))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(55))
                        ->where('tgl_lahir', '<', now()->subYears(50))
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(55))
                    ->where('tgl_lahir', '<', now()->subYears(50))
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">55-60 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(60))
                        ->where('tgl_lahir', '<', now()->subYears(55))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(60))
                        ->where('tgl_lahir', '<', now()->subYears(55))
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(60))
                    ->where('tgl_lahir', '<', now()->subYears(55))
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">60< </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '<', now()->subYears(60))
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '<', now()->subYears(60))
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '<', now()->subYears(60))
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4"><b> Penduduk Belum/ Tidak Bekerja </b></td>
                <td  align="center"><b>Laki-laki</b></td>
                <td  align="center"><b>Perempuan</b></td>
                <td  align="center"><b>Total</b></td>
            </tr>            
            <tr>
                <td ></td>
                <td  colspan="4">15-20 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(20))
                        ->where('tgl_lahir', '<', now()->subYears(15))
                    ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(20))
                        ->where('tgl_lahir', '<', now()->subYears(15))
                  ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(20))
                    ->where('tgl_lahir', '<', now()->subYears(15))
                  ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">20-25 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(25))
                        ->where('tgl_lahir', '<', now()->subYears(20))
                    ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(25))
                        ->where('tgl_lahir', '<', now()->subYears(20))
                  ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(25))
                    ->where('tgl_lahir', '<', now()->subYears(20))
                  ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">25-30 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(30))
                        ->where('tgl_lahir', '<', now()->subYears(25))
                    ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(30))
                        ->where('tgl_lahir', '<', now()->subYears(25))
                  ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(30))
                    ->where('tgl_lahir', '<', now()->subYears(25))
                  ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">30-35 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(35))
                        ->where('tgl_lahir', '<', now()->subYears(30))
                    ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(35))
                        ->where('tgl_lahir', '<', now()->subYears(30))
                  ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(35))
                    ->where('tgl_lahir', '<', now()->subYears(30))
                  ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">35-40 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(40))
                        ->where('tgl_lahir', '<', now()->subYears(35))
                    ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(40))
                        ->where('tgl_lahir', '<', now()->subYears(35))
                  ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(40))
                    ->where('tgl_lahir', '<', now()->subYears(35))
                  ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">40-45 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(45))
                        ->where('tgl_lahir', '<', now()->subYears(40))
                    ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(45))
                        ->where('tgl_lahir', '<', now()->subYears(40))
                  ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(45))
                    ->where('tgl_lahir', '<', now()->subYears(40))
                  ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">45-50 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(50))
                        ->where('tgl_lahir', '<', now()->subYears(45))
                    ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(50))
                        ->where('tgl_lahir', '<', now()->subYears(45))
                  ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(50))
                    ->where('tgl_lahir', '<', now()->subYears(45))
                  ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">50-55 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(55))
                        ->where('tgl_lahir', '<', now()->subYears(50))
                    ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(55))
                        ->where('tgl_lahir', '<', now()->subYears(50))
                  ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(55))
                    ->where('tgl_lahir', '<', now()->subYears(50))
                  ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">55-60 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(60))
                        ->where('tgl_lahir', '<', now()->subYears(55))
                    ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(60))
                        ->where('tgl_lahir', '<', now()->subYears(55))
                  ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(60))
                    ->where('tgl_lahir', '<', now()->subYears(55))
                  ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">60< </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '<', now()->subYears(60))
                    ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '<', now()->subYears(60))
                  ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '<', now()->subYears(60))
                  ->where('pekerjaan', '=', '-')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td colspan="8"><br/>
                    <h5><b>H. Kualitas Penduduk dari Segi Pendidikan</b></h5>
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4"><b> Tamatan SD, Usia(th) </b></td>
                <td  align="center"><b>Laki-laki</b></td>
                <td  align="center"><b>Perempuan</b></td>
                <td  align="center"><b>Total</b></td>
            </tr>            
            <tr>
                <td ></td>
                <td  colspan="4">15-20 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(20))
                        ->where('tgl_lahir', '<', now()->subYears(15))
                    ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(20))
                        ->where('tgl_lahir', '<', now()->subYears(15))
                 ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(20))
                    ->where('tgl_lahir', '<', now()->subYears(15))
                 ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">20-25 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(25))
                        ->where('tgl_lahir', '<', now()->subYears(20))
                   ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(25))
                        ->where('tgl_lahir', '<', now()->subYears(20))
                 ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(25))
                    ->where('tgl_lahir', '<', now()->subYears(20))
                 ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">25-30 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(30))
                        ->where('tgl_lahir', '<', now()->subYears(25))
                   ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(30))
                        ->where('tgl_lahir', '<', now()->subYears(25))
                 ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(30))
                    ->where('tgl_lahir', '<', now()->subYears(25))
                 ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">30-35 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(35))
                        ->where('tgl_lahir', '<', now()->subYears(30))
                   ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(35))
                        ->where('tgl_lahir', '<', now()->subYears(30))
                 ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(35))
                    ->where('tgl_lahir', '<', now()->subYears(30))
                 ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">35-40 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(40))
                        ->where('tgl_lahir', '<', now()->subYears(35))
                   ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(40))
                        ->where('tgl_lahir', '<', now()->subYears(35))
                 ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(40))
                    ->where('tgl_lahir', '<', now()->subYears(35))
                 ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">40-45 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(45))
                        ->where('tgl_lahir', '<', now()->subYears(40))
                   ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(45))
                        ->where('tgl_lahir', '<', now()->subYears(40))
                 ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(45))
                    ->where('tgl_lahir', '<', now()->subYears(40))
                 ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">45-50 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(50))
                        ->where('tgl_lahir', '<', now()->subYears(45))
                   ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(50))
                        ->where('tgl_lahir', '<', now()->subYears(45))
                 ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(50))
                    ->where('tgl_lahir', '<', now()->subYears(45))
                 ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">50-55 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(55))
                        ->where('tgl_lahir', '<', now()->subYears(50))
                   ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(55))
                        ->where('tgl_lahir', '<', now()->subYears(50))
                 ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(55))
                    ->where('tgl_lahir', '<', now()->subYears(50))
                 ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">55-60 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(60))
                        ->where('tgl_lahir', '<', now()->subYears(55))
                   ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(60))
                        ->where('tgl_lahir', '<', now()->subYears(55))
                 ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(60))
                    ->where('tgl_lahir', '<', now()->subYears(55))
                 ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">60< </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '<', now()->subYears(60))
                   ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '<', now()->subYears(60))
                 ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '<', now()->subYears(60))
                 ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4"><b> Tamatan SMP, Usia(th) </b></td>
                <td  align="center"><b>Laki-laki</b></td>
                <td  align="center"><b>Perempuan</b></td>
                <td  align="center"><b>Total</b></td>
            </tr>            
            <tr>
                <td ></td>
                <td  colspan="4">15-20 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(20))
                        ->where('tgl_lahir', '<', now()->subYears(15))
                    ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(20))
                        ->where('tgl_lahir', '<', now()->subYears(15))
                 ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(20))
                    ->where('tgl_lahir', '<', now()->subYears(15))
                 ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">20-25 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(25))
                        ->where('tgl_lahir', '<', now()->subYears(20))
                   ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(25))
                        ->where('tgl_lahir', '<', now()->subYears(20))
                 ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(25))
                    ->where('tgl_lahir', '<', now()->subYears(20))
                 ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">25-30 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(30))
                        ->where('tgl_lahir', '<', now()->subYears(25))
                   ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(30))
                        ->where('tgl_lahir', '<', now()->subYears(25))
                 ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(30))
                    ->where('tgl_lahir', '<', now()->subYears(25))
                 ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">30-35 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(35))
                        ->where('tgl_lahir', '<', now()->subYears(30))
                   ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(35))
                        ->where('tgl_lahir', '<', now()->subYears(30))
                 ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(35))
                    ->where('tgl_lahir', '<', now()->subYears(30))
                 ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">35-40 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(40))
                        ->where('tgl_lahir', '<', now()->subYears(35))
                   ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(40))
                        ->where('tgl_lahir', '<', now()->subYears(35))
                 ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(40))
                    ->where('tgl_lahir', '<', now()->subYears(35))
                 ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">40-45 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(45))
                        ->where('tgl_lahir', '<', now()->subYears(40))
                   ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(45))
                        ->where('tgl_lahir', '<', now()->subYears(40))
                 ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(45))
                    ->where('tgl_lahir', '<', now()->subYears(40))
                 ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">45-50 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(50))
                        ->where('tgl_lahir', '<', now()->subYears(45))
                   ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(50))
                        ->where('tgl_lahir', '<', now()->subYears(45))
                 ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(50))
                    ->where('tgl_lahir', '<', now()->subYears(45))
                 ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">50-55 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(55))
                        ->where('tgl_lahir', '<', now()->subYears(50))
                   ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(55))
                        ->where('tgl_lahir', '<', now()->subYears(50))
                 ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(55))
                    ->where('tgl_lahir', '<', now()->subYears(50))
                 ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">55-60 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(60))
                        ->where('tgl_lahir', '<', now()->subYears(55))
                   ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(60))
                        ->where('tgl_lahir', '<', now()->subYears(55))
                 ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(60))
                    ->where('tgl_lahir', '<', now()->subYears(55))
                 ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">60< </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '<', now()->subYears(60))
                   ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '<', now()->subYears(60))
                 ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '<', now()->subYears(60))
                 ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4"><b> Tamatan SMA, Usia(th) </b></td>
                <td  align="center"><b>Laki-laki</b></td>
                <td  align="center"><b>Perempuan</b></td>
                <td  align="center"><b>Total</b></td>
            </tr>            
            <tr>
                <td ></td>
                <td  colspan="4">15-20 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(20))
                        ->where('tgl_lahir', '<', now()->subYears(15))
                    ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(20))
                        ->where('tgl_lahir', '<', now()->subYears(15))
                 ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(20))
                    ->where('tgl_lahir', '<', now()->subYears(15))
                 ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">20-25 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(25))
                        ->where('tgl_lahir', '<', now()->subYears(20))
                   ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(25))
                        ->where('tgl_lahir', '<', now()->subYears(20))
                 ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(25))
                    ->where('tgl_lahir', '<', now()->subYears(20))
                 ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">25-30 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(30))
                        ->where('tgl_lahir', '<', now()->subYears(25))
                   ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(30))
                        ->where('tgl_lahir', '<', now()->subYears(25))
                 ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(30))
                    ->where('tgl_lahir', '<', now()->subYears(25))
                 ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">30-35 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(35))
                        ->where('tgl_lahir', '<', now()->subYears(30))
                   ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(35))
                        ->where('tgl_lahir', '<', now()->subYears(30))
                 ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(35))
                    ->where('tgl_lahir', '<', now()->subYears(30))
                 ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">35-40 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(40))
                        ->where('tgl_lahir', '<', now()->subYears(35))
                   ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(40))
                        ->where('tgl_lahir', '<', now()->subYears(35))
                 ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(40))
                    ->where('tgl_lahir', '<', now()->subYears(35))
                 ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">40-45 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(45))
                        ->where('tgl_lahir', '<', now()->subYears(40))
                   ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(45))
                        ->where('tgl_lahir', '<', now()->subYears(40))
                 ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(45))
                    ->where('tgl_lahir', '<', now()->subYears(40))
                 ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">45-50 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(50))
                        ->where('tgl_lahir', '<', now()->subYears(45))
                   ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(50))
                        ->where('tgl_lahir', '<', now()->subYears(45))
                 ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(50))
                    ->where('tgl_lahir', '<', now()->subYears(45))
                 ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">50-55 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(55))
                        ->where('tgl_lahir', '<', now()->subYears(50))
                   ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(55))
                        ->where('tgl_lahir', '<', now()->subYears(50))
                 ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(55))
                    ->where('tgl_lahir', '<', now()->subYears(50))
                 ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">55-60 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(60))
                        ->where('tgl_lahir', '<', now()->subYears(55))
                   ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(60))
                        ->where('tgl_lahir', '<', now()->subYears(55))
                 ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(60))
                    ->where('tgl_lahir', '<', now()->subYears(55))
                 ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">60< </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '<', now()->subYears(60))
                   ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '<', now()->subYears(60))
                 ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '<', now()->subYears(60))
                 ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4"><b> Tamatan PT, Usia(th) </b></td>
                <td  align="center"><b>Laki-laki</b></td>
                <td  align="center"><b>Perempuan</b></td>
                <td  align="center"><b>Total</b></td>
            </tr>            
            <tr>
                <td ></td>
                <td  colspan="4">15-20 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(20))
                        ->where('tgl_lahir', '<', now()->subYears(15))
                    ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(20))
                        ->where('tgl_lahir', '<', now()->subYears(15))
                 ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(20))
                    ->where('tgl_lahir', '<', now()->subYears(15))
                 ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">20-25 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(25))
                        ->where('tgl_lahir', '<', now()->subYears(20))
                   ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(25))
                        ->where('tgl_lahir', '<', now()->subYears(20))
                 ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(25))
                    ->where('tgl_lahir', '<', now()->subYears(20))
                 ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">25-30 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(30))
                        ->where('tgl_lahir', '<', now()->subYears(25))
                   ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(30))
                        ->where('tgl_lahir', '<', now()->subYears(25))
                 ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(30))
                    ->where('tgl_lahir', '<', now()->subYears(25))
                 ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">30-35 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(35))
                        ->where('tgl_lahir', '<', now()->subYears(30))
                   ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(35))
                        ->where('tgl_lahir', '<', now()->subYears(30))
                 ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(35))
                    ->where('tgl_lahir', '<', now()->subYears(30))
                 ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">35-40 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(40))
                        ->where('tgl_lahir', '<', now()->subYears(35))
                   ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(40))
                        ->where('tgl_lahir', '<', now()->subYears(35))
                 ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(40))
                    ->where('tgl_lahir', '<', now()->subYears(35))
                 ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">40-45 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(45))
                        ->where('tgl_lahir', '<', now()->subYears(40))
                   ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(45))
                        ->where('tgl_lahir', '<', now()->subYears(40))
                 ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(45))
                    ->where('tgl_lahir', '<', now()->subYears(40))
                 ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">45-50 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(50))
                        ->where('tgl_lahir', '<', now()->subYears(45))
                   ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(50))
                        ->where('tgl_lahir', '<', now()->subYears(45))
                 ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(50))
                    ->where('tgl_lahir', '<', now()->subYears(45))
                 ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">50-55 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(55))
                        ->where('tgl_lahir', '<', now()->subYears(50))
                   ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(55))
                        ->where('tgl_lahir', '<', now()->subYears(50))
                 ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(55))
                    ->where('tgl_lahir', '<', now()->subYears(50))
                 ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">55-60 </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(60))
                        ->where('tgl_lahir', '<', now()->subYears(55))
                   ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(60))
                        ->where('tgl_lahir', '<', now()->subYears(55))
                 ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(60))
                    ->where('tgl_lahir', '<', now()->subYears(55))
                 ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">60< </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '<', now()->subYears(60))
                   ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '<', now()->subYears(60))
                 ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '<', now()->subYears(60))
                 ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4"><b> Tamatan </b></td>
                <td  align="center"><b>Laki-laki</b></td>
                <td  align="center"><b>Perempuan</b></td>
                <td  align="center"><b>Total</b></td>
            </tr>
            
            <tr>
                <td ></td>
                <td  colspan="4">Tidak Tamat Sekolah (Usia 15-60)</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '<', now()->subYears(15))
                        ->where('pendidikan','!=', '-')
                        ->where('lulus', '=', 'Tidak')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '<', now()->subYears(15))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Tidak')
                  ->count() }}
                </td>
                <td align="center" x-data="{ dtl: false }">
                    <div @click="dtl=!dtl" >
                    {{ $warga->keluarga
                    ->where('tgl_lahir', '<', now()->subYears(15))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Tidak')
                  ->count() }}
                </div>                    
                @can('ePdrt')
                  @forelse($warga->keluarga
                  ->where('tgl_lahir', '<', now()->subYears(15))
                  ->where('pendidikan', '!=', '-')
                  ->where('lulus', '=', 'Tidak') as $a)
                  <div  x-show="dtl">{{$a->nama  }}</div>
                  @empty @endforelse
                  @endcan
                </td>
            </tr>
            <tr>
                <td colspan="8"><br/>
                    <h5><b>I. Kesehatan</b></h5>
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4"><b> Kondisi </b></td>
                <td  align="center"><b>Laki-laki</b></td>
                <td  align="center"><b>Perempuan</b></td>
                <td  align="center"><b>Total</b></td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Gizi Buruk/ Stunting</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('stunting', '=', 'Ya')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('stunting', '=', 'Ya')
                  ->count() }}
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                        {{ $warga->keluarga
                    ->where('stunting', '=', 'Ya')
                  ->count() }}  </div>   
                  @can('ePdrt') 
                  @forelse($warga->keluarga
                  ->where('stunting', '=', 'Ya') as $a)
                  <div  x-show="dtl">{{$a->nama  }}</div>
                  @empty @endforelse
                   @endcan
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Belum Memiliki Jamkes</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('jamkes', '=', 'Belum')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('jamkes', '=', 'Belum')
                  ->count() }}
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                        {{ $warga->keluarga
                    ->where('jamkes', '=', 'Belum')
                  ->count() }}  </div> 
                  @can('ePdrt')
                  @forelse($warga->keluarga
                  ->where('jamkes', '=', 'Belum') as $a)
                  <div  x-show="dtl">{{$a->nama  }}</div>
                  @empty @endforelse  @endcan  
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Orang dengan Gangguan Jiwa</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('gangguan_jiwa', '=', 'Ya')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('gangguan_jiwa', '=', 'Ya')
                  ->count() }}
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                        {{ $warga->keluarga
                    ->where('gangguan_jiwa', '=', 'Ya')
                  ->count() }}  </div>   
                  @can('ePdrt')
                  @forelse($warga->keluarga
                  ->where('gangguan_jiwa', '=', 'Ya') as $a)
                  <div  x-show="dtl">{{$a->nama  }}</div>
                  @empty @endforelse  @endcan
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Warga Belum Vaksin Covid</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('vaksin', '=', 'Belum')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('vaksin', '=', 'Belum')
                  ->count() }}
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                        {{ $warga->keluarga
                    ->where('vaksin', '=', 'Belum')
                  ->count() }}  </div>   
                  @can('ePdrt')
                  @forelse($warga->keluarga
                  ->where('vaksin', '=', 'Belum') as $a)
                  <div  x-show="dtl">{{$a->nama  }}</div>
                  @empty @endforelse  @endcan
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Warga Belum Imunisasi</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('imunisasi', '=', 'Belum')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('imunisasi', '=', 'Belum')
                  ->count() }}
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                        {{ $warga->keluarga
                    ->where('imunisasi', '=', 'Belum')
                  ->count() }}  </div>   
                  @can('ePdrt')
                  @forelse($warga->keluarga
                  ->where('imunisasi', '=', 'Belum') as $a)
                  <div  x-show="dtl">{{$a->nama  }}</div>
                  @empty @endforelse  @endcan
                </td>
            </tr>
            <tr>
                <td colspan="8"><br/>
                    <h5><b>J. Ekonomi</b></h5>
                </td>
            </tr>
            <tr> 
                <td ></td>
                <td  valign="middle" colspan="4"><b> Kondisi </b></td>
                <td colspan="3" align="center"><b>Jumlah</b></td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">KK (Penduduk Miskin)</td>
                <td colspan="3" align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                        {{ $warga->kk
                    ->where('ekonomi', '=', 'Tidak mampu')
                  ->count() }}  </div>   
                  @can('ePdrt')
                  @forelse($warga->kk
                  ->where('ekonomi', '=', 'Tidak mampu') as $a)
                  <div  x-show="dtl">{{$a->kk  }}</div>
                  @empty @endforelse  @endcan
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">KK Terdaftar DTKS</td>
                <td colspan="3" align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                        {{ $warga->kk
                    ->where('dtks', '=', 'Ya')
                  ->count() }}  </div> 
                  @can('ePdrt')  
                  @forelse($warga->kk
                  ->where('dtks', '=', 'Ya') as $a)
                  <div  x-show="dtl">{{$a->kk  }}</div>
                  @empty @endforelse  @endcan
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Warga Terdaftar DTKS</td>
                <td colspan="3" align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                        {{ $warga->keluarga
                    ->where('dtks', '=', 'Ya')
                  ->count() }}  </div>   
                  @can('ePdrt')
                  @forelse($warga->keluarga
                  ->where('dtks', '=', 'Ya') as $a)
                  <div  x-show="dtl">{{$a->nama  }}</div>
                  @empty @endforelse  @endcan
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">KK Rentan (Wanita sebagai Kepala Keluarga)</td>
                <td colspan="3" align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                        {{ $warga->keluarga
                    ->where('jk', '=', 'P')
                    ->where('posisi', '=', 'Kepala')
                  ->count() }}  </div>   
                  @can('ePdrt')
                  @forelse($warga->keluarga
                  ->where('jk', '=', 'P')
                  ->where('posisi', '=', 'Kepala') as $a)
                  <div  x-show="dtl">{{$a->nama  }}</div>
                  @empty @endforelse  @endcan
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4"><b>  </b></td>
                <td  align="center"><b>Laki-laki</b></td>
                <td  align="center"><b>Perempuan</b></td>
                <td  align="center"><b>Total</b></td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Lansia Miskin > 60 Terdaftar DTKS</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                    ->where('tgl_lahir', '>', now()->subYears(60))
                        ->where('dtks', '=', 'Ya')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                    ->where('tgl_lahir', '>', now()->subYears(60))
                        ->where('dtks', '=', 'Ya')
                  ->count() }}
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                        {{ $warga->keluarga
                    ->where('dtks', '=', 'Ya')
                    ->where('tgl_lahir', '>', now()->subYears(60))
                  ->count() }}  </div>   
                  @can('ePdrt')
                  @forelse($warga->kk
                  ->where('dtks', '=', 'Ya') as $a)
                  {{-- <div  x-show="dtl">{{$a->nama  }}</div> --}}
                  <div  x-show="dtl">{{$a->kk  }}</div>
                  @empty @endforelse  @endcan
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Lansia Miskin > 60 Tidak Terdaftar DTKS</td>
                <td align="center">
                    {{ $warga->keluarga
                    ->where('jk', '=', 'L')
                    ->where('tgl_lahir', '<', now()->subYears(60))
                    ->where('dtks', '=', 'Tidak')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                    ->where('tgl_lahir', '<', now()->subYears(60))
                        ->where('dtks', '=', 'Tidak')
                  ->count() }}
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                        {{ $warga->keluarga
                    ->where('dtks', '=', 'Tidak')
                    ->where('tgl_lahir', '<', now()->subYears(60))
                  ->count() }}  </div>   
                  @can('ePdrt')
                  @forelse($warga->keluarga
                  ->where('dtks', '=', 'Tidak') as $a)
                  <div  x-show="dtl">{{$a->nama  }}</div>
                  @empty @endforelse  @endcan
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Lansia Terlantar <br/>
                    (Tinggal sendiri, tanpa penghasilan dan tempat tinggal layak)</td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'L')
                    ->where('tgl_lahir', '<', now()->subYears(60))
                        ->where('terlantar', '=', 'Ya')
                    ->count() }}
                </td>
                <td align="center">
                    {{ $warga->keluarga->where('jk', '=', 'P')
                    ->where('tgl_lahir', '<', now()->subYears(60))
                        ->where('terlantar', '=', 'Ya')
                  ->count() }}
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                        {{ $warga->keluarga
                    ->where('terlantar', '=', 'Ya')
                    ->where('tgl_lahir', '<', now()->subYears(60))
                  ->count() }}  </div>   
                  @can('ePdrt')
                  @forelse($warga->keluarga
                  ->where('terlantar', '=', 'Ya') as $a)
                  <div  x-show="dtl">{{$a->nama  }}</div>
                  @empty @endforelse  @endcan
                </td>
            </tr>
            
            <tr>
                <td colspan="8"><br/>
                    <h5><b>K. UMKM</b></h5>
                </td>
            </tr>
            <tr> 
                <td ></td>
                <td  valign="middle"><b> Data </b></td>
                <td colspan="6" align="center"><b>Jumlah</b></td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">UMKM Terdaftar </td>
                <td colspan="6" align="center" x-data="{dtl: false}">
                    @if($warga->umkm)
                    <div @click="dtl=!dtl" >
                        {{ $warga->umkm
                    ->where('jenis', '=', 'UMKM')
                    ->where('terdaftar', '=', 'Y')
                  ->count() }}  </div>   
                  @can('ePdrt')
                  @forelse($warga->umkm
                  ->where('jenis', '=', 'UMKM')
                  ->where('terdaftar', '=', 'Y') as $a)
                  <div  x-show="dtl">{{$a->nama  }}</div>
                  @empty @endforelse  @endcan
                  @endif
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">UMKM Tidak Terdaftar </td>
                <td colspan="6" align="center" x-data="{dtl: false}">
                    @if($warga->umkm)
                    <div @click="dtl=!dtl" >
                        {{ $warga->umkm
                        ->where('jenis', '=', 'UMKM')
                    ->where('terdaftar', '=', 'T')
                  ->count() }}  </div>   
                  @can('ePdrt')
                  @forelse($warga->umkm
                  ->where('jenis', '=', 'UMKM')
                  ->where('terdaftar', '=', 'T') as $a)
                  <div  x-show="dtl">{{$a->nama  }}</div>
                  @empty @endforelse  @endcan
                  @endif
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">KUBE Terdaftar </td>
                <td colspan="6" align="center" x-data="{dtl: false}">
                    @if($warga->umkm)
                    <div @click="dtl=!dtl" >
                        {{ $warga->umkm
                    ->where('jenis', '=', 'KUBE')
                    ->where('terdaftar', '=', 'Y')
                  ->count() }}  </div>   
                  @can('ePdrt')
                  @forelse($warga->umkm
                  ->where('jenis', '=', 'KUBE')
                  ->where('terdaftar', '=', 'Y') as $a)
                  <div  x-show="dtl">{{$a->nama  }}</div>
                  @empty @endforelse  @endcan
                  @endif
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">KUBE Tidak Terdaftar </td>
                <td colspan="6" align="center" x-data="{dtl: false}">
                    @if($warga->umkm)
                    <div @click="dtl=!dtl" >
                        {{ $warga->umkm
                        ->where('jenis', '=', 'KUBE')
                    ->where('terdaftar', '=', 'T')
                  ->count() }}  </div>   
                  @can('ePdrt')
                  @forelse($warga->umkm
                  ->where('jenis', '=', 'KUBE')
                  ->where('terdaftar', '=', 'T') as $a)
                  <div  x-show="dtl">{{$a->nama  }}</div>
                  @empty @endforelse  @endcan
                  @endif
                </td>
            </tr>
            {{-- Report Kelompok Seni Budaya --}}
            <tr>
                <td colspan="8"><br/>
                    <h5><b>L. Kelompok Kegiatan Masyarakat</b></h5>
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Kelompok Seni Budaya </td>
                <td colspan="6" align="center" >
                    @if($warga->kkm) 
                    @forelse($warga->kkm
                  ->where('jenis', '=', 'Seni Budaya') as $a)
                  {{$a->nama  }}
                  @empty @endforelse                  
                  @endif
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Penanggung Jawab Kelompok Seni Budaya </td>
                <td colspan="6" align="center" >
                    @if($warga->kkm) @forelse($warga->kkm
                    ->where('jenis', '=', 'Seni Budaya') as $a)
                    {{$a->pj  }}
                    @empty @endforelse
                                   @endif
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Jumlah Anggota Seni Budaya </td>
                <td colspan="6" align="center" >
                    @if($warga->kkm) @forelse($warga->kkm
                    ->where('jenis', '=', 'Seni Budaya') as $a)
                    {{$a->jml_anggota  }}
                    @empty @endforelse
                                   @endif
                </td>
            </tr>
           {{-- Report Kelompok Club Olahraga --}}
            <tr>
                <td ></td>
                <td  colspan="4">Kelompok/ Club Olahraga </td>
                <td colspan="6" align="center" >
                    @if($warga->kkm) 
                    @forelse($warga->kkm
                  ->where('jenis', '=', 'Club Olahraga') as $a)
                  {{$a->nama  }}
                  @empty @endforelse
                  
                                   @endif
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Penanggung Jawab Kelompok/ Club Olahraga</td>
                <td colspan="6" align="center" >
                    @if($warga->kkm) @forelse($warga->kkm
                    ->where('jenis', '=', 'Club Olahraga') as $a)
                    {{$a->pj  }}
                    @empty @endforelse
                                   @endif
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Jumlah Anggota Kelompok/ Club Olahraga </td>
                <td colspan="6" align="center" >
                    @if($warga->kkm) @forelse($warga->kkm
                    ->where('jenis', '=', 'Club Olahraga') as $a)
                    {{$a->jml_anggota  }}
                    @empty @endforelse
                                   @endif
                </td>
            </tr>
           {{--  <tr>
                <td ></td>
                <td  colspan="4">Jenis Kegiatan </td>
                <td colspan="6" align="center" >
                    @if($warga->kkm) @forelse($warga->kkm as $a)
                                     
                    {{$a->kegiatan }}
                    @empty @endforelse
                                   @endif
                </td>
            </tr> --}}
            {{-- Akhir Kelompok Club Olahraga --}}
            {{-- Report Kelompok Kegiatan Keagamaan --}}
            <tr>
                <td ></td>
                <td  colspan="4">Kelompok Kegiatan Keagamaan </td>
                <td colspan="6" align="center" >
                    @if($warga->kkm) 
                    @forelse($warga->kkm
                  ->where('jenis', '=', 'Kegiatan Keagamaan') as $a)
                  {{$a->nama  }}
                  @empty @endforelse
                  
                                   @endif
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Penanggung Jawab Kelompok Kegiatan Keagamaan</td>
                <td colspan="6" align="center" >
                    @if($warga->kkm) @forelse($warga->kkm
                    ->where('jenis', '=', 'Kegiatan Keagamaan') as $a)
                    {{$a->pj  }}
                    @empty @endforelse
                                   @endif
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Jumlah Anggota Kelompok Kegiatan Keagamaan </td>
                <td colspan="6" align="center" >
                    @if($warga->kkm) @forelse($warga->kkm
                    ->where('jenis', '=', 'Kegiatan Keagamaan') as $a)
                    {{$a->jml_anggota  }}
                    @empty @endforelse
                                   @endif
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="4">Jenis Kegiatan </td>
                <td colspan="6" align="center" >
                    @if($warga->kkm) @forelse($warga->kkm as $a)
                                     
                     {{$a->kegiatan }} 
                    @empty @endforelse
                                   @endif
                </td>
            </tr>
            {{-- Akhir Kelompok Kegiatan Keagamaan --}}



            
            <tr>
                <td colspan="8"><br/>
                    <h5><b>M. Potensi Wisata</b></h5>
                </td>
            </tr>
            <tr>
                <td ></td>
                <td  colspan="3">Nama </td>
                <td colspan="4" align="center" >
                   Pengembangan
                </td>
            </tr>
            <tr>
                <td></td>
                
                <td>@if($warga->potensi) 
                    @forelse($warga->potensi as $a)
                 <div> {{$loop->iteration  }}. {{$a->nama  }}</div>
                  @empty @endforelse
                  @endif
                </td>
                <td colspan="6" align="center" >
                    @if($warga->potensi) 
                    @forelse($warga->potensi as $a)
                 <div> {{$a->pengembangan  }} </div>
                  @empty @endforelse                 
                  @endif
                </td>
            </tr>
            <tr>
                <td colspan="8"><br/>
                    <h5><b>N. Fasilitas Umum/Sosial</b></h5>
                </td>
            </tr>

            <tr>
                <td></td>
                <td>Data Tempat Tinggal Rumah Tangga</td>
                <td colspan="7" align="center" ></td>
            </tr>
            <tr>
                <td rowspan="2"></td>
                <td rowspan="2" valign="middle" colspan="1"> Status Kepemilikan Rumah </td>
                <td  align="center">Sendiri</td>
                <td  align="center">Sewa</td>
                <td  align="center">Menumpang</td>
                <td  align="center">Dinas/Mess</td>
            </tr>
        
            <tr>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('rumah', '=', 'Sendiri')
                    ->count() }}
                </div>   
                @can('ePdrt')
          @forelse($warga->kk
          ->where('rumah', '=', 'Sendiri') as $a)
          <div  x-show="dtl">{{$a->kk  }}</div>
          @empty @endforelse  @endcan
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('rumah', '=', 'Sewa')
                    ->count() }}
                </div>   
                @can('ePdrt')
          @forelse($warga->kk
          ->where('rumah', '=', 'Sewa') as $a)
          <div  x-show="dtl">{{$a->kk  }}</div>
          @empty @endforelse  @endcan
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('rumah', '=', 'Menumpang')
                    ->count() }}
                </div>    @can('ePdrt')
          @forelse($warga->kk
          ->where('rumah', '=', 'Menumpang') as $a)
          <div  x-show="dtl">{{$a->kk  }}</div>
          @empty @endforelse  @endcan
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('rumah', '=', 'Dinas/Mess')
                    ->count() }}
                </div>   
                @can('ePdrt')
          @forelse($warga->kk
          ->where('rumah', '=', 'Dinas/Mess') as $a)
          <div  x-show="dtl">{{$a->kk  }}</div>
          @empty @endforelse  @endcan
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Data Kondisi Rumah</td>
                <td colspan="7" align="center" ></td>
            </tr>
            <tr>
                <td rowspan="2"></td>
                <td rowspan="2" valign="middle" colspan="1"> Atap </td>
                <td  align="center">Genteng</td>
                <td  align="center">Ternit</td>
                <td  align="center">Galvalum</td>
                <td  align="center">Asbes</td>
            </tr>
        
            <tr>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('atap', '=', 'Genteng')
                    ->count() }}
                </div>   
                @can('ePdrt')
          @forelse($warga->kk
          ->where('atap', '=', 'Genteng') as $a)
          <div  x-show="dtl">{{$a->kk  }}</div>
          @empty @endforelse  @endcan
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('atap', '=', 'Ternit')
                    ->count() }}
                </div>   
                @can('ePdrt')
          @forelse($warga->kk
          ->where('atap', '=', 'Ternit') as $a)
          <div  x-show="dtl">{{$a->kk  }}</div>
          @empty @endforelse  @endcan
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('atap', '=', 'Galvalum')
                    ->count() }}
                </div>   
                @can('ePdrt')
          @forelse($warga->kk
          ->where('atap', '=', 'Galvalum') as $a)
          <div  x-show="dtl">{{$a->kk  }}</div>
          @empty @endforelse  @endcan
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('atap', '=', 'Asbes')
                    ->count() }}
                </div>   
                @can('ePdrt')
          @forelse($warga->kk
          ->where('atap', '=', 'Asbes') as $a)
          <div  x-show="dtl">{{$a->kk  }}</div>
          @empty @endforelse  @endcan
                </td>
            </tr>
            <tr>
                <td rowspan="2"></td>
                <td rowspan="2" valign="middle" colspan="1">Dinding </td>
                <td  align="center">Tembok</td>
                <td  align="center">Triplek</td>
                <td  align="center">Bambu</td>
                <td  align="center">Kayu</td>
                <td  align="center">Anyaman/Gedeg</td>
            </tr>
            <tr>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('bangunan', '=', 'Tembok')
                    ->count() }}
                    </div>   
                    @can('ePdrt')
                    @forelse($warga->kk
                    ->where('bangunan', '=', 'Tembok') as $a)
                    <div  x-show="dtl">{{$a->kk  }}</div>
                    @empty @endforelse  @endcan
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('bangunan', '=', 'Triplek')
                    ->count() }}
                    </div>   
                    @can('ePdrt')
                    @forelse($warga->kk
                    ->where('bangunan', '=', 'Triplek') as $a)
                    <div  x-show="dtl">{{$a->kk  }}</div>
                    @empty @endforelse  @endcan
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('bangunan', '=', 'Bambu')
                    ->count() }}
                    </div>   
                    @can('ePdrt')
                    @forelse($warga->kk
                    ->where('bangunan', '=', 'Bambu') as $a)
                    <div  x-show="dtl">{{$a->kk  }}</div>
                    @empty @endforelse  @endcan
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('bangunan', '=', 'Kayu')
                    ->count() }}
                    </div>   
                    @can('ePdrt')
                    @forelse($warga->kk
                    ->where('bangunan', '=', 'Kayu') as $a)
                    <div  x-show="dtl">{{$a->kk  }}</div>
                    @empty @endforelse  @endcan
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('bangunan', '=', 'Anyaman/Gedeg')
                    ->count() }}
                    </div>   
                    @can('ePdrt')
                    @forelse($warga->kk
                    ->where('bangunan', '=', 'Anyaman/Gedeg') as $a)
                    <div  x-show="dtl">{{$a->kk  }}</div>
                    @empty @endforelse  @endcan
                </td>
            </tr>
            <tr>
                <td rowspan="2"></td>
                <td rowspan="2" valign="middle" colspan="1">Lantai </td>
                <td  align="center">Tanah</td>
                <td  align="center">Ubin</td>
                <td  align="center">Keramik</td>
                <td  align="center">Plester</td>
            </tr>
            <tr>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('lantai', '=', 'Tanah')
                    ->count() }}
                    </div>   
                    @can('ePdrt')
                    @forelse($warga->kk
                    ->where('lantai', '=', 'Tanah') as $a)
                    <div  x-show="dtl">{{$a->kk  }}</div>
                    @empty @endforelse  @endcan
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('lantai', '=', 'Ubin')
                    ->count() }}
                    </div>   
                    @can('ePdrt')
                    @forelse($warga->kk
                    ->where('lantai', '=', 'Ubin') as $a)
                    <div  x-show="dtl">{{$a->kk  }}</div>
                    @empty @endforelse  @endcan
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('lantai', '=', 'Keramik')
                    ->count() }}
                    </div>   
                    @can('ePdrt')
                    @forelse($warga->kk
                    ->where('lantai', '=', 'Keramik') as $a)
                    <div  x-show="dtl">{{$a->kk  }}</div>
                    @empty @endforelse  @endcan
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('lantai', '=', 'Plester')
                    ->count() }}
                    </div>   
                    @can('ePdrt')
                    @forelse($warga->kk
                    ->where('lantai', '=', 'Plester') as $a)
                    <div  x-show="dtl">{{$a->kk  }}</div>
                    @empty @endforelse  @endcan
                </td>
            </tr>
            <tr>
                <td rowspan="2"></td>
                <td rowspan="2" valign="middle" colspan="1">Akses air minum </td>
                <td  align="center">PDAM</td>
                <td  align="center">Swadaya PAM</td>
                <td  align="center">Sumur</td>
                <td  align="center">Mata Air/Belik</td>
                <td  align="center">Galon,dll</td>
            </tr>
            <tr>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('minum', '=', 'PDAM')
                    ->count() }}
                    </div>   
                    @can('ePdrt')
                    @forelse($warga->kk
                    ->where('minum', '=', 'PDAM') as $a)
                    <div  x-show="dtl">{{$a->kk  }}</div>
                    @empty @endforelse  @endcan
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('minum', '=', 'Swadaya PAM')
                    ->count() }}
                    </div>   
                    @can('ePdrt')
                    @forelse($warga->kk
                    ->where('minum', '=', 'Swadaya PAM') as $a)
                    <div  x-show="dtl">{{$a->kk  }}</div>
                    @empty @endforelse  @endcan
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('minum', '=', 'Galon')
                    ->count() }}
                    </div>   
                    @can('ePdrt')
                    @forelse($warga->kk
                    ->where('minum', '=', 'Galon') as $a)
                    <div  x-show="dtl">{{$a->kk  }}</div>
                    @empty @endforelse  @endcan
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                        {{ $warga->kk->where('minum', '=', 'Mata Air/Belik')
                    ->count() }}
                    </div>   
                    @can('ePdrt')
                    @forelse($warga->kk
                    ->where('minum', '=', 'Mata Air/Belik') as $a)
                    <div  x-show="dtl">{{$a->kk  }}</div>
                    @empty @endforelse  @endcan
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('minum', '=', 'Sumur')
                    ->count() }}
                    </div>   
                    @can('ePdrt')
                    @forelse($warga->kk
                    ->where('minum', '=', 'Sumur') as $a)
                    <div  x-show="dtl">{{$a->kk  }}</div>
                    @empty @endforelse  @endcan
                </td>
            </tr>
            <tr>
                <td rowspan="2"></td>
                <td rowspan="2" valign="middle" colspan="1">Akses Sanitasi</td>
                <td  align="center">Individu</td>
                <td  align="center">Komunal</td>
                <td  align="center">WC Umum</td>
                <td  align="center">BABs</td>
            </tr>
            <tr>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('sanitasi', '=', 'SPALD Individu')
                    ->count() }}
                    </div>   
                    @can('ePdrt')
                    @forelse($warga->kk
                    ->where('sanitasi', '=', 'SPALD Individu') as $a)
                    <div  x-show="dtl">{{$a->kk  }}</div>
                    @empty @endforelse  @endcan
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('sanitasi', '=', 'SPALD Komunal')
                    ->count() }}
                    </div>   
                    @can('ePdrt')
                    @forelse($warga->kk
                    ->where('sanitasi', '=', 'SPALD Komunal') as $a)
                    <div  x-show="dtl">{{$a->kk  }}</div>
                    @empty @endforelse  @endcan
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('sanitasi', '=', 'WC Umum')
                    ->count() }}
                    </div>   
                    @can('ePdrt')
                    @forelse($warga->kk
                    ->where('sanitasi', '=', 'WC Umum') as $a)
                    <div  x-show="dtl">{{$a->kk  }}</div>
                    @empty @endforelse  @endcan
                </td>
                <td align="center" x-data="{dtl: false}">
                    <div @click="dtl=!dtl" >
                    {{ $warga->kk->where('sanitasi', '=', 'BABs')
                    ->count() }}
                    </div>   
                    @can('ePdrt')
                    @forelse($warga->kk
                    ->where('sanitasi', '=', 'BABs') as $a)
                    <div  x-show="dtl">{{$a->kk  }}</div>
                    @empty @endforelse  @endcan
                </td>
            </tr>
        
            
            <tr>
                <td></td>
                <td>Rumah Tangga Menempati Rumah Tidak Layak Huni</td>
                <td colspan="6" align="left" >
                    @if($warga->kk) 
                    {{ $warga->kk
                        ->where('hunian', '=', 'Tidak Layak')
                  ->count() }}
                      @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Jalan Lingkungan</td>
                <td colspan="6" align="left" >
                    {{ $warga->jalan_lingkungan }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Data titik-titik ruang publik skala lingkungan yang belum dilayani Penerangan umum</td>
                <td colspan="6" align="left" >
                    {{ $warga->perlu_penerangan }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Drainase Lingkungan</td>
                <td colspan="6" align="left" >
                    {{ $warga->drainase }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Proteksi Kebakaran</td>
                <td colspan="6" align="left" >
                    {{ $warga->proteksi_kebakaran }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Jumlah Alat Pemadam Kebakaran Ringan</td>
                <td colspan="6" align="left" >
                    {{ $warga->apkr }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Kebutuhan Alat Pemadam Kebakaran Ringan</td>
                <td colspan="6" align="left" >
                    {{ $warga->kebutuhan_apkr }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Pos Keamanan Lingkungan</td>
                <td colspan="6" align="left" >
                    {{ $warga->poskamling }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Kebutuhan Sarana Pos Keamanan Lingkungan</td>
                <td colspan="6" align="left" >
                    {{ $warga->sarpras_kamling }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Gedung Pertemuan Warga Masyarakat</td>
                <td colspan="6" align="left" >
                    {{ $warga->bale_warga }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Kebutuhan Sarpras Gedung Pertemuan</td>
                <td colspan="6" align="left" >
                    {{ $warga->sarpras_bale }}
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Rumah Tangga yang Melaksanakan Urban Farming</td>
                <td colspan="6" align="center" >
                    @if($warga->kk) 
                    {{ $warga->kk
                        ->where('urban_farming', '=', 'Ya')
                  ->count() }}
                      @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Bidang yang dilakukan</td>
                <td colspan="6" align="center" >
                    @if($warga->kk) 
                    @forelse($warga->kk as $a)
                 <div> {{$a->bidang  }} </div>
                  @empty @endforelse                 
                  @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Pengalaman Berusaha</td>
                <td colspan="6" align="center" >
                    @if($warga->kk) 
                    @forelse($warga->kk as $a)
                 <div> {{$a->pengalaman  }} </div>
                  @empty @endforelse                 
                  @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Nama Kelompok</td>
                <td colspan="6" align="center" >
                    @if($warga->kk) 
                    @forelse($warga->kk as $a)
                 <div> {{$a->nama_kelompok  }} </div>
                  @empty @endforelse                 
                  @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Lokasi Usaha</td>
                <td colspan="6" align="center" >
                    @if($warga->kk) 
                    @forelse($warga->kk as $a)
                 <div> {{$a->lokasi_usaha  }} </div>
                  @empty @endforelse                 
                  @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Luas Lahan</td>
                <td colspan="6" align="center" >
                    @if($warga->kk) 
                    @forelse($warga->kk as $a)
                 <div> {{$a->luas_lahan  }} </div>
                  @empty @endforelse                 
                  @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Bentuk Lahan</td>
                <td colspan="6" align="center" >
                    @if($warga->kk) 
                    @forelse($warga->kk as $a)
                 <div> {{$a->bentuk_lahan  }} </div>
                  @empty @endforelse                 
                  @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Status Lahan</td>
                <td colspan="6" align="center" >
                    @if($warga->kk) 
                    @forelse($warga->kk as $a)
                 <div> {{$a->status_lahan  }} </div>
                  @empty @endforelse                 
                  @endif
                </td>
            </tr>
            <tr>
                <td></td>
                <td>Data Keswadayaan Masyarakat (Sumbangan)</td>
                <td colspan="6"  >
                @if($warga->sumbangan) 
                @forelse($warga->sumbangan as $a)
                <div class="row">
                 <div class="col-sm-1 text-center">{{ $loop->iteration }}.</div>
                 <div class="col-sm-11"> {{   ucFirst($a->sumbangan) }} @if($a->kegiatan) {{"untuk ".$a->kegiatan  }}@endif
                </div>
                </div>
                 @empty @endforelse                 
                 @endif
                </td>
                
            </tr>
        @endif
    </table>
    <x-slot name="footer">
        <button type="button" class="btn btn-primary" wire:click="cetak({{ $id }})">
            <i class="fas fa-times-print"></i> Download PDF
        
        {{--download format excel--}}
         {{-- <button type="button" class="btn btn-primary" wire:click="cetak({{ $id }})">
            <i class="fas fa-times-print"></i> Download Excel --}}
         
        </button> 
        <button type="button" class="btn btn-primary" @click="showDetail = false">
            <i class="fas fa-times-circle"></i> Kembali
        </button>
    </x-slot>
</x-form-modal>    