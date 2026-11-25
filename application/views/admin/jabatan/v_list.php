<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <button class="btn btn-primary btn-sm"data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add</button>
        </div>
        <div class="panel-body">
        <?php
        if ($this->session->flashdata('pesan')) {
            echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            echo $this->session->flashdata('pesan');
            echo '</div>';
        }
        ?>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jabatan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach($jabatan as $key => $value) { ?>
            <tr>
                <td><?= $value->id_jabatan; ?></td>
                <td><?= $value->nama_jabatan; ?></td>
                <td>
                    <button class="btn btn-xs btn-success"data-toggle="modal" data-target="#edit<?= $value->id_jabatan; ?>"><i class="fa fa-pencil"></i> Edit</button>
                    <a href="<?= base_url('jabatan/delete/' . $value->id_jabatan) ?>" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
            <?php } ?>
            </tbody> 
        </table>
    </div>
</div>

<!-- Modal Add-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add Master Jabatan</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open('jabatan/add') ?>
            <div class="form-group">
            <label>Master Jabatan</label>
            <input class="form-control" type="text" name="nama_jabatan" placeholder="Master Jabatan" required>
            </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!-- Modal Edit-->
<?php foreach($jabatan as $key => $value) { ?>
<div class="modal fade" id="edit<?= $value->id_jabatan; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit Master Jabatan</h4>
            </div>
            <div class="modal-body">
            <?php echo form_open('jabatan/edit/'. $value->id_jabatan) ?>
            <div class="form-group">
            <label>Master Jabatan</label>
            <input class="form-control" type="text" name="nama_jabatan" value="<?= $value->nama_jabatan ?>" placeholder="Master Jabatan" required>
            </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<?php }?>
