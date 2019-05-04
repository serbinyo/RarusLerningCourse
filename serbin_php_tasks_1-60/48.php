<?php

/*
Задача 48

Напишите запрос обновляющий таблицу структуры:

CREATE TABLE users (
  id bigint PRIMARY KEY AUTO_INCREMENT,
  email varchar(255) NOT NULL,
  age integer,
  name varchar(255)
);
В структуру:

CREATE TABLE users (
  id bigint PRIMARY KEY AUTO_INCREMENT,
  email varchar(255) NOT NULL UNIQUE,
  first_name varchar(255) NOT NULL,
  created_at timestamp
);
name и first_name - одна и та же колонка.

Таблица для задачи

DROP TABLE IF EXISTS users CASCADE;
CREATE TABLE users (
  id bigint PRIMARY KEY AUTO_INCREMENT,
  email varchar(255) NOT NULL,
  age integer,
  name varchar(255)
);

INSERT INTO users (email, age, name) VALUES ('noc@mail.com', 44, 'mike');



mysql> SELECT * FROM users;
+----+--------------+------+------+
| id | email        | age  | name |
+----+--------------+------+------+
|  1 | noc@mail.com |   44 | mike |
+----+--------------+------+------+
1 row in set (0.00 sec)
*/

//Решение. Код на SQL:
//
//До:
//
//mysql> DESC users;
//+-------+--------------+------+-----+---------+----------------+
//| Field | Type         | Null | Key | Default | Extra          |
//+-------+--------------+------+-----+---------+----------------+
//| id    | bigint(20)   | NO   | PRI | NULL    | auto_increment |
//| email | varchar(255) | NO   |     | NULL    |                |
//| age   | int(11)      | YES  |     | NULL    |                |
//| name  | varchar(255) | YES  |     | NULL    |                |
//+-------+--------------+------+-----+---------+----------------+
//4 rows in set (0.00 sec)

<<<SQL
ALTER TABLE users
MODIFY COLUMN email varchar(255) NOT NULL UNIQUE,
DROP COLUMN age,
CHANGE name first_name varchar(255) NOT NULL,
ADD created_at timestamp;
SQL;


//Query OK, 0 rows affected (0.77 sec)
//Records: 0  Duplicates: 0  Warnings: 0
//
//mysql> DESC users;
//+------------+--------------+------+-----+-------------------+-----------------------------+
//| Field      | Type         | Null | Key | Default           | Extra                       |
//+------------+--------------+------+-----+-------------------+-----------------------------+
//| id         | bigint(20)   | NO   | PRI | NULL              | auto_increment              |
//| email      | varchar(255) | NO   | UNI | NULL              |                             |
//| first_name | varchar(255) | NO   |     | NULL              |                             |
//| created_at | timestamp    | NO   |     | CURRENT_TIMESTAMP | on update CURRENT_TIMESTAMP |
//+------------+--------------+------+-----+-------------------+-----------------------------+
//4 rows in set (0.00 sec)
//
//То что нужно.
