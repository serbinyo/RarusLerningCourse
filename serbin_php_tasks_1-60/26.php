<?php

/*
Задача 26
Реализуйте набор функций, для работы со словарём, построенным на хеш-таблице. Для простоты, наша реализация не
поддерживает разрешение коллизий.

make() — создаёт новый словарь set($map, $key, $value) — устанавливает в словарь значение по ключу. Работает и для
создания и для изменения. Функция возвращает true, если удалось установить значение, и false — в обратной ситуации.
Такое возможно при возникновении коллизий. get($map, $key, $default = null) — читает значение по ключу. Функции set
и get принимают первым параметром словарь и мутируют его. То есть передача идёт по ссылке.

Для полноценного погружения в тему, считаем, что массив в PHP может использоваться только как индексированный массив.

<?php

$map = Map\make();
$result = Map\get($map, 'key');
print_r($result); // => null

Map\set($map, 'key', 'value');
$result = Map\get($map, 'key', 'value');
print_r($result); // => value

Map\set($map, 'key2', 'value2');
$result = Map\get($map, 'key2');
print_r($result); // => value2

Подсказки crc32 — хеш-функция
Индекс по которому будет храниться значение во внутреннем массиве вычисляется так:
crc32($key) % 1000. То есть к ключу применяется хеш-функция и берется остаток от деления на тысячу. Это нужно для
ограничения размера массива в разумных рамках.
 */

/**
 * @return array
 */
function make()
{
    return [];
}

/**
 * @param $map
 * @param $key
 * @param $value
 *
 * @return bool
 */
function set(&$map, $key, $value)
{
    $key = crc32($key) % 1000;
    if (array_key_exists($key, $map)) {
        $result = false;
    } else {
        $map[$key] = $value;
        $result = true;
    }
    return $result;
}

/**
 * @param      $map
 * @param      $key
 * @param null $value
 *
 * @return mixed|null
 */
function get(&$map, $key, $value = null)
{
    $key = crc32($key) % 1000;
    if (array_key_exists($key, $map)) {
        $result = $map[$key];
    } else {
        $result = $value;
    }
    return $result;
}

/* Тестовые запуски

$map = make();
$result = get($map, 'key');
print_r($result); // => null

set($map, 'key', 'value');
$result = get($map, 'key', 'value');
print_r($result); // => value

set($map, 'key2', 'value2');
$result = get($map, 'key2');
print_r($result); // => value2
*/
