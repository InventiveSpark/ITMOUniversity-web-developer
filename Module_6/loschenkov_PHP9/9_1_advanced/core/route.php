<?php
/* Описание класса Route - общего класса для маршрутизатора.
   Определение класса: */
class Route
{
    public function getPathArray()
    {
        $BASE_URL = 'localhost:8080/journal/';
        // Данная переменная будет хранить массив вложенности
        $pathArray = [];
        // Нам нужно, чтобы будущий роутинг считал, что мы находимся "в корне", а не вложены в каталог journal
        // Получаем текущий адрес
        $currentPath = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        if (strpos($currentPath, $BASE_URL) >= 0) {
            $tmpPath = substr($currentPath, strlen($BASE_URL));
        }
        //$_SERVER['REQUEST_URI'] возвращает URI, который был предоставлен для доступа к этой странице. Например, '/index.html'.
        $tmpArray = explode("/", $tmpPath);
        // Массив, который нам возвращает explode содержит пустые значения.
        // У нас с Вами есть два варианта решения задачи:
        // 1. В лоб через цикл foreach перебрать все значения
        /*
        foreach ($tmpArray as $key => $item) {
            if (strlen($item) > 0) {
                array_push($pathArray, $item);
            }
        }
        */
        // 2. Воспользоваться функцией фильтра значений массива
        $pathArray = array_values(array_filter($tmpArray, function ($element) {
            return !empty($element);
        }));
        // Обязательно обернуть в array_values для сброса индексации.
        // Возвращаем полученный список элементов в URI
        return $pathArray;
    }

    static function start()
    {
        // указываем контроллер и действие по умолчанию
        $controller_name = 'news';
        $action_name = 'index';
        // Обращаемся к методу нашего класса и получаем массив с роутингом
        $routes = self::getPathArray();
        // получаем имя контроллера, если есть
        if (!empty($routes[0])) {
            $controller_name = $routes[0];
        }
        // получаем имя экшена
        if (!empty($routes[1])) {
            $action_name = $routes[1];
        }
        // добавляем префиксы
        $model_name = 'model_' . $controller_name;
        $controller_name = 'controller_' . $controller_name;
        $action_name = 'action_' . $action_name;
        // подцепляем файл с классом модели (файла модели может и не быть)
        $model_file = strtolower($model_name) . '.php';
        $model_path = "models/" . $model_file;
        if (file_exists($model_path)) {
            include "models/" . $model_file;
        }
        // подцепляем файл с классом контроллера
        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = "controllers/" . $controller_file;
        if (file_exists($controller_path)) {
            include "controllers/" . $controller_file;
        } else {
            /*
               правильно было бы кинуть здесь исключение,
               но для упрощения сразу сделаем перенаправление на страницу 404
            */
            Route::ErrorPage404();
        }
        // создаем контроллер и действие с моделью, если есть
        $controller = new $controller_name;
        $action = $action_name;
        // Если у класса существует указанный выше метод action_index например, вызываем действие контроллера
        if (method_exists($controller, $action)) {
            // вызываем действие контроллера
            $controller->$action();
        } else {
            // здесь также разумнее было бы кинуть исключение
            Route::ErrorPage404();
        }
    }

    // Метод для организации редиректа на 404 при любом нештатном случае
    function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/journal/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}
?>
