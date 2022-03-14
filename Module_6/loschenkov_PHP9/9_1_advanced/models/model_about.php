<?php
class Model_About extends Model
{
    /* Метод get_data, вызываемый в Controller_About, применяется для получения
       данных от модели: */
    public function get_data($id = -1)
    {
        // Если задано id автора, то выбирается только одна запись:
        if ($id <> -1) {
            $result = $this->executeQuery("SELECT * FROM authors WHERE id = ");
        } else {
            /* Если значение id равно -1 (не задано), то выбирается весь список
               авторов: */
            $result = $this->executeQuery("SELECT * FROM authors");
        }
        // Возвращение результатов работы:
        return $result;
    }
}
?>
