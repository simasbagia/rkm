<x-form-modal>
    <x-slot name="header">
        @if($id_widget) Edit Widget
        @else Tambah Widget
        @endif

    </x-slot>
    @if($wlink) {{$wlink}}
    @else zonk
    @endif

    @if ($file)
    <br>Preview Gambar:<br>
    <img src="{{ $file->temporaryUrl() }}" width="200">
    @else
    @if($gambar)
    <br>Preview Gambar:<br>
    <img src="/storage/widget/{{ $gambar }}" width="200">
    @endif
    @endif
    <x-form-input type="file" field="file" label="Gambar" size="9">

    </x-form-input>
    <x-form-input field="judul" label="Judul" size="6"></x-form-input>
    <x-form-input field="link" label="Link" size="6"></x-form-input>
    <x-form-textarea field="konten" label="Konten"></x-form-textarea>
    <x-form-select field="posisi" label="posisi" size="2">
        <option value="Tengah">Tengah</option>
        <option value="Bawah">Bawah</option>
        <option value="Samping">Samping</option>
        </x-select>
        Daftar Link:
        <br />
        @forelse ($wlink as $data)
        <tr>
            <td class="text-center">{{ $loop->iteration }}. </td>
            <td>{{ $data->subjudul }} => </td>
            <td>{{ $data->link }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="11">Tidak ada data link untuk ditampilkan</td>
        </tr>
        @endforelse

        <x-slot name="footer">
            <x-form-button></x-form-button>
        </x-slot>
</x-form-modal>