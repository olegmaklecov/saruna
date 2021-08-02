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
    $result = $post->update();
    if ($result != false) {
        header('Location: ' . WEB_ROOT . '/view.php?post_id=' . h(u($id)));
        exit();
    }
}

include(SHARED_PATH . '/header.php');
?>

<form action="<?php echo WEB_ROOT . '/edit.php?post_id=' . h(u($id)); ?>" method="post" id="post-form">
<?php
echo displayErrors($post->errors);
include(SHARED_PATH . '/form.php');
?>
</form>

<?php include(SHARED_PATH . '/footer.php'); ?>