<x-form-modal>
    <x-slot name="header">
        Edit Siswa
    </x-slot>

    <x-form-select field="periode_id" label="Tapel" size="6">
        @foreach($tapel as $tapela)
        <option value="{{$tapela->id}}">{{$tapela->tahun}}</option>
        @endforeach
        </x-select>
        <x-form-select field="unit_id" label="Unit" size="6">
            @foreach($unit as $unite)
            <option value="{{$unite->id}}">{{$unite->nama_unit}}</option>
            @endforeach
            </x-select>
            <x-form-select field="jenjang_id" label="Jenjang" size="6">
                @foreach($jenjang as $jenjange)
                <option value="{{$jenjange->id}}">{{$jenjange->nama_jenjang}}</option>
                @endforeach
                </x-select>
                <x-form-select field="kelas_id" label="Kelas" size="6">
                    @foreach($kelas as $kelase)
                    <option value="{{$kelase->id}}">{{$kelase->nama_kelas}}</option>
                    @endforeach
                    </x-select>


                    <x-slot name="footer">
                        <x-form-button></x-form-button>
                    </x-slot>
</x-form-modal>