		 <div class="right_col" role="main">
		 	<div class="">
		 		<div class="page-title">
		 			<div class="title_left">
		 				<h3><?php echo $title ?></h3>
		 			</div>
		 		</div>
		 		<div class="clearfix"></div>
		 		<?php echo $this->session->flashdata('message'); ?>
		 		<div class="row">
		 			<div class="col-md-12 col-sm-12 col-xs-12">
		 				<div class="x_panel">
		 					<div class="x_title">
		 						<div class="clearfix"></div>
		 					</div>
		 					<div class="x_content">
		 						<div class="row">
		 							<div class="col-md-12 col-sm-12 col-xs-12">
		 								<h2 style="text-align: right"> Invoice <b id="invoice"></b></h2>
		 							</div>
		 						</div>
		 						<div class="row">
		 							<div class="col-md-9 col-sm-12 col-xs-12">
		 								<h1>Total (Rp)</h1>
		 							</div>
		 							<div class="col-md-3 col-sm-12 col-xs-12">
		 								<h1 style="text-align: right" id="subtot"> 0</h1>
		 							</div>
		 						</div>
		 					</div>
		 				</div>
		 			</div>
		 		</div>
		 		<form class="form-horizontal" method="post" action="<?php echo base_url('penjualan/simpanpenjualan') ?>">
		 			<div class="row">
		 				<div class="col-md-4 col-sm-12 col-xs-12">
		 					<div class="x_panel">
		 						<div class="x_title">
		 							<div class="clearfix"></div>
		 						</div>
		 						<div class="x_content">
		 							<div class="form-group">
		 								<input type="hidden" class="form-control" name="idoperator" id="idoperator" readonly value="<?php echo $user['id_user'] ?>">
		 								<label class="control-label col-md-3 col-sm-3 col-xs-12">Kasir</label>
		 								<div class="col-md-9 col-sm-9 col-xs-12">
		 									<input type="text" class="form-control" name="operator" id="operator" readonly value="<?php echo $user['nama_lengkap'] ?>">
		 								</div>
		 							</div>
		 							<div class="form-group">
		 								<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Konsumen</label>
		 								<div class="col-md-9 col-sm-9 col-xs-12">
		 									<input type="text" class="form-control" name="konsumen" id="konsumen">
		 								</div>
		 							</div>
		 							<div class="form-group">
		 								<label class="control-label col-md-3 col-sm-3 col-xs-12">No. HP</label>
		 								<div class="col-md-9 col-sm-9 col-xs-12">
		 									<input type="text" class="form-control" name="telp" id="telp">
		 								</div>
		 							</div>
		 							<div class="form-group">
		 								<label class="control-label col-md-3 col-sm-3 col-xs-12">Pilih Hewan</label>
		 								<div class="col-md-9 col-sm-9 col-xs-12">
		 									<select id="hewan" name="hewan" class="form-control select2" required>
		 										<option value="kucing">Kucing</option>
		 										<option value="anjing">Anjing</option>
		 									</select>
		 								</div>
		 							</div>
		 							<div class="form-group">
		 								<label class="control-label col-md-3 col-sm-3 col-xs-12">Status Makanan</label>
		 								<div class="col-md-9 col-sm-9 col-xs-12">
		 									<select id="status_makanan" name="status_makanan" class="form-control select2" required>
		 										<option value="customer">Customer</option>
		 										<option value="Toko">Toko</option>
		 									</select>
		 								</div>
		 							</div>
		 							<div class="form-group">
		 								<label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi</label>
		 								<div class="col-md-9 col-sm-9 col-xs-12">
		 									<textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="5" placeholder="Kondisi awal hewan atau informasi tambahan lainnya"></textarea>
		 								</div>
		 							</div>
		 						</div>
		 					</div>
		 				</div>
		 				<div class="col-md-4 col-sm-12 col-xs-12">
		 					<div class="x_panel">
		 						<div class="x_title">
		 							<div class="clearfix"></div>
		 						</div>
		 						<div class="x_content">
		 							<div class="form-group">
		 								<label class="control-label col-md-3 col-sm-3 col-xs-12">Antar Jemput</label>
		 								<div class="col-md-9 col-sm-9 col-xs-12">
		 									<select id="antar_jemput" name="antar_jemput" class="form-control select2" required>
		 										<option value="ya">Ya</option>
		 										<option value="tidak">Tidak</option>
		 									</select>
		 								</div>
		 							</div>
		 							<div class="form-group">
		 								<label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat Konsumen</label>
		 								<div class="col-md-9 col-sm-9 col-xs-12">
		 									<input type="text" class="form-control" name="alamat" id="alamat" autocomplete="off">
		 								</div>
		 							</div>
		 							<div class="form-group">
		 								<label class="control-label col-md-3 col-sm-3 col-xs-12">Biaya Antar Jemput</label>
		 								<div class="col-md-9 col-sm-9 col-xs-12">
		 									<input type="number" class="form-control" name="biaya_antar" id="biaya_antar" autocomplete="off">
		 								</div>
		 							</div>
		 						</div>
		 					</div>
		 				</div>
		 				<div class="col-md-4 col-sm-12 col-xs-12">
		 					<div class="x_panel">
		 						<div class="x_title">
		 							<div class="clearfix"></div>
		 						</div>
		 						<div class="x_content">
		 							<div class="form-group">
		 								<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama</label>
		 								<div class="col-md-9 col-sm-9 col-xs-12">
		 									<input type="text" class="form-control" name="nama_servis" id="nama_servis" readonly value="Penginapan Hewan">
		 								</div>
		 							</div>
		 							<div class="form-group">
		 								<label class="control-label col-md-3 col-sm-3 col-xs-12">Harga / Hari</label>
		 								<div class="col-md-9 col-sm-9 col-xs-12">
		 									<input type="text" class="form-control" name="harga" id="harga" value="50000">
		 								</div>
		 							</div>
		 							<div class="form-group">
		 								<label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Awal</label>
		 								<div class="col-md-9 col-sm-9 col-xs-12">
		 									<input type="date" class="form-control" name="awal" id="awal" autocomplete="off" min="<?php echo date('Y-m-d') ?>">
		 								</div>
		 							</div>
		 							<div class="form-group">
		 								<label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Akhir</label>
		 								<div class="col-md-9 col-sm-9 col-xs-12">
		 									<input type="date" class="form-control" name="akhir" id="akhir" autocomplete="off" min="<?php echo  date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day')) ?>">
		 								</div>
		 							</div>
		 							<div class="form-group">
		 								<label class="control-label col-md-3 col-sm-3 col-xs-12">Lama / Hari</label>
		 								<div class="col-md-9 col-sm-9 col-xs-12">
		 									<input type="text" class="form-control" name="lama" id="lama" autocomplete="off" readonly>
		 								</div>
		 							</div>
		 							<div style="text-align: right">
		 								<button type="button" onclick="addItemByClick()" class="btn btn-success btn-sm"><i class="fa fa-shopping-cart m-right-xs"></i> Tambah</button>
		 							</div>
		 						</div>
		 					</div>
		 				</div>
		 			</div>
		 			<div class="row">
		 				<div class="col-md-12 col-sm-12 col-xs-12">
		 					<div class="x_panel">
		 						<div class="x_title">
		 							<h5><i class="fa fa-magic"></i> Service</h5>
		 							<div class="clearfix"></div>
		 						</div>
		 						<div class="x_content">
		 							<table id="detilservis" width="100%" class="table table-striped table-bordered">
		 								<thead>
		 									<tr>
		 										<th>Jenis Hewan</th>
		 										<th>Lama Penginapan</th>
		 										<th>Harga</th>
		 										<th>Tanggal Awal</th>
		 										<th>Tanggal Akhir</th>
		 										<th>Total</th>
		 										<th>Opsi</th>
		 									</tr>
		 								</thead>
		 							</table>
		 						</div>
		 					</div>
		 				</div>
		 			</div>
		 			<div class="row">
		 				<div class="col-md-12 col-sm-12 col-xs-12">
		 					<div class="x_panel">
		 						<div class="x_title">
		 						</div>
		 						<div class="x_content">
		 							<div style="text-align: right" class="pt-3">
		 								<button type="reset" class="btn btn-danger"><i class="fa fa-recycle m-right-xs"></i> Cancel</button>
		 								<button type="button" onclick="simpanPenjualan()" class="btn btn-primary"><i class="fa fa-paper-plane-o m-right-xs"></i> Payment</button>
		 							</div>
		 						</div>
		 					</div>
		 				</div>
		 			</div>
		 		</form>
		 	</div>
		 </div>
		 <?php include 'showdata.php' ?>
		 <?php include 'modalservis.php' ?>
		 <?php include 'edit_detil_item.php' ?>
		 <?php include 'edit_detil_servis.php' ?>
		 <?php include 'checkout.php' ?>
		 <?php include 'script.php' ?>
