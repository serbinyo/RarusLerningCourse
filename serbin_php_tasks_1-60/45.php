<?php

/*
Задача 45
Создайте таблицу cars со следующими полями: user_first_name - имя пользователя (соответствующее имени в таблице users)
brand - марка машины model - конкретная модель Добавьте в таблицу users две произвольные записи. (смотрите структуру
таблицы внутри базы) Добавьте в таблицу cars 5 произвольных записей. Две из них должны указывать на одного пользователя
(соответствие по имени пользователя), а три других - на другого.

Далее создать функции php, которые позволит реализовать перечисленные выше запросы

DROP TABLE IF EXISTS users;
CREATE TABLE users (
    first_name varchar(255),
    last_name varchar(255),
    created_at timestamp
);
 */

//SQL Запросы:

$sql1 = <<<SQL
INSERT INTO users
(first_name, last_name)
VALUES
('Aria', 'Stark'),
('Tirion', 'Lanister');
SQL;

/*
mysql> SELECT * FROM users;
+------------+-----------+---------------------+
| first_name | last_name | created_at          |
+------------+-----------+---------------------+
| Aria       | Stark     | 2019-02-27 16:04:00 |
| Tirion     | Lanister  | 2019-02-27 16:04:00 |
+------------+-----------+---------------------+
*/

$sql2 = <<<SQL
CREATE TABLE cars
(
user_first_name varchar(255),
brand varchar(255),
model varchar(255)
);
SQL;

/*
mysql> DESC cars;
+-----------------+--------------+------+-----+---------+-------+
| Field           | Type         | Null | Key | Default | Extra |
+-----------------+--------------+------+-----+---------+-------+
| user_first_name | varchar(255) | YES  |     | NULL    |       |
| brand           | varchar(255) | YES  |     | NULL    |       |
| model           | varchar(255) | YES  |     | NULL    |       |
+-----------------+--------------+------+-----+---------+-------+
*/

/**
 * Функция добавляющая в таблицу cars БД автомобили пользователей
 * сравнение по имени пользователя (по условию задачи)
 * Возвращаемые значения: false в случае неудачи, либо true если запись добавлена
 */
function insertCar($mysqli, $username, $brand, $model)
{
    //Пока не проверили есть ли пользователь в таблице users устанавливаем флаг false
    $result = false;
    $res = $mysqli->query('SELECT * FROM users');
    $names = [];
    while ($user = $res->fetch_assoc()) {
        $names[] = $user['first_name'];
    }
    // Если пользователь есть в таблице users устанавливаем - true и сможем дальше работать
    foreach ($names as $name) {
        if ($username === $name) {
            $result = true;
        }
    }

    if ($result) {
        /* подготавливаемый запрос, первая стадия: подготовка */
        if (!($stmt = $mysqli->prepare(
            "INSERT INTO cars (user_first_name, brand, model) VALUES (? , ?, ?)"
        ))) {
            throw new Exception(
                "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error
            );
            /* подготавливаемый запрос, вторая стадия: привязка параметров */
        } elseif (!$stmt->bind_param("sss", $username, $brand, $model)) {
            throw new Exception(
                "Не удалось привязать параметры: (" . $stmt->errno . ") " . $stmt->error
            );
            /* подготавливаемый запрос, третья стадия: выполнение */
        } elseif
        (!$stmt->execute()) {
            throw new Exception(
                "Не удалось выполнить запрос: (" . $stmt->errno . ") " . $stmt->error
            );
        }
    } else {
        throw new Exception('Пользователя не существует. В таблице users');
    }

    //Если пользователя есть в таблице users и небыли выброшены исключения, возвращаем true, иначе false
    return $result;
}

/*Тестовые запуски

$mysqli = new mysqli("localhost", "stud06", "stud06", "tasks60");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

insertCar($mysqli, 'Aria', 'mazda', 'cx-7');                    //Добавлено
insertCar($mysqli, 'Tirion', 'ford', 'mustang');                //Добавлено
insertCar($mysqli, 'Dima', 'lada', '2101');                     //Exception Пользователя не существует
insertCar($mysqli, 'Tirion', 'tayota', 'highlux');              //Добавлено
insertCar($mysqli, 'Aria', 'volkswagen', 'golf 1978');          //Добавлено
insertCar($mysqli, 'Tirion', 'audi', 'q5');                     //Добавлено


Итоговая таблица

mysql> select * from cars;
+-----------------+------------+-----------+
| user_first_name | brand      | model     |
+-----------------+------------+-----------+
| Aria            | mazda      | cx-7      |
| Tirion          | ford       | mustang   |
| Tirion          | tayota     | highlux   |
| Aria            | volkswagen | golf 1978 |
| Tirion          | audi       | q5        |
+-----------------+------------+-----------+
5 rows in set (0.00 sec)
*/