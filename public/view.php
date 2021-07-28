<?php
require_once('../private/init.php');
include(SHARED_PATH . '/header.php');

$id = $_GET['post_id'];
$post = Post::findById($id);
$comments = Comment::findByPostId($post->id);
?>

<div id="content">
    <a href="#" class="controls-link">Edit</a>
    <h1><?php echo $post->title ?></h1>
    <p><?php echo $post->content; ?></p>
</div>
<div id="comment-form">
    <h1>Comment</h1>
    <form action="#" method="post">
        <textarea name="comment" rows="6" cols="80"></textarea><br>
        <input type="submit" value="Submit">
    </form>
</div>
<div id="comments">
    <?php foreach ($comments as $comment) { ?>
    <div>
        <span><?php echo $comment->username ?></span>
        <span><?php echo $comment->date; ?></span>
        <p><?php echo $comment->content; ?></p>
    </div>
    <?php } ?>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>