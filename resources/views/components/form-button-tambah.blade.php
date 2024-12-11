<!-- digunakan untuk membuat tombol simpan dan batal pada form -->
<div>
    <button class="btn btn-primary" wire:click="tambah">
        <i class="fas fa-save"></i> Simpan
    </button>
    <button type="button" class="btn btn-danger" wire:click="resetForm" @click="showModal = false">
        <i class="fas fa-times-circle"></i> Tutup
    </button>
</div>