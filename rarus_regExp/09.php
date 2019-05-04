<?php
/*
Задача 9 Проверить, надежно ли составлен пароль. Пароль считается надежным, если он состоит из 8 или более символов.
Где символом может быть английская буква, цифра и знак подчеркивания. Пароль должен содержать хотя бы одну заглавную
букву, одну маленькую букву и одну цифру.

Пример правильных выражений:
C00l_Pass
SupperPas1

Пример неправильных выражений:
Cool_pass
C00l
 */

$pass1 = 'C00l_Pass';
$pass2 = 'SupperPas1';
$pass3 = 'Cool_pass';
$pass4 = 'C00l ';


function regExpCheck($pass)
{
    $regexp = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,}$/';
    return preg_match($regexp, $pass);
}


//Тестовые запуски

echo regExpCheck($pass1) . PHP_EOL;   //1
echo regExpCheck($pass2) . PHP_EOL;   //1
echo regExpCheck($pass3) . PHP_EOL;   //0
echo regExpCheck($pass4) . PHP_EOL;   //0