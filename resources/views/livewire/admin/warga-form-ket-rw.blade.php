<x-form-modal>
    <x-slot name="header">
        @if($id_rw) Edit Ketua RW
        @endif
    </x-slot>

    <x-form-input_rdonly field="rw" label="RW" size="5">
        </x-form-input>
        <x-form-input field="ketua" label="Ketua" size="5"></x-form-input>

        <x-slot name="footer">
            <x-form-button></x-form-button>
        </x-slot>

</x-form-modal>