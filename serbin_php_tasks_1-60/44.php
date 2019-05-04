<?php

/*
Задача 44
Составьте запрос, который извлекает все записи из таблицы юзер по следующим правилам:

Пользователи должны быть рождены позже 23 октября 1999 года. Поле birthday.
Выборка отсортирована в алфавитном порядке по полю first_name
Нужно извлечь только три записи
Далее создать функцию php, которая позволит реализовать перечисленные выше запросы

DROP TABLE IF EXISTS users;
CREATE TABLE users (
    first_name varchar(255),
    email varchar(255),
    birthday timestamp
);

INSERT INTO users (first_name, email, birthday) VALUES
  ('Sansa', 'sansa@winter.com', '1999-10-23'),
  ('Jon', 'jon@winter.com', '1999-10-07'),
  ('Daenerys', 'daenerys@drakaris.com', '1999-10-23'),
  ('Arya', 'arya@winter.com', '2003-03-29'),
  ('Robb', 'robb@winter.com', '1999-11-23'),
  ('Brienne', 'brienne@tarth.com', '2001-04-04'),
  ('Tirion', 'tirion@got.com', '1975-1-11');
 */


//SQL Запрос:
$sql = <<<SQL
SELECT * FROM users
WHERE birthday > '1999-10-23'
ORDER BY first_name DESC
LIMIT 3;
SQL;


//функця php, которая позволит реализовать перечисленные выше запросы
/**
 * Функция для выбора записей из БД старше определенной даты рождения
 *
 * В параметрах, помимо самой даты, возможно задать необязательные параметры
 * поле для сортировки, направление сортировки и ограничение по записям
 * Для сортировки по убыванию следует установить значение @sort_direct = 'DESC'
 * По умолчанию: сортировка по столбцу first_name и по возрастанию, лимит на выборку 100 записей.
 * Возвращает ресурс Базы данных @res в случае успеха, либо null
 */
function selectFromUsers($mysqli, $date, $sort_field = 'first_name', $sort_direct = 'ASC', $limit = 100)
{
    $sort_field = $mysqli->real_escape_string($sort_field);
    $sort_direct = $mysqli->real_escape_string($sort_direct);

    /*Защитимся от неправильно указания направления сортировки,
    так как в этом месте легко ошибиться*/
    if ($sort_direct !== 'ASC' && $sort_direct !== 'DESC') {
        $sort_direct = 'ASC';
    }

    $limit = $mysqli->real_escape_string($limit);

    /* подготавливаемый запрос, первая стадия: подготовка */
    if (!($stmt = $mysqli->prepare(
        "SELECT * FROM users WHERE birthday > ? ORDER BY $sort_field $sort_direct LIMIT $limit"
    ))) {
        throw new Exception(
            "Не удалось подготовить запрос: (" . $mysqli->errno . ") " . $mysqli->error
        );
        /* подготавливаемый запрос, вторая стадия: привязка параметров */
    } elseif (!$stmt->bind_param("s", $date)) {
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
        $res = $stmt->get_result();
        $result = $res;
    }
    return $result;
}

/* Тестовые запуски

//Подключение к БД
$mysqli = new mysqli("localhost", "stud06", "stud06", "tasks60");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

//Со значениями по умолчанию
$res = selectFromUsers($mysqli, '1999-10-23');

while ($row = $res->fetch_assoc()) {
    print_r ($row);
}

//Результат
//
//Array
//(
//    [first_name] => Arya
//    [email] => arya@winter.com
//    [birthday] => 2003-03-29 00:00:00
//)
//Array
//(
//    [first_name] => Brienne
//    [email] => brienne@tarth.com
//    [birthday] => 2001-04-04 00:00:00
//)
//Array
//(
//    [first_name] => Robb
//    [email] => robb@winter.com
//    [birthday] => 1999-11-23 00:00:00
//)


//С пользовательскими значениями
//Попробуем задать сортировку по убыванию и изменить количество выводимых записей. Работает
$res = selectFromUsers($mysqli, '1999-10-23', 'first_name', 'DESC', '2' );

while ($row = $res->fetch_assoc()) {
    print_r ($row);
}

//Результат
//
//Array
//(
//    [first_name] => Robb
//    [email] => robb@winter.com
//    [birthday] => 1999-11-23 00:00:00
//)
//Array
//(
//    [first_name] => Brienne
//    [email] => brienne@tarth.com
//    [birthday] => 2001-04-04 00:00:00
//)
*/
