<?php
require_once('../private/init.php');
include(SHARED_PATH . '/header.php');

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

<div id="content">
    <a href="#" class="controls-link">Edit</a>
    <h1><?php echo $post->title ?></h1>
    <p><?php echo $post->content; ?></p>
</div>
<div id="comment-form">
    <h1>Comment</h1>
    <form action="<?php echo WEB_ROOT . '/view.php?post_id=' . $post->id; ?>" method="post">
        <textarea name="comment[content]" rows="6" cols="80"></textarea><br>
        <input type="submit" value="Submit">
    </form>
</div>
<div id="comments">
    <?php foreach ($comments as $comment) { ?>
    <hr>
    <div>
        <span><?php echo $comment->username . ' &#8226; ' . $comment->date; ?></span>
        <p><?php echo $comment->content; ?></p>
    </div>
    <?php } ?>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>