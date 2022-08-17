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
		 									<th>No.</th>
		 									<th>Kasir</th>
		 									<th>Konsumen</th>
		 									<th>Telp Konsumen</th>
		 									<th>Alamat</th>
		 									<th>Antar Jemput</th>
		 									<th>Biaya Antar Jemput</th>
		 									<th>Jumlah Hewan</th>
		 									<th>Total</th>
		 									<th>Tanggal</th>
		 									<th>Status</th>
		 									<th>Opsi</th>
		 								</tr>
		 							</thead>
		 							<tbody>
		 								<?php foreach ($penginapan as $key => $item) : ?>
		 									<tr>
		 										<td><?= $key + 1 ?></td>
		 										<td><?= $item->nama_lengkap ?></td>
		 										<td><?= $item->konsumen ?></td>
		 										<td><?= $item->telp_konsumen ?></td>
		 										<td><?= $item->alamat_konsumen ?></td>
		 										<td><?= $item->antar_jemput == 1 ? 'Ya' : 'Tidak' ?></td>
		 										<td>Rp. <?= number_format($item->biaya_antar_jemput) ?></td>
		 										<td><?= number_format($item->jumlah) ?></td>
		 										<td>Rp. <?= number_format($item->total) ?></td>
		 										<td><?= $item->tanggal ?></td>
		 										<td>
		 											<?php if ($item->status == "belum diambil") : ?>
		 												<span class="label label-danger">belum diambil</span>
		 											<?php else : ?>
		 												<span class="label label-success">sudah diambil</span>
		 											<?php endif; ?>
		 										</td>
		 										<td>
		 											<a href="#" class="btn btn-primary btn-xs" title="Detail Data" onclick="detilJual('<?= $item->id_penginapan ?>')"><i class="fa fa-search-plus"></i></a>
		 											<a href="#" class="btn btn-success btn-xs" title="Print Resi" onclick="cetakResi('<?= $item->id_penginapan ?>')"><i class="fa fa-print"></i></a>
		 											<a href="#" class="btn btn-warning btn-xs" title="ubah status" onclick="ubahstatus('<?= $item->id_penginapan ?>')"><i class="fa fa-edit"></i></a>
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
		 <?php include 'ubahstatus.php' ?>
