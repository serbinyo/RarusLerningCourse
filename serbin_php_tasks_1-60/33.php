<?php

/*
Задача 33
Реализуйте анонимную функцию, которая принимает на вход строку и возвращает ее последний символ (или null если строка
пустая). Запишите созданную функцию в переменную $last.

<?php

$last(''); // => null
$last('pow'); // => w
$last('kids'); // => s
 */

$last = function ($str) {
    if (empty($str)) {
        $result = null;
    } else {
        $result = mb_substr($str, mb_strlen($str) - 1, 1);
    }
    return $result;
};

/* Тестовые запуски

echo $last(''); // => null
echo $last('pow'); // => w
echo $last('kids'); // => s
*/
