<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Самостоятельная работа &#8470;4.1. Массивы. Строки. Циклы</title>
</head>

<body>
    <?php
    /* Программа трансформирует первое предложение во второе, используя
       функцию explode() и массивы, а затем выводит результат:
       A. Теперь пора всем хорошим людям прийти на помощь стране;
       Б. Пора теперь стране прийти на помощь всем хорошим людям. */

    // Объявление констант:
    // Кодировка символов:
    define('encoding', 'utf-8');
    /* Разделитель (пробел) делит строку на поля (слова), которые затем
       станут элементами массива: */
    define('separator', ' ');

    // Объявление функций:
    /* Функция переводит первый символ строки в верхний регистр, аналог
       функции ucfirst(), работающий с русским текстом в кодировке UTF-8: */
    if (!function_exists('mb_ucfirst')) {
        function mb_ucfirst($str, $enc)
        {
            return
                mb_strtoupper(mb_substr($str, 0, 1, $enc), $enc) .
                mb_substr($str, 1, mb_strlen($str, $enc), $enc);
        }
    }

    // Объявление переменных:
    // Исходное предложение (строка):
    $sentence = 'Теперь пора всем хорошим людям прийти на помощь стране';

    // Вывод исходного предложения:
    echo 'А. ' . $sentence . ';<br>';

    // Преобразование исходного предложения в нижний регистр:
    $sentence = mb_strtolower($sentence, encoding);
    /* Разбивка исходного предложения на отдельные слова и создание
       массива из слов: */
    $words = explode(separator, $sentence);
    /* Создание нового массива из тех же слов, расставленных в ином порядке,
       при этом первый символ первого слова массива преобразуется в верхний
       регистр: */
    $words_new = [
        mb_ucfirst($words[1], encoding), $words[0],  $words[8],
        $words[5], $words[6], $words[7], $words[2], $words[3], $words[4]
    ];
    /* Новое предложение (строка) собирается из нового массива слов,
       между словами вставляется тот же разделитель, что был и у исходного
       предложения: */
    $sentence = implode(separator, $words_new);

    // Вывод нового предложения:
    echo 'Б. ' . $sentence . '.';
    ?>
</body>

</html>