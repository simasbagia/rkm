<x-form-modal>
    <x-slot name="header">
        ReSet Password
    </x-slot>

    <x-form-input_rdonly field="name" label="Nama User" size="6">
        </x-form-input>
        <x-form-input_rdonly field="email" label="Email" size="4">
            </x-form-input>
            <x-form-input field="password" label="Password Baru" size="4"></x-form-input>
            Jika password baru tidak diisi, maka otomatis passwordnya : 123456
            <x-slot name="footer">
                <x-form-button_reset></x-form-button_reset>
            </x-slot>
</x-form-modal>