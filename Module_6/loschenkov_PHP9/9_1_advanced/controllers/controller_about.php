<?php
/* Класс Controller_About наследует все методы от класса Controller и уточняет
   их для реализации страницы с информацией об авторах статей. Определение
   нового класса Controller_About, основанного на существующем классе
   Controller: */
class Controller_About extends Controller
{
    /* Конструктор выполняется автоматически при создании нового объекта
       на основе класса Controller_About: */
    function __construct()
    {
        // Создание экземпляра объекта Model_About:
        $this->model = new Model_About();
        // Создание экземпляра объекта View:
        $this->view = new View();
    }

    /* Метод действия по умолчанию конкретизируется для реализации модели
       страницы с информацией об авторах статей: */
    function action_index()
    {
        // Получение данных от модели:
        $data = $this->model->get_data();
        /* Передача полученных от модели данных $data в представление. Здесь:
           authors_view.php - имя файла шаблона представлений для вывода
                              информации обо всех авторах.
           template_view.php - имя общего шаблона представления. */
        $this->view->generate('authors_view.php', 'template_view.php', $data);
    }

    /* Добавляется метод для реализации модели страницы с информацией об одном
       авторе: */
    function action_author()
    {   // Получение идентификационного номера автора в рамках БД:
        $id_author = $_GET['id'];
        // Получение данных от модели:
        $data = $this->model->get_data();
        /* Передача полученных от модели данных $data в представление. Здесь:
           author_view.php - имя файла шаблона представлений для вывода
                             информации об одном авторе.
           template_view.php - имя общего шаблона представления. */
        $this->view->generate('author_view.php', 'template_view.php', $data);
    }
}
