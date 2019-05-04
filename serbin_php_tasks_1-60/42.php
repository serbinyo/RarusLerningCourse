<?php

/*
Задача 42
Напишите запрос создающий таблицу courses со следующими полями, запрос обернуть в функцию createTable на php

name типа varchar длинной 255. body типа text. created_at типа timestamp. Напишите запрос создающий таблицу users со
следующими полями

first_name типа varchar длинной 255. email типа varchar длинной 255. manager типа boolean. Напишите запрос создающий
таблицу course_members со следующими полями

user_id типа integer course_id типа integer created_at типа timestamp

 */

function createTable($mysqli, $sql)
{
    $sql = htmlspecialchars($sql);
    if ($mysqli->query($sql)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

//SQL запросы

$sql1 = <<<SQL
    CREATE TABLE courses
    (
        name varchar(255),
        body text,
        created_at timestamp
    );
SQL;

$sql2 = <<<SQL
    CREATE TABLE users
    (
        first_name varchar(255),
        email varchar(255),
        manager boolean
    );
SQL;

$sql3 = <<<SQL
    CREATE TABLE course_members
    (
        user_id integer,
        course_id integer,
        created_at timestamp
    );
SQL;

/* Тестовые запуски

//Подключение к БД
$mysqli = new mysqli("localhost", "stud06", "stud06", "tasks60");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

print_r(createTable($mysqli, $sql1)); //ok

print_r(createTable($mysqli, $sql2)); //ok

print_r(createTable($mysqli, $sql3)); //ok
*/
