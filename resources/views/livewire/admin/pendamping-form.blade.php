<x-form-modal>
    <x-slot name="header">
        @if ($kode == 1)
        Pokmas
        @else
        Petugas
        @endif
    </x-slot>

    <div class="col" wire:click="rset">
        <input class="form-input" 
        @if($kode == 1) wire:model.debounce.150ms="caripokmas"
        @else wire:model.debounce.150ms="caricalon" 
        @endif type="varchar" placeholder="Cari ..."
            wire:keydown.escape="rset" wire:click="rset" autofocus />
    </div>
    <div class="absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
        @if($kode == 1)
        @foreach ($pm as $p => $pokmas)
            <div wire:click="tambah({{ $pokmas->id }})" class="list-group-item list-group-item-action">
                {{ $pokmas->pokmas }} || {{ $pokmas->periode->tahun }}
            </div>
        @endforeach
        @else
        @foreach ($pendamping as $i => $pendamping)
            <div wire:click="tambah({{ $pendamping->id }})" class="list-group-item list-group-item-action">
                {{ $pendamping->name }} || {{ $pendamping->level }}<i>
                    @if (!empty($pendamping->nip))
                        {{ '~' }}{{ $pendamping->nip }}
                    @endif
                </i>
            </div>
        @endforeach
        
        @endif
    </div>
    @error('selected_data')
        <small class="text-danger">{{ $message }}</small>
    @enderror

    <x-slot name="footer">
        <x-form-button-batal></x-form-button-batal>
    </x-slot>
</x-form-modal>
