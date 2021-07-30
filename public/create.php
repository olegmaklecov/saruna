<?php
require_once('../private/init.php');

if (!$session->isLoggedIn()) {
    header('Location: ' . WEB_ROOT . '/index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $args = $_POST['post'];
    $post = new Post($args);
    $post->user_id = $session->user_id;
    $post->create();
    header('Location: ' . WEB_ROOT . '/view.php?post_id=' . $post->id);
    exit();
}

include(SHARED_PATH . '/header.php');
?>

<form action="<?php echo WEB_ROOT . '/create.php'; ?>" method="post" id="post-form">
<?php include(SHARED_PATH . '/form.php'); ?>
</form>

<?php include(SHARED_PATH . '/footer.php');  ?>