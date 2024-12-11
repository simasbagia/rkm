<x-form-modal>
    <x-slot name="header">
        @if($id_jenjang) Edit Jenjang
        @else Tambah Jenjang
        @endif
    </x-slot>

    <x-form-input field="nama_jenjang" label="Nama Jenjang" size="6"></x-form-input>
    <x-form-input field="deskripsi" label="Deskripsi"></x-form-input>

    <x-slot name="footer">
        <x-form-button></x-form-button>
    </x-slot>
</x-form-modal>