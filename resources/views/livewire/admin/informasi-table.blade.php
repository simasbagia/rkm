<x-page-index>

    <x-slot name="page_button">
        <button class="btn btn-success" @click="showModal = true; $dispatch('form-add')">
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
            <x-table-header field="judul" sortField="{{$sortField}}" sortAsc="{{$sortAsc}}">Judul</x-tbheader>
        </th>
        <th width="70">
            <x-table-header field="tampil_beranda" sortField="{{$sortField}}" sortAsc="{{$sortAsc}}">Show</x-tbheader>
        </th>
    </x-slot>
    <x-slot name="table_action">
        <th width="70">Aksi</th>
    </x-slot>

    @forelse ($informasi as $data)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>
            <x-table-input iddata="{{$data->id}}" field="'judul'"> {{ $data->judul}}</x-table-input>
        </td>
        <td class="text-center">
            @if($data->tampil_beranda=="Y")
            <a href="#" wire:click.prevent="setActive({{$data->id}}, 'N')">
                <i class="fas fa-check-circle text-success"></i>
            </a>
            @else
            <a href="#" wire:click.prevent="setActive({{$data->id}}, 'Y')">
                <i class="fas fa-minus-circle text-danger"></i>
            </a>
            @endif
        </td>
        <td class="text-center">
            <x-table-action form="admin.informasi-form" iddata="{{$data->id}}">
                </x-tbction>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="4">Tidak ada data untuk ditampilkan</td>
    </tr>
    @endforelse

    <x-slot name="table_page">
        {{ $informasi->links('pagination::bootstrap-4') }}
    </x-slot>

    <x-slot name="page_form">
        <livewire:admin.informasi-form>
    </x-slot>

    <x-slot name="dialog">
        @if($id_delete)
        <x-dialog></x-dialog>
        @endif
    </x-slot>

</x-page-index>