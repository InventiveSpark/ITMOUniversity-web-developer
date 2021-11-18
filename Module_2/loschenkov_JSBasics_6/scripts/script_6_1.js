/* DOM-метод document.getElementById даёт браузеру команду отыскать элемент 
   с указанным id. Этот вызов вернёт DOM-объект с соответствующим id. Когда
   элемент найден, им можно управлять при помощи JavaScript-кода. 
   Объекты, выбранные по id="first" и id="second", присваиваются переменным
   first и second соответственно: */
let first = document.getElementById("first");
let second = document.getElementById("second");
console.log("first:", first);
console.log("second:", second);