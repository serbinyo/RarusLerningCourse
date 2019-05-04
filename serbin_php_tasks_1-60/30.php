<?php

/*
Задача 30
Реализуйте функцию average, которая возвращает среднее арифметическое всех переданных аргументов. Если функции не
передать ни одного аргумента, то она должна вернуть null.

<?php

average(0); // => 0
average(0, 10); // => 5
average(-3, 4, 2, 10); // => 3.25
average(); // => null
 */

function average(...$numbers)
{
    if (empty($numbers)) {
        return null;
    }
    return array_sum($numbers) / count($numbers);
}

/* Тестовые запуски

print_r(average(0)); // => 0
print_r(average(0, 10)); // => 5
print_r(average(-3, 4, 2, 10)); // => 3.25
print_r(average()); // => null
*/
