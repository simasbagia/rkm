<x-form-modal-person>
    <x-slot name="header">
        @if($id_pot) Edit Potensi Lingkungan
        @endif
    </x-slot>
    <x-form-input field="nama" label="Nama" size="5"></x-form-input>
    <x-form-select field="pengembangan" label="Pengembangan" size="5">
        <option value="-">-</option>
        <option value="Sudah">Sudah</option>
        <option value="Belum">Belum</option>
        </x-select>
        <x-form-input field="ket" label="Keterangan" size="5"></x-form-input>

        <x-slot name="footer">
        </x-slot>

</x-form-modal-person>