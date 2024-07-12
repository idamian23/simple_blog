<h3><?= htmlspecialchars($post->title, ENT_QUOTES, 'UTF-8'); ?></h3>
<p><?= nl2br(htmlspecialchars($post->content, ENT_QUOTES, 'UTF-8')); ?></p>
<a href="<?= URL ?>posts/edit/<?= $post->id?>">Edit post</a>
<a href="<?= URL ?>posts/">Go back...</a>