CREATE DATABASE bd2;

USE bd2;

create table employees
(
  id         int auto_increment,
  name       varchar(255) not null,
  salary     int          not null,
  manager_id int          null,
  constraint employees_pk
    primary key (id)
);

INSERT INTO `employees` (`name`, `salary`, `manager_id`)
VALUES ('Joe', 70000, 3);

INSERT INTO `employees` (`name`, `salary`, `manager_id`)
VALUES ('Henry', 80000, 4);

INSERT INTO `employees` (`name`, `salary`, `manager_id`)
VALUES ('Sam', 60000, null);

INSERT INTO `employees` (`name`, `salary`, `manager_id`)
VALUES ('Max', 90000, null);


#Напишите SQL запрос который найдет имена всех работников, которые получают больше чем их менеджеры.

SELECT e.name employee
FROM employees e
JOIN employees m
ON e.manager_id = m.id
WHERE e.salary > m.salary;

