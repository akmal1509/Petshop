		 <?php //cek_user() 
			?>

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
		 						<?php if (infoLogin()['tipe'] == 'Gudang') : ?>
		 							<button type="button" class="btn add-order btn-sm btn-primary" title="Tambah Data" data-toggle="modal" data-target="#form-modal" id=""><i class="fa fa-plus"></i> Tambah Pemesanan</button>
		 						<?php endif; ?>
		 						<div class="clearfix"></div>
		 					</div>
		 					<div class="x_content">
		 						<?php echo $this->session->flashdata('message'); ?>
		 						<table id="" width="100%" class="table table-striped table-bordered datatable">
		 							<thead>
		 								<tr>
		 									<th>No</th>
		 									<th>Nama Pemesan</th>
		 									<th>Nama Pemesanan </th>
		 									<!-- <th>Jumlah Barang</th> -->
		 									<th>Tanggal</th>
		 									<th>Status</th>
		 									<th>Opsi</th>
		 								</tr>
		 							</thead>

		 							<body>
		 								<?php $i = 1;
											foreach ($pemesanan as $item) : ?>
		 									<?php if ($item['nama_pemesanan'] != null) : ?>
		 										<tr>
		 											<td><?= $i ?></td>
		 											<td><?= $item['nama_lengkap'] ?></td>
		 											<td><?= $item['nama_pemesanan'] ?></td>
		 											<!-- <td><?= $item['jumlah_pesanan'] ?></td> -->
		 											<td>
		 												<?= $item['tanggal'] ?>
		 											</td>
		 											<td>
		 												<?php

																	if ($item['status'] == 'pending') {
																		echo '<span class="label label-warning">Belum Disubmit</span>';
																	} else if ($item['status'] == 'acc') {
																		echo '<span class="label label-success">Disetujui</span>';
																	} else if ($item['status'] == 'reject') {
																		echo '<span class="label label-danger">Ditolak</span>';
																	} else {
																		echo '<span class="label label-info">Telah Disubmit</span>';
																	}
																	?>

		 											</td>
		 											<td>
		 												<?php if ($item['status'] == 'pending' && infoLogin()['tipe'] == 'Gudang') : ?>
		 													<a href="#" class="btn btn-primary btn-xs" onclick="editPesanan('<?= $item['id'] ?>')" title="Edit Data"><i class="fa fa-edit"></i></a>
		 													<a href="#" class="btn btn-danger btn-xs" onclick="deletePesanan('<?= $item['id'] ?>')" title="Hapus Data"><i class="fa fa-trash "></i></a>
		 												<?php endif; ?>
		 												<?php if ($item['status'] == 'submit' && infoLogin()['tipe'] == 'Owner') : ?>
		 													<a href="#" class="btn btn-success btn-xs" onclick="submit('<?= $item['id'] ?>', 'acc')"><i class="fa fa-check"></i></a>
		 													<a href="#" class="btn btn-danger btn-xs" onclick="submit('<?= $item['id'] ?>','reject')"><i class="fa fa-times "></i></a>
		 												<?php endif; ?>
		 												<a href="<?= base_url('pemesanan/detail/' . $item['id']) ?>" class="btn btn-info btn-xs" title="Lihat Data"><i class="fa fa-eye "></i></a>
		 											</td>
		 										</tr>
		 									<?php endif; ?>
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
		 <?php include 'form.php'; ?>
		 <?php include 'script.php'; ?>