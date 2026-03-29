<?php

function factorial(int $number): int {
    if ($number === 0 || $number === 1) {
        return 1;
    }
    return $number * factorial($number - 1);
}

$number = isset($_POST['number']) ? $_POST['number'] : null;
$result = null;

if ($number !== null && $number >= 0) {
    $result = factorial((int) $number);
}

?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Результат</title>
    </head>
    <body>
        <h1>Результат</h1>
        <?php if ($result !== null): ?>
            <p>Факториал числа <?= $number ?>: <?= $result ?></p>
        <?php else: ?>
            <p>Введите положительное число</p>
        <?php endif; ?>
        <a href="./index.html">Назад</a>
    </body>
</html>