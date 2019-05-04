<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        form {
            margin-left: 20px;
        }

        label {
            display: block;
        }

        .error input,
        .error textarea {
            border: 1px solid red;
        }

        .error {
            color: red;
        }
    </style>

    <title>Форма обратной связи</title>
</head>
<body>

<form action="action.php" method="post" enctype="multipart/form-data">

    <h3>Форма обратной связи</h3>

    <label>Фамилия имя отчество:<br>
        <input type="text" name="fio">
    </label><br>

    <label>E-mail:<br>
        <input type="text" name="email">
    </label><br>

    <label>Телефон:<br>
        <input type="text" name="tel">
    </label><br>

    <label>Комментарий:<br>
        <textarea name="comment" rows="5" placeholder="Введите комментарий"></textarea>
    </label><br>

    <label>Файл:<br>
        <input type="file" name="userfile">
    </label><br>

    <input type="submit" onclick="validate(this.form)" value="Отправить">
</form>

<script>
    window.onload = function() {
        document.forms[0].onsubmit = function () {
            return false;
        };
    };


    function showError(container, errorMessage) {
        container.className = 'error';
        var msgElem = document.createElement('span');
        msgElem.className = "error-message";
        msgElem.innerHTML = errorMessage;
        container.appendChild(msgElem);
    }

    function resetError(container) {
        container.className = '';
        if (container.lastChild.className == "error-message") {
            container.removeChild(container.lastChild);
        }
    }

    function validateEmail(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

    function validateTel(tel) {
        var re = /^\+(3|7)[0-9]{8,10}$/gi;
        return re.test(tel);
    }

    function validate(form) {

        var elems = form.elements;
        var errors = 0;

        resetError(elems.fio.parentNode);
        if (!elems.fio.value) {
            showError(elems.fio.parentNode, ' Укажите ФИО.');
            errors++;
        }

        resetError(elems.email.parentNode);
        if (!elems.email.value) {
            showError(elems.email.parentNode, ' Укажите email.');
            errors++;
        } else if (!validateEmail(elems.email.value)) {
            showError(elems.email.parentNode, ' Введите корректный email.');
            errors++;
        }

        resetError(elems.tel.parentNode);
        if (!elems.tel.value) {
            showError(elems.tel.parentNode, ' Введите номер телефона.');
            errors++;
        } else if (!validateTel(elems.tel.value)) {
            showError(elems.tel.parentNode, '  Введите корректный номер телефона.');
            errors++;
        }

        resetError(elems.comment.parentNode);
        if (!elems.comment.value) {
            showError(elems.comment.parentNode, ' Отсутствует текст.');
            errors++;
        }

        resetError(elems.userfile.parentNode);
        if (!elems.userfile.value) {
            showError(elems.userfile.parentNode, '');
            errors++;
        }

        if (errors === 0) {
            form.submit();
        }
    }
</script>

</body>
</html>