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
					<div class="col-md-7 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="x_content">
								<form class="form-horizontal" method="post" action="<?php echo base_url('penggajian/store') ?>" id="formSubmit" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
											<label for="">Tanggal Penggajian :</label>
											<input type="text" class="form-control" name="tanggal" readonly value="<?= date('Y-m-d') ?>" autocomplete="off" required />
										</div>
										<div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
											<label for="">Nama Pegawai :</label>
											<select name="pegawai" class="form-control" id="pegawai">
												<option value="">Pilih Pegawai</option>
												<?php foreach ($pegawai as $item) : ?>
													<option value="<?= $item->id_karyawan ?>"><?= $item->nama_karyawan ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="col-md-4 col-sm-6 col-xs-12">
											<label for="">Gaji Pokok :</label>
											<input type="number" id="gajipokok" readonly class="form-control" name="gajipokok" value="0" autocomplete="off" required />
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
											<label for="">Nama Pengguna :</label>
											<input type="text" class="form-control" name="id_user" readonly value="<?= infoLogin()['nama_lengkap'] ?>" autocomplete="off" required />
										</div>
										<div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
											<label for="">Jabatan :</label>
											<input type="text" id="jabatan" readonly class="form-control" name="jabatan" value="" autocomplete="off" required />
										</div>
										<div class="col-md-4 col-sm-6 col-xs-12">
											<label for="">Potong Gaji :</label>
											<input type="number" id="potonggaji" class="form-control" name="potonggaji" value="0" autocomplete="off" required />
										</div>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Simpan</button>
										<a href="<?= base_url('penggajian') ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
									</div>
							</div>
						</div>
					</div>
					<div class="col-md-5 col-sm-12 col-xs-12">
						<div class="x_panel">
							<div class="x_content">
								<?php if (infoLogin()['tipe'] == 'Bendahara') { ?>
									<div class="form-group">
										<input type="hidden" class="form-control" id="iditem" name="iditem" value="">
										<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
											<label for="">Komisi :</label>
											<input type="text" class="form-control" name="komisi" id="komisi" value="0" autocomplete="off" required />
										</div>
									</div>
								<?php } ?>
								<div class="form-group">
									<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
										<label for="">Gaji Terakhir :</label>
										<input type="text" class="form-control" name="gajiterakhir" id="gajiterakhir" readonly value="" autocomplete="off" required />
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
										<label for="">Gaji Bersih :</label>
										<input type="text" class="form-control" name="gajibersih" id="gajibersih" readonly value="" autocomplete="off" required />
									</div>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include 'script.php' ?>