<html>

<head>
    <title>Profil</title>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css"> --}}
    <link href="{{ 'css/papper.css' }}" rel="stylesheet">
    <style>
        body {
            font-family: arial;
        }

        @page {
            size: Foolscap;
        }

        @media screen {
            .sheet {
                margin-right: 5mm;
                margin-left: 20mm;
            }
        }

        h2,
        h3,
        h4 {
            margin-top: 3mm;
            margin-bottom: 0;
        }

        b.sub {
            margin-top: 3mm;
            display: block;
        }
    </style>
</head>

<body class="Foolscap">
    <section class="sheet padding-10mm">
        <article>
            @if($warga)

            <h2 align="center">
                Profil RW {{ $warga->rw }}<br />
                Kelurahan {{ $warga->kel->nama_kel }}
            </h2> <br /> <br />
            <table width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr>
                    <td></td>
                    <td> Ketua RW </td>
                    <td colspan="3">: {{ ucwords(strtolower($warga->ketua)) }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td> Jumlah KK </td>
                    <td align="left" colspan="3">: {{ $warga->kk->where('aktif', '=', 'Y')->count() }}</td>
                </tr>
            </table> <br />
            <table width="100%" border="1" cellspacing="0" cellpadding="2">
                <tr>
                    <td colspan="8" align="center">
                        <b>Potensi Sumber Daya</b>
                    </td>
                </tr>
                <tr>
                    <td colspan="8">
                        <b>A. Jumlah Penduduk</b>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2"></td>
                    <td valign="middle" colspan="4"><b> Usia (th) </b></td>
                    <td align="center"><b>LK</b></td>
                    <td align="center"><b>PR</b></td>
                    <td align="center"><b>Total</b></td>
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
                    <td colspan="4"> 1 - 5 </td>
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
                    <td colspan="4"> 5 - 10 </td>
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
                    <td colspan="4"> 10 - 15 </td>
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
                    <td colspan="4"> 15 - 20 </td>
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
                    <td colspan="4"> 20 - 25 </td>
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
                    <td colspan="4"> 25 - 30 </td>
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
                    <td colspan="4"> 30 - 35 </td>
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
                    <td colspan="4"> 35 - 40 </td>
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
                    <td colspan="4"> 40 - 45 </td>
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
                    <td colspan="4"> 45 - 50 </td>
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
                    <td colspan="4"> 50 - 55 </td>
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
                    <td colspan="4"> 55 - 60 </td>
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
                    <td colspan="4"> 60 < </td>
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
                    <td colspan="8">
                        <b>B. Pendidikan</b>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4"><b> Bersekolah di Usia (th) </b></td>
                    <td align="center"><b>LK</b></td>
                    <td align="center"><b>PR</b></td>
                    <td align="center"><b>Total</b></td>
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
                <tr>
                    <td></td>
                    <td colspan="4">3-6 Sedang TK/Paud </td>
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
                    <td colspan="4">15-20 </td>
                    <td align="center">
                        {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(20))
                        ->where('tgl_lahir', '<', now()->subYears(15))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(20))
                        ->where('tgl_lahir', '<', now()->subYears(15))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                  ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(20))
                    ->where('tgl_lahir', '<', now()->subYears(15))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Belum')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">20-25 </td>
                    <td align="center">
                        {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(25))
                        ->where('tgl_lahir', '<', now()->subYears(20))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(25))
                        ->where('tgl_lahir', '<', now()->subYears(20))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                  ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(25))
                    ->where('tgl_lahir', '<', now()->subYears(20))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Belum')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">25-30 </td>
                    <td align="center">
                        {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(30))
                        ->where('tgl_lahir', '<', now()->subYears(25))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(30))
                        ->where('tgl_lahir', '<', now()->subYears(25))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                  ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(30))
                    ->where('tgl_lahir', '<', now()->subYears(25))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Belum')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">30-35 </td>
                    <td align="center">
                        {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(35))
                        ->where('tgl_lahir', '<', now()->subYears(30))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(35))
                        ->where('tgl_lahir', '<', now()->subYears(30))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                  ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(35))
                    ->where('tgl_lahir', '<', now()->subYears(30))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Belum')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">35-40 </td>
                    <td align="center">
                        {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(40))
                        ->where('tgl_lahir', '<', now()->subYears(35))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(40))
                        ->where('tgl_lahir', '<', now()->subYears(35))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                  ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(40))
                    ->where('tgl_lahir', '<', now()->subYears(35))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Belum')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">40-45 </td>
                    <td align="center">
                        {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(45))
                        ->where('tgl_lahir', '<', now()->subYears(40))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(45))
                        ->where('tgl_lahir', '<', now()->subYears(40))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                  ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(45))
                    ->where('tgl_lahir', '<', now()->subYears(40))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Belum')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">45-50 </td>
                    <td align="center">
                        {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(50))
                        ->where('tgl_lahir', '<', now()->subYears(45))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(50))
                        ->where('tgl_lahir', '<', now()->subYears(45))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                  ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(50))
                    ->where('tgl_lahir', '<', now()->subYears(45))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Belum')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">50-55 </td>
                    <td align="center">
                        {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(55))
                        ->where('tgl_lahir', '<', now()->subYears(50))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(55))
                        ->where('tgl_lahir', '<', now()->subYears(50))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                  ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(55))
                    ->where('tgl_lahir', '<', now()->subYears(50))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Belum')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">55-60 </td>
                    <td align="center">
                        {{ $warga->keluarga->where('jk', '=', 'L')
                        ->where('tgl_lahir', '>', now()->subYears(60))
                        ->where('tgl_lahir', '<', now()->subYears(55))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->keluarga->where('jk', '=', 'P')
                        ->where('tgl_lahir', '>', now()->subYears(60))
                        ->where('tgl_lahir', '<', now()->subYears(55))
                        ->where('pendidikan', '!=', '-')
                        ->where('lulus', '=', 'Belum')
                  ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(60))
                    ->where('tgl_lahir', '<', now()->subYears(55))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Belum')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">60 < </td>
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
                    <td></td>
                    <td colspan="4"><b> Putus Sekolah di Usia (th) </b></td>
                    <td align="center"><b>LK</b></td>
                    <td align="center"><b>PR</b></td>
                    <td align="center"><b>Total</b></td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(15))
                    ->where('tgl_lahir', '<', now()->subYears(7))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Tidak')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">15-20 </td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('tgl_lahir', '>', now()->subYears(20))
                    ->where('tgl_lahir', '<', now()->subYears(15))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Tidak')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">20-25 </td>
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
                    <td></td>
                    <td colspan="4">25-30 </td>
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
                    <td></td>
                    <td colspan="4">30-35 </td>
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
                    <td></td>
                    <td colspan="4">35-40 </td>
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
                    <td></td>
                    <td colspan="4">40-45 </td>
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
                    <td></td>
                    <td colspan="4">45-50 </td>
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
                    <td></td>
                    <td colspan="4">50-55 </td>
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
                    <td></td>
                    <td colspan="4">55-60 </td>
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
                    <td></td>
                    <td colspan="4">60 < </td>
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
                    <td></td>
                    <td colspan="4"><b> Tamatan </b></td>
                    <td align="center"><b>LK</b></td>
                    <td align="center"><b>PR</b></td>
                    <td align="center"><b>Total</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">SD</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('tgl_lahir', '<', now()->subYears(11))
                    ->where('pendidikan', '=', 'SD')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">SMP</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('tgl_lahir', '<', now()->subYears(14))
                    ->where('pendidikan', '=', 'SMP')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">SMA</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('tgl_lahir', '<', now()->subYears(17))
                    ->where('pendidikan', '=', 'SMA')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">PT (D1-S3)</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('tgl_lahir', '<', now()->subYears(18))
                    ->where('pendidikan', '=', 'PT')
                    ->where('lulus', '=', 'Lulus')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Tidak Sekolah (Usia min 7)</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('tgl_lahir', '<', now()->subYears(7))
                    ->where('pendidikan', '=', '-')
                    ->where('lulus', '=', '-')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td colspan="8">
                        <b>C. Mata Pencaharian Pokok</b>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4"><b> Nama </b></td>
                    <td align="center"><b>LK</b></td>
                    <td align="center"><b>PR</b></td>
                    <td align="center"><b>Total</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Ibu Rumah Tangga</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Ibu Rumah Tangga')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Pelajar</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Pelajar')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Belum/tidak bekerja</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Belum/tidak bekerja')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Pedagang</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Pedagang')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Wiraswasta</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Wiraswasta')
                    ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">BUMN</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'BUMN')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Karyawan BUMD </td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Karyawan BUMD')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Petani/Peternak </td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Petani/Peternak')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Buruh Tani </td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Buruh Tani')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Montir </td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Montir')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Pengacara </td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Pengacara')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">PRT </td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'PRT')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">THL</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'THL')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">PNS</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'PNS')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">TNI</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'TNI')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">POLRI</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'POLRI')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Bidan</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Bidan')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Pensiunan</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Pensiunan')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Lainnya</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('pekerjaan', '=', 'Lainnya')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td colspan="8">
                        <b>D. Agama/Aliran Kepercayaan</b>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4"><b> Nama </b></td>
                    <td align="center"><b>LK</b></td>
                    <td align="center"><b>PR</b></td>
                    <td align="center"><b>Total</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Islam</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('agama', '=', 'Islam')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Kristen</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('agama', '=', 'Kristen')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Katholik</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('agama', '=', 'Katholik')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Hindu</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('agama', '=', 'Hindu')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Budha</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('agama', '=', 'Budha')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Konghuchu</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('agama', '=', 'Konghuchu')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Aliran Kepercayaan</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('agama', '=', 'Aliran Kepercayaan')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td colspan="8">
                        <b>E. Kewarganegaraan</b>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4"><b> Warga Negara </b></td>
                    <td align="center"><b>LK</b></td>
                    <td align="center"><b>PR</b></td>
                    <td align="center"><b>Total</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">WNI</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('warneg', '=', 'WNI')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">WNA</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('warneg', '=', 'WNA')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td colspan="8">
                        <b>F. Disabilitas</b>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4"><b> Jenis </b></td>
                    <td align="center"><b>LK</b></td>
                    <td align="center"><b>PR</b></td>
                    <td align="center"><b>Total</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Tunawicara</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('disabilitas', '=', 'Tunawicara')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Lumpuh</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('disabilitas', '=', 'Lumpuh')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Bibir Sumbing</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('disabilitas', '=', 'Bibir Sumbing')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Tunadaksa</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('disabilitas', '=', 'Tunadaksa')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Keterbelakangan Mental</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('disabilitas', '=', 'Keterbelakangan Mental')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td colspan="8">
                        <b>G. Tenaga Kerja</b>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4"><b> Penduduk Usia Kerja </b></td>
                    <td align="center"><b>LK</b></td>
                    <td align="center"><b>PR</b></td>
                    <td align="center"><b>Total</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">15-20 </td>
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
                    <td colspan="4">20-25 </td>
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
                    <td colspan="4">25-30 </td>
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
                    <td colspan="4">30-35 </td>
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
                    <td colspan="4">35-40 </td>
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
                    <td colspan="4">40-45 </td>
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
                    <td colspan="4">45-50 </td>
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
                    <td colspan="4">50-55 </td>
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
                    <td colspan="4">55-60 </td>
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
                    <td colspan="4">60< </td>
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
                    <td colspan="4"><b> Penduduk Belum/ Tidak Bekerja </b></td>
                    <td align="center"><b>LK</b></td>
                    <td align="center"><b>PR</b></td>
                    <td align="center"><b>Total</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">15-20 </td>
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
                    <td></td>
                    <td colspan="4">20-25 </td>
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
                    <td></td>
                    <td colspan="4">25-30 </td>
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
                    <td></td>
                    <td colspan="4">30-35 </td>
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
                    <td></td>
                    <td colspan="4">35-40 </td>
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
                    <td></td>
                    <td colspan="4">40-45 </td>
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
                    <td></td>
                    <td colspan="4">45-50 </td>
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
                    <td></td>
                    <td colspan="4">50-55 </td>
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
                    <td></td>
                    <td colspan="4">55-60 </td>
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
                    <td></td>
                    <td colspan="4">60< </td>
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
                    <td colspan="8">
                        <b>H. Kualitas Penduduk dari Segi Pendidikan</b>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4"><b> Tamatan SD, Usia(th) </b></td>
                    <td align="center"><b>LK</b></td>
                    <td align="center"><b>PR</b></td>
                    <td align="center"><b>Total</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">15-20 </td>
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
                    <td></td>
                    <td colspan="4">20-25 </td>
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
                    <td></td>
                    <td colspan="4">25-30 </td>
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
                    <td></td>
                    <td colspan="4">30-35 </td>
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
                    <td></td>
                    <td colspan="4">35-40 </td>
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
                    <td></td>
                    <td colspan="4">40-45 </td>
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
                    <td></td>
                    <td colspan="4">45-50 </td>
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
                    <td></td>
                    <td colspan="4">50-55 </td>
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
                    <td></td>
                    <td colspan="4">55-60 </td>
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
                    <td></td>
                    <td colspan="4">60< </td>
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
                    <td></td>
                    <td colspan="4"><b> Tamatan SMP, Usia(th) </b></td>
                    <td align="center"><b>LK</b></td>
                    <td align="center"><b>PR</b></td>
                    <td align="center"><b>Total</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">15-20 </td>
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
                    <td></td>
                    <td colspan="4">20-25 </td>
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
                    <td></td>
                    <td colspan="4">25-30 </td>
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
                    <td></td>
                    <td colspan="4">30-35 </td>
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
                    <td></td>
                    <td colspan="4">35-40 </td>
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
                    <td></td>
                    <td colspan="4">40-45 </td>
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
                    <td></td>
                    <td colspan="4">45-50 </td>
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
                    <td></td>
                    <td colspan="4">50-55 </td>
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
                    <td></td>
                    <td colspan="4">55-60 </td>
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
                    <td></td>
                    <td colspan="4">60< </td>
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
                    <td></td>
                    <td colspan="4"><b> Tamatan SMA, Usia(th) </b></td>
                    <td align="center"><b>LK</b></td>
                    <td align="center"><b>PR</b></td>
                    <td align="center"><b>Total</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">15-20 </td>
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
                    <td></td>
                    <td colspan="4">20-25 </td>
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
                    <td></td>
                    <td colspan="4">25-30 </td>
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
                    <td></td>
                    <td colspan="4">30-35 </td>
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
                    <td></td>
                    <td colspan="4">35-40 </td>
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
                    <td></td>
                    <td colspan="4">40-45 </td>
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
                    <td></td>
                    <td colspan="4">45-50 </td>
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
                    <td></td>
                    <td colspan="4">50-55 </td>
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
                    <td></td>
                    <td colspan="4">55-60 </td>
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
                    <td></td>
                    <td colspan="4">60< </td>
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
                    <td></td>
                    <td colspan="4"><b> Tamatan PT, Usia(th) </b></td>
                    <td align="center"><b>LK</b></td>
                    <td align="center"><b>PR</b></td>
                    <td align="center"><b>Total</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">15-20 </td>
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
                    <td></td>
                    <td colspan="4">20-25 </td>
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
                    <td></td>
                    <td colspan="4">25-30 </td>
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
                    <td></td>
                    <td colspan="4">30-35 </td>
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
                    <td></td>
                    <td colspan="4">35-40 </td>
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
                    <td></td>
                    <td colspan="4">40-45 </td>
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
                    <td></td>
                    <td colspan="4">45-50 </td>
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
                    <td></td>
                    <td colspan="4">50-55 </td>
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
                    <td></td>
                    <td colspan="4">55-60 </td>
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
                    <td></td>
                    <td colspan="4">60< </td>
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
                    <td></td>
                    <td colspan="4"><b> Tamatan </b></td>
                    <td align="center"><b>LK</b></td>
                    <td align="center"><b>PR</b></td>
                    <td align="center"><b>Total</b></td>
                </tr>

                <tr>
                    <td></td>
                    <td colspan="4">Tidak Tamat Sekolah (Usia 15-60)</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('tgl_lahir', '<', now()->subYears(15))
                    ->where('pendidikan', '!=', '-')
                    ->where('lulus', '=', 'Tidak')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td colspan="8">
                        <b>I. Kesehatan</b>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4"><b> Kondisi </b></td>
                    <td align="center"><b>LK</b></td>
                    <td align="center"><b>PR</b></td>
                    <td align="center"><b>Total</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Gizi Buruk/ Stunting</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('stunting', '=', 'Ya')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Belum Memiliki Jamkes</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('jamkes', '=', 'Belum')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Orang dengan Gangguan Jiwa</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('gangguan_jiwa', '=', 'Ya')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Warga Belum Vaksin</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('vaksin', '=', 'Belum')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Warga Belum Imunisasi</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('imunisasi', '=', 'Belum')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td colspan="8">
                        <b>J. Ekonomi</b>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td valign="middle" colspan="4"><b> Kondisi </b></td>
                    <td colspan="3" align="center"><b>Jumlah</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">KK (Penduduk Miskin)</td>
                    <td colspan="3" align="center">
                        {{ $warga->kk
                    ->where('ekonomi', '=', 'Tidak mampu')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">KK Terdaftar DTKS</td>
                    <td colspan="3" align="center">
                        {{ $warga->kk
                    ->where('dtks', '=', 'Ya')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Warga Terdaftar DTKS</td>
                    <td colspan="3" align="center">
                        {{ $warga->keluarga
                    ->where('dtks', '=', 'Ya')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">KK Rentan (Wanita sebagai Kepala Keluarga)</td>
                    <td colspan="3" align="center">
                        {{ $warga->keluarga
                    ->where('jk', '=', 'P')
                    ->where('posisi', '=', 'Kepala')
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4"><b> </b></td>
                    <td align="center"><b>LK</b></td>
                    <td align="center"><b>PR</b></td>
                    <td align="center"><b>Total</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Lansia Miskin 60< Terdaftar DTKS</td>
                    <td align="center">
                        {{ $warga->keluarga->where('jk', '=', 'L')
                    ->where('tgl_lahir', '<', now()->subYears(60))
                        ->where('dtks', '=', 'Ya')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->keluarga->where('jk', '=', 'P')
                    ->where('tgl_lahir', '<', now()->subYears(60))
                        ->where('dtks', '=', 'Ya')
                  ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('dtks', '=', 'Ya')
                    ->where('tgl_lahir', '<', now()->subYears(60))
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Lansia Miskin 60< Tidak Terdaftar DTKS</td>
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
                    <td align="center">
                        {{ $warga->keluarga
                    ->where('dtks', '=', 'Tidak')
                    ->where('tgl_lahir', '<', now()->subYears(60))
                  ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Lansia Terlantar
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
                    <td align="center">
                        <div @click="dtl=!dtl">
                            {{ $warga->keluarga
                    ->where('terlantar', '=', 'Ya')
                    ->where('tgl_lahir', '<', now()->subYears(60))
                  ->count() }}
                    </td>
                </tr>

                <tr>
                    <td colspan="8">
                        <b>K. UMKM</b>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4"><b> Jenis </b></td>
                    <td align="center"><b>&nbsp;Terdaftar&nbsp;</b></td>
                    <td align="center" colspan="2"><b>Tidak Terdaftar</b></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">UMKM</td>
                    <td align="center">
                        @if($warga->umkm)
                        {{ $warga->umkm
                    ->where('jenis', '=', 'UMKM')
                    ->where('terdaftar', '=', 'Y')
                  ->count() }}
                        @endif
                    </td>
                    <td align="center" colspan="2">
                        @if($warga->umkm)
                        {{ $warga->umkm
                        ->where('jenis', '=', 'UMKM')
                    ->where('terdaftar', '=', 'T')
                  ->count() }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">KUBE</td>
                    <td align="center">
                        @if($warga->umkm)
                        {{ $warga->umkm
                    ->where('jenis', '=', 'KUBE')
                    ->where('terdaftar', '=', 'Y')
                  ->count() }}
                        @endif
                    </td>
                    <td align="center" colspan="2">
                        @if($warga->umkm)
                        {{ $warga->umkm
                        ->where('jenis', '=', 'KUBE')
                    ->where('terdaftar', '=', 'T')
                  ->count() }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="8">
                        <b>L. Kelompok Kegiatan Masyarakat</b>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Kelompok Seni Budaya </td>
                    <td colspan="3" align="center">
                        @if($warga->kkm)
                        @forelse($warga->kkm
                        ->where('jenis', '=', 'Seni Budaya') as $a)
                        {{$a->nama }}
                        @empty @endforelse

                        @endif
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Penanggung Jawab Kelompok Seni Budaya </td>
                    <td colspan="3" align="center">
                        @if($warga->kkm) @forelse($warga->kkm
                        ->where('jenis', '=', 'Seni Budaya') as $a)
                        {{$a->pj }}
                        @empty @endforelse
                        @endif
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Jumlah Anggota Seni Budaya </td>
                    <td colspan="3" align="center">
                        @if($warga->kkm) @forelse($warga->kkm
                        ->where('jenis', '=', 'Seni Budaya') as $a)
                        {{$a->jml_anggota }}
                        @empty @endforelse
                        @endif
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Kelompok/ Club Olahraga </td>
                    <td colspan="3" align="center">
                        @if($warga->kkm)
                        @forelse($warga->kkm
                        ->where('jenis', '=', 'Club Olahraga') as $a)
                        {{$a->nama }}
                        @empty @endforelse

                        @endif
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Penanggung Jawab Kelompok/ Club Olahraga</td>
                    <td colspan="3" align="center">
                        @if($warga->kkm) @forelse($warga->kkm
                        ->where('jenis', '=', 'Club Olahraga') as $a)
                        {{$a->pj }}
                        @empty @endforelse
                        @endif
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Jumlah Anggota Kelompok/ Club Olahraga </td>
                    <td colspan="3" align="center">
                        @if($warga->kkm) @forelse($warga->kkm
                        ->where('jenis', '=', 'Club Olahraga') as $a)
                        {{$a->jml_anggota }}
                        @empty @endforelse
                        @endif
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Jenis Kegiatan </td>
                    <td colspan="3" align="center">
                        @if($warga->kkm) @forelse($warga->kkm as $a)

                        {{$a->kegiatan }}
                        @empty @endforelse
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="8">
                        <b>M. Potensi Wisata</b>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Nama </td>
                    <td colspan="3" align="center">
                        Pengembangan
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">@if($warga->potensi)
                        @forelse($warga->potensi as $a)
                        <div> {{$loop->iteration }}. {{$a->nama }}</div>
                        @empty @endforelse
                        @endif
                    </td>
                    <td colspan="3" align="center">
                        @if($warga->potensi)
                        @forelse($warga->potensi as $a)
                        <div> {{$a->pengembangan }} </div>
                        @empty @endforelse
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="8">
                        <b>N. Fasilitas Umum/Sosial</b>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="7">Data Tempat Tinggal Rumah Tangga</td>
                </tr>
                <tr>
                    <td rowspan="2"></td>
                    <td rowspan="2" valign="middle" colspan="3"> Status Kepemilikan Rumah </td>
                    <td align="center">Sendiri</td>
                    <td align="center">Sewa</td>
                    <td align="center">Menumpang</td>
                    <td align="center">Dinas/Mess</td>
                </tr>
                <tr>
                    <td align="center">
                        {{ $warga->kk->where('rumah', '=', 'Sendiri')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->kk->where('rumah', '=', 'Sewa')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->kk->where('rumah', '=', 'Menumpang')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->kk->where('rumah', '=', 'Dinas/Mess')
                    ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="7">Data Kondisi Rumah</td>
                </tr>
                <tr>
                    <td rowspan="2"></td>
                    <td rowspan="2" valign="middle" colspan="3"> Atap </td>
                    <td align="center">Genteng</td>
                    <td align="center">Ternit</td>
                    <td align="center">Galvalum</td>
                    <td align="center">Asbes</td>
                </tr>

                <tr>
                    <td align="center">
                        {{ $warga->kk->where('atap', '=', 'Genteng')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->kk->where('atap', '=', 'Ternit')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->kk->where('atap', '=', 'Galvalum')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->kk->where('atap', '=', 'Asbes')
                    ->count() }}
                    </td>
                </tr>
                <tr>
                    <td rowspan="2"></td>
                    <td rowspan="2" valign="middle" colspan="3">Lantai </td>
                    <td align="center">Tanah</td>
                    <td align="center">Ubin</td>
                    <td align="center">Keramik</td>
                    <td align="center">Plester</td>
                </tr>
                <tr>
                    <td align="center">
                        {{ $warga->kk->where('lantai', '=', 'Tanah')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->kk->where('lantai', '=', 'Ubin')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->kk->where('lantai', '=', 'Keramik')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->kk->where('lantai', '=', 'Plester')
                    ->count() }}
                    </td>
                </tr>
                <tr>
                    <td rowspan="2"></td>
                    <td rowspan="2" valign="middle" colspan="3">Akses sanitasi (SPALD) </td>
                    <td align="center">Individu</td>
                    <td align="center">Komunal</td>
                    <td align="center">WC Umum</td>
                    <td align="center">BABs</td>
                </tr>
                <tr>
                    <td align="center">
                        {{ $warga->kk->where('sanitasi', '=', 'SPALD Individu')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->kk->where('sanitasi', '=', 'SPALD Komunal')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->kk->where('sanitasi', '=', 'WC Umum')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->kk->where('sanitasi', '=', 'BABs')
                    ->count() }}
                    </td>
                </tr>
                <tr>
                    <td rowspan="2"></td>
                    <td rowspan="2" valign="middle" colspan="2">Dinding </td>
                    <td align="center">Tembok</td>
                    <td align="center">Triplek</td>
                    <td align="center">Bambu</td>
                    <td align="center">Kayu</td>
                    <td align="center">Anyaman/Gedeg</td>
                </tr>
                <tr>
                    <td align="center">
                        {{ $warga->kk->where('bangunan', '=', 'Tembok')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->kk->where('bangunan', '=', 'Triplek')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->kk->where('bangunan', '=', 'Bambu')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->kk->where('bangunan', '=', 'Kayu')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->kk->where('bangunan', '=', 'Anyaman/Gedeg')
                    ->count() }}
                    </td>
                </tr>

                <tr>
                    <td rowspan="2"></td>
                    <td rowspan="2" valign="middle" colspan="2">Akses air minum </td>
                    <td align="center">PDAM</td>
                    <td align="center">Swadaya PAM</td>
                    <td align="center">Sumur</td>
                    <td align="center">Mata_Air/Belik</td>
                    <td align="center">Galon,dll</td>
                </tr>
                <tr>
                    <td align="center">
                        {{ $warga->kk->where('minum', '=', 'PDAM')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->kk->where('minum', '=', 'Swadaya PAM')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->kk->where('minum', '=', 'Galon')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->kk->where('minum', '=', 'Mata Air/Belik')
                    ->count() }}
                    </td>
                    <td align="center">
                        {{ $warga->kk->where('minum', '=', 'Sumur')
                    ->count() }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Rumah Tangga Menempati Rumah Tidak Layak Huni</td>
                    <td colspan="3" align="center">
                        @if($warga->kk)
                        {{ $warga->kk
                        ->where('hunian', '=', 'Tidak Layak')
                  ->count() }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Jalan Lingkungan</td>
                    <td colspan="3" align="center">
                        {{ $warga->jalan_lingkungan }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Data titik-titik ruang publik skala lingkungan yang belum dilayani Penerangan umum</td>
                    <td colspan="3" align="center">
                        {{ $warga->perlu_penerangan }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Drainase Lingkungan</td>
                    <td colspan="3" align="center">
                        {{ $warga->drainase }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Proteksi Kebakaran</td>
                    <td colspan="3" align="center">
                        {{ $warga->proteksi_kebakaran }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Jumlah Alat Pemadam Kebakaran Ringan</td>
                    <td colspan="3" align="center">
                        {{ $warga->apkr }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Kebutuhan Alat Pemadam Kebakaran Ringan</td>
                    <td colspan="3" align="center">
                        {{ $warga->kebutuhan_apkr }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Pos Keamanan Lingkungan</td>
                    <td colspan="3" align="center">
                        {{ $warga->poskamling }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Kebutuhan Sarana Pos Keamanan Lingkungan</td>
                    <td colspan="3" align="center">
                        {{ $warga->sarpras_kamling }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Gedung Pertemuan Warga Masyarakat</td>
                    <td colspan="3" align="center">
                        {{ $warga->bale_warga }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Kebutuhan Sarpras Gedung Pertemuan</td>
                    <td colspan="3" align="center">
                        {{ $warga->sarpras_bale }}
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Rumah Tangga yang Melaksanakan Urban Farming</td>
                    <td colspan="3" align="center">
                        @if($warga->kk)
                        {{ $warga->kk
                        ->where('urban_farming', '=', 'Ya')
                  ->count() }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Bidang yang dilakukan</td>
                    <td colspan="3" align="center">
                        @if($warga->kk)
                        @forelse($warga->kk as $a)
                        <div> {{$a->bidang }} </div>
                        @empty @endforelse
                        @endif
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Pengalaman Berusaha</td>
                    <td colspan="3" align="center">
                        @if($warga->kk)
                        @forelse($warga->kk as $a)
                        <div> {{$a->pengalaman }} </div>
                        @empty @endforelse
                        @endif
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Nama Kelompok</td>
                    <td colspan="3" align="center">
                        @if($warga->kk)
                        @forelse($warga->kk as $a)
                        <div> {{$a->nama_kelompok }} </div>
                        @empty @endforelse
                        @endif
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Lokasi Usaha</td>
                    <td colspan="3" align="center">
                        @if($warga->kk)
                        @forelse($warga->kk as $a)
                        <div> {{$a->lokasi_usaha }} </div>
                        @empty @endforelse
                        @endif
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Luas Lahan</td>
                    <td colspan="3" align="center">
                        @if($warga->kk)
                        @forelse($warga->kk as $a)
                        <div> {{$a->luas_lahan }} </div>
                        @empty @endforelse
                        @endif
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Bentuk Lahan</td>
                    <td colspan="3" align="center">
                        @if($warga->kk)
                        @forelse($warga->kk as $a)
                        <div> {{$a->bentuk_lahan }} </div>
                        @empty @endforelse
                        @endif
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Status Lahan</td>
                    <td colspan="3" align="center">
                        @if($warga->kk)
                        @forelse($warga->kk as $a)
                        <div> {{$a->status_lahan }} </div>
                        @empty @endforelse
                        @endif
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="4">Data Keswadayaan Masyarakat (Sumbangan)</td>
                    <td colspan="3">
                        @if($warga->sumbangan)
                        @forelse($warga->sumbangan as $a)
                        <div class="row">
                            <div class="col-sm-1 text-center">{{ $loop->iteration }}.</div>
                            <div class="col-sm-11"> {{ ucFirst($a->sumbangan) }} @if($a->kegiatan) {{"untuk ".$a->kegiatan  }}@endif
                            </div>
                        </div>
                        @empty @endforelse
                        @endif
                    </td>

                </tr>
            </table>
            @endif
        </article>
    </section>
</body>

</html>