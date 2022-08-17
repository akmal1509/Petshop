 <div class="modal fade" id="myModal">
	<div class="modal-dialog">
	  <div class="modal-content">

		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
		  </button>
		  <h4 class="modal-title" id="myModal">Entry Data Jabatan</h4>
		</div>
		<div class="modal-body">
		 <form class="form-horizontal" method="post" action="<?php echo base_url('jabatan/store')?>">
			  <div class="form-group">
			  	<label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Jabatan</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="hidden" class="form-control" id="id" name="id"autocomplete="off" required>
					<input type="text" class="form-control" id="name" name="name"autocomplete="off" required>
				</div>
			  </div>
			  <div class="form-group">
			  	<label class="control-label col-md-3 col-sm-3 col-xs-12">Gaji</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
					<input type="number" class="form-control" id="gaji" name="gaji"autocomplete="off" required>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi</label>
				<div class="col-md-9 col-sm-9 col-xs-12">
				  <textarea col="7" rows="2" class="form-control" name="deskripsi" id="deskripsi"></textarea>
				</div>
			  </div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  <button type="submit" class="btn btn-primary">Save changes</button>
			</div>
		  </form>
		</div>
	  </div>
	</div>
  </div>