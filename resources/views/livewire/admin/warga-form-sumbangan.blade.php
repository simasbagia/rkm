<x-form-modal-person>
    <x-slot name="header">
        @if($id_pot) Edit Sumbangan
        @endif
    </x-slot>
    <x-form-input field="sumbangan" label="Sumbangan" size="5"></x-form-input>
    <x-form-input field="kegiatan" label="Kegiatan" size="5">        
        </x-form-input>

        <x-slot name="footer">
        </x-slot>

</x-form-modal-person>