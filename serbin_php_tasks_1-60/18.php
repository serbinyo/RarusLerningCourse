<?php
/*
Реализуйте функцию bubbleSort, которая сортирует массив используя пузырьковую сортировку.
Постарайтесь не подглядывать в текст теории и попробуйте воспроизвести алгоритм по памяти.

<?php

use function App\Arrays\bubbleSort;

bubbleSort([]); // => []
bubbleSort([3, 10, 4, 3]); // => [3, 3, 4, 10]
 */

function bubbleSort($arr)
{
    for ($i = 0; $i < count($arr); $i++) {
        for ($j = ($i + 1); $j < count($arr); $j++) {
            if ($arr[$i] > $arr[$j]) {
                $tmp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $tmp;
            }
        }
    }
    return $arr;
}

/* Тестовые запуски

print_r(bubbleSort([])); // => []

print_r(bubbleSort([3, 10, 4, 3])); // => [3, 3, 4, 10]

print_r(bubbleSort([3, 1, 17, 12344, 23, 10, 4, 3])); // => [1, 3, 3, 4, 10, 17, 23, 12344]
*/
