<form action="<?php echo WEB_ROOT . '/create.php'; ?>" method="post" id="post-form">
    <label for="topic">Topic</label><br>
    <select name="post[topic]">
        <option value="programming">Programming</option>
        <option value="games">Games</option>
        <option value="food">Food</option>
        <option value="fashion">Fashion</option>
        <option value="news">News</option>
    </select><br>
    <label for="title">Title</label><br>
    <input type="text" name="post[title]"><br>
    <label for="content">Text</label><br>
    <textarea name="post[content]" cols="100", rows="8"></textarea><br>
    <input type="submit" value="Post">
</form>