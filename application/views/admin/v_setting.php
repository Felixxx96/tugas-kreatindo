<?php
echo form_open_multipart('admin/setting');

if ($this->session->flashdata('pesan')) {
    echo '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
    echo $this->session->flashdata('pesan');
    echo '</div>';
}
?>
<div class="col-sm-4">
    <label for="">Kepala Sekolah</label><br>
    <img src="<?= base_url('foto_kepsek/' . $setting->foto_kepsek) ?>" width="150px" height="200px">
    <br>

    <div class="form-group">
    <br>
        <label>Ganti Foto</label>
        <input type="file" name="foto_kepsek" class="form-control" type="text">
    </div>
</div>

<div class="col-sm-8">
    <div class="form-group">
        <label>Nama Sekolah</label>
        <input type="text" name="nama_sekolah" class="form-control" value="<?=$setting->nama_sekolah?>" type="text">
    </div>

    <div class="form-group">
        <label>Alamat Sekolah</label>
        <input type="text" name="alamat" class="form-control" value="<?=$setting->alamat?>" type="text">
    </div>

    <div class="form-group">
        <label>No Telepon</label>
        <input type="text" name="no_telpon" class="form-control" value="<?=$setting->no_telpon?>" type="text">
    </div>

    <div class="form-group">
        <label>Kepala Sekolah</label>
        <input type="text" name="kepala_sekolah" class="form-control" value="<?=$setting->kepala_sekolah?>" type="text">
    </div>

    <div class="form-group">
        <label>NIP</label>
        <input type="text" name="nip" class="form-control" value="<?=$setting->nip?>" type="text">
    </div>
</div>

<div class="col-sm-12">
    <div class="form-group">
        <label>Visi</label>
        <textarea name="visi" class="form-control" id="" rows="5"><?=$setting->visi?></textarea>
    </div>

    <div class="form-group">
        <label>Misi</label>
        <textarea name="misi" class="form-control" id="" rows="5"><?=$setting->misi?></textarea>
    </div>

    <div class="form-group">
        <label>Sejarah</label>
        <textarea name="sejarah" class="form-control" id="" rows="5"><?=$setting->sejarah?></textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success btn-sm">Update</button>
    </div>
</div>

<?php
echo form_close();
?>