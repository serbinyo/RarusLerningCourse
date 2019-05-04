<?php
/*
Реализуйте функцию getSameCount, которая считает количество общих уникальных элементов для двух массивов. Аргументы:

Первый массив Второй массив

<?php

getSameCount([], []); // => 0
getSameCount([1, 10, 3], [10, 100, 35, 1]); // => 2
getSameCount([1, 3, 2, 2], [3, 1, 1, 2]); // => 3
 */

function getSameCount(array $arr1, array $arr2)
{
    $intersect_array = array_intersect($arr1, $arr2);
    $result_array = array_unique($intersect_array);
    return count($result_array);
}

/* Тестовые запуски

echo getSameCount([], []); // => 0
echo getSameCount([1, 10, 3], [10, 100, 35, 1]); // => 2
echo getSameCount([1, 3, 2, 2], [3, 1, 1, 2]); // => 3
*/
