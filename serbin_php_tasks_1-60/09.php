<?php

/*
Реализуйте функцию calculateAverage, которая высчитывает среднее арифметическое элементов массива.

<?php

$temperatures = [37.5, 34, 39.3, 40, 38.7, 41.5];

calculateAverage($temperatures); // => 38.5

В случае пустого массива функция должна вернуть значение null (используйте в коде для этого guard expression):

<?php

$temperatures = [];

calculateAverage($temperatures); // => null

 */

function calculateAverage($numbers)
{
    if (empty($numbers)) {
        return null;
    }
    $middle = array_sum($numbers) / count($numbers);
    return $middle;
}

/* Тестовые запуски

$temperatures = [];

echo calculateAverage($temperatures) . '<br>'; // => null

$temperatures = [37.5, 34, 39.3, 40, 38.7, 41.5];

echo calculateAverage($temperatures) . '<br>'; // => 38.5
*/
