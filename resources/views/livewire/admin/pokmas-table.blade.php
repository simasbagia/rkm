<x-page-index>

    <!-- Tombol tambah -->
    <x-slot name="page_button">
        <div class="row">
            <div class="input-group">
                @if ($pilih_kec == 0)
                    <div class="col-4">
                        <div class="form-floating">
                            <select class="form-control" id="kecamatan" wire:model="pilih_kec" wire:click="rset_kec">
                                <option value=0>All</option>
                                @foreach ($kec as $kece)
                                    <option value="{{ $kece->id }}">{{ $kece->singkatan }}</option>
                                @endforeach
                            </select>
                            <label for="kecamatan">Kecamatan</label>
                        </div>
                    </div>
                    <div class="col-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <div class="col-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <div class="col-3 text-end"></div>
                @else
                    <div class="col-4">
                        <div class="form-floating">
                            <select class="form-control" id="kecamatan" wire:model="pilih_kec">
                                <option value=0>All</option>
                                @foreach ($kec as $kece)
                                    <option value="{{ $kece->id }}">{{ $kece->singkatan }}</option>
                                @endforeach
                            </select>
                            <label for="kecamatan">Kecamatan</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating">
                            <select class="form-control" id="kelurahan" wire:model="pilih_kel">
                                <option value=0 wire:click="rset_kel">All</option>
                                @foreach ($kel as $kele)
                                    <option value="{{ $kele->id }}">{{ $kele->singkatan }}</option>
                                @endforeach
                            </select>
                            <label for="kelurahan">Kelurahan</label>
                        </div>
                    </div>
                    <div class="col-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    @if ($pilih_kel == 0)
                        <div class="col-1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    @else
                        <div class="col-3 text-end">
                            <button class="btn btn-success"
                                wire:click="$emitTo('admin.pokmas-form', 'editData', 0, {{ $pilih_kel }}, {{ $pilih_kec }}, {{ $tahun }})">
                                <i class="fas fa-plus-circle"></i> Tambah
                            </button>
                            {{-- <button class="btn btn-success" @click="showModal = true">
                            <i class="fas fa-plus-circle"></i> Tambah
                        </button> --}}
                        </div>
                    @endif
                @endif
            </div>
        </div>
        {{-- {{ $pilih_kel }} --}}
    </x-slot>

    <!-- pilihan jumlah tampil data dan form pencarian -->
    <x-slot name="table_tool">
        <x-table-tool-nopage>
        </x-table-tool-nopage>
    </x-slot>

    <!-- header tabel -->
    <x-slot name="table_column">
        <th>
            <x-table-header field="tahun" sortField="{{ $sortField }}" sortAsc="{{ $sortAsc }}">Pokmas
                </x-tbheader>
        </th>
        <th>
            Masa Kontrak
        </th>
        <th width="15">
            Aktif
        </th>
        <th width="75">
            Aksi
        </th>
    </x-slot>

    <!-- Data pada body tabel -->
    @forelse ($pokmas as $data)
        <tr>
            <td>
                <x-table-input iddata="{{ $data->id }}" field="'pokmas'"> {{ $data->pokmas }}</x-table-input>
            </td>
            <td>
                {{-- <x-table-input iddata="{{ $data->id }}" field="'tanggal_buka'"> --}}
                    {{ Carbon\Carbon::parse($data->tanggal_buka)->isoFormat('D MMMM Y') }}
                {{-- </x-table-input> --}}
                 s/d
                {{-- <x-table-input iddata="{{ $data->id }}" field="'tanggal_tutup'"> --}}
                    {{ Carbon\Carbon::parse($data->tanggal_tutup)->isoFormat('D MMMM Y') }}
                {{-- </x-table-input> --}}
            </td>
            <td class="text-center">
            @if($data->aktif=="Y")
            <a href="#" wire:click.prevent="setActive({{$data->id}}, 'N')">
                <i class="fas fa-check-circle text-success">&nbsp;Aktif</i>
            </a>
            @else
            <a href="#" wire:click.prevent="setActive({{$data->id}}, 'Y')">
                <i class="fas fa-minus-circle  text-danger">&nbsp;Tidak</i>
            </a>
            @endif
            </td>
            <td>
                <button
                    wire:click="$emitTo('admin.pokmas-form', 'editData', {{ $data->id }}, {{ $pilih_kel }}, {{ $pilih_kec }}, {{ $tahun }})"
                    class="btn btn-sm btn-primary mb-1 text-white"
                    style="width:20px; height:20px; border-radius: 50%; padding: 0px;">
                    <i class="fas fa-edit"></i>
                </button>&nbsp;
                <button wire:click="openConfirm({{ $data->id }})" class="btn btn-sm btn-danger mb-1 text-white"
                    style="width:20px; height:20px; border-radius: 50%; padding: 0px;">
                    <i class="fas fa-times"></i>
                </button>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6">Tidak ada data untuk ditampilkan</td>
        </tr>
    @endforelse

    <!-- Link paginasi -->
    <x-slot name="table_page">
        {{ $pokmas->links() }}
    </x-slot>

    <!-- Menerapkan livewire untuk tampilan form -->
    <x-slot name="page_form">
        {{-- tampilan form sesuai parameter --}}
        <livewire:admin.pokmas-form>
    </x-slot>

    <!-- Dialog hapus data-->
    <x-slot name="dialog">
        @if ($id_delete)
            <x-dialog></x-dialog>
        @endif
    </x-slot>

</x-page-index>
