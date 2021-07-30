<!doctype html>
<html>
<head>
<title>Saruna</title>
<link rel="stylesheet" href="<?php echo WEB_ROOT . '/stylesheets/styles.css'; ?>">
</head>
<body>
<div id="wrapper">
<div id="header">
    <a href="<?php echo WEB_ROOT . '/'; ?>" id="logo">Saruna</a>
    <?php if (!$session->isLoggedIn()) { ?>
    <a href="<?php echo WEB_ROOT . '/login.php'; ?>" class="header-link">Log in</a>
    <a href="<?php echo WEB_ROOT . '/signup.php'; ?>" class="header-link">Sign up</a>
    <?php } else { ?>
    <a href="<?php echo WEB_ROOT . '/profile.php'; ?>" class="header-link">Profile</a>
    <a href="<?php echo WEB_ROOT . '/logout.php'; ?>" class="header-link">Log out</a>
    <?php } ?>
</div>