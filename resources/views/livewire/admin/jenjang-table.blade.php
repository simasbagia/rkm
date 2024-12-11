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
            <x-table-header field="nama_jenjang" sortField="{{$sortField}}" sortAsc="{{$sortAsc}}">Nama Jenjang</x-tbheader>
        </th>
        <th>
            <x-table-header field="deskripsi" sortField="{{$sortField}}" sortAsc="{{$sortAsc}}">Deskripsi</x-tbheader>
        </th>
    </x-slot>

    @forelse ($jenjang as $data)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>
            <x-table-input iddata="{{$data->id}}" field="'nama_jenjang'"> {{ $data->nama_jenjang}}</x-table-input>
        </td>
        <td>
            <x-table-input iddata="{{$data->id}}" field="'deskripsi'"> {{ $data->deskripsi}}</x-table-input>
        </td>
        <td>
            <x-table-action form="admin.jenjang-form" iddata="{{$data->id}}">
                </x-tbction>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="5">Tidak ada data untuk ditampilkan</td>
    </tr>
    @endforelse

    <x-slot name="table_page">
        {{ $jenjang->links('pagination::bootstrap-4') }}
    </x-slot>

    <x-slot name="page_form">
        <livewire:admin.jenjang-form>
    </x-slot>

    <x-slot name="dialog">
        @if($id_delete)
        <x-dialog></x-dialog>
        @endif
    </x-slot>

</x-page-index>