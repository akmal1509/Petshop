 <div class="modal fade" id="pembayaranModal">
 	<div class="modal-dialog">
 		<div class="modal-content">

 			<div class="modal-header">
 				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
 				</button>
 				<h4 class="modal-title" id="inputKasModal">Pembayaran</h4>
 			</div>
 			<div class="modal-body">
 				<form class="form-horizontal" method="post" action="<?php echo base_url('grooming/simpanpenjualan') ?>">
 					<div class="form-group">
 						<input type="hidden" class="form-control" name="kasir" id="kasir" readonly>
 						<input type="hidden" class="form-control" name="cus" id="cus" readonly>
 						<input type="hidden" class="form-control" name="hp" id="hp" readonly>
 						<input type="hidden" class="form-control" name="deskripsi" id="deskripsi_m" readonly>
 						<label class="control-label col-md-3 col-sm-3 col-xs-12">Sub Total</label>
 						<div class="col-md-9 col-sm-9 col-xs-12">
 							<input type="text" class="form-control" name="subtotal" id="subtotal" readonly>
 						</div>
 					</div>
 					<div class="form-group">
 						<label class="control-label col-md-3 col-sm-3 col-xs-12">Diskon (Rp)</label>
 						<div class="col-md-9 col-sm-9 col-xs-12">
 							<input type="text" class="form-control" name="diskon1" id="diskon1" autocomplete="off" readonly>
 						</div>
 					</div>
 					<div class="form-group" style="display:none;">
 						<label class="control-label col-md-3 col-sm-3 col-xs-12">PPN</label>
 						<div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
 							<input type="text" class="form-control has-feedback-left" name="nominal_ppn" id="nominal_ppn" readonly>
 							<span class="form-control-feedback left" aria-hidden="true"><b>Rp</b></span>
 						</div>
 						<div class="col-md-4 col-sm-6 col-xs-12 form-group has-feedback">
 							<input type="number" class="form-control" name="ppn_persen" id="ppn_persen" autocomplete="off">
 							<span class="form-control-feedback right" aria-hidden="true"><b>%</b></span>
 						</div>
 					</div>
 					<!-- <div class="form-group cek-poin">
             <label class="control-label col-md-3 col-sm-3 col-xs-12">Gunakan Poin</label>
             <div class="col-md-9 col-sm-9 col-xs-12">
               <div class="row">
                 <div class="col-md-2">
                   <label class="text-warning">
                     <input type="checkbox" class="js-switch" id="check" onclick="gunakanPoin()" />
                   </label>
                 </div>
                 <div class="col-md-10">
                   <input type="text" class="form-control" id="poin" name="poin" readonly>
                   <input type="hidden" class="form-control" id="poin1" name="poin1" readonly>
                   <input type="hidden" class="form-control" id="poin2" name="poin2" readonly>
                 </div>
               </div>
             </div>
           </div> -->

 					<div class="form-group">
 						<label class="control-label col-md-3 col-sm-3 col-xs-12">Grand Total</label>
 						<div class="col-md-9 col-sm-9 col-xs-12">
 							<input type="text" class="form-control" name="grandtotal" id="grandtotal" readonly>
 							<input type="hidden" class="form-control" name="nominal" id="nominal" readonly>
 						</div>
 					</div>
 					<div class="form-group">
 						<label class="control-label mb-1 col-md-3 col-sm-3 col-xs-12">Metode Pembayaran</label>
 						<div class="col-md-6 col-sm-6 col-xs-12">
 							<div class="checkbox">
 								<label>
 									<input type="radio" name="metode" id="cash" value="Cash" checked> Cash
 								</label>
 								<?php if (infoLogin()['tipe'] != 'Kasir') { ?>
 									<label>
 										<input type="radio" name="metode" id="kredit" value="Kredit"> Kredit
 									</label>
 								<?php } ?>
 								<label>
 									<input type="radio" name="metode" id="debit" value="Debit"> Debit
 								</label>
 							</div>
 						</div>
 					</div>
 					<div class="form-group nomor-kartu">
 						<label class="control-label col-md-3 col-sm-3 col-xs-12">Nomor Kartu</label>
 						<div class="col-md-9 col-sm-9 col-xs-12">
 							<input type="number" class="form-control" name="nomor_kartu" id="nomor_kartu" autocomplete="off">
 						</div>
 					</div>
 					<div class="form-group jatuh-tempo">
 						<label class="control-label col-md-3 col-sm-3 col-xs-12">Jatuh Tempo</label>
 						<div class="col-md-9 col-sm-9 col-xs-12">
 							<input type="date" class="form-control" name="tempo" id="tempo" autocomplete="off">
 						</div>
 					</div>
 					<div class="form-group">
 						<label class="control-label col-md-3 col-sm-3 col-xs-12">Bayar</label>
 						<div class="col-md-9 col-sm-9 col-xs-12">
 							<input type="number" class="form-control" name="bayar" id="bayar" autocomplete="off" required>
 						</div>
 					</div>
 					<div class="form-group">
 						<label class="control-label col-md-3 col-sm-3 col-xs-12">Kembali</label>
 						<div class="col-md-9 col-sm-9 col-xs-12">
 							<input type="text" class="form-control" name="kembali" id="kembali" readonly autocomplete="off">
 						</div>
 					</div>
 					<div class="modal-footer">
 						<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
 						<button type="submit" class="btn btn-primary save-bt" disabled><i class="fa fa-print"></i> Cetak dan Simpan</button>
 					</div>
 				</form>
 			</div>
 		</div>
 	</div>
 </div>
