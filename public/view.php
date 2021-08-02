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
    $comment->username = $session->username;
    $comment->create();
    header('Location: ' . WEB_ROOT . '/view.php?post_id=' . h(u($post->id)));
    exit();
}
?>

<div>
    <?php if ($session->isLoggedIn() && $session->isUser($post->user_id)) { ?>
    <a href="<?php echo WEB_ROOT . '/edit.php?post_id=' . h(u($id)); ?>" class="controls-link">Edit</a>
    <a href="<?php echo WEB_ROOT . '/delete_post.php?post_id=' . h(u($id)); ?>" class="controls-link">Delete</a>
    <?php } ?>
    <h2><?php echo h($post->title); ?></h2>
    <p><?php echo h($post->content); ?></p>
</div>
<h3 id="heading">Comments</h3>
<?php if ($session->isLoggedIn()) { ?>
<div id="comment-form">
    <form action="<?php echo WEB_ROOT . '/view.php?post_id=' . h(u($post->id)); ?>" method="post">
        <textarea name="comment[content]" rows="6" cols="80"></textarea><br>
        <input type="submit" value="Submit">
    </form>
</div>
<?php } ?>
<div id="comments">
    <?php foreach ($comments as $comment) { ?>
    <div>
        <span><?php echo h($comment->username) . ' &#8226; ' . $comment->date; ?></span>
        <?php if ($session->isLoggedIn() && $session->username == $comment->username) { ?>
        <a href="<?php echo WEB_ROOT . '/delete_comment.php?comment_id=' . h(u($comment->id)); ?>">Delete</a>
        <?php } ?>
        <p><?php echo h($comment->content); ?></p>
    </div>
    <?php } ?>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>