<div>
    <input wire:model="search" type="text" placeholder="Cari calon siswa..." />
    <ul>
        @foreach($pendaftar as $pendaftar)
        <li>{{$pendaftar->nama}}</li>
        @endforeach
    </ul>
</div>