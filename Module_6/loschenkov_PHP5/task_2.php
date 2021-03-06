<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Самостоятельная работа &#8470;5.2. Пользовательские функции</title>
</head>

<body>
    <?php

    // Функция определяет факториал целого неотрицательного числа n:
    function secret($n)
    {
        /* Для положительного аргумента его значение умножается на эту же
           рекурсивно вызываемую функцию с уменьшенным на 1 значением аргумента: */
        if ($n > 0)
            return $n * secret($n - 1);
        /* Последовательность рекурсивных вызовов прерывается только при вызове
           secret(0), который и приводит к последнему значению 1 в произведении,
           так как последнее выражение, из которого вызывается функция, имеет вид
           1 * secret(1 - 1)
           Для нулевого аргумента функция возвращает значение 1, поскольку 0! = 1
        */
        return 1;
    }

    /* Факториал - функция, определенная на множестве неотрицательных целых чисел.
       Факториал натурального числа n определяется как произведение всех натуральных
       чисел, от 1 до n включительно:
       n! = 1 * 2 * ... * n
       Для n = 0 принимается в качестве соглашения, что
       0! = 1
    */
    echo 'Факториал от 0 до 5:<br>';
    for ($i = 0; $i <= 5; $i++) {
        echo $i . '!= ' . secret($i) . '<br>';
    }
    ?>
</body>

</html>