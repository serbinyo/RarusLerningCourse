Сербин Александр
# Конфигуратор комплектации автомобиля. 

Текстовое описание плана решения задачи.

В ходе выполнения задачи будет реализовано приложение -  Конфигуратор комплектации автомобиля, на примере автомобиля Ford Focus.
Исходные данные будут собраны со страниц оригинального конфигуратора Ford Focus:
http://www.ford.ru/PV-BuildandPrice/NewFocus/Titanium

Исходные данные приложения будут хранится в базе данных. В качестве СУБД выбрана **mysql 5.7**. Программный код написан на языке **PHP 7.2**. 

Требования к написанию кода:
  * Код должен быть написан по стандарту PSR-1\PSR-2
  * Код должен быть задокументирован согласно стандарту phpDocumentor 

В приложении ведется логирование, введенных в формы пользовательских данных, с помощью компонента Seldaek/monolog https://github.com/Seldaek/monolog

Все запросы к базе данных из приложения выполняются с помощью компонента Doctrine/DBAL https://www.doctrine-project.org/projects/dbal.html

Компоненты устанавливаются через Composer.

Приложение будет реализовано на 7 Веб-страницах:

  1. Серия (в случае Ford Focus это Trend, Trend Plus и т.д)
  2. Тип кузова
  3. Двигатель и трансмиссия
  4. Цвет
  5. Отделка
  6. Допы (Дополнительные опции)
  7. Итоговая цена

Для навигации по страницам будет использоваться навигационная цепочка (“хлебные крошки”), при переходе пользователем назад - данные вводимые им ранее потеряны не будут. А будут подставлены в соответствующие поля формы. 

Основной контент страниц будет создаваться динамически на основании данных содержащихся в БД.

На страницах Серия, Тип кузова и Цвет - изображения с автомобилем будут динамически меняться без перезагрузки страницы (с использованием **JavaScript** + **JQuery**), в зависимости от выбранной пользователем опции.

Результирующие данные будут представленные в табличном варианте, с указанием итоговой цены и возможностью вывода в файл формата xlsx.

Структура базы данных **carconst**\
База данных будет состоять из 7 таблиц, по таблице на каждый пункт конфигурации

Таблица series - СЕРИЯ, для выбора базовых комплектаций (Trend, titanium и т.д.)

**series**\
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,\
  name VARCHAR(255) NOT NULL,\
  description TEXT NULL,\
  cost DECIMAL(10,2) NOT NULL

Таблица bodytype - тип кузова (в нашем случае - хэтчбек, универсал или седан)

**bodytype**\
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,\
  name VARCHAR(255) NOT NULL,\
  description TEXT NULL,\
  cost DECIMAL(10,2) NOT NULL

Таблица power , где будут храниться моторы на выбор

**power**\
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,\
  name VARCHAR(255) NOT NULL,\
  description TEXT NULL,\
  cost DECIMAL(10,2) NOT NULL
  
Таблица color - имеющиеся цвета и цены на них (белый - бесплатно)

**color**\
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,\
  name VARCHAR(255) NOT NULL,\
  img VARCHAR(255) NOT NULL,\
  cost DECIMAL(10,2) NOT NULL

Таблица furnish - Внутренняя отделка (Ткань, Кожа)

**furnish**\
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,\
  name VARCHAR(255) NOT NULL,\
  description TEXT NULL,\
  img VARCHAR(255) NOT NULL,\
  cost DECIMAL(10,2) NOT NULL\

Таблица dop - Дополнительные опции

**dop**
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,\
  model_id INT NOT NULL,\
  name VARCHAR(255) NOT NULL,\
  description TEXT NULL,\
  img VARCHAR(255) NOT NULL,\
  cost DECIMAL(10,2) NOT NULL

Итоговая цена будет складываться из столбца cost всех выбранных пользователем параметров, в соответствующих таблицах. И умноженная на скидку (по умолчанию 1)

Задача будет решена за 5 рабочих дней. Срок сдачи 8.03.19 до 18-00.

