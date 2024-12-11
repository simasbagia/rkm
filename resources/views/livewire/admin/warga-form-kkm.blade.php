<x-form-modal-person>
    <x-slot name="header">
        @if($id_kkm) Edit Kelompok Kegiatan Masyarakat
        @endif
    </x-slot>
    <x-form-input field="nama" label="Nama" size="5"></x-form-input>
    <x-form-select field="aktif" label="Aktif" size="5">
        <option value="-">-</option>
        <option value="Y">Masih Aktif</option>
        <option value="T">Tidak Aktif</option>
        </x-select>
        <x-form-select field="jenis" label="Jenis Kelompok" size="5">
            <option value="-">-</option>
            <option value="Seni Budaya">Seni Budaya</option>
            <option value="Club Olahraga">Club Olahraga</option>
            <option value="Kegiatan Keagamaan">Kegiatan Keagamaan</option>
            </x-select>
            <x-form-input field="pj" label="Penanggung Jawab" size="5"></x-form-input>
            <x-form-input field="jml_anggota" label="jml_anggota" size="5"></x-form-input>
            <x-form-input field="kegiatan" label="Kegiatan" size="5"></x-form-input>

            <x-slot name="footer">
            </x-slot>

</x-form-modal-person>