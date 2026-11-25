<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a href="<?= base_url('jadwal/add'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add</a>
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
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Kelas</th>
                        <th>Tahun Akademik</th>
                        <th>Mata Pelajaran</th>
                        <th>Guru</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($jadwal as $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['hari']; ?></td>
                            <td><?= $value['jam']; ?></td>
                            <td><?= $value['nama_kelas']; ?></td>
                            <td><?= $value['tahun_akademik']; ?></td>
                            <td><?= $value['nama_mapel']; ?></td>
                            <td><?= $value['nama_guru']; ?></td>
                            <td>
                                <a href="<?= base_url('jadwal/edit/' . $value['id_jadwal']); ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="<?= base_url('jadwal/delete/' . $value['id_jadwal']); ?>" onclick="return confirm('Yakin ingin menghapus jadwal ini?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>