<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Edit Data 
        </div>
        <div class="panel-body">
        
        <?php
        echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</div>');

        if(isset($error_upload)) {
            echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$error_upload.'</div>';
        }
        
            echo form_open_multipart('siswa/edit/'.$siswa->id_siswa);
        ?>

        <div class="form-group">
            <label>NIS</label>
            <input class="form-control" type="text" name="nis"  placeholder="NIS" value="<?= $siswa->nis ?>" required>
        </div>
        <div class="form-group">
            <label>Nama Siswa</label>
            <input class="form-control" type="text" name="nama_siswa"  placeholder="Nama Siswa" value="<?= $siswa->nama_siswa ?>" required>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Tempat Lahir</label>
                <input class="form-control" type="text" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= $siswa->tempat_lahir ?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input class="form-control" type="text" name="tgl_lahir" id="tanggal" placeholder="Tanggal Lahir" value="<?= $siswa->tgl_lahir ?>" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>kelas</label>
                <select name="id_kelas" class="form-control" required>
                    <option value="">--Pilih kelas--</option>
                    <?php foreach($kelas as $key => $value) { ?>
                    <option value="<?= $value->id_kelas; ?>" <?php if($siswa->id_kelas == $value->id_kelas) { echo 'selected'; } ?>><?= $value->nama_kelas; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Tahun Ajaran</label>
                <select name="id_tahun_akademik" class="form-control" required>
                    <option value="">--Pilih Tahun Ajaran--</option>
                    <?php foreach($tahun_akademik as $key => $value) { ?>
                    <option value="<?= $value->id_tahun_akademik; ?>" <?php if($siswa->id_tahun_akademik == $value->id_tahun_akademik) { echo 'selected'; } ?>><?= $value->tahun_akademik; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    
        
        <div class="form-group">
            <label>Ganti Foto Siswa</label>
            <input type="file" class="form-control" name="foto_siswa">
        </div>

        <div class="form-group">
            <label>Foto Siswa</label>
            <img src="<?= base_url('foto_siswa/'.$siswa->foto_siswa); ?>" width="100px">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-success">Reset</button>
        </div>
        <?php echo form_close(); ?>

        </div>
    </div>
</div>