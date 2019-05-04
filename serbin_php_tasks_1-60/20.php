<?php
/*
Задача 20
Реализуйте функцию getIntersectionForSortedArray, которая принимает на вход два отсортированных массива и находит
их пересечение. Задачу реализовать двумя способами - используя штатные функции, и перебором элементов массивов

<?php

getIntersectionOfSortedArray([10, 11, 24], [10, 13, 14, 18, 24, 30]);
// => [10, 24]
Подсказки Не забудьте поставить проверку на размерность массивов. Если хотя бы один из них пустой, то пересечений нет.
 */

function getIntersectionOfSortedArray(array $array1, array $array2)
{
    return array_intersect($array1, $array2);
}


function getIntersectionOfSortedArray_selfMade(array $array1, array $array2)
{
    $result = [];
    if (empty($array1) || empty($array2)) {
        return $result;
    }

    foreach ($array1 as $val1) {
        foreach ($array2 as $val2) {
            if ($val1 === $val2) {
                $result[] = $val1;
            }
        }
    }

    return $result;
}

/* Тестовые запуски

print_r(getIntersectionOfSortedArray([10, 11, 24], [10, 13, 14, 18, 24, 30])); // => [10, 24]
print_r(getIntersectionOfSortedArray_selfMade([10, 11, 24], [10, 13, 14, 18, 24, 30])); // => [10, 24] так же
*/
