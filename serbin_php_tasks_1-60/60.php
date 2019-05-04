<?php

/*
Задача 60
Сериализация — процесс перевода какой-либо структуры данных в последовательность битов. Обратной к операции
сериализации является операция десериализации (структуризации) — восстановление начального состояния структуры
данных из битовой последовательности.

Функция serialize в php генерирует пригодное для хранения представление переменной. Это полезно для хранения или
передачи значений PHP между скриптами без потери их типа и структуры. Для превращения сериализованной строки
обратно в PHP-значение существует функция unserialize.

src/App/Serializer.php Реализуйте функцию dump, которая принимает на вход имя файла и структуру данных. После
чего она сериализует эту структуру и записывает в файл. Реализуйте функцию load, которая принимает на вход имя
файла. После этого она читает содержимое файла и проводит десериализацию. Пример:

    Serializer\dump($file, $structure);
    $data = Serializer\load($file);

    $structure == $data;
 */

function dump($filename, $structure)
{
    //проверяем есть ли файл если до открываем. если нет создаем и открываем
    if (!is_file($filename)) {
        touch($filename);
    }

    if (empty($structure)) {
        $result = false;
    } else {
        //сериализуем объект
        $text = serialize($structure);
        //сохраняем обьект в файл
        $fd = fopen($filename, "w");
        if (!$fd) {
            throw new Exception('Невозможно открыть файл');
        }
        fwrite($fd, $text);
        fclose($fd);
        $result = true;
    }

    return $result;
}


function load($filename)
{
    //извлекаем сериализованный обьект из файла
    $fd = fopen($filename, "r");
    if (!$fd) {
        throw new Exception('Невозможно открыть файл');
    }
    $text = fread($fd, filesize($filename));
    fclose($fd);
    //восстанавливаем обьект
    $obj = unserialize($text);
    return $obj;
}


/* Тестовые запуски

$data = [
    ['name' => 'Tirion', 'friends' => [
        ['name' => 'Mira', 'gender' => 'female'],
        ['name' => 'Ramsey', 'gender' => 'male']
    ]],
    ['name' => 'Bronn', 'friends' => []],
    ['name' => 'Sam', 'friends' => [
        ['name' => 'Aria', 'gender' => 'female'],
        ['name' => 'Keit', 'gender' => 'female']
    ]],
    ['name' => 'Rob', 'friends' => [
        ['name' => 'Taywin', 'gender' => 'male']
    ]],
];

dump('files/save', $data);

$loaded_data = load('files/save');

if ($data === $loaded_data) {
    echo 'Данные извлечены успешно';
} else {
    echo 'Что то не так';
}

*/
