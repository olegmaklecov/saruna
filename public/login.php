<?php
require_once('../private/init.php');
include(SHARED_PATH . '/header.php');
?>

<form action="<?php echo WEB_ROOT . '/login.php'; ?>" method="post" id="login-form">
    <label for="username">Username</label><br>
    <input type="text" name="username"><br>
    <label for="password">Password</label><br>
    <input type="password" name="password"><br>
    <input type="submit" value="Log in">
</form>

<?php include(SHARED_PATH . '/footer.php'); ?>