		 <?php //cek_user() 
			?>
		 <style>
		 	.select2-container {
		 		outline: 0;
		 		position: relative;
		 		display: inline-block;
		 		vertical-align: middle;
		 		text-align: left;
		 		z-index: 999999 !important;
		 	}
		 </style>
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
		 						<?php if ($detail['status'] == 'pending' && infoLogin()['tipe'] == 'Gudang') : ?>
		 							<button type="button" class="btn add-barang btn-sm btn-primary" title="Tambah Data" data-toggle="modal" data-target="#form-barang" id="" data-id="<?= $detail['id'] ?>"><i class="fa fa-plus"></i> Tambah Barang</button>
		 							<button type="button" class="btn btn-sm btn-success" onclick="submit('<?= $detail['id'] ?>', 'submit')" title="Submit Pemesanan"><i class="fa fa-check"></i> Submit Pemesanan</button>
		 						<?php endif; ?>
		 						<div class="clearfix"></div>
		 					</div>
		 					<div class="x_content">
		 						<?php echo $this->session->flashdata('message'); ?>
		 						<table id="" width="100%" class="table table-striped table-bordered datatable">
		 							<thead>
		 								<tr>
		 									<th>No</th>
		 									<th>Kode Barang</th>
		 									<th>Nama Barang </th>
		 									<th>Jumlah</th>
		 									<th>Satuan</th>
		 									<th>Supplier</th>
		 									<th>Tanggal</th>
		 									<th>Opsi</th>
		 								</tr>
		 							</thead>

		 							<body>
		 								<?php $i = 1;
											foreach ($barang as $item) : ?>
		 									<tr>
		 										<td><?= $i ?></td>
		 										<td><?= $item['barcode'] ?></td>
		 										<td><?= $item['nama_barang'] ?></td>
		 										<td><?= $item['jumlah'] ?></td>
		 										<td><?= $item['satuan'] ?></td>
		 										<td><?= $item['nama_supplier'] ?></td>
		 										<td>
		 											<?= $item['tanggal'] ?>
		 										</td>

		 										<td>
		 											<?php if ($detail['status'] == 'pending' && infoLogin()['tipe'] == 'Gudang') : ?>
		 												<a href="#" class="btn btn-primary btn-xs" onclick="editDetailPesanan('<?= $item['id'] ?>','<?= $detail['id'] ?>')" title="Edit Data"><i class="fa fa-edit"></i></a>
		 												<a href="#" class="btn btn-danger btn-xs" onclick="deleteDetailPesanan('<?= $item['id'] ?>')" title="Hapus Data"><i class="fa fa-trash "></i></a>
		 											<?php endif; ?>
		 										</td>
		 									</tr>

		 								<?php $i++;
											endforeach; ?>
		 							</body>
		 						</table>
		 					</div>
		 				</div>
		 			</div>
		 		</div>
		 	</div>
		 </div>
		 <?php include 'form-barang.php'; ?>
		 <?php include 'script.php'; ?>