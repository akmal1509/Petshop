<div class="modal fade" id="ubahstatusmodel">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" id="ubahstatusmodel">Ubah Status Ambil</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="post" action="<?php echo base_url('penginapan/ubahstatus') ?>">
					<input type="hidden" name="id_penginapan" value="<?= $item->id_penginapan ?>">
					<div class="ubah_status_data form-group">
						<select id="status_ambil" name="status_ambil" class="form-control">
							<option value="belum diambil">belum diambil</option>
							<option value="sudah diambil">sudah diambil</option>
						</select>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
