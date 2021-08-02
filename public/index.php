<?php
require_once('../private/init.php');
include(SHARED_PATH . '/header.php');

if (!isset($_GET['category'])) {
    $posts = Post::findAll();
} else {
    $posts = Post::findByCategory($_GET['category']);
}


?>

<div>
    <?php if ($session->isLoggedIn()) { ?>
    <a href="<?php echo WEB_ROOT . '/create.php'; ?>" id="create-link">Create post</a><br>
    <?php } ?>
    <?php foreach ($posts as $post) {
        $user = User::findById($post->user_id);    
    ?>
    <div class="post">
        <a href="<?php echo WEB_ROOT . '/view.php?post_id=' . h(u($post->id)); ?>" class="post-link"><?php echo h($post->title) ?></a><br>
        <span><?php echo h($user->username) . ' &#8226; ' . h(u($post->date)); ?></span>
    </div>
    <?php } ?>
</div>
<div id="sidebar">
    <a href="<?php echo WEB_ROOT . '/index.php'; ?>" class="sidebar-link">All</a>
    <a href="<?php echo WEB_ROOT . '/index.php?category=programming'; ?>" class="sidebar-link">Programming</a>
    <a href="<?php echo WEB_ROOT . '/index.php?category=games'; ?>" class="sidebar-link">Games</a>
    <a href="<?php echo WEB_ROOT . '/index.php?category=food'; ?>" class="sidebar-link">Food</a>
    <a href="<?php echo WEB_ROOT . '/index.php?category=fashion'; ?>" class="sidebar-link">Fashion</a>
    <a href="<?php echo WEB_ROOT . '/index.php?category=news'; ?>" class="sidebar-link">News</a>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>