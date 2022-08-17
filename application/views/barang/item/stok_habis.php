		<!-- <?php //cek_user() 
				?> -->
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

							<div class="x_content">
								<?php echo $this->session->flashdata('message'); ?>
								<div class="alert alert-warning alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span> </button><b>Informasi!</b> Barang dengan jumlah pemesanan 0 atau minus tidak akan di proses.</div>
								<form action="<?= base_url('pemesanan/buat_pemesanan') ?>" method="post">
									<button type="submit" class="btn btn-primary proses-pemesanan" style="display: none"> <i class="fa fa-plus"></i> Proses Pemesanan</button>
									<table width="100%" class="table table-striped table-bordered datatable">
										<thead>
											<tr>
												<!-- <th>Kode Item</th> -->
												<th><input type="checkbox" class="checkboxes" id="select-all"></th>
												<th>Gambar</th>
												<th>Kode Barang</th>
												<th>Nama Item</th>
												<th>Satuan</th>
												<th>Kategori</th>
												<th>Supplier</th>
												<th>Harga Beli</th>
												<th>Stok</th>
												<th>Keterangan</th>
												<th>Jumlah Pesan</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($item as $i) { ?>
												<tr>
													<td><input type="checkbox" class="barang checkboxes" value="<?= $i['id_barang'] ?>" name="barang[]" id="<?= $i['id_barang'] ?>"></td>
													<td>
														<img src="<?php echo base_url('assets/img/produk/' . $i['gambar']) ?>" alt="" style="max-width:90px">
													</td>
													<td><?php echo $i['barcode'] ?></td>
													<td><?php echo $i['nama_barang'] ?></td>
													<td><?php echo $i['satuan'] ?></td>
													<td><?php echo $i['kategori'] ?></td>
													<td><?php echo $i['nama_supplier'] ?></td>
													<td><?php echo $i['harga_beli'] ?></td>
													<td>
														<?php echo '<div class="badge" style="background-color: red;">' . $i['stok'] . '</div>' ?>
													</td>
													<td><?php echo $i['keterangan'] == null ? '-' : $i['keterangan']  ?></td>
													<td><input type="number" class="form-control" min="1" name="<?php echo $i['id_barang'] ?>" value="1"></td>

												</tr>
											<?php } ?>
										</tbody>
									</table>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include 'script.php' ?>