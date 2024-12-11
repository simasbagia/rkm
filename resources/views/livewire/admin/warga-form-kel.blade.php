<x-form-modal-usulan>
    <x-slot name="header">
        @if ($id_kk)
            No KK : {{ $kk }}
        @endif
    </x-slot>
    <x-form-input field="nama" label="Nama" size="5"></x-form-input>
    <x-form-datepicker field="tgl_lahir" label="Tanggal Lahir" size="4"></x-form-datepicker>
    <x-form-select field="jk" label="Jenis Kelamin" size="5">
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </x-form-select>
    
    <hr />Personil
    <x-slot name="table_tool">
        <x-table-tool-nopc>
            </x-tbtool>
    </x-slot>
    <x-slot name="table_no">
        <th width="60">No</th>
    </x-slot>
    <x-slot name="table_column">
        <th>
            Nama
        </th>
        <th>
            Posisi
        </th>
        <th>
            Usia
        </th>
        <th>
            JenKel
        </th>
	<th>
            Agama
        </th>
        <th>
            Warga Negara
        </th>
        <th width="60">
            JKN / KIS
        </th>

        <th>
            Stunting
        </th>
        <th>
            Jamkes
        </th>
        <th>
            Gangguan Jiwa
        </th>
        <th>
            Vaksin Covid
        </th>
        <th>
            Imunisasi
        </th>
        <th>
            Pendidikan
        </th>
        <th>
            Lulus
        </th>
        <th>
            Pekerjaan
        </th>
        <th>
            DTKS
        </th>
        <th>
            Disabilitas
        </th>
        <th>
            Terlantar
        </th>
        <th width="30">
            Aksi
        </th>

    </x-slot>
    @forelse ($keluarga as $data)
        <tr>
            <td class="text-center">{{ $keluarga->perPage() * ($keluarga->currentPage() - 1) + $loop->iteration }}</td>
            <td>{{ $data->nama }}</td>
            <td>
                <x-table-select iddata="{{$data->id}}" field="'posisi'" data="{{ $data->posisi}}">
                    <option value="-">-</option>
                    <option value="Kepala">Kepala</option>
                    <option value="Anggota">Anggota</option>
                </x-table-select>
            </td>
            <td>{{ $data->usia }}</td>
            {{-- <td>{{ $data->jk }}</td> --}}
            <td>
                <x-table-select iddata="{{$data->id}}" field="'jk'" data="{{ $data->jk}}">
                    <option value="-">-</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                </x-table-select>
            </td>

	   


	   {{-- edit --}}
	    <td>
                <x-table-select iddata="{{$data->id}}" field="'agama'" data="{{ $data->agama}}">
                    <option value="-">-</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
            	    <option value="Katholik">Katholik</option>
            	    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Konghuchu">Konghuchu</option>
                    <option value="Aliran kepercayaan">Aliran kepercayaan</option>                
		</x-table-select>
            </td>
	   {{-- edit --}} 	
{{-- edit edit --}} 
	    <td>
                <x-table-select iddata="{{$data->id}}" field="'warneg'" data="{{ $data->warneg}}">
                    <option value="-">-</option>
                    <option value="WNI">WNI</option>
                    <option value="WNA">WNA</option>
		</x-table-select>

            </td>
	  
            <td>
                <x-table-select iddata="{{$data->id}}" field="'jkn_kis'" data="{{ $data->jkn_kis}}">
                    <option value="-">-</option>
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </x-table-select>
            </td>
            <td>
                <x-table-select iddata="{{$data->id}}" field="'stunting'" data="{{ $data->stunting}}">
                    <option value="-">-</option>
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </x-table-select>
            </td>
            <td>
                <x-table-select iddata="{{$data->id}}" field="'jamkes'" data="{{ $data->jamkes}}">
                    <option value="-">-</option>
                    <option value="Punya">Punya</option>
                    <option value="Belum">Belum</option>
                </x-table-select>
            </td>
            <td>
                <x-table-select iddata="{{$data->id}}" field="'gangguan_jiwa'" data="{{ $data->gangguan_jiwa}}">
                    <option value="-">-</option>
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </x-table-select>
            </td>
            <td>
                <x-table-select iddata="{{$data->id}}" field="'vaksin'" data="{{ $data->vaksin}}">
                    <option value="-">-</option>
                    <option value="Sudah">Sudah</option>
                    <option value="Belum">Belum</option>
                </x-table-select>
            </td>
            <td>
                <x-table-select iddata="{{$data->id}}" field="'imunisasi'" data="{{ $data->imunisasi}}">
                    <option value="-">-</option>
                    <option value="Sudah">Sudah</option>
                    <option value="Belum">Belum</option>
                </x-table-select>
            </td>
            <td>
                <x-table-select iddata="{{$data->id}}" field="'pendidikan'" data="{{ $data->pendidikan}}">

                    <option value="-">-</option>
                    <option value="Paud">Paud</option>
                    <option value="TK">TK</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="PT">PT</option>
                </x-table-select>
            </td>
            <td>
                <x-table-select iddata="{{$data->id}}" field="'lulus'" data="{{ $data->lulus}}">
                    <option value="-">-</option>
                    <option value="Lulus">Lulus</option>
                    <option value="Tidak">Tidak</option>
                    <option value="Belum">Belum</option>
                </x-table-select>
            </td>
            <td>
                <x-table-select iddata="{{$data->id}}" field="'pekerjaan'" data="{{ $data->pekerjaan}}">
                    <option value="-">-</option>
		    <option value="Tukang Parkir">Tukang Parkir</option>
		    <option value="BUMN">BUMN</option>	
		    <option value="Sopir">Sopir</option>	
		    <option value="Satpam">Satpam</option>
                    <option value="Dosen">Dosen</option>
		    <option value="Pedagang">Pedagang</option>
	            <option value="BUMN">BUMN</option>
                    <option value="Belum/tidak bekerja">Belum/tidak bekerja</option>
                    <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                    <option value="Pelajar">Pelajar</option>
                    <option value="Wiraswasta">Wiraswasta</option>
                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                    <option value="Karyawan BUMD">Karyawan BUMD</option>
                    <option value="Buruh Harian Lepas">Buruh Harian Lepas</option>
                    <option value="THL">THL</option>
                    <option value="Petani/Peternak">Petani/Peternak</option>
                    <option value="Buruh Tani">Buruh Tani</option>
                    <option value="Montir">Montir</option>
                    <option value="PRT">PRT</option>
                    <option value="Pengacara">Pengacara</option>
                    <option value="PNS">PNS</option>
                    <option value="TNI">TNI</option>
                    <option value="POLRI">POLRI</option>
                    <option value="Bidan">Bidan</option>
                    <option value="Pensiunan">Pensiunan</option>
                    <option value="Lainnya">Lainnya</option>
                </x-table-select>
            </td>
            <td>
                <x-table-select iddata="{{$data->id}}" field="'dtks'" data="{{ $data->dtks}}">
                    <option value="-">-</option>
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </x-table-select>
            </td>
            <td>
                <x-table-select iddata="{{$data->id}}" field="'disabilitas'" data="{{ $data->disabilitas}}">
                    <option value="-">-</option>
		    <option value="Tuna Rungu">Tuna Rungu</option>
		    <option value="Tuna Netra">Tuna Netra</option>
	            <option value="Disabilitas Ganda">Disabilitas Ganda / Multi</option>
                    <option value="Tunawicara">Tunawicara</option>
                    <option value="Lumpuh">Lumpuh</option>
                    <option value="Bibir Sumbing">Bibir Sumbing</option>
                    <option value="Tunadaksa">Tunadaksa</option>
                    <option value="Keterbelakangan Mental">Keterbelakangan Mental</option>
                </x-table-select>
            </td>
            <td>
                <x-table-select iddata="{{$data->id}}" field="'terlantar'" data="{{ $data->terlantar}}">
                    <option value="-">-</option>
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </x-table-select>
            </td>
            <td align="center">
                <button wire:click="hapus({{ $data->id }})"
                    class="btn btn-sm btn-danger mb-1 text-white"
                    style="width:20px; height:20px; border-radius: 50%; padding: 0px;">
                    <i class="fas fa-times"></i>
                </button>
		 

            </td>
        </tr>
    @empty
        <tr>
            <td colspan="30">Tidak ada data untuk ditampilkan</td>
        </tr>
    @endforelse
    <x-slot name="table_page">
        {{-- {{ $keluarga->links() }} --}}
    <br/>
    <br/>
    </x-slot>

    <x-slot name="footer">
        
    </x-slot>

</x-form-modal-usulan>
