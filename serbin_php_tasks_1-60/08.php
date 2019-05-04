<?php

/*
Задача 8

Реализуйте функцию swap, которая меняет местами два элемента относительно переданного индекса.
Например, если передан индекс 5, то функция меняет местами элементы, находящиеся по индексам 4 и 6.

Параметры функции:

Массив Индекс Если хотя бы одного из индексов не существует, функция возвращает исходный массив.

<?php

use function App\Arrays\swap;

$names = ['john', 'smith', 'karl'];

$result = swap($names, 1);
print_r($result); // => ['karl', 'smith', 'john']

$result = swap($names, 2);
print_r($result); // => ['john', 'smith', 'karl']

 */

function swap($arr, $index)
{
    if (array_key_exists($index, $arr) &&
        array_key_exists($index - 1, $arr) &&
        array_key_exists($index + 1, $arr)) {
        $temp = $arr[$index - 1];
        $arr[$index - 1] = $arr[$index + 1];
        $arr[$index + 1] = $temp;
    }
    return $arr;
}

/* Тестовые запуски

$names = ['john', 'smith', 'karl'];
$result = swap($names, 1);
print_r($result); // => ['karl', 'smith', 'john']

$names = ['john', 'smith', 'karl'];
$result = swap($names, 2);
print_r($result); // => ['john', 'smith', 'karl']
*/
