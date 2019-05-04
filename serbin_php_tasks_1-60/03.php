<?php

/*
Задача 3

Реализуйте функцию reverse, которая переворачивает цифры в переданном числе:


use function Number\reverse;

reverse(13); // 31
reverse(-123); // -321

Не забудьте задать тип входного и выходного аргумента.
 */

function reverse(int $num): int
{
    $negative = ($num < 0) ? true : false;

    $str = (string)$num;
    $reverse = strrev($str);

    if ($negative) {
        $reverse = '-' . $reverse;
    }

    return (int)$reverse;

}

/* Тестовые запуски

echo reverse(13) . '<br>'; // 31
echo reverse(-123) . '<br>'; // -321
echo reverse(-719) . '<br>'; // -917
echo reverse(123456789) . '<br>'; // 987654321
*/
