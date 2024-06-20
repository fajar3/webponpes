<!-- application/views/register.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <?php echo validation_errors('<div style="color:red;">', '</div>'); ?>
    <?php echo form_open('admin/register'); ?>

    <label for="username">Username</label>
    <input type="text" name="username" /><br />

    <label for="password">Password</label>
    <input type="password" name="password" /><br />

    <label for="confirm_password">Confirm Password</label>
    <input type="password" name="confirm_password" /><br />

    <input type="submit" name="submit" value="Register" />

    </form>
</body>
</html>
