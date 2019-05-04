<?php

/*
Задача 41
Реализуйте функцию getDifference, которая принимает на вход два массива, а возвращает массив, составленный из
элементов первого, которых нет во втором.

Эту задачу можно решить с помощью функции array_diff, но подразумевается что вы сделаете это без ее использования.

<?php

getDifference([2, 1], [2, 3]);
// → [1]
 */

function getDifference(array $array1, array $array2)
{
    // по условию сказано не использовать array_diff();

    $outer = [];

    foreach ($array1 as $value1) {
        foreach ($array2 as $value2) {
            // если значения есть в обоих массивах возвращаемся на верхний цикл в следующую итерацию
            if ($value1 === $value2) {
                continue 2;
            }
        }
        $outer[] = $value1;
    }
    return $outer;
}

/* Тестовые запуски

print_r(getDifference([2, 1], [2, 3])); // [0] => 1
 */
