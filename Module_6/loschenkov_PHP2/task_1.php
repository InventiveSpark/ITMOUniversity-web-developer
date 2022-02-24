<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Самостоятельная работа &#8470;2.1. Переменные. Вывод отформатированного текста</title>
</head>

<style>
    body {
        background-color: #F2F2F2;
    }

    .centered {
        text-align: center;
    }
</style>

<body>
    <?php
    // Объявление переменных:
    // Строки:
    $div_centered = 'Внимание!';
    $span = 'Мы становимся профессиональными Web-программистами. Изучив язык PHP, мы сможем создавать:';
    // Массив из элементов типа string:
    $li = array('гостевые книги,', 'форумы,', 'чаты', 'и управлять целыми портальными системами. Мы сделаем это!');

    // Вывод отформатированного текста:
    // Вывод строк:
    echo '<div class="centered">' . $div_centered . '</div><br>'; // вывод блока div
    echo '<span>' . $span . '</span>'; // вывод строчного элемента span
    // Вывод немаркированного списка:
    echo '<ul>';
    for ($i = 0; $i < count($li); $i++) {
        echo '<li>' . $li[$i] . '</li>';
    }
    echo '</ul>';
    ?>
</body>

</html>