<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="fullname">Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname">
                <small class="form-text text-danger"><?= form_error('fullname'); ?></small>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email">
                <small class="form-text text-danger"><?= form_error('email'); ?></small>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address">
                <small class="form-text text-danger"><?= form_error('address'); ?></small>
            </div>

            <div class="form-group">
                <label for="company">Company</label>
                <select class="form-control" id="company" name="company">
                    <?php foreach($company as $cmp): ?>
                        <option value="<?= $cmp['idcompany']; ?>"><?= $cmp['name']; ?></option> 
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <select class="form-control" id="city" name="city">
                    <?php foreach($city as $cty): ?>
                        <option value="<?= $cty['idcity']; ?>"><?= $cty['cityname']; ?>,<?= $cty['country']; ?></option> 
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="foto">Foto</label>	
                <div class="custom-file">
                    <input type="file" class="custom-file-input form-control-file" name="foto" aria-describedby="inputGroupFileAddon04">
                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                </div>
            </div>

            <a href="<?=base_url(); ?>members" class="btn btn-primary">Kembali</a> 
            <button type="submit" id="tombolSubmit" name="tombolSubmit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>