<?php
/* Класс Controller_News наследует все методы от класса Controller и уточняет
   их для реализации страницы с последними новостями сайта. Определение нового
   класса Controller_News, основанного на существующем классе Controller: */
class Controller_News extends Controller
{
    /* Конструктор выполняется автоматически при создании нового объекта
       на основе класса Controller_News: */
    function __construct()
    {
        // Создание экземпляра объекта Model_News:
        $this->model = new Model_News();
        // Создание экземпляра объекта View:
        $this->view = new View();
    }

    /* Метод действия по умолчанию конкретизируется для реализации модели
       страницы с новостями сайта: */
    function action_index()
    {
        // Получение данных от модели:
        $data = $this->model->get_data();
        /* Передача полученных от модели данных $data в представление. Здесь:
           news_view.php - имя файла шаблона представлений последних новостей
                           сайта.
           template_view.php - имя общего шаблона представления. */
        $this->view->generate('news_view.php', 'template_view.php', $data);
    }
}
?>
