<?php
require_once('../private/init.php');

if (!isset($_GET['comment_id'])) {
    header('Location: ' . WEB_ROOT . '/index.php');
    exit();
}

$id = $_GET['comment_id'];
$comment = Comment::findById($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment->delete();
    header('Location: ' . WEB_ROOT . '/view.php?post_id=' . $comment->post_id);
    exit();
}

include(SHARED_PATH . '/header.php');
?>

<form id="delete-form" action="<?php echo WEB_ROOT . '/delete_comment.php?comment_id=' . $id; ?>" method="post">
    <p>Are you sure you want to delete your comment?</p>
    <input type="submit" value="Yes">
    <button><a href="<?php echo WEB_ROOT . '/view.php?post_id=' . $comment->post_id; ?>" id="delete-no">No</a></button>
</form>

<?php include(SHARED_PATH . '/footer.php'); ?>