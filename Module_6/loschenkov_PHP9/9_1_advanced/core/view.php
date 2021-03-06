<?php
/* Описание класса View - общего класса для представления (или вида).
   Определение класса: */
class View
{
    /* Метод generate получает указание на имя представления, а также на общий
       шаблон и опционально передаёт данные в представление, если они есть.
       Метод включает в себя 3 входных параметра:
           $content_view - содержимое страницы.
           $template_view - имя общего шаблона представления.
           $data - динамические данные, полученные от модели. */
    function generate($content_view, $template_view, $data = null)
    {
        // Если переменная $data (полученные от модели данные) является массивом,
//        if (is_array($data)) {
            /* то элементы массива преобразуются в переменные. Переменные
               из массива импортируются в текущую таблицу символов. Каждый ключ
               проверяется на предмет корректного имени переменной. Также
               проверяются совпадения с существующими переменными в символьной
               таблице: */
//            extract($data);
            /* Функция extract возвращает количество переменных, успешно
               импортированных в текущую таблицу символов. */
//        }

        /* Заданный шаблон представления будет добавлен, если будет найден файл
           $template_view: */
        include 'views/' . $template_view;
    }
}
?>
