<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Самостоятельная работа &#8470;2.2. Переменные. Условные операторы (if-else, switch)</title>
</head>

<body>
    <?php

    echo '<table><tr><th>$a</th><th>switch-case</th><th>if-else</th></tr>';

    for ($a = 1; $a <= 4; $a++) {
        // Значение переменной $a:
        echo '<tr><td>' . $a . '</td><td>';

        // Заданная конструкция:
        switch ($a) {
            case 1:
            case 2:
                echo 'Hello world';
                break;
            case 3:
                echo 'Hi world';
                break;
            default:
                echo 'Goodbye world';
        }

        echo '</td><td>';

        // Аналогичная конструкция, но с использованием if(...){...}else{...}:
        if ($a == 1 || $a == 2)
            echo 'Hello world';
        elseif ($a == 3)
            echo 'Hi world';
        else
            echo 'Goodbye world';

        echo '</td></tr>';
    }
    echo '</table>';
    ?>
</body>

</html>