 <div class="modal fade" id="form-modal">
     <div class="modal-dialog bs-example-modal-sm">
         <div class="modal-content">

             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                 </button>
                 <h4 class="modal-title" id="">Input Pemesanan</h4>
             </div>
             <div class="modal-body">
                 <form class="form-horizontal" id="form-pemesanan" method="post" action="<?php echo base_url('pemesanan/input') ?>">
                     <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama User</label>
                         <div class="col-md-9 col-sm-9 col-xs-12">
                             <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" autocomplete="off" value="<?= infoLogin()['nama_lengkap'] ?>" readonly>
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Pemesanan</label>
                         <div class="col-md-9 col-sm-9 col-xs-12">
                             <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Pesan</label>
                         <div class="col-md-9 col-sm-9 col-xs-12">
                             <input type="date" class="form-control" id="tanggal" name="tanggal" autocomplete="off" required>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Save changes</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>