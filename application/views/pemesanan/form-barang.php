 <div class="modal fade" id="form-barang">
     <div class="modal-dialog bs-example-modal-sm">
         <div class="modal-content">

             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                 </button>
                 <h4 class="modal-title" id="">Input Barang</h4>
             </div>
             <div class="modal-body">
                 <form class="form-horizontal" id="form-barang" method="post" action="<?php echo base_url('pemesanan/input_detail/' . $detail['id']) ?>">
                     <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">Kode Barang</label>
                         <div class="col-md-9 col-sm-9 col-xs-12">
                             <select id="barang" name="barang" class="form-control select2" required data-placeholder="Pilih Barang">
                                 <option value="0" disabled selected>Pilih Barang</option>
                                 <?php foreach ($barang_item as $item) : ?>
                                     <option value="<?php echo $item['id_barang'] ?>"><?php echo $item['barcode'] . ' - ' . $item['nama_barang'] ?></option>
                                 <?php endforeach; ?>
                             </select>
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">Satuan</label>
                         <div class="col-md-9 col-sm-9 col-xs-12">
                             <select id="satuan" name="satuan" class="form-control select2" required data-placeholder="Pilih Satuan">
                                 <option value="0" disabled selected>Pilih Satuan</option>
                                 <?php foreach ($satuan as $item) : ?>
                                     <option value="<?php echo $item['id_satuan'] ?>"><?php echo $item['satuan'] ?></option>
                                 <?php endforeach; ?>
                             </select>
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">Supplier</label>
                         <div class="col-md-9 col-sm-9 col-xs-12">
                             <select id="supplier" name="supplier" class="form-control select2" required data-placeholder="Pilih Supplier">
                                 <option value="0" disabled selected>Pilih Supplier</option>
                                 <?php foreach ($supplier as $item) : ?>
                                     <option value="<?php echo $item['id_supplier'] ?>"><?php echo $item['nama_supplier'] ?></option>
                                 <?php endforeach; ?>
                             </select>
                         </div>
                     </div>
                     <div class="form-group">
                         <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Pemesanan</label>
                         <div class="col-md-9 col-sm-9 col-xs-12">
                             <input type="text" class="form-control" id="jumlah" name="jumlah" autocomplete="off" required>
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