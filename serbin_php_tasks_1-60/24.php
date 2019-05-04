<?php

/*
Задача 24
Реализуйте функцию genDiff, которая возвращает ассоциативный массив, в котором каждому ключу из исходных массивов
соответствует одно из четырёх значений: added, deleted, changed или unchanged. Аргументы:

Ассоциативный массив Ассоциативный массив Расшифровка:

added — ключ отсутствовал в первом массиве, но был добавлен во второй
deleted — ключ был в первом массиве, но отсутствует во втором
changed — ключ присутствовал и в первом и во втором массиве, но значения отличаются
unchanged — ключ присутствовал и в первом и во втором массиве с одинаковыми значениями
<?php

use function App\Arrays\genDiff;

$result = genDiff(
    ['one' => 'eon', 'two' => 'two', 'four' => true],
    ['two' => 'own', 'zero' => 4, 'four' => true]
);
// => [
//     'one' => 'deleted',
//     'two' => 'changed'
//     'zero' => 'added',
//     'four' => 'unchanged',
// ];
 */

function genDiff($array, $diff_array)
{
    $result = [];
    foreach ($array as $key => $value) {
        if (array_key_exists($key, $diff_array)) {
            if ($array[$key] === $diff_array[$key]) {
                $result[$key] = 'unchanged';
            } else {
                $result[$key] = 'changed';
            }
        } else {
            $result[$key] = 'deleted';
        }
    }
    foreach ($diff_array as $key => $value) {
        if (!array_key_exists($key, $array)) {
            $result[$key] = 'added';
        }
    }
    return $result;
}

/* Тестовые запуски

print_r(genDiff(
    ['one' => 'eon', 'two' => 'two', 'four' => true],
    ['two' => 'own', 'zero' => 4, 'four' => true]
)); //=> Array
    //(
    //    [one] => deleted
    //    [two] => changed
    //    [four] => unchanged
    //    [zero] => added
    //)
*/

