<?php

/*
Задача 11

Реализуйте функцию findIndex, которая возвращает первый встретившийся индекс переданного элемента в случае,
если элемент присутствует в массиве, и -1 в случае, если он отсутствует.

Параметры функции:

Массив Элемент

<?php

$temperatures = [37.5, 34, 39.3, 40, 38.7, 41.5, 40];

findIndex($temperatures, 34); // => 1
findIndex($temperatures, 40); // => 3
findIndex($temperatures, 3);  // => -1
 */

function findIndex($array, $val)
{
    $key = array_search($val, $array, true);

    if ($key) {
        return $key;
    }

    return -1;
}

/* Тестовые запуски

$temperatures = [37.5, 34, 39.3, 40, 38.7, 41.5, 40];

echo findIndex($temperatures, 34) . '<br>'; // => 1
echo findIndex($temperatures, 40) . '<br>'; // => 3
echo findIndex($temperatures, 3) . '<br>';  // => -1
*/
