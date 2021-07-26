<?php
require_once('../private/init.php');
include(SHARED_PATH . '/header.php');
?>

<div id="article">
    <h1>Lorem, ipsum dolor</h1>
    <p>
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga, voluptates laudantium. Enim rem officia possimus, eius iusto eveniet incidunt voluptatum dolor porro modi, illum repudiandae perspiciatis fugit consequuntur eum obcaecati odit dolore quidem nisi id ea ut, mollitia hic. Iusto?
    </p>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos temporibus corporis alias ad culpa quia ipsa non adipisci ex facere eveniet deserunt voluptatum laborum, eos expedita mollitia iusto? Amet, natus.
    </p>
    <a href="<?php echo WEB_ROOT . '/edit.php'; ?>">Edit</a>
</div>
<div id="comment-post">
    <h1>Comment</h1>
    <form action="<?php echo WEB_ROOT . '/view.php'; ?>" method="post">
        <textarea name="comment" rows="6" cols="80"></textarea><br>
        <input type="submit" value="Submit">
    </form>
</div>
<div id="comments">
    <div class="comment">
        UserName | 26/07/2021
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, nesciunt.
        </p>
    </div>
    <div class="comment">
        AnotherUser | 26/07/2021
        <a href="<?php echo WEB_ROOT . '/delete.php'; ?>">Delete</a>
        <p>
            Lorem ipsum dolor sit.
        </p>
    </div>
    <div class="comment">
        Unknown | 26/07/2021
        <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Asperiores nemo incidunt iure corporis, dignissimos voluptatum tempora recusandae velit non molestias!
        </p>
    </div>
    <div class="comment">
        hWhat | 26/07/2021
        <p>
            Lorem ipsum dolor sit amet consectetur.
        </p>
    </div>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>