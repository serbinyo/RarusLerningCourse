<?php

/*
Задача 6

Реализуйте функцию get, которая излекает из массива элемент по указанному индексу, если индекс существует,
либо возвращает значение по умолчанию. Функция принимает на вход три аргумента:

Массив Индекс Значение по умолчанию (которое по умолчанию равно null) Пример:

<?php

use function App\Arrays\get;

$cities = ['moscow', 'london', 'berlin', 'porto'];

get($cities, 1); // => london
get($cities, 4); // => null
get($cities, 10, 'paris'); // => paris

 */

function get($arr, $index, $val = null)
{
    if (array_key_exists($index, $arr)) {
        $val = $arr[$index];
    }
    return $val;
}

/* Тестовые запуски

$cities = ['moscow', 'london', 'berlin', 'porto'];

echo get($cities, 1) . '<br>'; // => london
echo get($cities, 3) . '<br>'; // => porto
echo get($cities, 4) . '<br>'; // => null
echo get($cities, 10, 'paris') . '<br>'; // => paris
*/
