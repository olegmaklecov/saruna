<?php
require_once('../private/init.php');
include(SHARED_PATH . '/header.php');

if (!isset($_GET['post_id'])) {
    header('Location: ' . WEB_ROOT . '/index.php');
    exit();
}

$id = $_GET['post_id'];
$post = Post::findById($id);
$comments = Comment::findByPostId($post->id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $args = $_POST['comment'];
    $comment = new Comment($args);
    $comment->post_id = $post->id;
    $comment->create();
    header('Location: ' . WEB_ROOT . '/view.php?post_id=' . $post->id);
    exit();
}
?>

<div>
    <a href="<?php echo WEB_ROOT . '/edit.php?post_id=' . $id; ?>" class="controls-link">Edit</a>
    <a href="<?php echo WEB_ROOT . '/delete_post.php?post_id=' . $id; ?>" class="controls-link">Delete</a>
    <h2><?php echo $post->title ?></h2>
    <p><?php echo $post->content; ?></p>
</div>
<div id="comment-form">
    <h3>Comments</h3>
    <form action="<?php echo WEB_ROOT . '/view.php?post_id=' . $post->id; ?>" method="post">
        <textarea name="comment[content]" rows="6" cols="80"></textarea><br>
        <input type="submit" value="Submit">
    </form>
</div>
<div id="comments">
    <?php foreach ($comments as $comment) { ?>
    <div>
        <span><?php echo $comment->username . ' &#8226; ' . $comment->date; ?></span>
        <a href="<?php echo WEB_ROOT . '/delete_comment.php?comment_id=' . $comment->id; ?>">Delete</a>
        <p><?php echo $comment->content; ?></p>
    </div>
    <?php } ?>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>