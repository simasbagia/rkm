<x-page-index>
    <x-slot name="page_button">
        <div class="container">
            <div class="row">
                <div class="col">Kecamatan<br />
                    <select wire:model="pilih_kec" wire:click="rset_kec">
                        <option value="">All</option>
                        @foreach ($kec as $kece)
                            <option value="{{ $kece->id }}">{{ $kece->singkatan }}</option>
                        @endforeach
                    </select>
                </div>
                @if (!$pilih_kec)
                @elseif($pilih_kec && !$pilih_kel)
                    <div class="col">Kelurahan<br />
                        <select wire:model="pilih_kel" wire:click="rset_rw">
                            <option value="">All</option>
                            @foreach ($kel as $kele)
                                <option value="{{ $kele->id }}">{{ $kele->singkatan }}</option>
                            @endforeach
                        </select>
                    </div>
                @elseif($pilih_kel)
                    <div class="col">Kelurahan<br />
                        <select wire:model="pilih_kel" wire:click="rset_rw">
                            <option value="">All</option>
                            @foreach ($kel as $kele)
                                <option value="{{ $kele->id }}">{{ $kele->singkatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">RW<br />
                        <select wire:model="pilih_rw">
                            <option value="">--</option>
                            @foreach ($rw as $rwe)
                                <option value="{{ $rwe->id }}">{{ $rwe->rw }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

            </div>
        </div>
        <!-- {{ $pilih_kec }}
        {{ $pilih_kel }}
        {{ $pilih_rw }} -->
        <hr />

        @if (!$pilih_kec)
            <button class="btn btn-success"
                wire:click="$emitTo('admin.pendamping-form', 'editData', '{{ json_encode($selectedData) }}' )">
                <i class="fas fa-edit"></i> Set Korcam
            </button>
        @elseif($pilih_kec && !$pilih_kel)
            <button class="btn btn-success"
                wire:click="$emitTo('admin.pendamping-form', 'editData', '{{ json_encode($selectedData) }}',2 )">
                <i class="fas fa-edit"></i> Set Korkel
            </button>
        @elseif($pilih_kel)
            <button class="btn btn-success"
                wire:click="$emitTo('admin.pendamping-form', 'editData', '{{ json_encode($selectedData) }}',0 )">
                <i class="fas fa-edit"></i> Set Pendamping
            </button>
            <button class="btn btn-success"
                wire:click="$emitTo('admin.pendamping-form', 'editData', '{{ json_encode($selectedData) }}',1 )">
                <i class="fas fa-edit"></i> Set Pokmas
            </button>
        @endif

    </x-slot>
    <x-slot name="table_tool">
    </x-slot>

    <x-slot name="table_checkbox">
        <input type="checkbox" class="form-check-input" wire:model="selectAll">
    </x-slot>

    <x-slot name="table_column">
        <th>
            <x-table-header field="rt" sortField="{{ $sortField }}" :sortAsc="$sortAsc">
                @if (!$pilih_kec)
                    Kecamatan
                @elseif($pilih_kec && !$pilih_kel)
                    Kelurahan
                @elseif($pilih_kel)
                    RT
                @endif
            </x-table-header>
        </th>


        @if (!$pilih_kec)
            <th>
                <x-table-header field="ka_kk" sortField="{{ $sortField }}" :sortAsc="$sortAsc">Korcam
                </x-table-header>
            </th>
        @elseif($pilih_kec && !$pilih_kel)
            <th>
                <x-table-header field="ka_kk" sortField="{{ $sortField }}" :sortAsc="$sortAsc">Korkel
                </x-table-header>
            </th>
        @elseif($pilih_kel)
            <th> Pendamping</th>
            <th> Pokmas</th>
        @endif


    </x-slot>
    @if (!$pilih_kec)
    @elseif($pilih_kec && !$pilih_kel)
    @forelse ($kel as $data)
        <tr>
            <td><input type="checkbox" class="form-check-input" wire:model="selectedData" value="{{ $data->id }}">
            </td>
            <!-- <td>{{ $loop->iteration }}</td> -->
            <td>{{ $data->nama_kel }}</td>
            <td>
                @if ($data->pendamping_id)
                    {{ $data->pendamping->name }}
                @endif
            </td>
            
        </tr>
    @empty
        <tr>
            <td colspan="11">Tidak ada data untuk ditampilkan</td>
        </tr>
    @endforelse
    @elseif($pilih_kel)
    
    @forelse ($rt as $data)
        <tr>
            <td><input type="checkbox" class="form-check-input" wire:model="selectedData" value="{{ $data->id }}">
            </td>
            <!-- <td>{{ $loop->iteration }}</td> -->
            <td>{{ $data->rt }}</td>
            <td>
                @if ($data->pendamping_id)
                    {{ $data->pendamping->name }}
                @endif
            </td>
            <td>
                @if ($data->pokmas_id)
                    {{ $data->pokmas->pokmas }}
                @endif
            </td>

        </tr>
    @empty
        <tr>
            <td colspan="11">Tidak ada data untuk ditampilkan</td>
        </tr>
    @endforelse
@endif
    <x-slot name="table_page">
        {{ $rt->links('pagination::bootstrap-4') }}
    </x-slot>

    <x-slot name="page_form">
        <livewire:admin.pendamping-form>
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
