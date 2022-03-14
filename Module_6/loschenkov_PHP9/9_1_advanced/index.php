<?php
// Подключение общих классов:
require_once 'core/model.php'; // Модель
require_once 'core/view.php'; // Представление
require_once 'core/controller.php'; // Контроллер
// Подключение маршрутизатора:
require_once 'core/route.php';
// Запуск маршрутизатора:
Route::start();
?>
