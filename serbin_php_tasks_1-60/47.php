<?php

/*
Задача 47
Напишите запрос, создающий таблицу users со следующими полями:
id — первичный автогенерируемый ключ. username — уникально и не может быть null. email — не может быть null.
created_at — не может быть null.

Напишите запрос, создающий таблицу topics со следующими полями:
id — первичный автогенерируемый ключ. user_id — внешний ключ. body — не может быть null.
created_at — не может быть null.
 */

//Решение. Код на SQL:

<<<SQL
CREATE TABLE users
(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
username VARCHAR(255) NOT NULL UNIQUE,
email VARCHAR(255) NOT NULL,
created_at TIMESTAMP NOT NULL
);
SQL;


//Query OK, 0 rows affected (0.31 sec)
//
//mysql> DESC users;
//+------------+--------------+------+-----+-------------------+-----------------------------+
//| Field      | Type         | Null | Key | Default           | Extra                       |
//+------------+--------------+------+-----+-------------------+-----------------------------+
//| id         | int(11)      | NO   | PRI | NULL              | auto_increment              |
//| username   | varchar(255) | NO   | UNI | NULL              |                             |
//| email      | varchar(255) | NO   |     | NULL              |                             |
//| created_at | timestamp    | NO   |     | CURRENT_TIMESTAMP | on update CURRENT_TIMESTAMP |
//+------------+--------------+------+-----+-------------------+-----------------------------+

<<<SQL
CREATE TABLE topics
(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
user_id INT NOT NULL,
body VARCHAR(255) NOT NULL,
created_at TIMESTAMP NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id)
);
SQL;


//Query OK, 0 rows affected (0.33 sec)
//
//mysql> DESC topics;
//+------------+--------------+------+-----+-------------------+-----------------------------+
//| Field      | Type         | Null | Key | Default           | Extra                       |
//+------------+--------------+------+-----+-------------------+-----------------------------+
//| id         | int(11)      | NO   | PRI | NULL              | auto_increment              |
//| user_id    | int(11)      | NO   | MUL | NULL              |                             |
//| body       | varchar(255) | NO   |     | NULL              |                             |
//| created_at | timestamp    | NO   |     | CURRENT_TIMESTAMP | on update CURRENT_TIMESTAMP |
//+------------+--------------+------+-----+-------------------+-----------------------------+
//4 rows in set (0.00 sec)
//
//Для выполнения этих запросов на PHP можно использовать функцию createTable из задачи 42.


