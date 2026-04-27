<?php

function digitToWord(int $digit): string {
    $words = [
        'Ноль',
        'Один',
        'Два',
        'Три',
        'Четыре',
        'Пять',
        'Шесть',
        'Семь',
        'Восемь',
        'Девять',
    ];
    return $words[$digit];
}

$digit = isset($_POST['digit']) ? $_POST['digit'] : null;

?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Результат</title>
    </head>
    <body>
        <h1>Результат</h1>
        <?php if ($digit !== null && $digit >= 0 && $digit <= 9): ?>
            <p>Цифра <?= $digit ?>: <?= digitToWord((int) $digit) ?></p>
        <?php else: ?>
            <p>Некорректный ввод</p>
        <?php endif; ?>
        <a href="./index.html">Назад</a>
    </body>
</html>