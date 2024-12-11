<x-form-modal>

    <x-slot name="header">
        <h5><b>Impor excel
                @if ($warga)
                    {{ $warga->nama_kel }}
                @endif
            </b></h5>
    </x-slot>
    <x-slot name="close">
        <button type="button" class="btn-close" @click="showDetail = false"></button>
    </x-slot>
    @if ($file)
        <br>Siap upload, Bos <br>
        {{-- < src="{{ $file->temporaryUrl() }}" > --}}
        {{-- @else
    @if ($gambar)
    <br>Preview Gambar:<br>
    <img src="/storage/slide/{{ $gambar }}" width="300">
    @endif --}}
    @endif
    @if ($lapor) {{ $lapor }}  @endif
    <x-form-input type="file" field="file" label="Excel" size="9">
    </x-form-input>
    <x-slot name="footer">
        <button type="button" class="btn btn-primary" wire:click="impor_kk({{ $id }})">
            <i class="fas fa-times-print"></i> Impor_Kk
        </button>
        <button type="button" class="btn btn-primary" wire:click="clear({{$id}})">
            <i class="fas fa-times-print"></i> Clear
        </button>
        <button type="button" class="btn btn-primary" @click="showDetail = false">
            <i class="fas fa-times-circle"></i> Tutup
        </button>
        
    </x-slot>
</x-form-modal>
