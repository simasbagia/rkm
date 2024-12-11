<div class="modal d-block" style="background: rgba(0,0,0, 0.8)" tabindex="-1">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form wire:submit.prevent="save">

                <!-- Header modal -->
                <div class="modal-header ">
                    <h5 class="modal-title text-center" id="formModalLabel">
                        {{ $header }}
                    </h5>
                    <div class="col text-end">
                        <button class="btn btn-outline-secondary" wire:click="save">
                            <i class="fas fa-save"></i> Simpan
                        </button>&nbsp;
                        <button type="button" class="btn btn-outline-danger" wire:click="resetForm"
                            @click="showModal = false">
                            <i class="fas fa-times-circle"></i> Tutup
                        </button>
                    </div>
                    @isset($close)
                        {{ $close }}
                    @endisset
                </div>

                <!-- body modal -->
                <div class="modal-body">
                    <div style="max-height: calc(100vh - 220px); overflow-y: auto; overflow-x: hidden;">
                        <div class="container">
                            <!-- tempat menampilkan pilihan jml tampil halaman dan form pencarian -->
                            {{ $table_tool }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <!-- tempat menampilkan checkbox jika ada -->
                                                    @isset($table_checkbox)
                                                        <th width="30">{{ $table_checkbox }}</th>
                                                    @endisset
                                                    <!-- tempat menampilkan kolom No tabel -->
                                                    @isset($table_no)
                                                        {{ $table_no }}
                                                    @endisset
                                                    <!-- tempat menampilkan judul kolom tabel -->
                                                    @isset($table_column)
                                                        {{ $table_column }}
                                                    @endisset
                                                    <!-- tempat menampilkan kolom action tabel -->
                                                    @isset($table_action)
                                                        {{ $table_action }}
                                                    @endisset

                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{ $slot }}
                                                <!-- tempat menampilkan body tabel -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- pagination link -->
                            <div class="row">
                                <div class="col">
                                    {{ $table_page }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                    {{ $footer }}
                </div>

            </form>
        </div>
    </div>
</div>
