<?php
/*
Задача 46
Создайте таблицу article_categories с двумя полями:

id - автогенерируемый первичный ключ name - текстовое поле Добавьте в эту таблицу две произвольные записи
 */

//Решение. Код на SQL:

<<<SQL
CREATE TABLE article_categories
(
id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
name VARCHAR(255)
);
SQL;

//Query OK, 0 rows affected (0.30 sec)

<<<SQL
INSERT INTO
article_categories (id, name)
VALUES
(null, 'About fishing'),
(null, 'Who is mr. Paolo Dibala?');
SQL;

//Query OK, 2 rows affected (0.05 sec)
//Records: 2  Duplicates: 0  Warnings: 0
//
//
//mysql> SELECT * FROM article_categories;
//+----+--------------------------+
//| id | name                     |
//+----+--------------------------+
//|  1 | About fishing            |
//|  2 | Who is mr. Paolo Dibala? |
//+----+--------------------------+
//2 rows in set (0.00 sec)
//
//Для выполнения этих запросов на PHP можно использовать функцию createTable из задачи 42.

