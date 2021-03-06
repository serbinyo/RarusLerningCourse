<?php

/*
Задача 29
Реализуйте функцию sayPrimeOrNot, которая проверяет переданное число на простоту и печатает на экран yes или no.

<?php
sayPrimeOrNot(5); // => yes
sayPrimeOrNot(4); // => no
Подсказки Цель этой задачи — научиться отделять чистый код от кода с побочными эффектами.

Для этого выделите процесс определения того, является ли число простым, в отдельную функцию, возвращающую логическое
значение. Это функция, с помощью которой мы отделяем чистый код от кода, интерпретирующего логическое значение
(как 'yes' или 'no') и делающего побочный эффект (печать на экран).
 */

function sayPrimeOrNot($n)
{
    if (checkPrime($n)) {
        echo 'yes';
    } else {
        echo 'no';
    }

}

function checkPrime($n)
{
    $result = true;
    for ($x = 2; $x <= sqrt($n); $x++) {
        if ($n % $x == 0) {
            $result = false;
        }
    }
    return $result;
}

/* Тестовые запуски

sayPrimeOrNot(5); // => yes
sayPrimeOrNot(4); // => no
*/
