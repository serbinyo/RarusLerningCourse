<?php

/*
Задача 1 Написать регулярное выражение определяющее является ли данная
строчка строкой "abcdefdhsf^dsdsвВВo*18340" или нет.

Пример правильных выражений:
abcdefdhsf^dsdsвВВo*18340

Пример неправильных выражений:
abcdefghijklmnoasdfasdpqrstuv18340
 */

$str1 = 'abcdefdhsf^dsdsbBBo*18340';    //yes
$str2 = 'abcdefdhsfdsdsbBBo18340';      //no


function regExpCheck($str)
{
    $regexp = '/^abcdefdhsf\^dsdsbBBo\*18340$/';
    return preg_match($regexp, $str);
}


function phpCheck($str)
{
    $standard = 'abcdefdhsf^dsdsbBBo*18340';
    return $str === $standard;
}


//Тестовые запуски

echo regExpCheck($str1) . PHP_EOL; //1
echo regExpCheck($str2) . PHP_EOL; //0

echo '--------------------' . PHP_EOL;

echo phpCheck($str1) . PHP_EOL; //true
echo phpCheck($str2) . PHP_EOL; //false