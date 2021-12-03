/* Функция getCookies() читает информацию из cookie-наборов и отображает её 
   под формой в элементе с классом "saveCookie": */
function getCookies() {
    /* В переменной tmp будет формироваться строчный шаблон вывода. Переменной
       присвоена пустая строка для того, чтобы задать ей тип string вместо 
       undefined, что обеспечит чистую конкатенацию: */
    let tmp = "";
    // Проверяется наличие cookie-набора login
    if (typeof Cookies.get("login") !== "undefined") {
        /* Если он существует, то набор сохраняется в переменную tmp 
           со следующим форматом:
                имя_cookie : значение <br> 
           Метод Cookies.get("login") из библиотеки js-cookie позволяет 
           получить значение cookie-набора. На вход принимает имя cookie, 
           на выходе отдаёт значение. */
        tmp = tmp + "login : " + Cookies.get("login") + "<br>";
    }
    // Проверяется наличие cookie-набора password
    if (typeof Cookies.get("password") !== "undefined") {
        /* Если он существует, то набор сохраняется в переменную tmp 
           со следующим форматом:
                имя_cookie : значение
           Метод Cookies.get("password") из библиотеки js-cookie позволяет 
           получить значение cookie-набора. На вход принимает имя cookie, на 
           выходе отдаёт значение. */
        tmp = tmp + "password : " + Cookies.get("password");
    }
    /* Сформированная строка присваивается параграфу с классом "saveCookie": */
    document.getElementsByClassName("saveCookie")[0].innerHTML = tmp;
}

/* Функция login() отвечает за обработку формы. */
const login = () => {
    // В переменные записываются данные из полей ввода логина и пароля:
    let username = document.getElementById("login").value;
    let password = document.getElementById("password").value;
    /* Метод trim() удаляет пробельные символы с начала и конца 
       строки. Пробельными символами в этом контексте считаются 
       все собственно пробельные символы (пробел, табуляция, 
       неразрывный пробел и прочие) и все символы конца строки 
       (LF, CR и прочие). */
    username = username.trim();
    password = password.trim();
    /* Если пользователь не ввёл данные, или ввёл их не полностью, то выводится 
       сообщение для пользователя: */
    if (username === "" && password === "")
        alert("Пожалуйста, введите логин и пароль!");
    else if (username === "")
        alert("Пожалуйста, введите логин!");
    else if (password === "")
        alert("Пожалуйста, введите пароль!");
    // Если пользователь ввёл все данные:
    else {
        /* Сохранение в cookie логина и пароля, введенных пользователем, 
           используя метод Cookies.set() из библиотеки js-cookie: */
        Cookies.set("login", username);
        Cookies.set("password", password);
        /* Вывод в параграф с классом "saveCookie" строки с сохраненными 
           cookie-наборами: */
        getCookies();
    }
}
