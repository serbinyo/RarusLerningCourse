<?php

/*
Задача 31
Реализуйте функцию union, которая находит объединение всех переданных массивов. Функция принимает на вход от одного
массива и больше. Ключи исходных массивов не сохраняются (т.е. все значения итогового массива заново
индексируются: 0, 1, 2, ...).

<?php

union([3]); // => [3]
union([3, 2], [2, 2, 1]); // => [3, 2, 1]
union(['a', 3, false], [true, false, 3], [false, 5, 8]); // => ['a', 3, false, true, 5, 8]
 */

function union(...$arrays)
{
    $merged = [];

    foreach ($arrays as $sub) {
        $merged = array_merge($merged, $sub);
    }
    return array_values(array_unique($merged));
}

/* Тестовые запуски

print_r(union([3])); // => [3]
print_r(union([3, 2], [2, 2, 1])); // => [3, 2, 1]
print_r(union(['a', 3, false], [true, false, 3], [false, 5, 8])); // => ['a', 3, false, true, 5, 8]
*/
