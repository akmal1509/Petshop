		 <div class="right_col" role="main">
		 	<div class="">
		 		<div class="page-title">
		 			<div class="title_left">
		 				<h3><?php echo $title ?></h3>
		 			</div>
		 		</div>
		 		<div class="clearfix"></div>
		 		<div class="row">
		 			<div class="col-md-12 col-sm-12 col-xs-12">
		 				<div class="x_panel">
		 					<div class="x_title">
		 						<ul class="nav navbar-right panel_toolbox">
		 							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		 							</li>
		 							<li><a class="close-link"><i class="fa fa-close"></i></a>
		 							</li>
		 						</ul>
		 						<div class="clearfix"></div>
		 					</div>
		 					<div class="x_content">
		 						<?php echo $this->session->flashdata('message'); ?>
		 						<table width="100%" class="table table-striped table-bordered datatable">
		 							<!-- <table id="daftarjual" width="100%" class="table table-striped table-bordered"> -->
		 							<thead>
		 								<tr>
		 									<th>Invoice</th>
		 									<th>Kasir</th>
		 									<th>Pelanggan</th>
		 									<th>Diskon</th>
		 									<th>Total</th>
		 									<th>Retur</th>
		 									<th>Metode Pembayaran</th>
		 									<th>Jumlah</th>
		 									<th>Waktu</th>
		 									<th>Opsi</th>
		 								</tr>
		 							</thead>
		 							<tbody>
		 								<?php foreach ($penjualan as $key => $item) : ?>
		 									<tr>
		 										<td><?= $item->invoice ?></td>
		 										<td><?= $item->nama_lengkap ?></td>
		 										<td><?= $item->nama_cs ?></td>
		 										<td>Rp. <?= number_format($item->diskon) ?></td>
		 										<td>Rp. <?= number_format($item->total) ?></td>
		 										<td class="text-danger">Rp. <?= isset($retur[$key]->id_penjualan) == $item->id_jual ? number_format($retur[$key]->nilai) : '0' ?></td>
		 										<td><?= $item->method ?></td>
		 										<td><?= $item->qty ?></td>
		 										<td><?= $item->tgl ?></td>
		 										<td>
		 											<a href="#" class="btn btn-primary btn-xs" title="Detail Data" onclick="detilJual('<?= $item->id_jual ?>')"><i class="fa fa-search-plus"></i></a>
		 											<a href="#" class="btn btn-success btn-xs" title="Print Resi" onclick="cetakResi('<?= $item->id_jual ?>')"><i class="fa fa-print"></i></a>
		 											<a href="<?= base_url('dpenjualan/edit/' . $item->id_jual) ?>" class="btn btn-warning btn-xs" title="Edit Transaksi"><i class="fa fa-edit"></i></a>
		 										</td>
		 									</tr>
		 								<?php endforeach; ?>
		 							</tbody>
		 						</table>
		 					</div>
		 				</div>
		 			</div>
		 		</div>
		 	</div>
		 </div>
		 <?php include 'detildaftar.php' ?>
		 <?php include 'script.php' ?>