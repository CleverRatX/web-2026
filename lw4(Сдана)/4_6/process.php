<?php

function getStringLength(string $str): int {
    $length = 0;
    for ($i = 0; isset($str[$i]); ++$i) {
        ++$length;
    }
    
    return $length;
}

function getArrayLength(array $array): int {
    $length = 0;
    for ($i = 0; isset($array[$i]); ++$i) {
        ++$length;
    }
    
    return $length;
}

function splitBySpace(string $string): array {
    $result = [];
    $currentItem = '';
    $stringLength = getStringLength($string);
    $index = 0;

    for ($i = 0; $i < $stringLength; ++$i) {
        if ($string[$i] === ' ') {
            if ($currentItem !== '') {
                $result[$index] = $currentItem;
                ++$index;
                $currentItem = '';
            }
        }
        else {
            $currentItem = $currentItem . $string[$i];
        }
    }

    if ($currentItem !== '') {
        $result[$index] = $currentItem;
    }

    return $result;
}

function evaluateRPN(string $expression): ?int {
    $items = splitBySpace($expression);
    $queue = [];

    foreach ($items as $item) {
        if ($item === '+' || $item === '-' || $item === '*') {
            if (getArrayLength($queue) < 2) {
                return null;
            }
            $b = array_pop($queue);
            $a = array_pop($queue);
            $result = 0;
            if ($item === '+') {
                $result = $a + $b;
            }
            elseif ($item === '-') {
                $result = $a - $b;
            }
            elseif ($item === '*') {
                $result = $a * $b;
            }
            $queue[] = $result;
        }
        else {
            $queue[] = (int) $item;
        }
    }

    if (getArrayLength($queue) === 1) {
        return $queue[0];
    }
    
    return null;
}

$expression = isset($_POST['expression']) ? $_POST['expression'] : null;
$result = null;

if ($expression !== null) {
    $result = evaluateRPN($expression);
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
            <p>Выражение: <?= $expression ?></p>
            <p>Результат: <?= $result ?></p>
        <?php else: ?>
            <p>Некорректное выражение</p>
        <?php endif; ?>
        <a href="./index.html">Назад</a>
    </body>
</html>