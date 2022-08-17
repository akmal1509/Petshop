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
		 						<a href="<?= base_url('penggajian/create') ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
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
		 						<table id="datajabatan" width="100%" class="table table-striped table-bordered datatable">
		 							<thead>
		 								<tr>
		 									<th>No</th>
		 									<th>Nama Pegawai</th>
		 									<th>Gaji Bulan</th>
		 									<th>Tanggal</th>
		 									<th>Gaji Pokok</th>
		 									<th>Potongan Gaji</th>
		 									<th>Gaji Bersih</th>
		 								</tr>
		 							</thead>
		 							<tbody>
		 								<?php $i = 1;
											$totalGaji = 0;
											foreach ($penggajian as $gaji) : ?>
		 									<tr>
		 										<td><?= $i++ ?></td>
		 										<td><?= $gaji->nama_karyawan ?></td>
		 										<td><?= $gaji->tanggal_gaji ?></td>
		 										<td><?= $gaji->tanggal_gaji ?></td>
		 										<td>Rp. <?= number_format($gaji->gaji) ?></td>
		 										<td>Rp. <?= number_format($gaji->potong_gaji) ?></td>
		 										<td>Rp. <?= number_format($gaji->gaji_bersih) ?></td>
		 									</tr>
		 									<?php $totalGaji += $gaji->gaji_bersih; ?>
		 								<?php endforeach; ?>
		 							</tbody>
		 							<tfoot>
		 								<tr>
		 									<td colspan="6" align="center"> <strong>Total Gaji</strong> </td>
		 									<td>Rp. <?= number_format($totalGaji) ?></td>
		 								</tr>
		 							</tfoot>
		 						</table>
		 					</div>
		 				</div>
		 			</div>
		 		</div>
		 	</div>
		 </div>
		 <?php include('script.php') ?>