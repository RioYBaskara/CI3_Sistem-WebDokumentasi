<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Admin</title>
</head>

<body>
    <h1>Login</h1>
    <?php if ($this->session->flashdata('error')): ?>
        <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>
    <form action="<?php echo site_url('Admin/loginProcess'); ?>" method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" required autocomplete="one-time-code"><br>
        <label>Password:</label><br>
        <input type="password" name="password" required autocomplete="one-time-code"><br><br>
        <button type="submit">Login</button>
    </form>
</body>

</html>