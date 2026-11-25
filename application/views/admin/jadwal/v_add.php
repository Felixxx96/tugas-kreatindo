<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Form Tambah Jadwal Pelajaran
        </div>
        <div class="panel-body">
            <?php
            if (validation_errors()) {
                echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                    . validation_errors() .
                    '</div>';
                echo '<script>alert("' . strip_tags(validation_errors()) . '");</script>';
            }
            echo form_open('jadwal/add');
            ?>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Hari</label>
                        <select name="hari" class="form-control" required>
                            <option value="">-- Pilih Hari --</option>
                            <?php
                            $daftar_hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                            foreach ($daftar_hari as $h) { ?>
                                <option value="<?= $h; ?>" <?= set_select('hari', $h); ?>><?= $h; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jam Pelajaran</label>
                        <input type="text" name="jam" value="<?= set_value('jam'); ?>" class="form-control" placeholder="Contoh: 07.00 - 08.30" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="id_kelas" class="form-control" required>
                            <option value="">-- Pilih Kelas --</option>
                            <?php foreach ($kelas as $k) { $k = (array) $k; ?>
                                <option value="<?= $k['id_kelas']; ?>" <?= set_select('id_kelas', $k['id_kelas']); ?>><?= $k['nama_kelas']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tahun Akademik</label>
                        <select name="id_tahun_akademik" class="form-control" required>
                            <option value="">-- Pilih Tahun Akademik --</option>
                            <?php foreach ($tahun_akademik as $ta) { $ta = (array) $ta; ?>
                                <option value="<?= $ta['id_tahun_akademik']; ?>" <?= set_select('id_tahun_akademik', $ta['id_tahun_akademik']); ?>><?= $ta['tahun_akademik']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mata Pelajaran</label>
                        <select name="id_mapel" class="form-control" required>
                            <option value="">-- Pilih Mata Pelajaran --</option>
                            <?php foreach ($mapel as $m) { $m = (array) $m; ?>
                                <option value="<?= $m['id_mapel']; ?>" <?= set_select('id_mapel', $m['id_mapel']); ?>><?= $m['nama_mapel']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Guru Pengajar</label>
                        <select name="id_guru" class="form-control" required>
                            <option value="">-- Pilih Guru --</option>
                            <?php foreach ($guru as $g) { $g = (array) $g; ?>
                                <option value="<?= $g['id_guru']; ?>" <?= set_select('id_guru', $g['id_guru']); ?>><?= $g['nama_guru']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <a href="<?= base_url('jadwal'); ?>" class="btn btn-default btn-sm">Kembali</a>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>