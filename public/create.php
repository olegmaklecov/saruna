<?php
require_once('../private/init.php');
include(SHARED_PATH . '/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $args = $_POST['post'];
    $post = new Post($args);
    $post->create();
    header('Location: ' . WEB_ROOT . '/view.php?post_id=' . $post->id);
    exit();
}

include(SHARED_PATH . '/form.php');
include(SHARED_PATH . '/footer.php'); 
?>