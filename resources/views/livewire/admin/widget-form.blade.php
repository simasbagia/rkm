<x-form-modal>
    <x-slot name="header">
        @if ($id_widget) Edit
            @if ($subs)
                Link
            @else
                Info
            @endif
        @else
            Tambah Info
        @endif
    </x-slot>
    @if ($subs)
        <x-form-input field="subjudul" label="Sub Judul" size="6"></x-form-input>
        <div class="input-group mb-1">
            <input type="text" class="form-control" wire:model="link">
            <span class="input-group-text" id="link">Link I</span>
        </div>
        @if (!$link)
            <!-- <hr /> -->
            <div class="row">
                <div class="input-group ">
                    <input type="text" class="form-control" placeholder="Nama"
                        wire:model.debounce.150ms="namalink" type="varchar">

                    <input type="text" class="form-control" placeholder="Link" wire:model.debounce.150ms="linksbaru" type="varchar">

                    <button class="btn btn-outline-secondary" type="button" wire:click="tambahLinks">Tambah</button>
                </div>
            </div>
            <hr />
            Daftar Link:
            <br />
            @forelse ($wlink as $data)
                {{ $loop->iteration }}.
                {{ $data->namalink }} : {{ $data->link }}&nbsp;
                <button wire:click="hapus({{ $data->id }})" class="btn btn-sm btn-danger mb-1 text-white"
                    style="width:20px; height:20px; border-radius: 50%; padding: 0px;">
                    <i class="fas fa-times"></i>
                </button>
                <br />
            @empty
                Tidak ada data link untuk ditampilkan
            @endforelse
        @else
        @endif
    @else
        <div class="row">
            <div class="col-3">
                @if ($file)
                    <img src="{{ $file->temporaryUrl() }}" width="140">
                @else
                    @if ($gambar)
                        <img src="/storage/widget/{{ $gambar }}" width="140">
                    @endif
                @endif
            </div>
            <div class="col-9">
                <x-form-input type="file" field="file" label="Gambar" size="9">
                </x-form-input>
                <x-form-input field="judul" label="Judul" size="6"></x-form-input>
                <x-form-select field="posisi" label="posisi" size="2">
                    <option value="Tengah">Tengah</option>
                    <option value="Bawah">Bawah</option>
                    <option value="Samping">Samping</option>
                    </x-select>
            </div>
        </div>
        <x-form-textarea field="konten" label="Konten"></x-form-textarea>

        @if ($id_widget)
            <!-- <hr /> -->
            <div class="row">
                <div class="input-group ">
                    <input type="text" class="form-control" placeholder="Sub Judul" wire:model.debounce.150ms="subjudulbaru" type="varchar">

                    <input type="text" class="form-control" placeholder="Link" wire:model.debounce.150ms="linkbaru"
                        type="varchar">
                    <button class="btn btn-outline-secondary" type="button" wire:click="tambahLink">Tambah</button>
                </div>
            </div>
            <hr />
            Daftar Link:
            <br />
            @forelse ($wlink as $data)
                {{ $loop->iteration }}.
                {{ $data->subjudul }} : {{ $data->link }}&nbsp;
                <button wire:click="hapus({{ $data->id }})" class="btn btn-sm btn-danger mb-1 text-white"
                    style="width:20px; height:20px; border-radius: 50%; padding: 0px;">
                    <i class="fas fa-times"></i>
                </button>
                <br />
            @empty
                Tidak ada data link untuk ditampilkan
            @endforelse
        @else
        @endif

    @endif
    <x-slot name="footer">
        <x-form-button></x-form-button>
    </x-slot>
</x-form-modal>
