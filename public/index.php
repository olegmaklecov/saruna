<?php
require_once('../private/init.php');
include(SHARED_PATH . '/header.php');
?>

<div id="controls">
    <form action="<?php echo WEB_ROOT . '/index.php'; ?>" method="post">
        <label for="sort">Sort by:</label>
        <select name="sort">
            <option value="best">Best</option>
            <option value="recent">Recent</option>
        </select>
        <input type="submit" value="Apply">
    </form>
</div>
<div id="articles">
    <div class="article-link">
        <a href="<?php echo WEB_ROOT . '/view.php'; ?>">Lorem, ipsum.</a><br>
        <span>200 comments | by User | 25/07/2021</span>
    </div>
    <div class="article-link">
        <a href="<?php echo WEB_ROOT . '/view.php'; ?>">Lorem ipsum dolor sit.</a><br>
        <span>56 comments | by AnotherUser | 25/07/2021</span>
    </div>
    <div class="article-link">
        <a href="<?php echo WEB_ROOT . '/view.php'; ?>">Lorem, ipsum.</a><br>
        <span>200 comments | by User | 25/07/2021</span>
    </div>
    <div class="article-link">
        <a href="<?php echo WEB_ROOT . '/view.php'; ?>">Lorem ipsum dolor sit.</a><br>
        <span>56 comments | by AnotherUser | 25/07/2021</span>
    </div>
</div>
<div id="topics">
    <a href="<?php echo WEB_ROOT . '/create.php'; ?>" id="create-link">Create post</a>
    <a href="<?php echo WEB_ROOT . '/index.php'; ?>">All</a>
    <a href="<?php echo WEB_ROOT . '/index.php'; ?>">Programming</a>
    <a href="<?php echo WEB_ROOT . '/index.php'; ?>">Games</a>
    <a href="<?php echo WEB_ROOT . '/index.php'; ?>">Food</a>
    <a href="<?php echo WEB_ROOT . '/index.php'; ?>">Fashion</a>
    <a href="<?php echo WEB_ROOT . '/index.php'; ?>">News</a>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>