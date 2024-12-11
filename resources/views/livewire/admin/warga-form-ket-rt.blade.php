<x-form-modal>
    <x-slot name="header">
        @if ($id_rt)
            Edit Data RT
        @endif
    </x-slot>
    <x-form-input_rdonly field="pokmas" label="Pokmas" size="5"></x-form-input_rdonly>
    <x-form-input_rdonly field="rt" label="RT" size="5">
    </x-form-input_rdonly>
    <x-form-input field="ketua" label="Ketua" size="5"></x-form-input>
    <x-form-input field="koordinat" label="Koordinat" size="5"></x-form-input>
    <x-form-select field="jalan_lingkungan" label="Kondisi Jalan Lingkungan" size="5">
        <option value="-">-</option>
        <option value="Baik">Baik</option>
        <option value="Rusak">Rusak</option>
        <option value="Sebagian rusak">Sebagian rusak</option>
    </x-form-select>
    <x-form-input field="perlu_penerangan" label="Titik ruang publik yg butuh penerangan" size="5">
    </x-form-input>
    <x-form-select field="drainase" label="Drainase Lingkungan" size="5">
        <option value="-">-</option>
        <option value="Baik">Baik</option>
        <option value="Rusak">Rusak</option>
        <option value="Sebagian rusak">Sebagian rusak</option>
    </x-form-select>
    <x-form-select field="proteksi_kebakaran" label="Proteksi Kebakaran" size="5">
        <option value="-">-</option>
        <option value="Ada-baik">Ada-baik</option>
        <option value="Ada-rusak">Ada-rusak</option>
        <option value="Sebagian rusak">Sebagian rusak</option>
    </x-form-select>
    <x-form-input field="apkr" label="Jumlah Alat Pemadam Kebakaran Ringan" size="5">
    </x-form-input>
    <x-form-input field="kebutuhan_apkr" label="Kebutuhan Alat Pemadam Kebakaran Ringan" size="5">
    </x-form-input>
    <x-form-select field="poskamling" label="Pos Keamanan Lingkungan" size="5">
        <option value="-">-</option>
        <option value="Baik">Baik</option>
        <option value="Rusak">Rusak</option>
        <option value="Sebagian rusak">Sebagian rusak</option>
    </x-form-select>
    <x-form-input field="sarpras_kamling" label="Kebutuhan Sarana Poskamling" size="5">
    </x-form-input>
    <x-form-select field="bale_warga" label="Gedung Pertemuan Warga Masyarakat" size="5">
        <option value="-">-</option>
        <option value="Baik">Baik</option>
        <option value="Rusak">Rusak</option>
        <option value="Perlu perbaikan">Perlu perbaikan</option>
    </x-form-select>
    <x-form-input field="sarpras_bale" label="Kebutuhan Sarpras Gedung Pertemuan" size="5">
    </x-form-input>

    <x-slot name="footer">
        <x-form-button></x-form-button>
    </x-slot>

</x-form-modal>
