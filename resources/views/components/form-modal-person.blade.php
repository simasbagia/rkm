<div class="modal d-block" style="background: rgba(0,0,0, 0.8)" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form wire:submit.prevent="save">

                <!-- Header modal -->
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">
                        {{ $header }}
                    </h5>
                    @isset($close)
                    {{ $close }}
                    @endisset
                </div>

                <!-- body modal -->
                <div class="modal-body">
                    <div style="max-height: calc(100vh - 220px); overflow-y: auto; overflow-x: hidden;">
                        {{ $slot }}
                    </div>
                </div>

                <!-- footer modal -->
                <div class="modal-footer">
                    {{ $footer }}
                    <div class="col text-end">
                        <button class="btn btn-outline-secondary" wire:click="save">
                            <i class="fas fa-save"></i> Simpan
                        </button>&nbsp;
                        <button type="button" class="btn btn-outline-danger" wire:click="resetForm" @click="showModal = false">
                            <i class="fas fa-times-circle"></i> Tutup
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>