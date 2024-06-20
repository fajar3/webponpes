<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $nama ?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/cek.css'); ?>">
</head>
<body>
    <div class="card">
        <div class="image-preview">
            <?php if (!empty($data_pendaftar['gambar'])) { ?>
                <img src="<?php echo base_url('assets/gambar/' . $data_pendaftar['gambar']); ?>" class="preview-image">
            <?php } else { ?>
                <img src="<?php echo base_url('assets/gambar/placeholder.png'); ?>" class="preview-image" alt="Preview Image">
            <?php } ?>
        </div>
        
        <div class="info">
            <h2>Data Santri</h2>
            <p><strong>Nama:</strong> <?php echo $nama; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>TTL:</strong> <?php echo $TTL; ?></p>
            <p><strong>Alamat:</strong> <?php echo $alamat; ?></p>
            <p><strong>Nama Wali:</strong> <?php echo $nama_wali; ?></p>
            <p><strong>Pekerjaan:</strong> <?php echo $pekerjaan; ?></p>
            <p><strong>Telepon:</strong> <?php echo $telfn; ?></p>
            <p><strong>Telepon Wali:</strong> <?php echo $telfnw; ?></p>
            <p><strong>Tanggal Pendaftaran:</strong> <?php echo $tanggal_pendaftaran; ?></p>
        </div>
        
        <div class="button-container">
            <a href="<?php echo site_url(); ?>"><button>Kembali ke Halaman Utama</button></a>
        </div>
    </div>
</body>
</html>
