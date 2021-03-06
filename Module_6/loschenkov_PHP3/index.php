<?php
/*
    Общий код, который используется сразу в нескольких файлах, удобно организовать
    в отдельные файлы и включить их в PHP-сценарии с помощью одной из двух инструкций:
    include() и require().

    Обе команды работают почти одинаково, за исключением одного существенного различия:
    * команда require() используется, когда файл должен быть включен обязательно;
    * команда include() — если файл, в зависимости от обстоятельств, может быть
      включен или нет.

    При отсутствии указанного файла:
    * команда require() выводит сообщение об ошибке и прерывает исполнение файла;
    * команда include() выводит предупреждение, но продолжает исполнение файла.

    Команды include_once() и require_once() работают так же, как include() и require(),
    соответственно, с тем отличием, что они защищают от повторного прикрепления кода
    из указанных в них файлов.
*/

// Файл header.php, содержащий шапку, обязательно будет добавлен только один раз:
require_once('header.php');
require_once('header.php');

/* Боковая колонка будет добавлена только один раз, если будет найден
   файл asideleft.php: */
include_once('asideleft.php');
include_once('asideleft.php');

// Список статей будет добавлен, если будет найден файл articlemain.php
include('articlemain.php');
/* Посредством инструкции include() список статей можно добавить еще один
   или несколько раз: */
// include('articlemain.php');
// include('articlemain.php');

/* Боковая колонка будет добавлена только один раз, если будет найден
   файл asideright.php: */
include_once('asideright.php');

// Файл footer.php, содержащий подвал, обязательно будет добавлен только один раз:
require_once('footer.php');
?>
