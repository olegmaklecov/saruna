<?php
require_once('../private/init.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = new User($_POST['user']);
    $user->setHashedPwd();
    $result = $user->create();
    if ($result === true) {
        $session->login($user);
        header('Location: ' . WEB_ROOT . '/profile.php');
        exit();
    }
} else {
    $user = new User;
}

include(SHARED_PATH . '/header.php');
echo displayErrors($user->errors);
?>

<form action="" method="post" id="auth-form">
    <label for="username">Username</label><br>
    <input type="text" name="user[username]" value="<?php echo h($user->username); ?>"><br>
    <label for="password">Password</label><br>
    <input type="password" name="user[unhashed_pwd]"><br>
    <label for="cofirm_password">Confirm password</label><br>
    <input type="password" name="user[confirm_pwd]"><br>
    <input type="submit" value="Sign up">
</form>

<?php include(SHARED_PATH . '/footer.php'); ?>