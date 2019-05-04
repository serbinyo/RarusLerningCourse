<?php

/*
Задача 50
Составьте запрос, который извлекает все записи из таблицы users по следующим правилам:

Пользователи созданы позже 2018-11-23 (включая эту дату) и раньше 2018-12-12 (включая эту дату) или поле house имеет
значение stark Данные отсортированы по дате создания по убыванию

DROP TABLE IF EXISTS users;
CREATE TABLE users (
    first_name varchar(255),
    email varchar(255),
    house varchar(255),
    birthday timestamp,
    created_at timestamp
);

Ошибка --- ERROR 1067 (42000): Invalid default value for 'created_at'

Решение:
mysql> SET sql_mode = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
Query OK, 0 rows affected, 1 warning (0.00 sec)

Теперь выполним запрос CREATE TABLE
Query OK, 0 rows affected (0.28 sec)

INSERT INTO users (first_name, email, house, birthday, created_at) VALUES
  ('Sansa', 'sansa@winter.com', 'stark', '1999-10-23', '2018-11-03'),
  ('Jon', 'jon@winter.com', 'stark', '1999-10-07', '2018-10-23'),
  ('Daenerys', 'daenerys@drakaris.com', 'targarien',  '1999-10-23', '2018-12-23'),
  ('Arya', 'arya@winter.com', 'stark', '2003-03-29', '2018-11-18'),
  ('Robb', 'robb@winter.com', 'stark', '1999-11-23', '2018-11-10'),
  ('Brienne', 'brienne@tarth.com', 'ne pomnu', '2001-04-04', '2018-11-28'),
  ('Tirion', 'tirion@got.com', 'lannister', '1975-1-11', '2018-11-23');

Query OK, 7 rows affected (0.13 sec)
Records: 7  Duplicates: 0  Warnings: 0

mysql> SELECT * FROM users;
+------------+-----------------------+-----------+---------------------+---------------------+
| first_name | email                 | house     | birthday            | created_at          |
+------------+-----------------------+-----------+---------------------+---------------------+
| Sansa      | sansa@winter.com      | stark     | 1999-10-23 00:00:00 | 2018-11-03 00:00:00 |
| Jon        | jon@winter.com        | stark     | 1999-10-07 00:00:00 | 2018-10-23 00:00:00 |
| Daenerys   | daenerys@drakaris.com | targarien | 1999-10-23 00:00:00 | 2018-12-23 00:00:00 |
| Arya       | arya@winter.com       | stark     | 2003-03-29 00:00:00 | 2018-11-18 00:00:00 |
| Robb       | robb@winter.com       | stark     | 1999-11-23 00:00:00 | 2018-11-10 00:00:00 |
| Brienne    | brienne@tarth.com     | ne pomnu  | 2001-04-04 00:00:00 | 2018-11-28 00:00:00 |
| Tirion     | tirion@got.com        | lannister | 1975-01-11 00:00:00 | 2018-11-23 00:00:00 |
+------------+-----------------------+-----------+---------------------+---------------------+
7 rows in set (0.00 sec)
 */

//Решение. Код на SQL:

<<<SQL
SELECT * FROM users
WHERE created_at BETWEEN '2018-11-23' AND '2018-12-12'
OR
house = 'stark'
ORDER BY created_at DESC;
SQL;

//+------------+-------------------+-----------+---------------------+---------------------+
//| first_name | email             | house     | birthday            | created_at          |
//+------------+-------------------+-----------+---------------------+---------------------+
//| Brienne    | brienne@tarth.com | ne pomnu  | 2001-04-04 00:00:00 | 2018-11-28 00:00:00 |
//| Tirion     | tirion@got.com    | lannister | 1975-01-11 00:00:00 | 2018-11-23 00:00:00 |
//| Arya       | arya@winter.com   | stark     | 2003-03-29 00:00:00 | 2018-11-18 00:00:00 |
//| Robb       | robb@winter.com   | stark     | 1999-11-23 00:00:00 | 2018-11-10 00:00:00 |
//| Sansa      | sansa@winter.com  | stark     | 1999-10-23 00:00:00 | 2018-11-03 00:00:00 |
//| Jon        | jon@winter.com    | stark     | 1999-10-07 00:00:00 | 2018-10-23 00:00:00 |
//+------------+-------------------+-----------+---------------------+---------------------+
//6 rows in set (0.01 sec)
//
//В результат не попала только Дайнерис, так как не Старк и зарегистрирована в неподходящий интервал времени


