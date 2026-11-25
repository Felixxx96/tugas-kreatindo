<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a href="<?= base_url('user/add'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add</a>
        </div>
        <div class="panel-body">
            <?php
            // Menampilkan notifikasi pesan sukses
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                echo $this->session->flashdata('pesan');
                echo '</div>';
            }
            ?>

            <form method="get" action="<?= base_url('user'); ?>" class="form-inline" style="margin-bottom: 15px;">
                <div class="form-group">
                    <label for="jabatan" style="margin-right: 8px;">Filter Jabatan:</label>
                    <select name="jabatan" id="jabatan" class="form-control input-sm">
                        <option value="">-- Semua Jabatan --</option>
                        <?php foreach ($jabatan as $j) {
                            $val = (array) $j;
                        ?>
                            <option value="<?= $val['id_jabatan']; ?>" <?= ($selected_jabatan == $val['id_jabatan']) ? 'selected' : ''; ?>>
                                <?= $val['nama_jabatan']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-filter"></i> Filter</button>
                <?php if (!empty($selected_jabatan)) { ?>
                    <a href="<?= base_url('user'); ?>" class="btn btn-default btn-sm">Reset</a>
                <?php } ?>
            </form>
            
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Jabatan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($user as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value->nama_user; ?></td>
                            <td><?= $value->username; ?></td>
                            <td><?= $value->password; ?></td>
                            <td><?= $value->nama_role; ?></td>
                            <td><?= $value->nama_jabatan; ?></td>
                            <td>
                                <a href="<?= base_url('user/edit/' . $value->id_user); ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="<?= base_url('user/delete/' . $value->id_user); ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>