/* Примечание: По умолчанию консоль очищается каждый раз, когда вы открываете
   новую страницу или перезагружаете текущую. Консоль немедленно очищается,
   если страница была перезагружена из-за отправки формы при нажатии на кнопку
   с типом (по умолчанию) "submit". Чтобы переопределить это поведение браузера, 
   нужно открыть консоль, нажать иконку в виде шестеренки в правом верхнем углу 
   и установить флажок "Persist Logs" (FireFox) или "Preserve log" (Chrome).

   Функция getForm() собирает в объект все значения следующих компо­нентов 
   формы:
    * однострочных полей ввода текста (type="text");
    * переключателей (type="radio");
    * флажков или чекбоксов (type="checkbox").
   Возвращает объект, в котором собраны данные из текстовых полей ввода, 
   состояние выбора каждого из переключателей, состояние установки флажков 
   (чекбоксов): */
const getForm = () => {
    /* DOM-метод getElementsByTagName() возвращает объект HTMLCollection 
       (коллекцию), который является массивоподобным объектом, доступным только 
       для чте­ния. У него есть свойство length. Кроме того, его можно 
       ин­дексировать (но только для чтения, а не для записи), как настоящий 
       массив.
       Объект HTMLCollection постоянно обновляется при каж­дом изменении 
       документа без необходимости вызова document.getElementsByTagName() 
       снова.
       Объявление константы, ссылающейся на коллекцию элементов (компо­нентов 
       формы), имеющих общий тег input: */
    const INPUTS = document.getElementsByTagName("input");
    // Создание объекта (без свойств), который будет результатом работы функции:
    let result = {};
    // Для каждого из компо­нентов формы
    for (input of INPUTS) { // Можно использовать также for (let i = 0; i < INPUTS.length; i++) {...INPUTS[i]...}    
        // проверяется, является ли он однострочным полем ввода текста. Если да,
        if (input.type === "text") {
            /* то в объект result добавляется поле, содержащее имя стилевого 
               идентификатора компонента и данные из поля ввода: */
            result[input.id] = input.value;
        }
        // Если же компонент является переключателем или флажком (чекбоксом),
        else if (input.type === "radio" || input.type === "checkbox") {
            /* то внутри объекта result создаётся новый объект, отражающий 
               состояние группы флажков или списка переключателей. Поскольку 
               все переключатели, формирую­щие список ответов, должны иметь 
               одинаковое значение атрибута name, а также значение атрибута 
               name должно быть одинаковым для всех флажков группы, то название 
               этого объекта будет совпадать со значением атрибута name 
               у компо­нента формы.
               Если объект ещё не существует, то ни один переключатель из 
               списка ответов name, либо ни один флажок из группы name ещё не 
               был обработан, поэтому создаётся пустой объект (без свойств): */
            if (input.name in result === false)
                result[input.name] = {};
            /* В переменную newIndex записывается свойство length объекта, 
               отражающего состояние группы флажков или списка переключателей 
               с атрибутом name. Длина length всегда на единицу больше самого 
               большого индекса, т.е. она равна индексу, по которому будет 
               добавляться новый элемент, характеризующий флажок или 
               переключатель. Длина корректируется, когда индексному свойству 
               присваивается значение. Если длина уменьшается, то все элементы,
               индексы которых больше или равны новой длине, удаляются. */
            let newIndex = Object.keys(result[input.name]).length;
            /* Внутри объекта, соответствующего группе флажков или списку
               переключателей с одинаковым атрибутом name, создаётся новый
               объект, характеризующий состояние переключателя или флажка: */
            result[input.name][newIndex] = {
                /* Внутри такого объекта указывается значение переключателя или 
                   флажка, отправляемое серверу, и состояние выбора переключателя
                   или установки флажка (чекбокса): */
                "value": input.value,
                "status": input.checked ? "checked" : "false" // тернарный оператор
            }
            /* Здесь была использована синтаксическая схема записи объекта, сам 
               объект будет создан интерпретатором автоматически во время 
               выполнения. */
        }
    }
    /* Строка, позволяющая показать в консоли объект result в красивом виде, со
       всеми его свойствами. Двойка задаёт отступ в 2 пробела. Работает в любом 
       браузере: */
    console.log(JSON.stringify(result, null, 2));
    // Функция возвращает сформированный объект:
    return result;
}