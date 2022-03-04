<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Самостоятельная работа &#8470;8.1. Объектно-ориентированное программирование на PHP</title>
</head>

<body>
    <?php
    // Определение класса:
    class Student
    {
        // Объявление свойств:
        private $name;  // имя
        private $age;   // возраст
        private $group; // группа
        /* Ключевое слово private перед свойством - модификатор доступа, который
           указывает, что это частное свойство или метод доступен только изнутри
           класса, который его определяет. Даже дочерние или наследуемые классы
           не могут получить доступ к закрытым свойствам или методам.
           Метод задания (установки) имени: */
        public function setName($name)
        {
            $this->name = $name;
        }
        /* Ключевое слово public перед методом - модификатор доступа, который
           указывает, что это свойство или метод будет доступен где угодно, внутри
           класса и снаружи. Это видимость по умолчанию для всех членов класса в PHP.
           Метод получения (чтения) имени: */
        public function getName()
        {
            return $this->name;
        }
        // Метод задания (установки) возраста:
        public function setAge($age)
        {
            $this->age = $age;
        }
        // Метод получения (чтения) возраста:
        public function getAge()
        {
            return $this->age;
        }
        // Метод задания (установки) возраста:
        public function setGroup($group)
        {
            $this->group = $group;
        }
        // Метод получения (чтения) возраста:
        public function getGroup()
        {
            return $this->group;
        }
    }

    // Создание объектов на основе класса Student:
    $Ivan = new Student;
    $Vasya = new Student;
    // Установка значений для свойств объектов:
    $Ivan->SetName('Иван');
    $Ivan->SetAge(21);
    $Ivan->SetGroup('U1001');
    $Vasya->SetName('Вася');
    $Vasya->SetAge(20);
    $Vasya->SetGroup('U1002');

    // Вывод на экран группы Ивана и Васи:
    echo 'Студент <b>' . $Ivan->GetName() . '</b> учится в группе <b>' . $Ivan->GetGroup() . '</b>.<br>';
    echo 'Студент <b>' . $Vasya->GetName() . '</b> учится в группе <b>' . $Vasya->GetGroup() . '</b>.<br>';
    // Вывод на экран суммы возрастов Ивана и Васи:
    echo 'Студенты <b>' . $Vasya->GetName() . '</b> и <b>' . $Ivan->GetName() . '</b> имеют суммарный возраст <b>' . ($Vasya->GetAge() + $Ivan->GetAge()) . '</b>.<br>';
    ?>
</body>

</html>