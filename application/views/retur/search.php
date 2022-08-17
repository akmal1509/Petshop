<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModal">Cari Transaksi</h4>
            </div>
            <div class="modal-body">
                <form action="<?= base_url($action) ?>" method="GET">
                    <div class="form-group top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Masukan kode transaksi.." name="nomor" required autocomplete="off">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-secondary" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</div>