<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Pendaftar</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/edit_data.css'); ?>">
</head>
<body>
    <h2>Edit Data Pendaftar</h2>
    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('admin/update'); ?>

    <div class="card">
        <div class="image-upload">
            <label for="gambar" class="custom-file-upload">
                <?php if (!empty($data_pendaftar['gambar'])) { ?>
                    <img src="<?php echo base_url('assets/gambar/' . $data_pendaftar['gambar']); ?>" class="preview-image">
                <?php } else { ?>
                    <img src="<?php echo base_url('assets/gambar/placeholder.png'); ?>" class="preview-image" alt="Preview Image">
                <?php } ?>
                <span>Ganti Gambar</span>
            </label>
            <input type="file" name="gambar" id="gambar" style="display:none;"><br>
        </div>

        <input type="hidden" name="kode_unik" value="<?php echo $data_pendaftar['kode_unik']; ?>" />

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="<?php echo $data_pendaftar['nama']; ?>" />
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $data_pendaftar['email']; ?>" />
        </div>

        <div class="form-group">
            <label for="TTL">Tanggal Lahir</label>
            <input type="date" id="TTL" name="TTL" value="<?php echo $data_pendaftar['TTL']; ?>" />
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" name="alamat" value="<?php echo $data_pendaftar['alamat']; ?>" />
        </div>

        <div class="form-group">
            <label for="nama_wali">Nama Wali</label>
            <input type="text" id="nama_wali" name="nama_wali" value="<?php echo $data_pendaftar['nama_wali']; ?>" />
        </div>

        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" id="pekerjaan" name="pekerjaan" value="<?php echo $data_pendaftar['pekerjaan']; ?>" />
        </div>

        <div class="form-group">
            <label for="telfn">Telepon</label>
            <input type="text" id="telfn" name="telfn" value="<?php echo $data_pendaftar['telfn']; ?>" />
        </div>

        <div class="form-group">
            <label for="telfnw">Telepon Wali</label>
            <input type="text" id="telfnw" name="telfnw" value="<?php echo $data_pendaftar['telfnw']; ?>" />
        </div>

        <input type="submit" name="submit" value="Selesai" class="btn-submit" />
    </div>

    <?php echo form_close(); ?>
</body>
</html>
