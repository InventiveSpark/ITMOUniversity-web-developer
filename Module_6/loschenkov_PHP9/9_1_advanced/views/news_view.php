<h1>Добро пожаловать на наш сайт!</h1>
<table>
    <caption>Таблица с последними новостями сайта</caption>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Content</th>
        <th>Postcard</th>
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
        echo "\n    <tr>\n        <td>" . $row['id_news'] . "</td><td>" . $row['title'] . "</td><td>" . $row['content'] . "</td><td><img class='postcard' src='" . $row['postcard'] . "'/></td>\n    </tr>";
    }
    ?>

</table>
