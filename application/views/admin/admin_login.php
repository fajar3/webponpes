<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin_login.css'); ?>">
</head>
<body>
    <h2 class="satu">Login Admin</h2>
    <?php echo validation_errors('<div style="color:red;">', '</div>'); ?>
    <div class="dua">
        <?php echo form_open('admin/login'); ?>

        <label for="username">Username</label>
        <input type="text" name="username" /><br />

        <label for="password">Password</label>
        <input type="password" name="password" /><br />

        <input type="submit" name="submit" value="Login" />

        </form>
    </div>
</body>
</html>
