<?php

/*
Задача 43
Напишите следующие запросы:

Запрос, который удаляет пользователя с именем Sansa Запрос, который вставляет в базу пользователя с именем Arya и
почтой arya@winter.com Запрос, который устанавливает флаг manager в true для пользователя с емейлом tirion@got.com

Далее создать функцию php, которая позволит реализовать перечисленные выше запросы

DROP TABLE IF EXISTS users;
CREATE TABLE users (
    first_name varchar(255),
    email varchar(255),
    manager boolean
);

INSERT INTO users (first_name, email) VALUES
  ('Sansa', 'sansa@winter.com'),
  ('Tirion', 'tirion@got.com');
 */


//SQL ЗАПРОСЫ:

$sql1 = <<<SQL
    DELETE FROM users 
    WHERE first_name = 'Sansa';
SQL;

$sql2 = <<<SQL
    INSERT INTO users (first_name, email) 
    VALUES ('Arya', 'arya@winter.com');
SQL;

$sql3 = <<<SQL
    UPDATE users 
    SET manager = true 
    WHERE email = 'tirion@got.com';
SQL;


/**
 * Функция удаляет из таблицы USERS запись по колонке $column и значению $value
 * через подготовленные запросы
 * Возвращаемые значения: false в случае неудачи, либо true если запись удалена
 */
function deleteFormUsers($mysqli, $column, $value)
{
    $column = $mysqli->real_escape_string($column);

    /* подготавливаемый запрос, первая стадия: подготовка */
    if (!($stmt = $mysqli->prepare("DELETE FROM users WHERE $column = ?"))) {
        throw new Exception(
            "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error
        );
        /* подготавливаемый запрос, вторая стадия: привязка параметров */
    } elseif (!$stmt->bind_param('s', $value)) {
        throw new Exception(
            "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error
        );
        /* подготавливаемый запрос, третья стадия: выполнение */
    } elseif (!$stmt->execute()) {
        throw new Exception(
            "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error
        );
    } else {
        $result = true;
    }
    return $result;
}

/**
 * Функция вставляет в таблицу users запись
 * через подготовленные запросы
 * Возвращаемые значения: false в случае неудачи, либо true если запись добавлена
 */
function insertIntoUsers($mysqli, $first_name, $email, $manager = null)
{
    /* подготавливаемый запрос, первая стадия: подготовка */
    if (!($stmt = $mysqli->prepare("INSERT INTO users (first_name, email, manager) VALUES (? , ?, ?)"))) {
        throw new Exception(
            "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error
        );
        /* подготавливаемый запрос, вторая стадия: привязка параметров */
    } elseif (!$stmt->bind_param("sss", $first_name, $email, $manager)) {
        throw new Exception(
            "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error
        );
        /* подготавливаемый запрос, третья стадия: выполнение */
    } elseif
    (!$stmt->execute()) {
        throw new Exception(
            "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error
        );
    } else {
        $result = true;
    }
    return $result;
}

/**
 * Функция обновляет в таблице users запись
 * через подготовленные запросы
 * Запись для удаления ищется по колонке email так как допускается что она уникальная
 * Возвращаемые значения: false в случае неудачи, либо true если запись обновлена
 */
function updateUsers($mysqli, $column, $value, $email)
{
    $column = $mysqli->real_escape_string($column);
    $email = $mysqli->real_escape_string($email);
    /* подготавливаемый запрос, первая стадия: подготовка */
    if (!($stmt = $mysqli->prepare("UPDATE users SET $column = ? WHERE email = '$email'"))) {
        throw new Exception(
            "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error
        );
        /* подготавливаемый запрос, вторая стадия: привязка параметров */
    } elseif (!$stmt->bind_param("s", $value)) {
        throw new Exception(
            "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error
        );
        /* подготавливаемый запрос, третья стадия: выполнение */
    } elseif
    (!$stmt->execute()) {
        throw new Exception(
            "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error
        );
    } else {
        $result = true;
    }
    return $result;
}


/* Тестовые запуски

//Подключение к БД
$mysqli = new mysqli("localhost", "stud06", "stud06", "tasks60");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// Тестовый запуск для функции удаления
deleteFormUsers($mysqli, 'first_name', 'Sansa');   //ok

// Тестовый запуск для функции Вставки
insertIntoUsers($mysqli, 'Arya', 'arya@winter.com'); //ok

// Тестовый запуск для функции обновления
updateUsers($mysqli, 'manager', true, 'tirion@got.com'); //ok
*/
