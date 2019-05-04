CREATE DATABASE bd1;

USE bd1;

create table departments
(
  id   int auto_increment,
  name varchar(255) not null,
  constraint departments_pk
    primary key (id)
);

create table employees
(
  id            int auto_increment
    primary key,
  name          varchar(255) not null,
  salary        int          not null,
  department_id int          not null,
  constraint employees_departments_id_fk
    foreign key (department_id) references departments (id)
);

INSERT INTO `departments` (`id`, `name`)
VALUES (1, 'IT');

INSERT INTO `departments` (`id`, `name`)
VALUES (2, 'Sales');

INSERT INTO `employees` (`name`, `salary`, `department_id`)
VALUES ('Joe', 70000, 1);

INSERT INTO `employees` (`name`, `salary`, `department_id`)
VALUES ('Henry', 80000, 2);

INSERT INTO `employees` (`name`, `salary`, `department_id`)
VALUES ('Sem', 60000, 2);

INSERT INTO `employees` (`name`, `salary`, `department_id`)
VALUES ('Max', 90000, 1);

# Напишите SQL запрос который найдет самые большие зарплаты для каждого департамента.

SELECT d.name, max(e.salary) AS salary
FROM departments d
       JOIN employees e ON d.id = e.department_id
GROUP BY e.department_id;
