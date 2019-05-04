<?php

$fio = htmlspecialchars($_POST['fio']);
$email = htmlspecialchars($_POST['email']);
$tel = htmlspecialchars($_POST['tel']);
$comment = htmlspecialchars($_POST['comment']);

$errors = 0;

if (empty($fio)) {
    echo "<p style='color: red;'>Поле ФИО - Пустое </p>";
    $errors++;
}

if (empty($email)) {
    echo "<p style='color: red;'>Поле Email - Пустое </p> ";
    $errors++;
} elseif (!preg_match("/[0-9a-z]+@[a-z]+.[a-z]/", $email)) {
    echo "<p style='color: red;'>Поле Email - Заполненно неправильно </p> ";
    $errors++;
}

if (empty($tel)) {
    echo "<p style='color: red;'>Поле Номер телефона - Пустое </p>";
    $errors++;
} elseif (!preg_match("/^\+(3|7)[0-9]{8,10}$/i", $tel)) {
    echo "<p style='color: red;'>Поле Номер телефона - Заполненно неправильно </p> ";
    $errors++;
}

if (empty($comment)) {
    echo "<p style='color: red;'>Поле Комментарий - Пустое </p>";
    $errors++;
}

$source = $_FILES["userfile"]["tmp_name"];
$dest = $_FILES["userfile"]["name"];
if (is_file($source)) {

    if (copy($source, $dest)) {
        echo '<p style="color: blue;">Файл успешно загружен</p>';
    } else {
        echo '<p style="color: red;">Ошибка загрузки файла</p>';
        $errors++;
    }
} else {
    echo '<p style="color: red;">Ошибка чтения файла</p>';
    $errors++;
}

if ($errors === 0) {
    echo "<p style='color: blue;'>Все данные введены верно. </p>";
}
echo "<a href='form.php'>Вернуться назад</a>";
