<?php
declare(strict_types=1);

/*
Задача 12

Реализуйте функцию getSameParity, которая принимает на вход массив чисел и возвращает новый, состоящий из элементов,
у которых такая же чётность, как и у первого элемента входного массива.

Примеры

<?php

getSameParity([]);        // => []
getSameParity([1, 2, 3]); // => [1, 3]
getSameParity([1, 2, 8]); // => [1]
getSameParity([2, 2, 8]); // => [2, 2, 8]

Подсказки Проверка чётности - остаток от деления: $item % 2 == 0 — чётное число Если на вход функции передан пустой
массив, то она должна вернуть пустой массив. Проверить массив на пустоту можно с помощью функции empty
 */

/**
 * getSameParity
 *
 * Функция возвращает массив состоящий из элементов, у которых
 * такая же чётность, как и у первого элемента входного массива.
 *
 * @param array $array
 *
 * @return array
 */
function getSameParity(array $array)
{
    $result = [];

    if (empty($array)) {
        return $result;
    }

    $first_is_odd = ($array[0] % 2 === 0);

    foreach ($array as $value) {
        if ($first_is_odd) {
            if ($value % 2 === 0) {
                $result[] = $value;
            }
        } elseif ($value % 2 !== 0) {
            $result[] = $value;
        }
    }
    return $result;
}
