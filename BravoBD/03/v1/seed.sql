#Заполнение таблиц тестовыми данными

INSERT INTO `bravobd3`.`client` (`id`, `login`, `email`, `first_name`, `middle_name`, `lastname`) VALUES ('1', 'rocket', 'firstrocket@oftheworld.com', 'Роджер', '', 'Федерер');
INSERT INTO `bravobd3`.`client` (`id`, `login`, `email`, `first_name`, `middle_name`, `lastname`) VALUES ('2', 'ice', 'ovechkin@ya.ru', 'Александр', 'Михайлович', 'Овечкин');

INSERT INTO `bravobd3`.`сontactbase` (`id`, `client_id`, `name`) VALUES ('1', '1', 'Notebook');
INSERT INTO `bravobd3`.`сontactbase` (`id`, `client_id`, `name`) VALUES ('2', '2', 'Мои контакты');
INSERT INTO `bravobd3`.`сontactbase` (`id`, `client_id`, `name`) VALUES ('3', '2', 'Контакты США');

INSERT INTO `bravobd3`.`contact` (`сontactbase_id`, `first_name`, `middle_name`, `lastname`, `tel`, `sending_counter`) VALUES ('2', 'Артем', 'Сергеевич', 'Дзюба', '79780000000', '81');
INSERT INTO `bravobd3`.`contact` (`сontactbase_id`, `first_name`, `middle_name`, `lastname`, `tel`, `sending_counter`) VALUES ('2', 'Андрей', 'Николаевич', 'Шевченко', '79780000001', '16');
INSERT INTO `bravobd3`.`contact` (`сontactbase_id`, `first_name`, `middle_name`, `lastname`, `tel`, `sending_counter`) VALUES ('2', 'Роман', 'Сергеевич', 'Зобнин', '79780000002', '22');
INSERT INTO `bravobd3`.`contact` (`сontactbase_id`, `first_name`, `lastname`, `tel`, `sending_counter`) VALUES ('1', 'Рафа', 'Надаль', '79780000003', '68');
INSERT INTO `bravobd3`.`contact` (`сontactbase_id`, `first_name`, `lastname`, `tel`, `sending_counter`) VALUES ('1', 'Александр', 'Зверев', '79780000004', '6');
INSERT INTO `bravobd3`.`contact` (`сontactbase_id`, `first_name`, `lastname`, `tel`, `sending_counter`) VALUES ('3', 'Тьери', 'Анри', '79780000005', '17');
INSERT INTO `bravobd3`.`contact` (`сontactbase_id`, `first_name`, `middle_name`, `lastname`, `tel`, `sending_counter`) VALUES ('2', 'Иван', 'Алексеевич', 'Телегин', '79780000006', '103');
INSERT INTO `bravobd3`.`contact` (`сontactbase_id`, `first_name`, `lastname`, `tel`, `sending_counter`) VALUES ('1', 'Новак', 'Джокович', '79780000007', '84');
INSERT INTO `bravobd3`.`contact` (`сontactbase_id`, `first_name`, `middle_name`, `lastname`, `tel`, `sending_counter`) VALUES ('2', 'Федор', 'Васильевич', 'Кудряшов', '79780000008', '11');
INSERT INTO `bravobd3`.`contact` (`сontactbase_id`, `first_name`, `middle_name`, `lastname`, `tel`, `sending_counter`) VALUES ('3', 'Кирилл', 'Олегович', 'Капризов', '79780000009', '54');
INSERT INTO `bravobd3`.`contact` (`сontactbase_id`, `first_name`, `middle_name`, `lastname`, `tel`, `sending_counter`) VALUES ('2', 'Илья', 'Валерьевич', 'Ковальчук', '79780000010', '21');
INSERT INTO `bravobd3`.`contact` (`сontactbase_id`, `first_name`, `middle_name`, `lastname`, `tel`, `sending_counter`) VALUES ('3', 'Майк', 'Железный', 'Тайсон', '79780000011', '12');
INSERT INTO `bravobd3`.`contact` (`сontactbase_id`, `first_name`, `lastname`, `tel`, `sending_counter`) VALUES ('3', 'Эвандер', 'Холифилд', '79780000012', '3');
INSERT INTO `bravobd3`.`contact` (`сontactbase_id`, `first_name`, `middle_name`, `lastname`, `tel`, `sending_counter`) VALUES ('2', 'Андрей', 'Николаевич', 'Ярмоленко', '79780000013', '67');
INSERT INTO `bravobd3`.`contact` (`сontactbase_id`, `first_name`, `middle_name`, `lastname`, `tel`, `sending_counter`) VALUES ('2', 'Александр', 'Александрович', 'Усик', '79780000014', '55');
INSERT INTO `bravobd3`.`contact` (`сontactbase_id`, `first_name`, `middle_name`, `lastname`, `tel`, `sending_counter`) VALUES ('2', 'Владислав', 'Александрович', 'Третьяк', '79780000015', '41');
INSERT INTO `bravobd3`.`contact` (`сontactbase_id`, `first_name`, `middle_name`, `lastname`, `tel`, `sending_counter`) VALUES ('2', 'Роман', 'Михайлович', 'Дмитриев', '79780000016', '15');
INSERT INTO `bravobd3`.`contact` (`сontactbase_id`, `first_name`, `middle_name`, `lastname`, `tel`, `sending_counter`) VALUES ('2', 'Михаил', 'Олегович', 'Овечкин', '79780000017', '509');
INSERT INTO `bravobd3`.`contact` (`сontactbase_id`, `first_name`, `middle_name`, `lastname`, `tel`, `sending_counter`) VALUES ('2', 'Давид', 'Адамович', 'Ригерт', '79780000018', '31');
INSERT INTO `bravobd3`.`contact` (`сontactbase_id`, `first_name`, `middle_name`, `lastname`, `tel`, `sending_counter`) VALUES ('2', 'Юрий', 'Петрович', 'Власов', '79780000019', '16');

INSERT INTO `bravobd3`.`group` (`id`, `name`) VALUES ('1', 'Часто используемые');
INSERT INTO `bravobd3`.`group` (`id`, `name`) VALUES ('2', 'Друзья');
INSERT INTO `bravobd3`.`group` (`id`, `name`) VALUES ('3', 'Коллеги');
INSERT INTO `bravobd3`.`group` (`id`, `name`) VALUES ('4', 'Семья');

INSERT INTO `bravobd3`.`contact_group` (`contact_id`, `group_id`) VALUES ('1', '4');
INSERT INTO `bravobd3`.`contact_group` (`contact_id`, `group_id`) VALUES ('2', '2');
INSERT INTO `bravobd3`.`contact_group` (`contact_id`, `group_id`) VALUES ('4', '2');
INSERT INTO `bravobd3`.`contact_group` (`contact_id`, `group_id`) VALUES ('6', '2');
INSERT INTO `bravobd3`.`contact_group` (`contact_id`, `group_id`) VALUES ('7', '2');
INSERT INTO `bravobd3`.`contact_group` (`contact_id`, `group_id`) VALUES ('8', '2');
INSERT INTO `bravobd3`.`contact_group` (`contact_id`, `group_id`) VALUES ('9', '2');
INSERT INTO `bravobd3`.`contact_group` (`contact_id`, `group_id`) VALUES ('12', '2');
INSERT INTO `bravobd3`.`contact_group` (`contact_id`, `group_id`) VALUES ('18', '2');
INSERT INTO `bravobd3`.`contact_group` (`contact_id`, `group_id`) VALUES ('3', '3');
INSERT INTO `bravobd3`.`contact_group` (`contact_id`, `group_id`) VALUES ('5', '3');
INSERT INTO `bravobd3`.`contact_group` (`contact_id`, `group_id`) VALUES ('9', '3');
INSERT INTO `bravobd3`.`contact_group` (`contact_id`, `group_id`) VALUES ('11', '3');
INSERT INTO `bravobd3`.`contact_group` (`contact_id`, `group_id`) VALUES ('18', '3');
INSERT INTO `bravobd3`.`contact_group` (`contact_id`, `group_id`) VALUES ('3', '4');
INSERT INTO `bravobd3`.`contact_group` (`contact_id`, `group_id`) VALUES ('4', '4');
INSERT INTO `bravobd3`.`contact_group` (`contact_id`, `group_id`) VALUES ('9', '4');
INSERT INTO `bravobd3`.`contact_group` (`contact_id`, `group_id`) VALUES ('10', '4');
INSERT INTO `bravobd3`.`contact_group` (`contact_id`, `group_id`) VALUES ('15', '4');
INSERT INTO `bravobd3`.`contact_group` (`contact_id`, `group_id`) VALUES ('18', '4');