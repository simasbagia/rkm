<x-form-modal>
    <x-slot name="header">
        @if($id_pokmas) Edit Pokmas
        @else Tambah Pokmas
        @endif
    </x-slot>
    <x-form-input-hidden field="periode_id" label="Tahun" size="3"></x-form-input-hidden>                          
    <x-form-input-hidden field="kel_id" label="Kel" size="3"></x-form-input-hidden>                          
    <x-form-input-hidden field="kec_id" label="Kec" size="3"></x-form-input-hidden>                          
    <x-form-input field="pokmas" label="Nama Pokmas" size="3"></x-form-input>                          
    <x-form-datepicker field="tanggal_buka" label="Awal Kontrak" size="4"></x-form-datepicker>            
    <x-form-datepicker field="tanggal_tutup" label="Akhir Kontrak" size="4"></x-form-datepicker>  
    @if($id_pokmas)
    <x-form-select field="aktif" label="aktif" size="2">
        <option value="">Pilih...</option>
        <option value="Y">Ya</option>
        <option value="N">Tidak</option>
    </x-select>                     
    @else 
    @endif
    <x-slot name="footer">
        <x-form-button></x-form-button>
    </x-slot>    
</x-form-modal>
               