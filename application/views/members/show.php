<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
<div class="row mt-4">
    <div class="col-md-6">
    <h2><?= $members['fullname']; ?></h2>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">
    <img src="<?= base_url(); ?>uploads/img/<?= $members['foto']; ?>" width="150"> 
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
    <table class="table table-hover">

    <tr>
    <td scope="col">Email</td>
    <td scope="col"><?= $members['email']; ?></td> 
    </tr>
    <tr>
    <td scope="col">Company</td>
    <td scope="col"><?= $members['name']; ?></td> 
    </tr>
    <tr>
    <td scope="col">Address</td>
    <td scope="col"><?= $members['address']; ?></td> 
    </tr>
    <tr>
    <td scope="col">City</td>
    <td scope="col"><?= $members['cityname']; ?></td> 
    </tr>
    <tr>
    <td scope="col">Country</td>
    <td scope="col"><?= $members['country']; ?></td> 
    </tr>

</table>

    </div>
</div>

    <div class="row mb-3">
    <div class="col-md-6">
        <a href="<?= base_url(); ?>members" class="btn btn-secondary float-right"><i class="fas fa-arrow-left"></i> Back</a> 
    </div>
    </div>
</div>