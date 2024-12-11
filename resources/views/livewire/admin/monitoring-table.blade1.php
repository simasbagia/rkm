<x-page-index>
    <!-- tombol filter -->
    <!-- {{ $level }}  -->
    <x-slot name="page_button">
        <div class="row">
            <div class="input-group">
                @if ($pilih_kec == 0)
                <div class="col-md-3">&nbsp;&nbsp;Kecamatan<br />
                    <select class="form-control" wire:model="pilih_kec" wire:click="rset_kec">
                        <option value=0>All</option>
                        @foreach ($kec as $kece)
                        <option value="{{ $kece->kec->id }}">{{ $kece->kec->singkatan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
                @else
                @if ($pilih_kel == 0)
                <div class="col-sm-3">&nbsp;&nbsp;Kecamatan<br />
                    <select class="form-control" wire:model="pilih_kec" wire:click="rset_kec">
                        <option value=0>All</option>
                        @foreach ($kec as $kece)
                        <option value="{{ $kece->kec->id }}">{{ $kece->kec->singkatan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3">&nbsp;&nbsp;Kelurahan<br />
                    <select class="form-control" wire:model="pilih_kel" wire:click="rset_kel">
                        <option value=0>All</option>
                        @foreach ($kel as $kele)
                        <option value="{{ $kele->kel->id }}">{{ $kele->kel->singkatan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
                @else
                <div class="col-sm-3">&nbsp;&nbsp;Kecamatan<br />
                    <select class="form-control" wire:model="pilih_kec" wire:click="rset_kec">
                        <option value=0>All</option>
                        @foreach ($kec as $kece)
                        <option value="{{ $kece->kec->id }}">{{ $kece->kec->singkatan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3">&nbsp;&nbsp;Kelurahan<br />
                    <select class="form-control" wire:model="pilih_kel" wire:click="rset_kel">
                        <option value=0>All</option>
                        @foreach ($kel as $kele)
                        <option value="{{ $kele->kel->id }}">{{ $kele->kel->singkatan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2">&nbsp;&nbsp;Pokmas<br />
                    <select class="form-control" wire:model="pilih_pokmas" wire:click="rset_rw">
                        <option value=0 wire:click="rset_rw">All</option>
                        @foreach ($pm as $pokmas)
                        <option value="{{ $pokmas->id }}">{{ $pokmas->pokmas }}</option>
                        @endforeach
                    </select>
                </div>
                @if ($pilih_pokmas == 0)
                <div class="col"></div>
                <div class="col"></div>
                @else
                <div class="col-sm-2">&nbsp;&nbsp;RW<br />
                    <select class="form-control" wire:model="pilih_rw" wire:click="rset_rt">
                        <option value=0 wire:click="rset_rw">All</option>
                        @foreach ($rw as $rwe)
                        <option value="{{ $rwe->rw->id }}">{{ $rwe->rw->rw }}</option>
                        @endforeach
                    </select>
                </div>

                @if ($pilih_rw == 0)
                <div class="col"></div>
                <div class="col"></div>
                @else
                @if ($pilih_rt == 0)

                <div class="col-sm-2">&nbsp;&nbsp;RT<br />
                    <select class="form-control" wire:model="pilih_rt" wire:click="rset_kk">
                        <option value="0" wire:click="rset_rt">All</option>
                        @foreach ($rt as $rte)
                        <option value="{{ $rte->id }}">{{ $rte->rt }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col"></div>
                @else
                <div class="col-sm-2">&nbsp;&nbsp;RT<br />
                    <select class="form-control" class="form-control" wire:model="pilih_rt" wire:click="rset_kk">
                        <option value="0" wire:click="rset_rt">All</option>
                        @foreach ($rt as $rte)
                        <option value="{{ $rte->id }}">{{ $rte->rt }}</option>
                        @endforeach
                    </select>
                </div>
                @endif
                @endif
                @endif
                @endif
                @endif
            </div>
        </div>
        @if ($pilih_rt == 0)
        @endif
    </x-slot>
    {{-- {{ $pilih_pokmas }} --}}
    <!-- tabel header -->
    <x-slot name="table_tool">
        <x-table-tool-nopc>
            </x-tbtool>
    </x-slot>
    <x-slot name="table_column">
        <th width="45">RW</th>
        <th width="45">RT</th>
        <th>Kegiatan</th>
        <th>Kontrak</th>
        <th>Realisasi</th>
        <th>Penyerahan</th>
        <th>
            @if ($pilih_pokmas == 0) Pokmas
            @else
            @if($level == 'Pendamping RT') Aksi
            @else
            @endif
            @endif
        </th>
    </x-slot>
    {{-- isi tabel --}}
    @if($level == 'SuperAdmin' || $level == 'OPD' || $level == 'Korkot')
    @if ($pilih_pokmas == 0)
    @forelse($rw as $drw)
    <td @if ($drw->rw->usulan->count() >= 1) rowspan="{{ $drw->rw->usulan->count() }}" @endif>
        <a wire:click="$emitTo('admin.warga-detail', 'showData', {{ $drw->rw->id }},'rw')">
            {{ $drw->rw->rw }}
        </a>
    </td>
    @forelse($rt as $drt)
    @if ($drw->rw->id == $drt->rw_id && $drt->usulan->count() != 0)
    <td rowspan="{{ $drt->usulan->count() }}">
        <a wire:click="$emitTo('admin.warga-detail', 'showData', {{ $drt->id }},'rt')">
            {{ $drt->rt }}
        </a>
    </td>
    @forelse($drt->usulan as $usl)
    <td>
        @if ($drt->usulan->count() <= 1) @else{{ $loop->iteration }}. @endif {{ $usl->nama }} </td>
    <td>
        @if ($usl->kontrak)
        {{ number_format($usl->kontrak, 0, ',', '.') }}
        @endif
    </td>
    <td>
        @forelse($usl->realisasi as $real)
        @if ($usl->realisasi->count()
        <= 1) @else{{ $loop->iteration }}) @endif {{ number_format($real->realisasi, 0, ',', '.') }}<br />
        @empty
        @endforelse
    </td>
    <td>{{ $usl->tanggal_serah }}</td>
    <td align="left">
        {{ $drt->pokmas->pokmas }}
    </td>
    </tr>
    @empty @endforelse {{-- drt-usulan as usl --}}
    @else
    @endif
    @empty @endforelse {{-- rt as drt --}}
    </tr>
    @empty @endforelse {{-- rw as drw --}}
    <tr>
        <td colspan="3" align="right">
            Jumlah
        </td>
        <td align="right">
            {{ number_format($usulan->where('kel_id', '=', $pilih_kel)->sum('kontrak'), 0, ',', '.') }}
        </td>
        <td align="right">
            {{ number_format($realisasi->where('kel_id', '=', $pilih_kel)->sum('realisasi'), 0, ',', '.') }}

        </td>
        <td colspan="2"></td>
    </tr>

    @else {{-- pilih pokmas !=0 --}}
    <tr>
        @if ($pilih_rw == 0)
        @forelse($rw as $drw)
        <td @if ($drw->rw->usulan->count() >= 1) rowspan="{{ $drw->rw->usulan->count() }}" @endif>
            <a wire:click="$emitTo('admin.warga-detail', 'showData', {{ $drw->rw->id }},'rw')">
                {{ $drw->rw->rw }}
            </a>
        </td>
        @forelse($rt as $drt)
        @if ($drw->rw->id == $drt->rw_id && $drt->usulan->count() != 0)
        <td rowspan="{{ $drt->usulan->count() }}">
            <a wire:click="$emitTo('admin.warga-detail', 'showData', {{ $drt->id }})">
                <a wire:click="$emitTo('admin.warga-detail', 'showData', {{ $drt->id }},'rt')">
                    {{ $drt->rt }}
                </a>
            </a>
        </td>
        @forelse($drt->usulan as $usl)
        <td>
            @if ($drt->usulan->count() <= 1) @else{{ $loop->iteration }}. @endif {{ $usl->nama }} </td>
        <td>
            @if ($usl->kontrak)
            {{ number_format($usl->kontrak, 0, ',', '.') }}
            @endif
        </td>
        <td>
            @forelse($usl->realisasi as $real)
            @if ($usl->realisasi->count()
            <= 1) @else{{ $loop->iteration }}) @endif {{ number_format($real->realisasi, 0, ',', '.') }}<br />
            @empty
            @endforelse
        </td>
        <td>{{ $usl->tanggal_serah }}</td>
        <td align="left"></td>
    </tr>
    @empty @endforelse {{-- drt-usulan as usl --}}
    @endif
    @empty @endforelse {{-- rt as drt --}}
    </tr>
    @empty @endforelse {{-- rw as drw --}}
    <tr>
        <td colspan="3" align="right">
            Jumlah
        </td>
        <td align="right">
            {{ number_format($usulan
                ->where('pokmas_id', '=', $pilih_pokmas)
                ->sum('kontrak'), 0, ',', '.') }}
        </td>
        <td align="right">
            {{ number_format($realisasi
                ->where('pokmas_id', '=', $pilih_pokmas)
                ->sum('realisasi'), 0, ',', '.') }}

        </td>
        <td colspan="2"></td>
    </tr>
    @else {{-- jika rw != 0 --}}
    @if ($pilih_rt == 0)
    @forelse($rw as $drw)
    @if ($drw->rw->id == $pilih_rw)
    <tr>
        <td @if ($drw->rw->usulan->count() >= 1) rowspan="{{ $drw->rw->usulan->count() }}" @endif>
            <a wire:click="$emitTo('admin.warga-detail', 'showData', {{ $drw->rw->id }},'rw')">
                {{ $drw->rw->rw }}
            </a>
        </td>
        @forelse($rt as $drt)
        @if ($drw->rw->id == $drt->rw_id && $drt->usulan->count() != 0)
        <td rowspan="{{ $drt->usulan->count() }}">
            <a wire:click="$emitTo('admin.warga-detail', 'showData', {{ $drt->id }},'rt')">
                {{ $drt->rt }}
            </a>
        </td>
        @forelse($drt->usulan as $usl)
        <td>
            @if ($drt->usulan->count() <= 1) @else{{ $loop->iteration }}. @endif {{ $usl->nama }} </td>
        <td>
            @if ($usl->kontrak)
            {{ number_format($usl->kontrak, 0, ',', '.') }}
            @else
            @endif
        </td>
        <td>
            @forelse($usl->realisasi as $real)
            @if ($usl->realisasi->count()
            <= 1) @else{{ $loop->iteration }}) @endif {{ number_format($real->realisasi, 0, ',', '.') }}<br />
            @empty
            @endforelse
        </td>
        <td>{{ $usl->tanggal_serah }}</td>
        <td align="center"> </td>
    </tr> @empty @endforelse {{-- drt-usulan as usl --}}
    @endif
    @empty @endforelse {{-- rt as drt --}}
    </tr>
    @endif
    @empty @endforelse {{-- rw as drw --}}
    <tr>
        <td colspan="3" align="right">
            Jumlah
        </td>
        <td align="right">
            {{ number_format(
                    $usulan->where('pokmas_id', '=', $pilih_pokmas)->where('rw_id', '=', $pilih_rw)->sum('kontrak'),
                    0,
                    ',',
                    '.',
                ) }}
        </td>
        <td align="right">
            {{ number_format(
                    $realisasi->where('pokmas_id', '=', $pilih_pokmas)->where('rw_id', '=', $pilih_rw)->sum('realisasi'),
                    0,
                    ',',
                    '.',
                ) }}
        </td>
        <td colspan="2"></td>
    </tr>
    @else {{-- jika rt dipilih --}}
    @forelse($rw as $drw)
    @if ($drw->rw->id == $pilih_rw)
    <tr>
        <td @if ($drw->rw->usulan->count() >= 1) rowspan="{{ $drw->rw->usulan->where('rt_id', '=', $pilih_rt)->count() }}" @endif>
            <a wire:click="$emitTo('admin.warga-detail', 'showData', {{ $drw->rw->id }},'rw')">
                {{ $drw->rw->rw }}
            </a>
        </td>
        @forelse($rt as $drt)
        @if ($drw->rw->id == $drt->rw_id && $drt->id == $pilih_rt && $drt->usulan->count() != 0)
        <td rowspan="{{ $drt->usulan->count() }}">
            <a wire:click="$emitTo('admin.warga-detail', 'showData', {{ $drt->id }},'rt')">
                {{ $drt->rt }}
            </a>
        </td>
        @forelse($drt->usulan as $usl)
        <td>
            @if ($drt->usulan->count() <= 1) @else{{ $loop->iteration }}. @endif {{ $usl->nama }} </td>
        <td>
            @if ($usl->kontrak)
            {{ number_format($usl->kontrak, 0, ',', '.') }}
            @else
            @endif
        </td>
        <td>
            @forelse($usl->realisasi as $real)
            @if ($usl->realisasi->count()
            <= 1) @else{{ $loop->iteration }}) @endif {{ number_format($real->realisasi, 0, ',', '.') }}<br />
            @empty
            @endforelse
        </td>
        <td>{{ $usl->tanggal_serah }}</td>
        <td align="center">

        </td>
    </tr>
    @empty
    @endforelse
    @else
    @endif
    @empty
    @endforelse
    </tr>
    @endif
    @empty
    @endforelse
    <tr>
        <td colspan="3" align="right">
            Jumlah
        </td>
        <td align="right">
            {{ number_format(
                    $usulan
                    ->whereIn('pokmas_id', $pilih_pokmas)
                    ->where('rw_id', '=', $pilih_rw)
                    ->where('rt_id', '=', $pilih_rt)
                    ->sum('kontrak'),
                    0,
                    ',',
                    '.',
                ) }}
        </td>
        <td align="right">
            {{ number_format(
                    $realisasi
                    ->where('pokmas_id', '=', $pilih_pokmas)
                    ->where('rw_id', '=', $pilih_rw)
                    ->where('rt_id', '=', $pilih_rt)
                    ->sum('realisasi'),
                    0,
                    ',',
                    '.',
                ) }}
        </td>
        <td colspan="2"></td>
    </tr>
    @endif {{-- pilih rt==0 --}}
    @endif {{-- pilih rw==0 --}}

    @endif {{-- akhir if SU/OPD/Korkot --}}

    @elseif($level == 'Pendamping RT')
    {{-- jika pokmas dipilih --}}
    @if ($pilih_rw == 0)
    @forelse($rw as $drw)
    <td @if ($drw->rw->usulan->count() >= 1) rowspan="{{ $drw->rw->usulan->count() }}" @endif>
        {{ $drw->rw->rw }}
    </td>
    @forelse($rt as $drt)
    @if ($drw->rw->id == $drt->rw_id && $drt->usulan->count() != 0)
    <td rowspan="{{ $drt->usulan->count() }}">
        <a wire:click="$emitTo('admin.warga-detail', 'showData', {{ $drt->id }},'rt')">
            {{ $drt->rt }}
        </a>
    </td>
    @forelse($drt->usulan as $usl)
    <td>
        @if ($drt->usulan->count() <= 1) @else{{ $loop->iteration }}. @endif {{ $usl->nama }} </td>
    <td>
        @if ($usl->kontrak)
        {{ number_format($usl->kontrak, 0, ',', '.') }}
        @else
        @endif
    </td>

    <td>
        @forelse($usl->realisasi as $real)
        @if ($usl->realisasi->count()
        <= 1) @else{{ $loop->iteration }}) @endif {{ number_format($real->realisasi, 0, ',', '.') }}<br />
        @empty
        @endforelse
    </td>
    <td>{{ $usl->tanggal_serah }}</td>
    @if($pilih_pokmas==0)
    <td align="left">{{ $drt->pokmas->pokmas??'' }}</td>
    @else
    <td align="center">
        <x-table-action_edit form="admin.monitor-form" iddata="{{ $usl->id }}">
        </x-table-action_edit>
    </td>
    @endif
    </tr>
    @empty
    @endforelse
    @else
    @endif
    @empty
    @endforelse
    </tr>
    @empty
    @endforelse
    <tr>
        <td colspan="3" align="right">
            Jumlah
        </td>
        <td align="right">
            {{ number_format($usulan->where('pokmas_id', '=', $pilih_pokmas)->sum('kontrak'), 0, ',', '.') }}
        </td>
        <td align="right">
            {{ number_format($realisasi->where('pokmas_id', '=', $pilih_pokmas)->sum('realisasi'), 0, ',', '.') }}

        </td>
        <td colspan="2"></td>
    </tr>
    @else
    @if ($pilih_rt == 0)
    @forelse($rw as $drw)
    @if ($drw->rw->id == $pilih_rw)
    <tr>
        <td @if ($drw->rw->usulan->count() >= 1) rowspan="{{ $drw->rw->usulan->count() }}" @endif>
            {{ $drw->rw->rw }}
        </td>
        @forelse($rt as $drt)
        @if ($drw->rw->id == $drt->rw_id && $drt->usulan->count() != 0)
        <td rowspan="{{ $drt->usulan->count() }}">
            <a wire:click="$emitTo('admin.warga-detail', 'showData', {{ $drt->id }},'rt')">
                {{ $drt->rt }}
            </a>
        </td>
        @forelse($drt->usulan as $usl)
        <td>
            @if ($drt->usulan->count() <= 1) @else{{ $loop->iteration }}. @endif {{ $usl->nama }} </td>
        <td>
            @if ($usl->kontrak)
            {{ number_format($usl->kontrak, 0, ',', '.') }}
            @else
            @endif
        </td>
        <td>
            @forelse($usl->realisasi as $real)
            @if ($usl->realisasi->count()
            <= 1) @else{{ $loop->iteration }}) @endif {{ number_format($real->realisasi, 0, ',', '.') }}<br />
            @empty
            @endforelse
        </td>
        <td>{{ $usl->tanggal_serah }}</td>
        <td align="center">
            @can('ePdrt')
            <x-table-action_edit form="admin.monitor-form" iddata="{{ $usl->id }}">
            </x-table-action_edit>
            @endcan
        </td>
    </tr>
    @empty
    @endforelse
    @else
    @endif
    @empty
    @endforelse
    </tr>
    @endif
    @empty
    @endforelse
    <tr>
        <td colspan="3" align="right">
            Jumlah
        </td>
        <td align="right">
            {{ number_format(
                $usulan->where('pokmas_id', '=', $pilih_pokmas)->where('rw_id', '=', $pilih_rw)->sum('kontrak'),
                0,
                ',',
                '.',
            ) }}
        </td>
        <td align="right">
            {{ number_format(
                $realisasi->where('pokmas_id', '=', $pilih_pokmas)->where('rw_id', '=', $pilih_rw)->sum('realisasi'),
                0,
                ',',
                '.',
            ) }}
        </td>
        <td colspan="2"></td>
    </tr>

    {{-- jika rt terpilih --}}
    @else
    @forelse($rw as $drw)
    @if ($drw->rw->id == $pilih_rw)
    <tr>
        <td @if ($drw->rw->usulan->count() >= 1) rowspan="{{ $drw->rw->usulan->where('rt_id', '=', $pilih_rt)->count() }}" @endif>
            {{ $drw->rw->rw }}
        </td>
        @forelse($rt as $drt)
        @if ($drw->rw->id == $drt->rw_id && $drt->id == $pilih_rt && $drt->usulan->count() != 0)
        <td rowspan="{{ $drt->usulan->count() }}">
            <a wire:click="$emitTo('admin.warga-detail', 'showData', {{ $drt->id }},'rt')">
                {{ $drt->rt }}
            </a>
        </td>
        @forelse($drt->usulan as $usl)
        <td>
            @if ($drt->usulan->count() <= 1) @else{{ $loop->iteration }}. @endif {{ $usl->nama }} </td>
        <td>
            @if ($usl->kontrak)
            {{ number_format($usl->kontrak, 0, ',', '.') }}
            @else
            @endif
        </td>
        <td>
            @forelse($usl->realisasi as $real)
            @if ($usl->realisasi->count()
            <= 1) @else{{ $loop->iteration }}) @endif {{ number_format($real->realisasi, 0, ',', '.') }}<br />
            @empty
            @endforelse
        </td>
        <td>{{ $usl->tanggal_serah }}</td>
        <td align="center">

            @can('ePdrt')
            <x-table-action_edit form="admin.monitor-form" iddata="{{ $usl->id }}">
            </x-table-action_edit>
            @endcan
        </td>
    </tr>
    @empty
    @endforelse
    @else
    @endif
    @empty
    @endforelse
    </tr>
    @endif
    @empty
    @endforelse
    {{-- jumlah per rt --}}
    <tr>
        <td colspan="3" align="right">
            Jumlah
        </td>
        <td align="right">
            {{ number_format(
                $usulan->where('pokmas_id', '=', $pilih_pokmas)->where('rw_id', '=', $pilih_rw)->where('rt_id', '=', $pilih_rt)->sum('kontrak'),
                0,
                ',',
                '.',
            ) }}
        </td>
        <td align="right">
            {{ number_format(
                $realisasi->where('pokmas_id', '=', $pilih_pokmas)->where('rw_id', '=', $pilih_rw)->where('rt_id', '=', $pilih_rt)->sum('realisasi'),
                0,
                ',',
                '.',
            ) }}
        </td>
        <td colspan="2"></td>
    </tr>

    @endif {{-- pilih rt==0 --}}
    @endif {{-- pilih rw==0 --}}

    @endif {{-- pilih pokmas==0 --}}
    <x-slot name="table_page">
    </x-slot>

    <x-slot name="page_form">
        <livewire:admin.monitor-form>
    </x-slot>
    <x-slot name="dialog">
        @if ($id_delete)
        <x-dialog></x-dialog>
        @endif
        <div x-data="{ 'showDetail': false }" x-on:detail-ready.window="showDetail = true">
            <div x-show.transition="showDetail" x-cloak>
                <livewire:admin.warga-detail>
            </div>
        </div>
    </x-slot>
</x-page-index>