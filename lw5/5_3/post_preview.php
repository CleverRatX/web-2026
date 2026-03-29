<div class="post-preview">
    <h3><?= $post['title'] ?></h3>
    <h4><?= $post['subtitle'] ?></h4>
    <span><?= $post['author'] ?></span>
    <span><?= date('Y-m-d H:i:s', $post['date']) ?></span>
    <a title="<?= $post['title'] ?>" href="./post.php?id=<?= $post['id'] ?>">
        <?= $post['subtitle'] ?>
    </a>
</div>