<x-form-modal-person>
    <x-slot name="header">
        @if($id_umkm) Edit UMKM/KUBE
        @endif
    </x-slot>
    <x-form-input field="nama" label="Nama" size="5"></x-form-input>
    <x-form-input field="mulai" label="Mulai Tahun" size="4">
        </x-form-datepicker>
        <x-form-select field="aktif" label="Aktif" size="5">
            <option value="-">-</option>
            <option value="Y">Masih Aktif</option>
            <option value="T">Tidak Aktif</option>
            </x-select>
            <x-form-select field="jenis" label="Jenis Usaha" size="5">
                <option value="-">-</option>
		<option value="UMKM">UMKM</option>
                <option value="KUBE">KUBE</option>
                </x-select>
                <x-form-select field="terdaftar" label="Terdaftar" size="5">
                    <option value="-">-</option>
                    <option value="Y">Ya</option>
                    <option value="T">Tidak</option>
                    </x-select>
                    <x-form-input field="ket" label="Keterangan" size="5"></x-form-input>

                    <x-slot name="footer">
                    </x-slot>

</x-form-modal-person>