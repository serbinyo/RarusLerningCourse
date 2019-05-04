<?php
declare(strict_types=1);
/*
Задача 10 Проверить является ли заданная строка шестизначным числом, записанным в
десятичной системе счисления без нулей в старших разрядах.

Пример правильных выражений:
123456
234567

Пример неправильных выражений:
1234567
12345
*/

$num1 = '123456';
$num2 = '234567';
$num3 = '1234567';
$num4 = '12345';


function regExpCheck($num)
{
    $regexp = '/^[1-9]\d{5}$/';
    return preg_match($regexp, $num);
}


function phpCheck($num)
{
    $num = (int)$num;
    return ($num > 99999 && $num < 1000000);
}


//Тестовые запуски

echo regExpCheck($num1) . PHP_EOL;   //1
echo regExpCheck($num2) . PHP_EOL;   //1
echo regExpCheck($num3) . PHP_EOL;   //0
echo regExpCheck($num4) . PHP_EOL;   //0

echo '--------------------' . PHP_EOL;

echo phpCheck($num1) . PHP_EOL;   //true
echo phpCheck($num2) . PHP_EOL;   //true
echo phpCheck($num3) . PHP_EOL;   //false
echo phpCheck($num4) . PHP_EOL;   //false
