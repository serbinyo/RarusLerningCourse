<?php

/*
Написать функцию, решающую квадратичное уравнение через дискриминант

 */

//функция для решения квадратных уравнений вида :
// a*x*x + b*x + c = 0
function quadratic_equation($a, $b, $c)
{
    if ($a === 0) {
        $a = 1;
    }
    $D = ($b * $b) - 4 * ($a * $c);
    if ($D > 0) {
        $result['x1'] = (($b * -1) - sqrt($D)) / (2 * $a);
        $result['x2'] = (($b * -1) + sqrt($D)) / (2 * $a);
    } elseif ($D === 0) {
        $result['x1'] = (($b * -1) / (2 * $a));
    } elseif ($D < 0) {
        $result[] = 'решений нет';
    }
    return $result;
}

/* Тестовые запуски

$result = quadratic_equation(1, 3, -4);
print_r($result);   //Array ( [x1] => -4 [x2] => 1 )

$result = quadratic_equation(1, -6, 9);
print_r($result);   //Array ( [x1] => 3 )

$result = quadratic_equation(-6, -5, -1);
print_r($result);   //Array ( [x1] => -0.33333333333333 [x2] => -0.5 )

$result = quadratic_equation(5, 3, 7);
print_r($result);   // Array ( [0] => решений нет
*/
