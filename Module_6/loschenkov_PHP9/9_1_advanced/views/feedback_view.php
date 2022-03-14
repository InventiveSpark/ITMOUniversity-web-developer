<h1>Оставьте обратную связь о нашем сайте!</h1>
<form action="/journal/feedback/send" method="POST">
    <p><input placeholder="Введите ваше имя" name="user"></p>
    <p><input placeholder="Введите ваш e-mail" name="email"></p>
    <p><textarea name="comment" placeholder="Введите ваш отзыв"></textarea></p>
    <p><input type="button" onclick="sendData()" value="Отправить"><input type="reset" value="Очистить"></p>
</form>
<script>
    {
        "use strict";

        function sendData() {
            let xhr = new XMLHttpRequest();
            feedbackForm = document.forms[0],
                formData = new FormData(feedbackForm)
            xhr.open("POST", '/journal/feedback/send')
            xhr.onloadend = function() {
                if (xhr.status == 200) {
                    if (xhr.response == 1) {
                        alert('Добавлено!');
                    } else {
                        alert(xhr.response);
                    }
                } else {
                    alert("Ошибка " + this.status);
                }
            };
            xhr.send(formData);
        }
    }
</script>