<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Add Data User
        </div>
        <div class="panel-body">
            
            <?php
            // Menampilkan pesan error validasi jika ada yang kosong
            echo validation_errors('<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</div>');

            // Form open
            echo form_open('user/add');
            ?>

            <div class="form-group">
                <label>Nama User</label>
                <input class="form-control" type="text" name="nama_user" placeholder="Nama Lengkap" required>
            </div>
            
            <div class="form-group">
                <label>Username</label>
                <input class="form-control" type="text" name="username" placeholder="Username Login" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input class="form-control" type="text" name="password" placeholder="Password Login" required>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Role Hak Akses</label>
                    <select name="id_role" class="form-control" required>
                        <option value="">--Pilih Role--</option>
                        <?php foreach($role as $value) { 
                            $val = (array) $value; 
                        ?>
                        <option value="<?= $val['id_role']; ?>"><?= $val['nama_role']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Jabatan Pegawai</label>
                    <select name="id_jabatan" class="form-control" required>
                        <option value="">--Pilih Jabatan--</option>
                        <?php foreach($jabatan as $value) { 
                            $val = (array) $value;
                        ?>
                        <option value="<?= $val['id_jabatan']; ?>"><?= $val['nama_jabatan']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group" style="clear: both; padding-top: 15px;">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-success">Reset</button>
            </div>
            
            <?php echo form_close(); ?>

        </div>
    </div>
</div>