<h1>Список всех авторов сайта</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Ф.И.О.</th>
        <th>Возраст</th>
        <th>Узнать подробнее</th>
    </tr>
    <?php
    /* Данные $data были получены выше, когда файл шаблона представления
       $template_view был добавлен (include) в классе представления View.
       Цикл перебирает данные и выводит их в таблицу: */
    for ($row_no = 0; $row_no < $data->num_rows; $row_no++) {
        // Перемещение указателя результата на выбранную строку $row_no:
        $data->data_seek($row_no);
        /* Выбор следующей строки из набора результатов и помещение её
           в ассоциативный массив $row: */
        $row = $data->fetch_assoc();
        // Вывод очередной строки таблицы:
        echo "\n    <tr>\n        <td>" . $row['id'] . "</td><td>" . $row['fio'] . "</td><td>" . $row['age'] . "</td><td><a href='/journal/about/author/?id=" . $row['id'] . "'target='_blank'>Подробнее</a></td>\n    </tr>";
    }
    ?>
</table>