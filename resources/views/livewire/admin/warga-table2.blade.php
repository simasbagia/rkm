<x-page-index>
    <!-- tombol filter -->
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
                            {{-- <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">All</button> --}}
                            <select class="form-control" wire:model="pilih_kec" wire:click="rset_kec">
                                <option value=0>All</option>
                                @foreach ($kec as $kece)
                                    <option value="{{ $kece->kec->id }}">{{ $kece->kec->singkatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">&nbsp;&nbsp;Kelurahan<br />
                            <select class="form-control" wire:model="pilih_kel" wire:click="rset_rw">
                                <option value=0 wire:click="rset_kel">All</option>
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
                            <select class="form-control" wire:model="pilih_kel" wire:click="rset_rw">
                                <option value=0 wire:click="rset_kel">All</option>
                                @foreach ($kel as $kele)
                                    <option value="{{ $kele->kel->id }}">{{ $kele->kel->singkatan }}</option>
                                @endforeach
                            </select>
                        </div>
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
                                    <select class="form-control" class="form-control" wire:model="pilih_rt"
                                        wire:click="rset_kk">
                                        <option value="0" wire:click="rset_rt">All</option>
                                        @foreach ($rt as $rte)
                                            <option value="{{ $rte->id }}">{{ $rte->rt }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">&nbsp;&nbsp;Data<br />
                                    <select class="form-control" wire:model="pilih_kk" wire:click="rset_search">
                                        <option value="0" wire:click="rset_kk">KK</option>
                                        <option value="1">Keluarga</option>
                                        <option value="2">UMKM</option>
                                        <option value="3">KKM</option>
                                        <option value="4">Potensi</option>
                                        <option value="5">RKM</option>
                                        <option value="6">Sumbangan</option>
                                        {{-- <option value="9">RKM2</option> --}}
                                    </select>
                                </div>
                            @endif
                        @endif
                    @endif
                @endif
            </div>
        </div>
        @if ($pilih_rt == 0)
        @else
            <hr />
            @if ($pilih_kk == 0)
                <div class="row">
                    <div class="input-group mb-3" wire:click="rset">
                        <input type="text" class="form-control" placeholder="Tambah Nomer KK"
                            wire:model.debounce.150ms="caricalon" type="varchar" wire:keydown.escape="rset"
                            wire:keydown.enter="tambahKk" wire:click="rset" autofocus>
                        <button class="btn btn-outline-secondary" type="button" wire:click="tambahKk">Simpan</button>
                    </div>
                </div>
            @elseif($pilih_kk == 2)
                <div class="row">
                    <div class="input-group mb-3" wire:click="rset">
                        <input type="text" class="form-control" placeholder="Tambah Nama UMKM"
                            wire:model.debounce.150ms="caricalon" type="varchar" wire:keydown.escape="rset"
                            wire:keydown.enter="tambahUmkm" wire:click="rset" autofocus>
                        <button class="btn btn-outline-secondary" type="button" wire:click="tambahUmkm">Simpan</button>
                    </div>
                </div>
            @elseif($pilih_kk == 3)
                <div class="row"wire:click="rset">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Tambah Kelompok Kegiatan Masyarakat"
                            wire:model.debounce.150ms="caricalon" type="varchar" wire:keydown.escape="rset"
                            wire:keydown.enter="tambahKkm" wire:click="rset" autofocus>
                        <button class="btn btn-outline-secondary" type="button"
                            wire:click="tambahKkm">Simpan</button>
                    </div>
                </div>
            @elseif($pilih_kk == 4)
                <div class="row">
                    <div class="input-group mb-3" wire:click="rset">
                        <input type="text" class="form-control" placeholder="Tambah Potensi"
                            wire:model.debounce.150ms="caricalon" type="varchar" wire:keydown.escape="rset"
                            wire:keydown.enter="tambahPotensi" wire:click="rset" autofocus>
                        <button class="btn btn-outline-secondary" type="button"
                            wire:click="tambahPotensi">Simpan</button>
                    </div>
                </div>
            @elseif($pilih_kk == 5)
                <div class="row">
                    <div class="input-group mb-3" wire:click="rset">
                        <input type="text" class="form-control" placeholder="Cari bentuk kegiatan ..."
                            wire:model.debounce.150ms="caricalon" wire:keydown.escape="rset" wire:click="rset"
                            autofocus>
                        @forelse ($b_keg as $i => $b_keg)
                            <div wire:click="pilih_b_keg({{ $b_keg->id }})"
                                class="list-group-item list-group-item-action list-group-item-light">
                                {{ $b_keg->j_kegiatan->p_kegiatan->kode }}.
                                {{ $b_keg->j_kegiatan->kode }}.
                                {{ $b_keg->kode }} ~ {{ ucfirst($b_keg->nama) }}
                            </div>
                        @empty 
                        @endforelse
                    </div>
                </div>
                @elseif($pilih_kk == 6)
                <div class="row">
                    <div class="input-group mb-3" wire:click="rset">
                        <input type="text" class="form-control" placeholder="Tambah Sumbangan"
                            wire:model.debounce.150ms="caricalon" type="varchar" wire:keydown.escape="rset"
                            wire:keydown.enter="tambahSumbangan" wire:click="rset" autofocus>
                        <button class="btn btn-outline-secondary" type="button"
                            wire:click="tambahSumbangan">Simpan</button>
                    </div>
                </div>
            @endif
        @endif
    </x-slot>
    <!-- tabel header -->
    @if ($pilih_rw == 0)
        <x-slot name="table_tool">
            <x-table-tool-nopc>
                </x-tbtool>
        </x-slot>
        <x-slot name="table_column">
            <th>
                <x-table-header field="rw" sortField="{{ $sortField }}" :sortAsc="$sortAsc">RW
                    </x-tbheader>
            </th>
            <th>
                <x-table-header field="ketua" sortField="{{ $sortField }}" :sortAsc="$sortAsc">Ketua
                    </x-tbheader>
            </th>
            <th>
                <x-table-header field="pokmas" sortField="{{ $sortField }}" :sortAsc="$sortAsc">Aksi
                    </x-tbheader>
            </th>
        </x-slot>
    @else
        @if ($pilih_rt == 0)
            <x-slot name="table_tool">
                <x-table-tool-nopc>
                    </x-tbtool>
            </x-slot>
            <x-slot name="table_column">
                <th>
                    <x-table-header field="rt" sortField="{{ $sortField }}" :sortAsc="$sortAsc">RT
                        </x-tbheader>
                </th>
                <th>
                    <x-table-header field="ketua" sortField="{{ $sortField }}" :sortAsc="$sortAsc">Ketua
                        </x-tbheader>
                </th>
                <th>
                    <x-table-header field="pokmas" sortField="{{ $sortField }}" :sortAsc="$sortAsc">Aksi
                        </x-tbheader>
                </th>
            </x-slot>
        @else
            @if ($pilih_kk <= 1)
                <x-slot name="table_tool">
                    <x-table-tool-nopage>
                        </x-tbtool>
                </x-slot>
            @else
                <x-slot name="table_tool">
                    <x-table-tool-nopc>
                        </x-tbtool>
                </x-slot>
            @endif
            <x-slot name="table_no">
                <th width="30">No</th>
            </x-slot>
            <x-slot name="table_column">
                @if ($pilih_kk == 0)
                    <th>
                        <x-table-header field="rt" sortField="{{ $sortField }}" :sortAsc="$sortAsc">
                            No_KK </x-tbheader>
                    </th>
                    <th>
                        <x-table-header field="ka_kk" sortField="{{ $sortField }}" :sortAsc="$sortAsc">
                            @if ($tipe == 'nama')
                                Nama
                            @else
                                Ka Keluarga
                            @endif
                            </x-tbheader>
                    </th>
                    <x-slot name="table_action">
                        <th width="70">Aksi</th>
                    </x-slot>
                @elseif($pilih_kk == 1)
                    @if ($tipe == 'nama')
                        <th>
                            <x-table-header field="nama" sortField="{{ $sortField }}" :sortAsc="$sortAsc">
                                Nama </x-tbheader>
                        </th>
                        <th>
                            <x-table-header field="pendidikan" sortField="{{ $sortField }}" :sortAsc="$sortAsc">
                                Pendidikan </x-tbheader>
                        </th>
                        <x-slot name="table_action">
                            <th width="70">Aksi</th>
                        </x-slot>
                    @else
                        <th>
                            <x-table-header field="rt" sortField="{{ $sortField }}" :sortAsc="$sortAsc">
                                No_KK </x-tbheader>
                        </th>
                        <th>
                            <x-table-header field="ka_kk" sortField="{{ $sortField }}" :sortAsc="$sortAsc">
                                Ka Keluarga </x-tbheader>
                        </th>
                        <x-slot name="table_action">
                            <th width="70">Aksi</th>
                        </x-slot>
                    @endif
                @elseif($pilih_kk == 2 || $pilih_kk == 3)
                    <th>
                        <x-table-header field="nama" sortField="{{ $sortField }}" :sortAsc="$sortAsc">
                            Nama </x-tbheader>
                    </th>
                    <th>
                        <x-table-header field="jenis" sortField="{{ $sortField }}" :sortAsc="$sortAsc">
                            Jenis </x-tbheader>
                    </th>
                    <x-slot name="table_action">
                        <th width="70">Aksi</th>
                    </x-slot>
                @elseif($pilih_kk == 4)
                    <th>
                        <x-table-header field="nama" sortField="{{ $sortField }}" :sortAsc="$sortAsc">
                            Potensi </x-tbheader>
                    </th>
                    <th>
                        <x-table-header field="pengembangan" sortField="{{ $sortField }}" :sortAsc="$sortAsc">
                            Pengembangan </x-tbheader>
                    </th>
                    <x-slot name="table_action">
                        <th width="70">Aksi</th>
                    </x-slot>
                @elseif($pilih_kk == 5)
                    <th colspan="15" class="text-center">
                        Kegiatan
                    </th>
                    @elseif($pilih_kk == 6)
                    <th>
                        <x-table-header field="sumbangan" sortField="{{ $sortField }}" :sortAsc="$sortAsc">
                            Sumbangan </x-tbheader>
                    </th>
                    <th>
                        <x-table-header field="kegiatan" sortField="{{ $sortField }}" :sortAsc="$sortAsc">
                            Kegiatan </x-tbheader>
                    </th>
                    <x-slot name="table_action">
                        <th width="70">Aksi</th>
                    </x-slot>
                
                @endif
            </x-slot>
        @endif
    @endif
    {{-- isi tabel --}}
    @if (!$pilih_kel)
        @forelse ($rw as $data)
            <tr>
                <td>{{ $data->rw->rw }} - {{ $data->rw->kel->nama_kel }} - {{ $data->rw->kel->kec->singkatan }}</td>
                <td>
                    <x-table-input iddata="{{ $data->rw->id }}" field="'ketua'"> {{ $data->rw->ketua }}
                    </x-table-input>
                </td>
                <td align="center">
                    <x-table-action_edit form="admin.warga-form-ket-rw" iddata="{{ $data->rw->id }}">
                        </x-tbction>
                </td>
            </tr>
        @empty <tr>
                <td colspan="11">Tidak ada data untuk ditampilkan</td>
            </tr>
        @endforelse
    @else
        @if (!$pilih_rw)
            @forelse ($rw as $data)
                <tr>
                    <td>{{ $data->rw->rw }}</td>
                    <td>
                        <x-table-input iddata="{{ $data->rw->id }}" field="'ketua'"> {{ $data->rw->ketua }}
                        </x-table-input>
                    </td>
                    <td align="center">
                        <x-table-action_edit form="admin.warga-form-ket-rw" iddata="{{ $data->rw->id }}">
                            </x-tbction>
                    </td>
                </tr>
            @empty <tr>
                    <td colspan="11">Tidak ada data untuk ditampilkan</td>
                </tr>
            @endforelse
        @else
            @if (!$pilih_rt)
                @forelse ($rt as $data)
                    <tr>
                        <td>{{ $data->rt }}</td>
                        <td>
                            <x-table-input iddata="{{ $data->id }}" field="'ketua'"> {{ $data->ketua }}
                            </x-table-input>
                        </td>
                        <td align="center">
                            <x-table-action_nodel form="admin.warga-form-ket-rt" iddata="{{ $data->id }}">
                                </x-tbction>
                        </td>
                    </tr>
                @empty <tr>
                        <td colspan="11">Tidak ada data untuk ditampilkan</td>
                    </tr>
                @endforelse
            @else
                <!-- pencabangan info -->
                @if ($pilih_kk == 0)
                    @if ($tipe == 'nokk')
                        @forelse ($warga as $data)
                            <tr>
                                <td class="text-center">
                                    {{ $warga->perPage() * ($warga->currentPage() - 1) + $loop->iteration }}</td>
                                <td>{{ $data->kk }}</td>
                                <td>
                                    @forelse($data->keluarga as $klg)
                                        @if ($klg->posisi == 'Kepala')
                                            {{ $klg->nama }}
                                        @endif
                                    @empty 
                                    @endforelse
                                </td>
                                <td align="center">
                                    <x-table-action_kk form="admin.warga-form" iddata="{{ $data->id }}">
                                        </x-tbction>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11">Tidak ada data untuk ditampilkan</td>
                            </tr>
                        @endforelse
                    @elseif($tipe == 'nama')
                        @forelse ($warga as $data)
                            <tr>
                                <td class="text-center">
                                    {{ $warga->perPage() * ($warga->currentPage() - 1) + $loop->iteration }}</td>
                                <td>{{ $data->kk->kk }}</td>
                                <td>
                                    {{ $data->nama }}
                                </td>
                                <td align="center">
                                    <x-table-action_kk form="admin.warga-form-person" iddata="{{ $data->id }}">
                                        </x-tbction>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11">Tidak ada data untuk ditampilkan</td>
                            </tr>
                        @endforelse
                    @else
                        @forelse ($warga as $data)
                            <tr>
                                <td class="text-center">
                                    {{ $warga->perPage() * ($warga->currentPage() - 1) + $loop->iteration }}</td>
                                <td>{{ $data->kk }}</td>
                                <td>
                                    @forelse($data->keluarga as $klg)
                                        @if ($klg->posisi == 'Kepala')
                                            {{ $klg->nama }}
                                        @endif
                                    @empty 
                                    @endforelse
                                </td>
                                <td align="center">
                                    <x-table-action_kk form="admin.warga-form" iddata="{{ $data->id }}">
                                        </x-tbction>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11">Tidak ada data untuk ditampilkan</td>
                            </tr>
                        @endforelse

                    @endif
                @elseif($pilih_kk == 1)
                    @if ($tipe == 'nama')
                        <!-- nama -->
                        @forelse ($warga as $data)
                            <tr>
                                <td class="text-center">
                                    {{ $warga->perPage() * ($warga->currentPage() - 1) + $loop->iteration }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->pendidikan }}</td>
                                <td align="center">
                                    <x-table-action_klg form="admin.warga-form-person" iddata="{{ $data->id }}">
                                        </x-tbction>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11">Tidak ada data untuk ditampilkan</td>
                            </tr>
                        @endforelse
                    @else($tipe=='nokk')
                        @forelse ($warga as $data)
                            <tr>
                                <td class="text-center">
                                    {{ $warga->perPage() * ($warga->currentPage() - 1) + $loop->iteration }}</td>
                                <td>{{ $data->kk }}</td>
                                <td>
                                    @forelse($data->keluarga as $klg)
                                        @if ($klg->posisi == 'Kepala')
                                            {{ $klg->nama }}
                                        @endif
                                    @empty 
                                    @endforelse
                                </td>
                                <td align="center">
                                    <x-table-action_kk form="admin.warga-form-kel" iddata="{{ $data->id }}">
                                        </x-tbction>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11">Tidak ada data untuk ditampilkan</td>
                            </tr>
                        @endforelse
                    @endif
                @elseif($pilih_kk == 2)
                    @forelse ($warga as $data)
                        <tr>
                            <td class="text-center">
                                {{ $warga->perPage() * ($warga->currentPage() - 1) + $loop->iteration }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->jenis }}</td>
                            <td align="center">
                                <x-table-action_nodtl form="admin.warga-form-umkm" iddata="{{ $data->id }}">
                                </x-table-action_nodtl>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11">Tidak ada data untuk ditampilkan</td>
                        </tr>
                    @endforelse
                @elseif($pilih_kk == 3)
                    @forelse ($warga as $data)
                        <tr>
                            <td class="text-center">
                                {{ $warga->perPage() * ($warga->currentPage() - 1) + $loop->iteration }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->jenis }}</td>
                            <td align="center">
                                <x-table-action_nodtl form="admin.warga-form-kkm" iddata="{{ $data->id }}">
                                </x-table-action_nodtl>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11">Tidak ada data untuk ditampilkan</td>
                        </tr>
                    @endforelse
                @elseif($pilih_kk == 4)
                    @forelse ($warga as $data)
                        <tr>
                            <td class="text-center">
                                {{ $warga->perPage() * ($warga->currentPage() - 1) + $loop->iteration }}</td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->pengembangan }}</td>
                            <td align="center">
                                <x-table-action_nodtl form="admin.warga-form-potensi" iddata="{{ $data->id }}">
                                </x-table-action_nodtl>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11">Tidak ada data untuk ditampilkan</td>
                        </tr>
                    @endforelse
                    @elseif($pilih_kk == 6)
                    @forelse ($warga as $data)
                        <tr>
                            <td class="text-center">
                                {{ $warga->perPage() * ($warga->currentPage() - 1) + $loop->iteration }}</td>
                            <td>{{ $data->sumbangan }}</td>
                            <td>{{ $data->kegiatan }}</td>
                            <td align="center">
                                <x-table-action_nodtl form="admin.warga-form-sumbangan" iddata="{{ $data->id }}">
                                </x-table-action_nodtl>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11">Tidak ada data untuk ditampilkan</td>
                        </tr>
                    @endforelse
                    @elseif($pilih_kk == 5)
                    {{-- {{ $usulan }} --}}
                    @forelse ($pkeg as $pdata)
                        <tr>
                            <td>
                                <div>
                                    {{ $pdata->kode }}.
                                </div>
                            </td>
                            <td colspan="16">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                        {{ Str::ucfirst($pdata->program) }}
                                    </div>
                                    <span class="badge bg-transparent text-dark text-end">
                                        <h6></h6>
                                    </span>
                                </div>
                                @forelse ($jkeg as $jdata)
                                @if ($pdata->id == $jdata->p_id)

                        <tr>
                            <td>
                            </td>
                            <td valign="top">
                                <div class="ms-2 me-auto"> {{ $jdata->kode . '. ' }}</div>
                            </td>
                            <td valign="top" colspan="13">
                                <div class="col">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            {{ Str::ucfirst($jdata->nama) }}<br />
                                        </div>
                                        <span class="badge bg-transparent text-dark text-end">
                                            <h6>
                                            </h6>
                                        </span>
                                    </div>
                                    @forelse ($bkeg as $bdata)
                                        @if ($jdata->id == $bdata->j_id)
                        <tr>
                            <td colspan="2">
                            </td>
                            <td width="5" valign="top">
                                <div class="ms-2 me-auto">
                                    &nbsp;{{ $bdata->kode . '. ' }}
                                </div>
                            </td>
                            <td colspan="11">

                                {{ Str::ucfirst($bdata->nama) }}

                                @forelse ($warga as $rdata)
                                    @if ($bdata->id == $rdata->b_id)
                                        @forelse($rdata->usulan as $usul)
                        <tr>
                            <td colspan="3"></td>
                            <td>{{ $loop->iteration }}.</td>
                            <td colspan="4">
                                {{ ucFirst($usul->nama) }}
                                @if ($usul->keterangan)
                                    :
                                    {{ $usul->keterangan }}&nbsp;
                                @endif
                            </td>
                            <td align="left">
                                {{ $usul->volume }}
                                {{ $usul->satuan }}
                                {{ '@' . number_format($usul->harga, 0, ',', '.') }}
                            </td>
                            <td align="right">
                                {{ number_format($usul->jumlah, 0, ',', '.') }}
                            </td>
                            {{-- <td>
                            </td> --}}
                            {{-- <td>
                            </td> --}}
                            {{-- <td>
                            </td> --}}
                        </tr>
                    @empty
                    @endforelse
                    @endif
                    @empty
                    @endforelse
                    @forelse($bdata->rkm as $irt)
                    @if ($irt->rt_id == $rdata->rt_id)
                    <tr>
                        <td colspan="3">
                        </td>
                        <td colspan="6">
                            <button wire:click="$emitTo('admin.warga-form-rkm', 'editData', {{ $irt->id }})"
                                class="btn btn-sm btn-primary mb-1 text-white"
                                style="width:20px; height:20px; border-radius: 50%; padding: 0px;">
                                <i class="fas fa-edit"></i>
                            </button>&nbsp;
                            <button wire:click="openConfirm({{ $irt->id }})"
                                class="btn btn-sm btn-danger mb-1 text-white"
                                style="width:20px; height:20px; border-radius: 50%; padding: 0px;">
                                <i class="fas fa-times"></i>
                            </button>
                        </td>
                        <td align="right">Jumlah
                        </td>
                        <td align="right">{{ number_format($bdata->usulan->where('rt_id', '=',$pilih_rt)->sum('jumlah'), 0, ',', '.') }}
                        </td>
                        {{-- <td >
                        </td> --}}
                    </tr>
                @endif
                {{-- akhir kk=5 --}}
            @empty
            @endforelse
            </tr>
            
            @endif
    @empty 
    @endforelse
    </div>
    </td>
    <td colspan="2">
    </td>
    <td colspan="12" align="right">Jumlah
    </td>
    <td valign="top" align="right">
        <div class="ms-2 me-auto"> 
            {{-- {{ $jdata->usulan->where('rt_id', '=',$pilih_rt) }} --}}
            {{ number_format($jdata->usulan->where('rt_id', '=',$pilih_rt)->sum('jumlah'), 0, ',', '.') }}
        </div>
    </td>
    {{-- <td>
    </td> --}}
    </tr>
    @endif
@empty 
    @endforelse
    </td>
    <td colspan="15" align="right">
        Jumlah
    </td>
    <td align="right">
        {{ number_format($pdata->usulan->where('rt_id', '=',$pilih_rt)->sum('jumlah'), 0, ',', '.') }}
    </td>
    </tr>
@empty 
    @endforelse
    <tr>
        <td colspan="15" align="right"><b>Jumlah Total </b></td>
        <td >
            <div class="row"><b>Rp{{ number_format($usulan->sum('jumlah'), 0, ',', '.') }}</b>
            </div>
        </td>
    </tr>
    @endif
    @endif
    @endif
    
    @endif

{{ $warga }}
    <x-slot name="table_page">
        {{-- {{ $pkeg->onEachSide(1)->links() }} --}}
    </x-slot>
    <x-slot name="page_form">
        @if ($pilih_rt != 0)
            @if ($pilih_kk == 0)
                @if ($tipe == 'nama')
                    <livewire:admin.warga-form-person>
                    @elseif($tipe == 'nokk')
                        <livewire:admin.warga-form>
                        @else
                            <livewire:admin.warga-form>
                @endif
            @elseif($pilih_kk == 1)
                @if ($tipe == 'nama')
                    <livewire:admin.warga-form-person>
                    @else
                        <livewire:admin.warga-form-kel>
                @endif
            @elseif($pilih_kk == 2)
                <livewire:admin.warga-form-umkm>
                @elseif($pilih_kk == 3)
                    <livewire:admin.warga-form-kkm>
                    @elseif($pilih_kk == 4)
                        <livewire:admin.warga-form-potensi>
                        @elseif($pilih_kk == 5)
                            <livewire:admin.warga-form-rkm>
                        @elseif($pilih_kk == 6)
                            <livewire:admin.warga-form-sumbangan>
            @endif
        @else
            @if ($pilih_rw != 0)
                <livewire:admin.warga-form-ket-rt>
                @else
                    <livewire:admin.warga-form-ket-rw>
            @endif
        @endif
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
