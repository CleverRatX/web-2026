<?php

function parseDate(string $dateString): ?array {
    $day = '';
    $month = '';
    $year = '';
    $part = 0;
    $length = 0;

    for ($i = 0; isset($dateString[$i]); ++$i) {
        ++$length;
    }
    
    for ($i = 0; $i < $length; ++$i) {
        $char = $dateString[$i];
        
        if ($char === '.' || $char === '-') {
            ++$part;
        }
        elseif ($part === 0) {
            $day = $day . $char;
        }
        elseif ($part === 1) {
            $month = $month . $char;
        }
        elseif ($part === 2) {
            $year = $year . $char;
        }
        else {
            return null; // Слишком много точек
        }
    }

    if ($day === '' || $month === '' || $year === '') {
        return null;
    }

    $dayInt = (int) $day;
    $monthInt = (int) $month;
    $yearInt = (int) $year;

    if ($dayInt < 1 || $dayInt > 31) {
        return null;
    }
    if ($monthInt < 1 || $monthInt > 12) {
        return null;
    }
    if ($yearInt < 1 || $yearInt > 30000) {
        return null;
    }
    
    return [
        'day' => $dayInt,
        'month' => $monthInt,
        'year' => $yearInt,
    ];
}

function getZodiacSign(int $day, int $month): string {
    $zodiacDates = [
        ['day' => 20, 'sign' => 'Козерог'],
        ['day' => 19, 'sign' => 'Водолей'],
        ['day' => 20, 'sign' => 'Рыбы'],
        ['day' => 20, 'sign' => 'Овен'],
        ['day' => 20, 'sign' => 'Телец'],
        ['day' => 21, 'sign' => 'Близнецы'],
        ['day' => 22, 'sign' => 'Рак'],
        ['day' => 22, 'sign' => 'Лев'],
        ['day' => 22, 'sign' => 'Дева'],
        ['day' => 22, 'sign' => 'Весы'],
        ['day' => 21, 'sign' => 'Скорпион'],
        ['day' => 21, 'sign' => 'Стрелец'],
        ['day' => 21, 'sign' => 'Козерог'],
    ];

    $signIndex = $month - 1;
    if ($day >= $zodiacDates[$signIndex]['day']) {
        $signIndex = $signIndex + 1;
    }

    return $zodiacDates[$signIndex]['sign'];
}

$dateString = isset($_POST['date']) ? $_POST['date'] : null;
$date = null;
$sign = null;

if ($dateString !== null) {
    $date = parseDate($dateString);
    if ($date !== null) {
        $sign = getZodiacSign($date['day'], $date['month']);
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
        <?php if ($date !== null && $sign !== null): ?>
            <p>Дата: <?= $date['day'] ?>.<?= $date['month'] ?>.<?= $date['year'] ?></p>
            <p>Знак зодиака: <?= $sign ?></p>
        <?php else: ?>
            <p>Некорректный формат даты. Используйте ДД.ММ.ГГГГ</p>
        <?php endif; ?>
        <a href="./index.html">Назад</a>
    </body>
</html>