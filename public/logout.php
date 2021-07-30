<?php
require_once('../private/init.php');

$session->logout();
header('Location: ' . WEB_ROOT . '/index.php');
exit();
?>