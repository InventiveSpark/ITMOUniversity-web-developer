<?php
/* Класс Controller_Feedback наследует все методы от класса Controller
   и уточняет их для реализации страницы с формой обратной связи. Определение
   нового класса Controller_Feedback, основанного на существующем классе
   Controller: */
class Controller_Feedback extends Controller
{
   /* Конструктор выполняется автоматически при создании нового объекта
       на основе класса Controller_Feedback: */
   function __construct()
   {
      // Создание экземпляра объекта Model_Feedback:
      $this->model = new Model_Feedback();
      // Создание экземпляра объекта View:
      $this->view = new View();
   }

   /* Метод действия по умолчанию конкретизируется для реализации модели
      страницы с формой обратной связи: */
   function action_index()
   {
      /* Добавление страницы с формой обратной связи для вывода в общем шаблоне
         представления. Здесь:
           feedback_view.php - имя файла шаблона представлений для вывода
                               обратной связи.
           template_view.php - имя общего шаблона представления. */
      $this->view->generate('feedback_view.php', 'template_view.php');
   }

   /* Метод читает данные из глобального массива $_POST, который содержит
      список переменных, переданных скрипту методом POST, проверяет их
      и передаёт полученные данные в представление: */
   function action_send()
   {
      if (isset($_POST['user'])) {
         $feedback['user'] = $_POST['user'];
         if (isset($_POST['email'])) {
            $feedback['email'] = $_POST['email'];
         }
         if (isset($_POST['comment'])) {
            $feedback['comment'] = $_POST['comment'];
         }
         $data = $this->model->send_data($feedback);
      } else {
         // Если что-то не так с данными, то отдаётся "Empty Data!":
         $data = 'Empty data!';
      }
      /* Передача полученных данных $data в представление. Здесь:
           feedback_result_view.php - имя файла шаблона представлений
                                      для вывода данных, отправленных
                                      посредством обратной связи.
           api_template_view.php - имя шаблона представления для вывода
                                   результатов запросов на добавление
                                   записей в БД. */
      $this->view->generate('feedback_result_view.php', 'api_template_view.php', $data);
   }
}
