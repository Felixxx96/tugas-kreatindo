<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Add Foto Gallery
        </div>
        <div class="panel-body">
        
        <?php

        if(isset($error_upload)) {
            echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'.$error_upload.'</div>';
        }

        echo validation_errors('<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>','</div>');

        if ($this->session->flashdata('pesan')) {
            echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            echo $this->session->flashdata('pesan');
            echo '</div>';
        }
        
        echo form_open_multipart('gallery/add_foto/'.$gallery->id_gallery);
        ?>

        <div class="col-sm-6">
        <div class="form-group">
            <label>Keterangan Foto</label>
            <input class="form-control" type="text" name="ket_foto"  placeholder="Keterangan Foto" required>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="form-group">
            <label>Foto Gallery</label>
            <input class="form-control" type="file" name="foto_gallery" required>
        </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-success" onclick="window.location.href='<?= base_url('gallery') ?>'">Kembali</button>
        </div>
        <?php echo form_close(); ?>

        <hr>
        
        <div class="row">
            <?php foreach ($foto as $key => $value) { ?>
                <div class="col-sm-3 text-center" style="margin-bottom: 20px;">
                    <img src="<?= base_url('foto/'.$value->foto) ?>" width="100%" height="200px" style="object-fit: cover;">
                    <br>
                    <label><?= $value->ket_foto ?></label>
                    <a href="<?= base_url('gallery/delete_foto/'.$gallery->id_gallery.'/'.$value->id_foto) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus foto ini?')" class="btn btn-danger btn-xs btn-block"><i class="fa fa-trash"></i> Delete</a>
                </div>
            <?php } ?>
        </div>

    </div>
</div>