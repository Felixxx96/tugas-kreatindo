<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Add Data 
        </div>
        <div class="panel-body">
        
        <?php
        echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</div>');

        if(isset($error_upload)) {
            echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$error_upload.'</div>';
        }
        
            echo form_open_multipart('siswa/add');
        ?>

        <div class="form-group">
            <label>NIS</label>
            <input class="form-control" type="text" name="nis"  placeholder="NIS" required>
        </div>
        <div class="form-group">
            <label>Nama Siswa</label>
            <input class="form-control" type="text" name="nama_siswa"  placeholder="Nama Siswa" required>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Tempat Lahir</label>
                <input class="form-control" type="text" name="tempat_lahir" placeholder="Tempat Lahir" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input class="form-control" type="text" name="tgl_lahir" id="tanggal" placeholder="Tanggal Lahir" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Kelas</label>
                <select name="id_kelas" class="form-control" required>
                    <option value="">--Pilih Kelas--</option>
                    <?php foreach($kelas as $value) { 
                        // Karena kita belum tahu m_kelas pakai object atau array, 
                        // kita ubah paksa jadi array biar aman:
                        $val = (array) $value; 
                    ?>
                    <option value="<?= $val['id_kelas']; ?>"><?= $val['nama_kelas']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Tahun Ajaran</label>
                <select name="id_tahun_akademik" class="form-control" required>
                    <option value="">--Pilih Tahun Ajaran--</option>
                    <?php foreach($tahun_akademik as $value) { 
                        $val = (array) $value;
                    ?>
                    <option value="<?= $val['id_tahun_akademik']; ?>"><?= $val['tahun_akademik']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    
        
        <div class="form-group">
            <label>Foto Siswa</label>
            <input type="file" class="form-control" name="foto_siswa" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-success">Reset</button>
        </div>
        <?php echo form_close(); ?>

        </div>
    </div>
</div>