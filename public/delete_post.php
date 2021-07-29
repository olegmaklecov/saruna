<?php
require_once('../private/init.php');
include(SHARED_PATH . '/header.php');

if (!isset($_GET['post_id'])) {
    header('Location: ' . WEB_ROOT . '/index.php');
    exit();
}

$id = $_GET['post_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post = Post::findById($id);
    $post->delete();
    header('Location: ' . WEB_ROOT . '/index.php');
    exit();
}
?>

<form id="delete-form" action="<?php echo WEB_ROOT . '/delete_post.php?post_id=' . $id; ?>" method="post">
    <p>Are you sure you want to delete your post?</p>
    <input type="submit" value="Yes">
    <button><a href="<?php echo WEB_ROOT . '/view.php?post_id=' . $id; ?>" id="delete-no">No</a></button>
</form>

<?php include(SHARED_PATH . '/footer.php'); ?>