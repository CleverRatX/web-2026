<?php

$postId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$posts = [
    [
        'id' => 1,
        'title' => 'The Road Ahead',
        'subtitle' => 'Subtitle for first post',
        'author' => 'Author123',
        'date' => 1111111111,
    ],
    [
        'id' => 2,
        'title' => 'The Second Post',
        'subtitle' => 'Subtitle for second post',
        'author' => 'CleverRat',
        'date' => 2717189199,
    ],
    [
        'id' => 3,
        'title' => 'The Third Post',
        'subtitle' => 'Subtitle for third post',
        'author' => 'Capybar',
        'date' => 1774372496,
    ],
];

$post = null;
foreach ($posts as $item) {
    if ($item['id'] === $postId) {
        $post = $item;
        break;
    }
}

?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Post</title>
    </head>
    <body>
        <?php if ($post !== null): ?>
            <article>
                <h1><?= $post['title'], ' id=', $post['id'] ?></h1>
                <h2><?= $post['subtitle'] ?></h2>
                <ul>
                    <li>Author: <?= $post['author'] ?></li>
                    <li>Date: <?= date('Y-m-d H:i:s', $post['date']) ?></li>
                </ul>
                <a href="/5_45/home.php">Back to Home</a>
            </article>
        <?php else: ?>
            <p>Post not found</p>
            <a href="/5_45/home.php">Back to Home</a>
        <?php endif; ?>
    </body>
</html>