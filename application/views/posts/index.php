<?php foreach ($posts as $post): ?>
    <h3><a href="<?php echo URL; ?>posts/show/<?= $post->id ?>"><?= htmlspecialchars($post->title, ENT_QUOTES, 'UTF-8'); ?></a></h3>
    <p><?= nl2br(htmlspecialchars($post->content, ENT_QUOTES, 'UTF-8')); ?></p>
    <a href="<?= URL ?>posts/destroy/<?= $post->id ?>">Delete post</a>
    <br>
    <p>by <?= $post->author_name ?> on <?= $post->created_at ?></p>
<?php endforeach; ?>

<a href="<?= URL; ?>posts/create/">Create new post...</a>
