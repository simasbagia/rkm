<x-form-modal-person>
    <x-slot name="header">
        @if ($id_person)
            No KK : {{ $kk }}
        @endif
    </x-slot>
    <x-form-input field="nama" label="Nama" size="5"></x-form-input>
    <x-form-datepicker field="tgl_lahir" label="Tanggal Lahir" size="4"></x-form-datepicker>
    <x-form-select field="jk" label="Jenis Kelamin" size="5">
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </x-form-select>
    <x-form-select field="agama" label="Agama / Kepercayaan" size="5">
        <option value="-">-</option>
        <option value="Islam">Islam</option>
        <option value="Kristen">Kristen</option>
        <option value="Katholik">Katholik</option>
        <option value="Hindu">Hindu</option>
        <option value="Budha">Budha</option>
        <option value="Aliran kepercayaan">Aliran kepercayaan</option>
    </x-form-select>
    <x-form-select field="pendidikan" label="Pendidikan Terakhir" size="5">
        <option value="-">-</option>
        <option value="Paud">Paud</option>
        <option value="SD">SD</option>
        <option value="SMP">SMP</option>
        <option value="SMA">SMA</option>
        <option value="PT">Perguruan Tinggi</option>
    </x-form-select>
    <x-form-select field="lulus" label="Kelulusan" size="5">
        <option value="-">-</option>
        <option value="L">Lulus</option>
        <option value="T">Tidak Lulus</option>
        <option value="B">Belum Lulus</option>
    </x-form-select>
    <x-form-select field="pekerjaan" label="Pekerjaan" size="5">
        <option value="-">-</option>
	<option value="Pedagang">Pedagang</option>
	<option value="BUMN">BUMN</option>
        <option value="Wiraswasta">Wiraswasta</option>
        <option value="Karyawan swasta">Karyawan Swasta</option>
        <option value="Karyawan bumd">Karyawan BUMD</option>
        <option value="THL">THL</option>
        <option value="PNS">PNS</option>
        <option value="TNI">TNI</option>
        <option value="POLRI">POLRI</option>
        <option value="Bidan">Bidan</option>
        <option value="Lainya">Lainya</option>
    </x-form-select>
    <x-form-select field="posisi" label="Status-Posisi" size="5">
        <option value="-">-</option>
        <option value="Kepala">Kepala keluarga</option>
        <option value="Anggota">Anggota keluarga</option>
    </x-form-select>
    <x-form-select field="warneg" label="Warga Negara" size="5">
        <option value="-">-</option>
        <option value="WNI">WNI</option>
        <option value="WNA">WNA</option>
    </x-form-select>
    <x-form-select field="disabilitas" label="Disabilitas" size="5">
        <option value="-">-</option>
        <option value="Tunawicara">Tunawicara</option>
        <option value="Tunarungu">Tunarungu</option>
        <option value="Tunadaksa">Tunadaksa</option>
    </x-form-select>
    <x-slot name="footer">
    </x-slot>

</x-form-modal-person>
