<!-- digunakan untuk membuat tombol simpan dan batal pada form -->
<div>
    <button class="btn btn-outline-secondary" type="submit">
        <i class="fas fa-save"></i> Simpan
    </button>
    <button type="button" class="btn btn-outline-danger" wire:click="resetForm" @click="showModal = false">
        <i class="fas fa-times-circle"></i> Batal
    </button>
</div>