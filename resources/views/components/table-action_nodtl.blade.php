<!-- digunakan untuk membuat tombol aksi pada tabel -->
<div>
    {{ $slot }}
    <!-- <button wire:click="$emitTo('admin.warga-detail', 'showData', {{ $iddata }})" class="btn btn-sm btn-primary mb-1 text-white" style="width:20px; height:20px; border-radius: 50%; padding: 0px;">
        <i class="fas fa-user"></i>
    </button> -->
    <button wire:click="$emitTo('{{$form}}', 'editData', {{ $iddata }})" class="btn btn-sm btn-primary mb-1 text-white" style="width:20px; height:20px; border-radius: 50%; padding: 0px;">
        <i class="fas fa-edit"></i>
    </button>&nbsp;
    <button wire:click="openConfirm({{ $iddata }})" class="btn btn-sm btn-danger mb-1 text-white" style="width:20px; height:20px; border-radius: 50%; padding: 0px;">
        <i class="fas fa-times"></i>
    </button>
</div>