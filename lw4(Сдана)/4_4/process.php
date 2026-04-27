<?php

function getArrayLength(array $array): int {
    $length = 0;
    for ($i = 0; isset($array[$i]); ++$i) {
        ++$length;
    }
    
    return $length;
}

function getDigitSum(int $number): int {
    $sum = 0;
    while ($number > 0) {
        $sum = $sum + ($number % 10);
        $number = (int) ($number / 10);
    }
    return $sum;
}

function isLuckyTicket(int $ticketNumber): bool {
    $firstPart = (int) ($ticketNumber / 1000);
    $secondPart = $ticketNumber % 1000;
    return getDigitSum($firstPart) === getDigitSum($secondPart);
}

function findLuckyTickets(int $startNumber, int $endNumber): array {
    $luckyTickets = [];
    for ($i = $startNumber; $i <= $endNumber; ++$i) {
        if (isLuckyTicket($i)) {
            $luckyTickets[] = $i;
        }
    }
    return $luckyTickets;
}

$startNumber = isset($_POST['startNumber']) ? $_POST['startNumber'] : null;
$endNumber = isset($_POST['endNumber']) ? $_POST['endNumber'] : null;
$luckyTickets = [];

if ($startNumber !== null && $endNumber !== null) {
    $start = (int) $startNumber;
    $end = (int) $endNumber;
    if ($start >= 100000 && $end <= 999999 && $start <= $end) {
        $luckyTickets = findLuckyTickets($start, $end);
    }
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
        <?php if (getArrayLength($luckyTickets) !== 0): ?>
            <ul>
                <?php foreach ($luckyTickets as $ticket): ?>
                    <li><?= $ticket ?></li>
                <?php endforeach; ?>
            </ul>
        <?php elseif ($startNumber !== null): ?>
            <p>В заданном диапазоне счастливых билетов нет</p>
        <?php else: ?>
            <p>Введите корректный диапазон</p>
        <?php endif; ?>
        <a href="./index.html">Назад</a>
    </body>
</html>