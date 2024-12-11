<x-form-modal-usulan>
    <x-slot name="header">
        @if ($id_rkm ?? '')
            RKM RT.{{ $rt }}
        @endif
    </x-slot>

    <x-form-input field="nama" label="Usulan" size="5"></x-form-input>
    <x-form-input field="keterangan" label="Keterangan" size="5"></x-form-input>
    {{-- <div x-data="{ open: false }">
        <div class="form-floating col"x-on:click="open = ! open">
            <input type="text" class="form-control" wire:model="kode" value="{{ $kode ?? '' }}{{ $b_kegiatan ?? '' }}">
            <label>Bentuk Kegiatan</label>
        </div>
        <div x-show="open" @click.outside="open = false">
            @foreach ($b_keg as $i => $b_keg)
                <div wire:click="pilih_b_keg({{ $b_keg->id }})"
                    class="list-group-item list-group-item-action list-group-item-light">
                    {{ $b_keg->j_kegiatan->p_kegiatan->kode }}.
                    {{ $b_keg->j_kegiatan->kode }}.
                    {{ $b_keg->kode }} ~
                    {{ ucFirst($b_keg->nama) }}
                </div>
            @endforeach
        </div>
    </div> --}}
    <div class="input-group mb-2">
        <div class="form-floating col">
            <input type="text" class="text-center form-control" wire:model="volume">
            <label for="volume">Volume</label>
        </div>
        <div class="form-floating  col">
            <input type="text" class="text-center form-control " wire:model="satuan">
            <label for="satuan">Satuan</label>

        </div>
    </div>
    <div class="input-group mb-2">
        <div class="form-floating col">
            <input type="text" class="text-center form-control" wire:model="harga">
            <label for="harga">Harga</label>
        </div>
        <div class="form-floating col">
            <input type="text" class="text-center form-control" value="Rp{{ number_format($jml, 2, ',', '.') }}"
                readonly>
            <label>Jumlah</label>
        </div>
    </div>

    <div class="row">
        <div class="col"> Lampiran</div>

        @if ($pesan)
            <div class="col" x-data="{ pesan: true }">

                <div x-show="pesan" @click.outside="pesan = false">
                    {{ $pesan }}
                </div>
            </div>
        @endif
    </div>
    <div class="input-group mb-2">
        @if ($file)
            <img src="{{ $file->temporaryUrl() }}" width="140">
        @else
            @if ($gambar)
                <img src="/storage/rkm/{{ $gambar }}" width="140">
            @endif
        @endif
        <input type="file" class="text-center form-control" wire:model.lazy="file">
    </div>
    <hr />
    <div class="form-floating mb-2">
        <input type="text" class="form-control" value="{{ $kode ?? '' }}{{ $b_kegiatan ?? '' }}" readonly>
        <label>Bentuk Kegiatan</label>
    </div>
    <x-slot name="table_tool">
    </x-slot>
    <x-slot name="table_no">
        <th width="40">No</th>
    </x-slot>
    <x-slot name="table_column">
        <th>
            Usulan
        </th>
        <th>
            RAB
        </th>
        <th>
            Jumlah (Rp)
        </th>
        <th width="30">
            -
        </th>

    </x-slot>
    @forelse ($usulan as $data)
        <tr>
            <td class="text-center">{{ $usulan->perPage() * ($usulan->currentPage() - 1) + $loop->iteration }}</td>
            <td>{{ $data->nama }}@if ($data->ket)
                    , {{ $data->ket }}
                @endif
            </td>
            <td align="right">{{ $data->volume }} {{ $data->satuan }}
                {{ '@' . number_format($data->harga, 0, ',', '.') }}</td>
            <td align="right">{{ number_format($data->jumlah, 0, ',', '.') }}</td>
            <td align="center"><button wire:click="hapus({{ $data->id }})"
                    class="btn btn-sm btn-danger mb-1 text-white"
                    style="width:20px; height:20px; border-radius: 50%; padding: 0px;">
                    <i class="fas fa-times"></i>
                </button>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="11">Tidak ada data untuk ditampilkan</td>
            </tr>
        @endforelse
        <x-slot name="table_page">
            {{ $usulan->onEachSide(1)->links() }}
        </x-slot>
        <x-slot name="footer">

        </x-slot>

    </x-form-modal-usulan>
