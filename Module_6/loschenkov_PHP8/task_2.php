<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Самостоятельная работа &#8470;8.2. Объектно-ориентированное программирование на PHP</title>
</head>

<body>
    <?php
    // Определение класса:
    class User
    {
        // Объявление свойств:
        protected $name;  // имя
        protected $age;   // возраст
        /* Ключевое слово protected перед свойством - модификатор доступа, который
           указывает, что это защищенное свойство или метод доступен только изнутри
           самого класса или в дочерних, или через унаследованные классы, т.е. через
           классы, которые расширяют этот класс.
           Метод задания (установки) имени: */
        public function setName($name)
        {
            $this->name = $name;
        }
        /* Ключевое слово public перед методом - модификатор доступа, который
           указывает, что это свойство или метод будет доступен где угодно, внутри
           класса и снаружи.  Это видимость по умолчанию для всех членов класса в PHP.
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
    }
    // Определение нового класса, основанного на существующем классе User:
    class Worker extends User
    {
        // Объявление нового свойства:
        private $salary; // зарплата
        /* Ключевое слово private перед свойством - модификатор доступа, который
           указывает, что это частное свойство или метод доступен только изнутри
           класса, который его определяет. Даже дочерние или наследуемые классы
           не могут получить доступ к закрытым свойствам или методам.
           Метод задания (установки) зарплаты: */
        public function setSalary($salary)
        {
            $this->salary = $salary;
        }
        // Метод получения (чтения) возраста:
        public function getSalary()
        {
            return $this->salary;
        }
    }

    // Создание объектов на основе класса Student:
    $Ivan = new Worker;
    $Vasya = new Worker;
    // Установка значений для свойств объектов:
    $Ivan->SetName('Иван');
    $Ivan->SetAge(25);
    $Ivan->setSalary(1000);
    $Vasya->SetName('Вася');
    $Vasya->SetAge(26);
    $Vasya->setSalary(2000);

    // Вывод на экран суммы возрастов Ивана и Васи:
    echo 'Работники <b>' . $Vasya->GetName() . '</b> и <b>' . $Ivan->GetName() . '</b> имеют суммарную зарплату <b>' . ($Vasya->getSalary() + $Ivan->getSalary()) . '</b>.<br>';
    ?>
</body>

</html>