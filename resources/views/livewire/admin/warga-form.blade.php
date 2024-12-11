<x-form-modal>
    <x-slot name="header">
        @if ($id_kk)
            Data KK/ Rumah tangga
        @endif
    </x-slot>

    <x-form-input field="kk" label="No KK" size="5"></x-form-input>
    {{-- <x-form-input field="koordinat" label="Koordinat" size="50"></x-form-input> --}}
    <x-form-select field="aktif" label="Aktif" size="5">
        <option value="-">-</option>
        <option value="Y">Ya</option>
        <option value="T">Tidak</option>
    </x-form-select>

    <x-form-select field="ekonomi" label="Ekonomi" size="5">
        <option value="-">-</option>
        <option value="Tidak mampu">Tidak mampu</option>
        <option value="Berkecukupan">Berkecukupan</option>
        <option value="Berlebih">Berlebih</option>
    </x-form-select>
    <x-form-select field="dtks" label="DTKS" size="5">
        <option value="-">-</option>
        <option value="Ya">Ya</option>
        <option value="Tidak">Tidak</option>
    </x-form-select>
    <x-form-select field="rumah" label="Tempat tinggal" size="5">
        <option value="-">-</option>
        <option value="Sendiri">Sendiri</option>
        <option value="Menumpang">Menumpang</option>
        <option value="Sewa">Sewa(kontrak)</option>
        <option value="Dinas/Mess">Dinas/Mess</option>
    </x-form-select>
    <x-form-select field="bangunan" label="Kondisi Bangunan (Dinding)" size="5">
        <option value="-">-</option>
        <option value="Tembok">Tembok</option>
        <option value="Triplek">Triplek</option>
        <option value="Bambu">Bambu</option>
        <option value="Kayu">Kayu</option>
        <option value="Anyaman/Gedeg">Anyaman/Gedeg</option>
    </x-form-select>
    <x-form-select field="atap" label="Kondisi Atap" size="5">
        <option value="-">-</option>
	<option value="Asbes">Asbes</option>
        <option value="Genteng">Genteng</option>
        <option value="Ternit">Ternit</option>
        <option value="Galvalum">Galvalum</option>
    </x-form-select>
    <x-form-select field="lantai" label="Kondisi Lantai" size="5">
        <option value="-">-</option>
        <option value="Tanah">Tanah</option>
        <option value="Ubin">Ubin</option>
        <option value="Keramik">Keramik</option>
        <option value="Plester">Plester</option>
    </x-form-select>
    <x-form-select field="minum" label="Akses air minum" size="5">
        <option value="-">-</option>
        <option value="PDAM">PDAM</option>
        <option value="SPAM">Swadaya PAM</option>
        <option value="Sumur">Sumur</option>
        <option value="Belik">Mata Air/Belik</option>
        <option value="Galon">Lainnya(Menumpang/Galon, dll)</option>
    </x-form-select>
    <x-form-select field="sanitasi" label="Akses sanitasi" size="5">
        <option value="-">-</option>
        <option value="SPALD Individu">SPALD Individu</option>
        <option value="SPALD Komunal">SPALD Komunal</option>
        <option value="WC Umum">WC Umum</option>
        <option value="BABs">BABs (Buang Air Besar Sembarangan / Di Sungai</option>
    </x-form-select>
    <x-form-select field="hunian" label="Rumah hunian" size="5">
        <option value="-">-</option>
        <option value="Layak">Layak</option>
        <option value="Tidak Layak">Tidak Layak</option>
    </x-form-select>
    <x-form-select field="urban_farming" label="Melaksanakan Urban Farming" size="5">
        <option value="-">-</option>
        <option value="Ya">Ya</option>
        <option value="Tidak">Tidak</option>
    </x-form-select>
    {{-- {{ $urban??'aaaa' }} --}}
    @if($urban=="Ya")
    <x-form-input field="bidang" label="Bidang yang dilakukan" size="5"></x-form-input>
    <x-form-input field="pengalaman" label="Pengalaman Berusaha" size="5"></x-form-input>
    <x-form-input field="nama_kelompok" label="Nama Kelompok" size="5"></x-form-input>
    <x-form-input field="lokasi_usaha" label="Lokasi Usaha" size="5"></x-form-input>
    <x-form-input field="luas_lahan" label="Luas Lahan" size="5"></x-form-input>
    <x-form-input field="bentuk_lahan" label="Bentuk Lahan" size="5"></x-form-input>
    <x-form-input field="status_lahan" label="Status Lahan" size="5"></x-form-input>
    @endif

    <x-slot name="footer">
        <x-form-button></x-form-button>
    </x-slot>

</x-form-modal>
