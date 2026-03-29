<?php

$posts = [
    [
        'title' => 'The Road Ahead',
        'subtitle' => 'Subtitle for first post',
        'author' => 'Author123',
        'date' => 1111111111,
    ],
    [
        'title' => 'The Second Post',
        'subtitle' => 'Subtitle for second post',
        'author' => 'CleverRat',
        'date' => 2717189199,
    ],
    [
        'title' => 'The Third Post',
        'subtitle' => 'Subtitle for third post',
        'author' => 'Capybar',
        'date' => 1774372496,
    ],
];

?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Home</title>
    </head>
    <body>
        <div class="posts">
            <?php foreach ($posts as $post): ?>
                <?php include 'post_preview.php'; ?>
            <?php endforeach; ?>
        </div>
    </body>
</html>