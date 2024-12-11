<!-- digunakan untuk membuat tombol aksi pada tabel -->
<div>
    {{ $slot }}
    <button wire:click="$emitTo('{{$form}}', 'editData', {{ $iddata }})" class="btn btn-sm btn-primary mb-1 text-white" style="width:20px; height:20px; border-radius: 50%; padding: 0px;">
        <i class="fas fa-edit"></i>
    </button>
</div>