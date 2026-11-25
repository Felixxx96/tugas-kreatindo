<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a href="<?= base_url('tahun_akademik/add'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add</a>
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
                        <th width="50px">No</th>
                        <th>Tahun Akademik</th>
                        <th width="150px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($tahun_akademik as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['tahun_akademik']; ?></td>
                            <td>
                                <a href="<?= base_url('tahun_akademik/edit/' . $value['id_tahun_akademik']); ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="<?= base_url('tahun_akademik/delete/' . $value['id_tahun_akademik']); ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>