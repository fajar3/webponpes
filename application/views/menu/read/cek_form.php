<!DOCTYPE html>
<html>
<head>
    <title>Miftahul Huda 3</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/cek_form.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/daftar.css'); ?>">
</head>
<body>
    <div class="satu"> Miftahul<span>Huda III</span></div>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <?php echo validation_errors(); ?>
    <?php echo form_open('cek/submit'); ?>

    <label for="kode_unik">Masukkan Nomor Induk Santri</label>
    <input type="text" name="kode_unik" /><br />

    <input type="submit" name="submit" value="Cek Data" />

    </form>
</body>
</html>
