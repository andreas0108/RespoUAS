<div class="container">
	<div class="row mt-4">
		<div class="col-md-12">
			<form action="" method="post">
			  <div class="form-group">
			    <label for="cityname">City Name</label>
			    <input type="text" class="form-control" id="cityname" name="cityname">
			    <small class="form-text text-danger"><?= form_error('cityname'); ?></small>
			  </div>
			  <div class="form-group">
			    <label for="country">Country</label>
			    <input type="text" class="form-control" id="country" name="country">
			    <small class="form-text text-danger"><?= form_error('country'); ?></small>
			  </div>
			  <a href="<?=base_url(); ?>city" class="btn btn-primary">Kembali</a> 
			<button type="submit" id="tombolSubmit" name="tombolSubmit" class="btn btn-primary">Simpan</button>
			</form>
		</div>
	</div>
</div>