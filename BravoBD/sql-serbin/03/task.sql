#Предварительный анализ таблиц:

EXPLAIN SELECT *
        FROM bd3.user;
/*
id  select_type     table   partitions  type    possible_keys   key     key_len     ref     rows    filtered    Extra
1	SIMPLE	        user    NULL		ALL		NULL			NULL    NULL        NULL    2000	100.00      NULL

В таблице 2000 пользователей
*/


EXPLAIN SELECT *
        FROM bd3.`group`;
/*
id  select_type     table   partitions  type    possible_keys   key     key_len     ref     rows    filtered    Extra
1	SIMPLE	        group   NULL		ALL		NULL            NULL    NULL        NULL	6000	100.00	    NULL

6000 пользовательских групп
*/


EXPLAIN SELECT *
        FROM bd3.contact;
/*
id  select_type   table    partitions   type    possible_keys   key     key_len     ref     rows       filtered    Extra
1	SIMPLE	      contact  NULL		    ALL		NULL            NULL    NULL        NULL	9740299	   100.00	    NULL

9 740 299 пользовательских контактов
*/


EXPLAIN SELECT *
        FROM bd3.contact_group;
/*
id  select_type   table          partitions     type    possible_keys       key                                 key_len     ref     rows            filtered    Extra
1	SIMPLE	      contact_group  NULL		    ALL     NULL                fk_contact_has_group_group1_idx     NULL        NULL	39935567	    100.00      Using index

39 935 567 контактов в группах
*/


EXPLAIN SELECT *
        FROM bd3.distributionСhannel;
/*
id  select_type   table                 partitions      type    possible_keys   key     key_len     ref     rows   filtered    Extra
1	SIMPLE	      distributionСhannel   NULL		    ALL		NULL            NULL    NULL        NULL	3	   100.00	   NULL

3 канала рассылки
*/


EXPLAIN SELECT *
        FROM bd3.contact_distributionСhannel;
/*
id  select_type   table                         partitions      type    possible_keys   key     key_len     ref     rows       filtered    Extra
1	SIMPLE	      contact_distributionChannel   NULL		    ALL		NULL            NULL    NULL        NULL	2991661	   100.00	   NULL

2 991 661 пользователей с каналами рассылок


Всего 52 675 530 записей.
*/

#######Запросы из задания:

#Добавление/удаление/изменение контакта.
INSERT INTO `bd3`.`contact` (`user_id`, `first_name`, `middle_name`, `last_name`, `email`, `tel`, `sending_counter`)
VALUES ('2', 'Александр', 'Александрович', 'Карелин', 'karelin@mail.ru', '97770000020', '0');
# [2019-04-01 22:57:19] 1 row affected in 134 ms

UPDATE `bd3`.`contact`
SET `tel`='79780000020'
WHERE `tel` = '97770000020';
# [2019-04-01 22:57:35] 1 row affected in 11 s 897 ms

DELETE
FROM `bd3`.`contact`
WHERE `tel` = '97770000020';
# [2019-04-01 22:57:52] completed in 22 ms


#Добавление/удаление/изменение контакта в группу.
INSERT INTO `bd3`.`contact_group` (`contact_id`, `group_id`)
VALUES ('10000002', '1');
# [2019-04-01 23:00:51] 1 row affected in 97 ms

UPDATE `bd3`.`contact_group`
SET `group_id`='2'
WHERE `contact_id` = '10000002'
  AND `group_id` = '1';
# [2019-04-01 23:01:46] 1 row affected in 5 ms

DELETE
FROM `bd3`.`contact_group`
WHERE `contact_id` = '10000002'
  AND `group_id` = '1';
# [2019-04-01 23:02:27] 1 row affected in 174 ms


#Вывод групп с подсчетом количества контактов.
SELECT g.name, count(cg.contact_id) as contacs
FROM `bd3`.`group` g
         JOIN `bd3`.`contact_group` cg
              ON cg.group_id = g.id
GROUP BY cg.group_id;
/*
main	    10 000 000
my_group	10 000 001
business	10 000 000
family	    10 000 000
[2019-04-01 23:03:08] 4 rows retrieved starting from 1 in 20 s 889 ms (execution: 20 s 846 ms, fetching: 43 ms)
*/


#Вывод группы “Часто используемые”, где выводятся топ10 контактов, на которые рассылают сообщения.
SELECT c.*
FROM contact c
WHERE c.user_id = '13'
ORDER BY sending_counter DESC
LIMIT 10;
/*
id      user_id first_name      middle_name     last_name       email                   tel             sending_counter
6767607	13	    fname6767607	mname6767607	surname6767607	fname6767607@gmail.com	79786767607	    9996
9656941	13	    fname9656941	mname9656941	surname9656941	fname9656941@gmail.com	79789656941	    9995
8033992	13	    fname8033992	mname8033992	surname8033992	fname8033992@gmail.com	79788033992	    9994
7268351	13	    fname7268351	mname7268351	surname7268351	fname7268351@gmail.com	79787268351	    9994
4458565	13	    fname4458565	mname4458565	surname4458565	fname4458565@gmail.com	79784458565	    9993
3464118	13	    fname3464118	mname3464118	surname3464118	fname3464118@gmail.com	79783464118	    9993
193662	13	    fname193662	    mname193662	    surname193662	fname193662@gmail.com	79780193662	    9992
4205949	13	    fname4205949	mname4205949	surname4205949	fname4205949@gmail.com	79784205949	    9991
1428181	13	    fname1428181	mname1428181	surname1428181	fname1428181@gmail.com	79781428181	    9991
5641674	13	    fname5641674	mname5641674	surname5641674	fname5641674@gmail.com	79785641674	    9987

[2019-04-01 23:06:26] 10 rows retrieved starting from 1 in 416 ms (execution: 375 ms, fetching: 41 ms)
*/


#Поиск контактов по ФИО/номеру.
SELECT *
FROM `contact`
WHERE last_name = 'surname12'
  AND first_name = 'fname12'
  AND middle_name = 'mname12';

/*
id      user_id first_name  middle_name     last_name       email                   tel             sending_counter
12	    792	    fname12	    mname12	        surname12	    fname12@gmail.com	    79780000012	    7255

[2019-04-01 23:09:49] 1 row retrieved starting from 1 in 5 s 388 ms (execution: 5 s 358 ms, fetching: 30 ms)
*/

SELECT *
FROM `contact`
WHERE tel = '79780000013';
/*
id      user_id first_name  middle_name     last_name       email                   tel             sending_counter
13	    272	    fname13	    mname13	        surname13	    fname13@gmail.com	    79780000013	    2830

[2019-04-01 23:11:51] 1 row retrieved starting from 1 in 5 s 326 ms (execution: 5 s 301 ms, fetching: 25 ms)
*/


#Выборка контактов по группе.
/*
Пользователь с ID=123 хочет посмотреть все контакты из группы main (Группа
по умолчанию, все контакты пользователей при создании попадают в эту группу).
*/
SELECT c.*
FROM `contact` c
         JOIN `contact_group` cg
              ON c.id = cg.contact_id
         JOIN `group` g
              ON cg.group_id = g.id
WHERE g.id = '1'
  AND c.user_id = '123';
# 9955 row(s) returned 0.010 sec


####### Анализ частых запросов и их оптимизация


/* 1.
Из наиболее частых запросов выделим поиск по ФИО. Анализ запроса:
*/
EXPLAIN SELECT *
        FROM `contact`
        WHERE last_name = 'surname12'
          AND first_name = 'fname12'
          AND middle_name = 'mname12';

/*
id  select_type     table       type        key             key_len     rows        filtered    Extra
__________________________________________________________________________________________________________
1	SIMPLE	        contact		ALL			NULL		    NULL        9302351	    0.1	        Using where

1 row(s) returned 7.496 sec

Колонка rows показывает число записей, которые пришлось прочитать базе данных для выполнения этого запроса
(в таблице всего 9302351 записей). Видим что без индекса, MySQL приходиться читать все записи.

Добавим индекс по столбцу last_name:
 */
CREATE INDEX last_name ON contact (last_name);
# [2019-04-02 11:40:20] completed in 2 m 51 s 317 ms

/*
И снова проанализируем запрос при помощи EXPLAIN
id  select_type     table       type    possible_keys   key         key_len     ref     rows    filtered    Extra
__________________________________________________________________________________________________________
1	SIMPLE	        contact		ref	    last_name	    last_name	182	        const	1	    5	        Using where

1 row(s) returned	0.00074 sec

Видим, что при использовании индекса по столбцу last_name прочитана только 1 запись.
Время выполнения запроса снизилось с 7.496 sec до 0.00074 sec
*/


/* 2.
Также, допустим, нам необходимо вычислять ТОП 10 "Часто используемых" контактов,
не для конкретного клиента, а для всех зарегистрированных контактов, например
для статистики. И делать это приходиться часто. (Пример учебный, использован,
как наиболее наглядная демонстрация выгоды от индекса)
Анализ запроса:
 */
EXPLAIN SELECT *
        FROM contact
        ORDER BY sending_counter DESC
        LIMIT 10;

/*
id  select_type     table       type        key             key_len     rows        filtered    Extra
__________________________________________________________________________________________________________
1	SIMPLE	        contact		ALL		    NULL	        NULL	    9302351     100         Using filesort

10 row(s) returned	5.515 sec

Добавим индекс по столбцу sending_counter:
 */

CREATE INDEX sending_counter ON contact (sending_counter);
# [2019-04-02 11:17:47] completed in 1 m 8 s 806 ms

/*
И снова проанализируем запрос при помощи EXPLAIN

id  select_type     table       type        key                 key_len     rows    filtered    Extra
__________________________________________________________________________________________________________
1	SIMPLE	        contact		index		sending_counter	    5		    10	    100	        NULL

10 row(s) returned	0.0011 sec.

Видим, что при использовании индекса по столбцу sending_counter прочитано всего 10
записей, кроме того в столбце Extra видно что мы больше не "выпали" на диск. Выполнения
запроса снизилось с 5.515 до 0.0011 sec.
 */
