<div>
    <h3>Add a post</h3>
    <form action="<?php echo URL; ?>posts/create/" method="POST">
        <label>Title</label>
        <input type="text" name="title" value="" required/>
        <br>
        <label>Content</label>
        <textarea name="content" cols="40" rows="5" required> </textarea>
        <input type="hidden" name="author_id" value="1"/>
        <input type="submit" name="create_post" value="Submit"/>
    </form>
</div>



