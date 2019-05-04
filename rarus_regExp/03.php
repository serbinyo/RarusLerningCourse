<?php

/*
Задача 3 Написать регулярное выражение определяющее является ли заданная строка правильным MAC-адресом.

Пример правильных выражений:
01:32:54:67:89:AB
aE:dC:cA:56:76:54

Пример неправильных выражений:
01:33:47:65:89:ab:cd
01:23:45:67:89:Az
 */

$mac1 = '01:32:54:67:89:AB';        //yes
$mac2 = 'aE:dC:cA:56:76:54';        //yes
$mac3 = '01:33:47:65:89:ab:cd';     //no
$mac4 = '01:23:45:67:89:Az';        //no

function regExpCheck($mac)
{
    $regexp = '/^([0-9a-fA-F]{2}\:){5}([0-9a-fA-F]{2})$/';
    return preg_match($regexp, $mac);
}

function phpCheck($mac)
{
    return (filter_var($mac, FILTER_VALIDATE_MAC) !== false);
}


//Тестовые запуски

echo regExpCheck($mac1) . PHP_EOL; //1
echo regExpCheck($mac2) . PHP_EOL; //1
echo regExpCheck($mac3) . PHP_EOL; //0
echo regExpCheck($mac4) . PHP_EOL; //0

echo '--------------------' . PHP_EOL;

echo phpCheck($mac1) . PHP_EOL; //true
echo phpCheck($mac2) . PHP_EOL; //true
echo phpCheck($mac3) . PHP_EOL; //false
echo phpCheck($mac4) . PHP_EOL; //false