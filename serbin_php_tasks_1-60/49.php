<?php

/*
Задача 49
Составьте запрос, который извлекает из базы данных все имена (first_name) пользователей, отсортированных по дате
рождения в обратном порядке. Те записи у которых нет даты рождения, должны быть в конце списка.

//Так как при создании таблице столбцу birthday присвоен тип timestamp
//при вставке будет подставлено текущее время, что не подходит по условию задачи
//вместо timestamp необходимо использовать date
_______________________________________________________________________
DROP TABLE IF EXISTS users;
CREATE TABLE users (
    first_name varchar(255),
    email varchar(255),
    birthday date
);

INSERT INTO users (first_name, email, birthday) VALUES
  ('Sansa', 'sansa@winter.com', '1999-10-23'),
  ('Jon', 'jon@winter.com', '1999-10-07'),
  ('Daenerys', 'daenerys@drakaris.com', NULL),
  ('Arya', 'arya@winter.com', '2003-03-29'),
  ('Robb', 'robb@winter.com', '1999-11-23'),
  ('Brienne', 'brienne@tarth.com', '2001-04-04'),
  ('Tirion', 'tirion@got.com', '1975-1-11');

mysql> SELECT * FROM users;
+------------+-----------------------+------------+
| first_name | email                 | birthday   |
+------------+-----------------------+------------+
| Sansa      | sansa@winter.com      | 1999-10-23 |
| Jon        | jon@winter.com        | 1999-10-07 |
| Daenerys   | daenerys@drakaris.com | NULL       |
| Arya       | arya@winter.com       | 2003-03-29 |
| Robb       | robb@winter.com       | 1999-11-23 |
| Brienne    | brienne@tarth.com     | 2001-04-04 |
| Tirion     | tirion@got.com        | 1975-01-11 |
+------------+-----------------------+------------+
7 rows in set (0.00 sec)
 */

//Решение. Код на SQL:

<<<SQL
SELECT first_name
FROM users
ORDER BY birthday DESC;
SQL;

//+------------+
//| first_name |
//+------------+
//| Arya       |
//| Brienne    |
//| Robb       |
//| Sansa      |
//| Jon        |
//| Tirion     |
//| Daenerys   |
//+------------+
//7 rows in set (0.00 sec)


//Если бы мы хотели сделать сортировку по возрастанию
//и что бы результаты с NULL попали в конец списка
//мы могли бы сделать что то вроде этого:
<<<SQL
SELECT first_name, birthday as sort_date
FROM users
WHERE birthday IS NOT NULL
UNION
SELECT first_name, '9999-12-31 23:59:59' as sort_date
FROM users
WHERE birthday IS NULL
ORDER BY sort_date ASC;
SQL;

