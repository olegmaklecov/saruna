<?php
require_once('../private/init.php');
include(SHARED_PATH . '/header.php');
?>

<div>
    <div>
        <a href="#" class="post-link">Lorem, ipsum.</a><br>
        <span>Username</span>
        <span>26/07/2021</span>
    </div>
    <div>
        <a href="#" class="post-link">Lorem, ipsum.</a><br>
        <span>Username</span>
        <span>26/07/2021</span>
    </div>
</div>
<div id="profile">
    <h3>Username</h3>
    <form action="#" method="post">
        <label for="password">Password</label><br>
        <input type="password" name="password"><br>
        <label for="confirm_password">Confirm password</label><br>
        <input type="password" name="confirm_password"><br>
        <input type="submit" value="Change password">
    </form>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>