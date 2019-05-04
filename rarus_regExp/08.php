<?php

/*
Задача 8 Составить регулярное выражение, является ли заданная строка IP адресом, записанным в десятичном виде

Пример правильных выражений:
127.0.0.1
255.255.255.0
192.168.0.1

Пример неправильных выражений:
1300.6.7.8
abc.def.gha.bcd
254.hzf.bar.10
 */

$ip1 = '127.0.0.1';
$ip2 = '255.255.255.0';
$ip3 = '192.168.0.1';
$ip4 = '1300.6.7.8';
$ip5 = 'abc.def.gha.bcd';
$ip6 = '254.hzf.bar.10';


function regExpCheck($ip)
{
    $regexp = '/^([01]?\d\d?|2[0-4]\d|25[0-5])\.([01]?\d\d?|2[0-4]\d|25[0-5])'
        . '\.([01]?\d\d?|2[0-4]\d|25[0-5])\.([01]?\d\d?|2[0-4]\d|25[0-5])$/';
    return preg_match($regexp, $ip);
}


function phpCheck($ip)
{
    return (filter_var($ip, FILTER_VALIDATE_IP) !== false);
}


//Тестовые запуски

echo regExpCheck($ip1) . PHP_EOL;   //1
echo regExpCheck($ip2) . PHP_EOL;   //1
echo regExpCheck($ip3) . PHP_EOL;   //1
echo regExpCheck($ip4) . PHP_EOL;   //0
echo regExpCheck($ip5) . PHP_EOL;   //0
echo regExpCheck($ip6) . PHP_EOL;   //0

echo '--------------------' . PHP_EOL;

echo phpCheck($ip1) . PHP_EOL; //true
echo phpCheck($ip2) . PHP_EOL; //true
echo phpCheck($ip3) . PHP_EOL; //true
echo phpCheck($ip4) . PHP_EOL; //false
echo phpCheck($ip5) . PHP_EOL; //false
echo phpCheck($ip6) . PHP_EOL; //false