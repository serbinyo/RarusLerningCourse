<?php

/*
Задача 54
Составьте запрос, который считает количество пользователей рожденных (birthday) в каждом году (из тех что есть в
birthday) по следующим правилам:

Анализируются только те пользователи, у которых указан год рождения Выборка отсортирована по году рождения в прямом
порядке

DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id bigint PRIMARY KEY,
  birthday DATE,
  email VARCHAR(255) UNIQUE NOT NULL,
  first_name VARCHAR(50),
  created_at timestamp
);

INSERT INTO users (id, first_name, email, birthday) VALUES
  (1, 'Sansa', 'sansa@winter.com', '1999-10-23'),
  (2, 'Jon', 'jon@winter.com', null),
  (3, 'Daenerys', 'daenerys@drakaris.com', '1999-10-23'),
  (4, 'Arya', 'arya@winter.com', '2003-03-29'),
  (5, 'Robb', 'robb@winter.com', '1999-11-23'),
  (6, 'Brienne', 'brienne@tarth.com', '2001-04-04'),
  (7, 'Tirion', 'tirion@got.com', '1975-1-11');
 */

//Решение:

<<<SQL
SELECT YEAR(birthday) as year, COUNT(birthday)
FROM users
WHERE birthday IS NOT NULL
GROUP BY year
ORDER BY year ASC;
SQL;

//+------+-----------------+
//| year | COUNT(birthday) |
//+------+-----------------+
//| 1975 |               1 |
//| 1999 |               3 |
//| 2001 |               1 |
//| 2003 |               1 |
//+------+-----------------+
//4 rows in set (0.00 sec)
