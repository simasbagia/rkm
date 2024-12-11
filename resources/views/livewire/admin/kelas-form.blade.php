<x-form-modal>
    <x-slot name="header">
        @if($id_kelas) Edit Kelas
        @else Tambah Kelas
        @endif
    </x-slot>

    <x-form-input field="nama_kelas" label="Nama Kelas" size="6"></x-form-input>
    <x-form-input field="deskripsi" label="Deskripsi" size="4"></x-form-input>

    <x-slot name="footer">
        <x-form-button></x-form-button>
    </x-slot>
</x-form-modal>