<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if(isset($ok)):?><div class="alert alert-info"><?php echo $ok?></div><?php endif;?>
<?php if(isset($error)):?><div class="alert alert-danger"><?php echo $error?></div><?php endif;?>
<div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div> 
    <?php if($this->session->flashdata('flash')): ?>
    <?php endif; ?>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Members</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#csvimport" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Import CSV</span></a>
                        <a href="<?=base_url('members/add');?>" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Tambah Data</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Company</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    <?php foreach($members as $mbr) : ?>
                    <tr>
                        <th><?= $i; ?></th> 
                        <td><?= $mbr['fullname']; ?></td>
                        <td><?= $mbr['email']; ?></td>
                        <td><?= $mbr['name']; ?></td>
                        <td><?= $mbr['cityname']; ?></td>
                        <td><?= $mbr['country']; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>members/edit/<?= $mbr['id']; ?>"><i class="fas fa-edit"></i></a>
                            <a href="<?= base_url(); ?>members/delete/<?= $mbr['id']; ?>"><i class="fas fa-trash-alt"></i></a>
                            <a href="<?= base_url(); ?>members/id/<?= $mbr['id']; ?>"><i class="fas fa-eye"></i></a>
                        </td>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
            <div class="clearfix">
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="modal fade" id="csvimport" tabindex="-1" role="dialog" aria-labelledby="csvimport" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">CSV Import</h5>
                    <button type="button " class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data" class="form-inline">
                        <label>File Csv</label> 
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" name="csv" id="importcsv" aria-describedby="importcsv">
                                    <label class="custom-file-label" for="importcsv">Choose file</label>
                                </div>
                            </div>
                        <button id="save" class="btn btn-primary">Import Csv</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>