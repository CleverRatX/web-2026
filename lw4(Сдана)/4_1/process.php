<?php

function isLeapYear(int $year): bool {
    if ($year % 400 === 0) {
        return true;
    }
    if ($year % 100 === 0) {
        return false;
    }
    if ($year % 4 === 0) {
        return true;
    }
    return false;
}

$year = isset($_POST['year']) ? $_POST['year'] : null;

?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Результат</title>
    </head>
    <body>
        <h1>Результат</h1>
        <?php if ($year !== null && $year > 0 && $year <= 30000): ?>
            <p>Год <?= $year ?>: <?= isLeapYear((int) $year) ? 'YES' : 'NO' ?></p>
        <?php else: ?>
            <p>Некорректный ввод</p>
        <?php endif; ?>
        <a href="./index.html">Назад</a>
    </body>
</html>