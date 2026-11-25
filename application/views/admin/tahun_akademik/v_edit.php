<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Form Edit Tahun Akademik
        </div>
        <div class="panel-body">
            <?php
            echo validation_errors('<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');
            echo form_open('tahun_akademik/edit/' . $tahun_akademik['id_tahun_akademik']);
            ?>

            <div class="form-group">
                <label>Tahun Akademik</label>
                <input type="text" name="tahun_akademik" value="<?= $tahun_akademik['tahun_akademik']; ?>" class="form-control" placeholder="Contoh: 2026/2027" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <a href="<?= base_url('tahun_akademik'); ?>" class="btn btn-default btn-sm">Kembali</a>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>