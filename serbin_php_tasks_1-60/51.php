<?php

/*
Задача 51
Составьте запрос, который извлекает все записи из таблицы users по следующим правилам:
Пользователи должны быть рождены (birthday) раньше 3 октября 2002 года. Данные отсортированы по имени в прямом
порядке Нужно извлечь 3 строчки, пропустив первые две

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

//Решение. Код на SQL:

<<<SQL
SELECT * FROM users
WHERE birthday < '2002-10-03'
ORDER BY first_name ASC
LIMIT 2,3;
SQL;

//+------------+------------------+---------------------+
//| first_name | email            | birthday            |
//+------------+------------------+---------------------+
//| Jon        | jon@winter.com   | 1999-10-07 00:00:00 |
//| Robb       | robb@winter.com  | 1999-11-23 00:00:00 |
//| Sansa      | sansa@winter.com | 1999-10-23 00:00:00 |
//+------------+------------------+---------------------+
//3 rows in set (0.00 sec)


