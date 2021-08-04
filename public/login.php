<?php
require_once('../private/init.php');

$errors = [];
$username = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = User::findByUsername($username);
    if ($user != false && $user->verifyPwd($password)) {
        $session->login($user);
        header('Location: ' . WEB_ROOT . '/profile.php');
        exit();
    } else {
        $errors[] = 'Incorrect username or password.';
    }
}

include(SHARED_PATH . '/header.php');
echo displayErrors($errors);
?>

<form action="<?php echo WEB_ROOT . '/login.php'; ?>" method="post" id="auth-form">
    <label for="username">Username</label><br>
    <input type="text" name="username" value="<?php echo h($username); ?>"><br>
    <label for="password">Password</label><br>
    <input type="password" name="password"><br>
    <input type="submit" value="Log in">
</form>

<?php include(SHARED_PATH . '/footer.php'); ?>