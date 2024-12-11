<x-page-index>

    <x-slot name="page_button">
        <button class="btn btn-success" @click="showModal = true">
            <i class="fas fa-plus-circle"></i> Tambah
        </button>
    </x-slot>
    <x-slot name="table_tool">
        <x-table-tool>
            </x-tbtool>
    </x-slot>
    <x-slot name="table_no">
        <th width="40">No</th>
    </x-slot>
    <x-slot name="table_column">
        <th>
            <x-table-header field="gambar" sortField="{{ $sortField }}" sortAsc="{{ $sortAsc }}">Icon</x-tbheader>
        </th>
        <th>
            <x-table-header field="judul" sortField="{{ $sortField }}" sortAsc="{{ $sortAsc }}">Judul
                </x-tbheader>
        </th>

        <th>
            <x-table-header field="link" sortField="{{ $sortField }}" sortAsc="{{ $sortAsc }}">Subjudul
                </x-tbheader>
        </th>
        <th width="80">
            <x-table-header field="urut" sortField="{{ $sortField }}" sortAsc="{{ $sortAsc }}">Urut
                </x-tbheader>
        </th>
    </x-slot>
    <x-slot name="table_action">
        <th width="70">Aksi</th>
    </x-slot>
    @forelse ($widget as $data)
        <tr>
            <td>{{ $widget->perPage() * ($widget->currentPage() - 1) + $loop->iteration }}</td>
            <td><img src="/storage/widget/{{ $data->gambar }}" width="70"></td>
            <td>
                <x-table-input iddata="{{ $data->id }}" field="judul"> {{ $data->judul }}</x-table-input>
            </td>
            <td>
                @forelse($data->wlink as $w)
                    {{ $loop->iteration }}.{{ $w->subjudul }}
                    <button
                    wire:click="$emitTo('admin.widget-form', 'editData', 
                    {{ $w->id }}, 1)"
                    class="btn btn-sm btn-outline-primary mb-1 text-info"
                    style="width:20px; height:20px; border-radius: 50%; padding: 0px;">
                    <i class="fas fa-bars"></i>
                </button>
                        
                    <br />
                @empty -
                @endforelse
            </td>
            <td class="text-center">
                @if ($data->urut != $max)
                    <a href="#" wire:click.prevent="sortUp({{ $data->id }})">
                        <i class="fas fa-arrow-alt-circle-down text-success"></i>
                    </a>
                @endif

                @if ($data->urut != $min)
                    <a href="#" wire:click.prevent="sortDown({{ $data->id }})">
                        <i class="fas fa-arrow-alt-circle-up text-primary"></i>
                    </a>
                @endif
            </td>
            <td>
                    <button
                    wire:click="$emitTo('admin.widget-form', 'editData', 
                    {{ $data->id }}, 0)"
                    class="btn btn-sm btn-primary mb-1 text-white"
                    style="width:20px; height:20px; border-radius: 50%; padding: 0px;"
                    >
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

    <x-slot name="table_page">
        {{ $widget->links() }}
    </x-slot>

    <x-slot name="page_form">
        {{-- tampilan form sesuai parameter --}}
        <livewire:admin.widget-form>
    </x-slot>

    <x-slot name="dialog">
        @if ($id_delete)
            <x-dialog></x-dialog>
        @endif
    </x-slot>

</x-page-index>
