<!DOCTYPE html>
<html lang="ru">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Самостоятельная работа &#8470;9.1. Работа с СУБД MySQL (Базовый уровень)</title>
   <style>
      table {
         margin: 30px auto;
      }
      table caption {
         padding-bottom: 10px;
         font-weight: bold;
         text-transform: uppercase;
      }
      table tr>td,
      table tr>th {
         background-color: #fff;
         padding-left: 10px;
         padding-right: 10px;
         text-align: left;
      }

      /* Оформление чётных строк таблицы: */
      table tr:nth-child(even)>td {
         background-color: #f2f2f2;
      }

      table {
         border: 2px solid #f2f2f2;
      }
   </style>
</head>

<body>

   <?php
   // Объявление переменных для соединения к БД MySQL:
   $db_host = "localhost";
   $db_user = "myuser";
   $db_pass = "password";
   $db_name = "NewDatabase";
   // Создание соединения с БД:
   $mysqli = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
   // Если соединение выполнено неудачно, то выводится сообщение об ошибке:
   if ($mysqli === false) {
      die("ERROR: Could not connect. " . mysqli_connect_error());
   } else {
      // Вывод заголовка таблицы:
      echo "<table>\n        <caption>Таблица заказов</caption>\n        <tr>\n            <th>id</th><th>Имя заказчика</th><th>Фамилия заказчика</th><th>E-mail заказчика</th><th>Название товара</th><th>Количество штук</th>\n        </tr>";
      /* Выполнение запроса SELECT к БД. Запрос возвращает набор результатов
         в объект mysqli_result, который записывается в переменную $res: */
      $res = $mysqli->query("SELECT * FROM Zakaz");
      // Цикл перебирает данные и выводит их в таблицу:
      for ($row_no = 0; $row_no < $res->num_rows; $row_no++) {
         // Перемещение указателя результата на выбранную строку $row_no:
         $res->data_seek($row_no);
         /* Выбор следующей строки из набора результатов и помещение её 
            в ассоциативный массив $row: */
         $row = $res->fetch_assoc();
         echo "\n        <tr>\n            <td>" . $row['id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['fam'] . "</td><td>" . $row['email'] . "</td><td>" . $row['tovar'] . "</td><td>" . $row['col']  . "</td>\n        </tr>";
      }
      // Вывод закрывающего тега таблицы:
      echo "\n    </table>\n";
      // Закрытие соединения:
      mysqli_close($mysqli);
   }
   ?>

</body>

</html>