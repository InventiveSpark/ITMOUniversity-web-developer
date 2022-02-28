<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Самостоятельная работа &#8470;6. Глобальные массивы. Методы get и post</title>
    <style>
        ul {
            list-style: none;
        }
    </style>
</head>

<body>
    <!--Форма с вопросами и элементами для выбора ответов:-->
    <h2>Тест</h2>
    <form action="quiz_results.php" method="post" name="form_quiz" target="_blank">
        <!--Переключатели (radio buttons) обеспечивают возможность выбора одного из вариантов ответа:-->
        <?php
        // Многомерный массив, содержащий вопросы:
        $Questions = [
            array('Кто открыл закон всемирного тяготения?', 'Альберт Эйнштейн', 'Никола Тесла', 'Исаак Ньютон', 'Майкл Фарадей', 'Нильс Бор'),
            array('В&nbsp;какой город и&nbsp;на&nbsp;каком средстве передвижения начал свой путь юный Михаил Ломоносов для того, чтобы поступить в&nbsp;университет?', 'В&nbsp;Париж&nbsp;&mdash; в&nbsp;карете', 'В&nbsp;Вюрцбург&nbsp;&mdash; на&nbsp;воздушном шаре', 'В&nbsp;Москву&nbsp;&mdash; пешком', 'В&nbsp;Санкт-Петербург&nbsp;&mdash; на&nbsp;санях', 'В&nbsp;Катанию&nbsp;&mdash; на&nbsp;корабле'),
            array('Какая из&nbsp;названных картин принадлежит кисти Леонардо да&nbsp;Винчи?', 'Девятый вал', 'Крик', 'Девушка с&nbsp;жемчужной серёжкой', 'Мона Лиза', 'Охотники на&nbsp;снегу')
        ];

        // Функция выводит вопросы и варианты ответов:
        function print_question($item, $key)
        {
            // Количество элементов в подмассиве:
            $length = count($item);
            if ($length < 2 || empty($item[0]) || empty($item[1])) return;
            /* Если в подмассиве больше двух непустых элементов (первый элемент - текст вопроса,
               второй элемент - первый вариант ответа), то выводится текст вопроса и немаркированный
               список возможных ответов на него: */
            echo "\n        <p><b>Вопрос&nbsp;" . ($key + 1) . '. ' . $item[0] . "</b></p>\n        <ul>\n";
            for ($n = 1; $n < $length; $n++)
                echo '            <li><input type="radio" name="question_' . $key . '" value="' . $n . '"' . (($n == 1) ? ' checked>' : '>') . $item[$n] . ".</li>\n";
            echo "        </ul>\n";
        }

        // Установка курсора массива в начало массива перед тем, как вызывать функцию array_walk():
        reset($Questions);
        /* array_walk() применяет пользовательскую функцию print_question() к каждому элементу 
           массива. Начинает работать с того элемента, на котором находится курсор массива: */
        array_walk($Questions, 'print_question');
        ?>
        <!--Кнопка: -->
        <p><input name="submit" type="submit" value="Отправить ответ"></p>
    </form>
</body>

</html>