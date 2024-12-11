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

    <x-slot name="table_column">
        <th>
            <x-table-header field="nama_unit" sortField="{{$sortField}}" sortAsc="{{$sortAsc}}">Nama Unit</x-tbheader>
        </th>
        <th>
            <x-table-header field="singkatan" sortField="{{$sortField}}" sortAsc="{{$sortAsc}}">Singkatan</x-tbheader>
        </th>
        <th>
            <x-table-header field="singkatan" sortField="{{$sortField}}" sortAsc="{{$sortAsc}}">Alamat</x-tbheader>
        </th>
    </x-slot>

    @forelse ($unit as $data)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>
            <x-table-input iddata="{{$data->id}}" field="'nama_unit'"> {{ $data->nama_unit}}</x-table-input>
        </td>
        <td>
            <x-table-input iddata="{{$data->id}}" field="'singkatan'"> {{ $data->singkatan}}</x-table-input>
        </td>
        <td>
            <x-table-input iddata="{{$data->id}}" field="'singkatan'"> {{ $data->alamat}}</x-table-input>
        </td>
        <td>
            <x-table-action form="admin.unit-form" iddata="{{$data->id}}">
                </x-tbction>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="5">Tidak ada data untuk ditampilkan</td>
    </tr>
    @endforelse

    <x-slot name="table_page">
        {{ $unit->links('pagination::bootstrap-4') }}
    </x-slot>

    <x-slot name="page_form">
        <livewire:admin.unit-form>
    </x-slot>

    <x-slot name="dialog">
        @if($id_delete)
        <x-dialog></x-dialog>
        @endif
    </x-slot>

</x-page-index>