<x-form-modal-link>
    <x-slot name="header">
        {{ $link->judul ?? '' }}
    </x-slot>
    @forelse ($link->wlink as $data)
        <div class="list-group mb-1 bg-success" x-data="{ open: false }">
            @if ($data->link != null)
                <a href="{{ $data->link }}" class="btn btn-outline-secondary me-1 text-white text-start" target="_blank">
                    {{ $loop->iteration }}. {{ $data->subjudul }}
                </a>
            @else
                <button @click="open=!open" type="button" class="btn btn-outline-secondary me-1 text-white text-start">
                    {{ $loop->iteration }}. {{ $data->subjudul }}
                </button>
                    @forelse($data->wlinks as $link)
                        <div class="list-group" x-show="open">
                            
                        <a href="{{ $link->link }}" class="list-group-item list-group-item-action list-group-item-primary text-white text-start" target="blank">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-arrow-alt-circle-right"></i>&nbsp;{{ $link->namalink }}
                        </a>
                    </div>
                    @empty
                    @endforelse
            @endif
        </div>
    @empty
        Tidak ada data link untuk ditampilkan
    @endforelse

    <x-slot name="footer">
        <div>
            <button type="button" class="btn btn-danger" wire:click="home">
                <i class="fas fa-times-circle"></i> Kembali
            </button>
        </div>
    </x-slot>
</x-form-modal-link>
