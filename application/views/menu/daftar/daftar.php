<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="assets/css/daftar.css">

</head>
<body>
    <div class="satu"> Miftahul<span>Huda III</span></div>
    <br>
    <div class="dua">
    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('daftar/submit'); ?>
        Nama Lengkap: <input required type="text" name="nama"><br>
        Email: <input required type="email" name="email"><br>
        TTL: <input required type="date" name="TTL"><br>
        Alamat: <input required type="text" name="alamat"><br>
        Nama Wali: <input required type="text" name="nama_wali"><br>
        Pekerjaan: <input required type="text" name="pekerjaan"><br>
        No.tlfn: <input required type="number" name="telfn"><br>
        No.telfn wali: <input required type="number" name="telfnw"><br>
        Tanggal pendaftaran: <input required type="date" name="tanggal_pendaftaran"><br>
        Upload Foto 3x4: <input type="file" name="gambar"><br>
        <input type="submit" value="Login">
    </div>
    </form>
</body>
</html>