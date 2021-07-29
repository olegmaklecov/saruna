<?php
require_once('../private/init.php');
include(SHARED_PATH . '/header.php');

$posts = Post::findAll();
?>

<div>
    <a href="<?php echo WEB_ROOT . '/create.php'; ?>" id="create-link">Create post</a><br>
    <?php foreach ($posts as $post) {
        $user = User::findById($post->user_id);    
    ?>
    <div class="post">
        <a href="<?php echo WEB_ROOT . '/view.php?post_id=' . $post->id; ?>" class="post-link"><?php echo $post->title ?></a><br>
        <span><?php echo $user->username . ' &#8226; ' . $post->date; ?></span>
    </div>
    <?php } ?>
</div>
<div id="sidebar">
    <a href="#" class="sidebar-link">All</a>
    <a href="#" class="sidebar-link">Programming</a>
    <a href="#" class="sidebar-link">Games</a>
    <a href="#" class="sidebar-link">Food</a>
    <a href="#" class="sidebar-link">Fashion</a>
    <a href="#" class="sidebar-link">News</a>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>