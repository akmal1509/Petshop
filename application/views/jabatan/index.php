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
		 						<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Data</button>
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
		 									<th>Nama Jabatan</th>
		 									<th>Gaji</th>
		 									<th>Keterangan</th>
		 									<th>Opsi</th>
		 								</tr>
		 							</thead>
		 							<tbody>
		 								<?php $i = 1; ?>
		 								<?php foreach ($jabatan as $item) : ?>
		 									<tr>
		 										<td><?= $i++ ?></td>
		 										<td><?= $item->nama_jabatan ?></td>
		 										<td>Rp. <?= number_format($item->gaji) ?></td>
		 										<td><?= $item->deskripsi ?></td>
		 										<td>
		 											<a href="#" onclick="editJabatan('<?php echo $item->id_jabatan ?>')" class="btn btn-primary btn-xs" title="Edit Data"><i class="fa fa-edit"></i></a>
		 											<a href="#" class="btn btn-danger btn-xs" title="Hapus Data" onclick="hapusJabatan('<?php echo $item->id_jabatan ?>')"><i class="fa fa-trash "></i></a>
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
		 <?php include('form.php') ?>
		 <?php include('script.php') ?>