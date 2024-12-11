<x-form-modal-monitor>
    <x-slot name="header">
            Monitoring {{ $keterangan ?? '-' }}
    </x-slot>
    <div class="form-floating mb-2">
        <input type="text" class="form-control" value="{{ ucfirst($nama ?? '') }}{{ $keterangan ?? '' }}" readonly>
        <label>Kegiatan</label>
    </div>

    <x-form-input field="kontrak" label="Nilai Kontrak" size="5"></x-form-input>
    <x-form-input field="swadaya" label="Anggaran Swadaya" size="5"></x-form-input>
    <x-form-input field="ket" label="Ket. Swadaya" size="5"></x-form-input>
    <x-form-datepicker field="tanggal_serah" label="Tanggal Penyerahan" size="4"></x-form-datepicker>
    <x-form-select field="opd" label="OPD" size="5">
        <option value="-">-</option>
        <option value="Diskominsta">Diskominsta</option>
        <option value="Disperpa">Disperpa</option>
        <option value="DP4Kb">DP4Kb</option>
        <option value="Dinsos">Dinsos</option>
        <option value="Satpol PP">Satpol PP</option>
        <option value="Dinkes">Dinkes</option>
        <option value="Disnaker">Disnaker</option>
        <option value="Disdikbud">Disdikbud</option>
        <option value="Kelurahan">Kelurahan</option>
        <option value="Disperindag">Disperindag</option>
        <option value="BPBD">BPBD</option>
    </x-form-select>
    <hr />
    <x-form-input-floating field="realisasi" label="Tambahkan" size="5"></x-form-input-floating>
    <x-slot name="table_tool">
    </x-slot>
    <x-slot name="table_no">
        <th width="40">No</th>
    </x-slot>
    <x-slot name="table_column">
        <th>
            Realisasi
        </th>
        <th width="30">
            -
        </th>

    </x-slot>
    @forelse ($real as $data)
        <tr>
            <td class="text-center">{{ $real->perPage() * ($real->currentPage() - 1) + $loop->iteration }}</td>
            <td>{{ number_format($data->realisasi, 0, ',', '.') }}
            </td>
            
            <td align="center"><button wire:click="hapus({{ $data->id }})"
                    class="btn btn-sm btn-danger mb-1 text-white"
                    style="width:20px; height:20px; border-radius: 50%; padding: 0px;">
                    <i class="fas fa-times"></i>
                </button>
            </td>
        </tr>
        @empty
            <tr>
                <td colspan="11">Tidak ada data untuk ditampilkan</td>
            </tr>
        @endforelse
        <x-slot name="table_page">
            {{ $real->onEachSide(1)->links() }}
        </x-slot>
        <x-slot name="footer">

        </x-slot>

    </x-form-modal-monitor>
