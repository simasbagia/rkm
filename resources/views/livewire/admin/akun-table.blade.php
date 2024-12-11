<x-page-index>

    <x-slot name="page_button">
        <div class="container">
            <div class="row">
                <div class="col">Level<br />
                    <select wire:model="pilih_usr" wire:click="">
                        <option value="">Semua</option>
                        <option value="Baru">Baru</option>
                        <option value="Pendamping RT">Pendamping RT</option>
                        <option value="Korkel">Korkel</option>
                        <option value="Korcam">Korcam</option>
                        <option value="Korkot">Korkot</option>
                        <option value="Opd">OPD</option>
                        <!-- @foreach($user as $usere)
                        <option value="{{$usere->id}}">{{$usere->singkatan}}</option>
                        @endforeach -->
                    </select>
                </div>
            </div>
        </div>

    </x-slot>
    <x-slot name="table_tool">
    </x-slot>
    <x-slot name="table_no">
        <th width="40">No</th>
    </x-slot>

    <x-slot name="table_column">
        <th>
            <x-table-header field="rt" sortField="{{$sortField}}" :sortAsc="$sortAsc" class="text-center">Nama</x-tbheader>
        </th>
        <th>
            <x-table-header field="rt" sortField="{{$sortField}}" :sortAsc="$sortAsc" class="text-center">Tugas</x-tbheader>
        </th>
        <th class="text-center">
            <x-table-header field="ka_kk" sortField="{{$sortField}}" :sortAsc="$sortAsc">Aktifasi</x-tbheader>
        </th>
    </x-slot>
    <x-slot name="table_action">
        <th width="70">Aksi</th>
    </x-slot>
    @forelse ($user as $data)
    <tr>
        <!-- <td><input type="checkbox" class="form-check-input" wire:model="selectedData" value="{{$data->id}}"></td> -->
        <td class="text-center">
            {{ $user->perPage() * ($user->currentPage() - 1) + $loop->iteration }}
        </td>
        <td>{{ $data->name }}</td>
        <td>
            <x-table-select iddata="{{$data->id}}" field="'level'" data="{{ $data->level}}">

                <option value="Baru">-</option>
                <option value="Pendamping RT">Pendamping RT</option>
                <option value="Korkel">Korkel</option>
                <option value="Korcam">Korcam</option>
                <option value="Korkot">Korkot</option>
                <option value="OPD">OPD</option>
            </x-table-select>
        </td>
        <td class="text-start">
            @if($data->aktif=="B")
            <a href="#" wire:click.prevent="setActive({{$data->id}}, 'A')">
                <i class="fas fa-info-circle text-secondary">&nbsp;Belum</i>
            </a>
            @elseif($data->aktif=="A")
            <a href="#" wire:click.prevent="setActive({{$data->id}}, 'T')">
                <i class="fas fa-check-circle text-success">&nbsp;Aktif</i>
            </a>
            @else
            <a href="#" wire:click.prevent="setActive({{$data->id}}, 'A')">
                <i class="fas fa-minus-circle  text-danger">&nbsp;Tidak</i>
            </a>
            @endif
        </td>
        <td class="text-center">
            <x-table-action_nodel form="admin.akun-form" iddata="{{$data->id}}">
                </x-tbction_nodel>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="11">Tidak ada data untuk ditampilkan</td>
    </tr>
    @endforelse

    <x-slot name="table_page">
        {{ $user->links() }}
    </x-slot>

    <x-slot name="page_form">
        <livewire:admin.akun-form>
    </x-slot>

    <x-slot name="dialog">
        @if($id_delete)
        <x-dialog></x-dialog>
        @endif

        <div x-data="{ 'showDetail' : false}" x-on:detail-ready.window="showDetail = true">
            <div x-show.transition="showDetail" x-cloak>
                <livewire:admin.warga-detail>
            </div>
        </div>
    </x-slot>
</x-page-index>