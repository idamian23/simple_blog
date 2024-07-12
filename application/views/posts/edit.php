<div>
    <h3>Edit a post</h3>
    <form action="<?php echo URL; ?>posts/edit/<?= $post->id?>" method="POST">
        <label>Title</label>
        <input type="text" name="title" value="<?= $post->title?>" required/>
        <br>
        <label>Content</label>
        <textarea name="content" cols="40" rows="5" required> <?= $post->content ?> </textarea>
        <input type="submit" name="edit_post" value="Submit"/>
    </form>
</div>

