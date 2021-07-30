<?php
require_once('../private/init.php');

if (!$session->isLoggedIn()) {
    header('Location: ' . WEB_ROOT . '/index.php');
    exit();
}

if (!isset($_GET['post_id'])) {
    header('Location: ' . WEB_ROOT . '/index.php');
    exit();
}

$id = $_GET['post_id'];
$post = Post::findById($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post->merge($_POST['post']);
    $post->update();
    header('Location: ' . WEB_ROOT . '/view.php?post_id=' . $id);
    exit();
}

include(SHARED_PATH . '/header.php');
?>

<form action="<?php echo WEB_ROOT . '/edit.php?post_id=' . $id; ?>" method="post" id="post-form">
<?php include(SHARED_PATH . '/form.php'); ?>
</form>

<?php include(SHARED_PATH . '/footer.php'); ?>