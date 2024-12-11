<x-form-modal>
    <x-slot name="header">
        @if($id_unit) Edit Unit
        @else Tambah Unit
        @endif
    </x-slot>

    <x-form-input field="nama_unit" label="Nama Unit" size="6"></x-form-input>
    <x-form-input field="singkatan" label="Singkatan" size="4"></x-form-input>
    <x-form-input field="alamat" label="Alamat" size="15">
    </x-form-input>

    <x-slot name="footer">
        <x-form-button></x-form-button>
    </x-slot>
</x-form-modal>