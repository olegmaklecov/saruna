<?php
require_once('../private/init.php');

if (!$session->isLoggedIn()) {
    header('Location: ' . WEB_ROOT . '/index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post = new Post($_POST['post']);
    $post->user_id = $session->user_id;
    $result = $post->create();
    if ($result === true) {
        header('Location: ' . WEB_ROOT . '/view.php?post_id=' . h(u($post->id)));
        exit();
    }
} else {
    $post = new Post;
}

include(SHARED_PATH . '/header.php');
?>

<form action="<?php echo WEB_ROOT . '/create.php'; ?>" method="post" id="post-form">
<?php
echo displayErrors($post->errors);
include(SHARED_PATH . '/form.php');
?>
</form>

<?php include(SHARED_PATH . '/footer.php');  ?>