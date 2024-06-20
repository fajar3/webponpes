<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Berhasil</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/success.css'); ?>">
</head>
<body>
    <div class="container">
        <h2>Pendaftaran Berhasil</h2>
        <p>Terima kasih telah mendaftar. Berikut adalah Nomor Induk Santri:</p>
        <h3><?php echo $kode_unik; ?></h3>
        <br>
        <a href="<?php echo site_url(); ?>"><button>Kembali ke Halaman Utama</button></a>
    </div>
</body>
</html>
