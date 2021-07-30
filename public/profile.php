<?php
require_once('../private/init.php');

if (!$session->isLoggedIn()) {
    header('Location: ' . WEB_ROOT . '/index.php');
    exit();
}

$posts = Post::findByUserId($session->user_id);

include(SHARED_PATH . '/header.php');
?>

<div>
    <?php foreach ($posts as $post) { ?>
    <div>
        <a href="<?php echo WEB_ROOT . '/view.php?post_id=' . $post->id; ?>" class="post-link"><?php echo $post->title; ?></a><br>
        <span><?php echo $session->username . ' &#8226; ' . $post->date; ?></span>
    </div>
    <?php } ?>
</div>
<div id="profile">
    <h3><?php echo $session->username; ?></h3>
    <form action="#" method="post">
        <label for="password">Password</label><br>
        <input type="password" name="password"><br>
        <label for="confirm_password">Confirm password</label><br>
        <input type="password" name="confirm_password"><br>
        <input type="submit" value="Change password">
    </form>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>