<?php

/*
Задача 52
Составьте запрос, который извлекает все уникальные значения поля house из таблицы users отсортированные по возрастанию

DROP TABLE IF EXISTS users;

CREATE TABLE users (
    first_name varchar(255),
    email varchar(255),
    house varchar(255),
    birthday timestamp
);

INSERT INTO users (first_name, email, birthday, house) VALUES
  ('Sansa', 'sansa@winter.com', '1999-10-23', 'stark'),
  ('Jon', 'jon@winter.com', '1999-10-07', 'stark'),
  ('Daenerys', 'daenerys@drakaris.com', '1999-10-23', 'targarien'),
  ('Arya', 'arya@winter.com', '2003-03-29', 'stark'),
  ('Robb', 'robb@winter.com', '1999-11-23', 'stark'),
  ('Brienne', 'brienne@tarth.com', '2001-04-04', 'tart'),
  ('Tirion', 'tirion@got.com', '1975-1-11', 'lannister');
 */

//Решение. Код на SQL:

<<<SQL
SELECT DISTINCT house
FROM users
ORDER BY house ASC;
SQL;

//+-----------+
//| house     |
//+-----------+
//| lannister |
//| stark     |
//| targarien |
//| tart      |
//+-----------+
//4 rows in set (0.00 sec)



