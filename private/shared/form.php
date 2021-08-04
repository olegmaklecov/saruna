<label for="category">Topic</label><br>
<select name="post[category]">
    <option value="programming" <?php echo ($post->category == 'programming') ? ' selected' : ''; ?>>Programming</option>
    <option value="games" <?php echo ($post->category == 'games') ? ' selected' : ''; ?>>Games</option>
    <option value="food" <?php echo ($post->category == 'food') ? ' selected' : ''; ?>>Food</option>
    <option value="fashion" <?php echo ($post->category == 'fashion') ? ' selected' : ''; ?>>Fashion</option>
    <option value="news" <?php echo ($post->category == 'news') ? ' selected' : ''; ?>>News</option>
</select><br>
<label for="title">Title</label><br>
<input type="text" name="post[title]" value="<?php echo h($post->title) ?? ''; ?>"><br>
<label for="content">Text</label><br>
<textarea name="post[content]" cols="100", rows="8"><?php echo h($post->content) ?? ''; ?></textarea><br>
<input type="submit" value="Submit">