/*
Первая часть файла вопросы из задания,
ниже, во второй части анализ частых запросов и их оптимизация
 */

#######Запросы из задания:

#Добавление/удаление/изменение контакта.
INSERT INTO `bravobd3`.`contact` (`contactbase_id`, `first_name`, `middle_name`, `lastname`, `tel`, `sending_counter`)
VALUES ('2', 'Александр', 'Александрович', 'Карелин', '97770000020', '0');

UPDATE `bravobd3`.`contact`
SET `tel`='79780000020'
WHERE `tel` = '97770000020';

DELETE
FROM `bravobd3`.`contact`
WHERE `id` = '97770000020';


#Добавление/удаление/изменение контакта в группу.
INSERT INTO `bravobd3`.`contact_group` (`contact_id`, `group_id`)
VALUES ('13', '2');

UPDATE `bravobd3`.`contact_group`
SET `group_id`='3'
WHERE `contact_id` = '13'
  AND `group_id` = '2';

DELETE
FROM `bravobd3`.`contact_group`
WHERE `contact_id` = '13'
  and `group_id` = '3';


#Вывод групп с подсчетом количества контактов.
SELECT g.name, count(cg.contact_id) as contacs
FROM `bravobd3`.`group` g
         JOIN `bravobd3`.`contact_group` cg
              ON cg.group_id = g.id
GROUP BY cg.group_id;


#Вывод группы “Часто используемые”, где выводятся топ10 контактов, на которые рассылают сообщения.
SELECT c.*
FROM contact c
         JOIN contactbase cb on c.contactbase_id = cb.id
         JOIN client cl on cb.client_id = cl.id
WHERE cl.id = '13'
ORDER BY sending_counter DESC
LIMIT 10;

#Поиск контактов по ФИО/номеру.
SELECT *
FROM `contact`
WHERE lastname = 'surname12'
  AND first_name = 'fname12'
  AND middle_name = 'mname12';

SELECT *
FROM `contact`
WHERE tel = '79780000012';


#Выборка контактов по группе.
SELECT c.*
FROM `bravobd3`.`contact` c
         JOIN `bravobd3`.`contact_group` cg
              ON c.id = cg.contact_id
         JOIN `bravobd3`.`group` g
              ON cg.group_id = g.id
WHERE g.name = 'group13';


####### Анализ частых запросов и их оптимизация

/*
Допустим, нам необходимо вычислять ТОП 10 "Часто используемых" контактов,
не для конкретного клиента, а для всех зарегистрированных контактов, например
для рейтинга. И делать это приходиться часто.
Анализ запроса:
 */
EXPLAIN SELECT *
        FROM contact
        ORDER BY sending_counter DESC
        LIMIT 10;

/*
id  select_type     table       type        key             key_len     rows    filtered    Extra
__________________________________________________________________________________________________________
1	SIMPLE	        contact		ALL		    NULL	        NULL	    9793    100         Using filesort

Колонка rows показывает число записей, которые пришлось прочитать базе данных для выполнения этого запроса
(в таблице всего 9793 записей). Видим что без индекса, MySQL приходиться читать все записи.

Добавим индекс по столбцу sending_counter:
 */

CREATE INDEX sending_counter ON contact (sending_counter);

/*
И снова проанализируем запрос при помощи EXPLAIN

id  select_type     table       type        key                 key_len     rows    filtered    Extra
__________________________________________________________________________________________________________
1	SIMPLE	        contact		index		sending_counter	    138		    10	    100         NULL


Видим, что при использовании индекса по столбцу sending_counter прочитана всего одна запись,
кроме того в столбце Extra видно что мы больше не "выпали" на диск.

Поскольку таблица contact имеет 10000 записей, применение индекса в ней оправдано.
Остальные таблицы БД намного меньше и применение индекса к ним пока не нужно.
 */

####### Доработка системы для многоканальной рассылки
/*
Для хранения списка каналов (WhatsApp, Viber и Telegram) создаем дополнительную
таблицу в БД, что позволит в дальнейшем добавлять записи о новых каналах.
email пользователя, как и телефон будем хранить в таблице contacts.

Контакты и Каналы имеют между собой отношение Многие-ко-Многим. Разобьем его
введением промежуточной таблицы Контакт_Канал. (код в create.sql)
*/

####### Запросы для самопроверки:

#Выбрать пользователей для рассылки по WhatsUp:

