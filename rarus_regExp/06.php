<?php

/*
Задача 6 Написать регулярное выражение определяющее является ли данная строчка датой в формате
dd/mm/yyyy. Начиная с 1600 года до 9999 года

Пример правильных выражений:
29/02/2000
30/04/2003
01/01/2003

Пример неправильных выражений:
29/02/2001
30-04-2003
1/1/1899
 */

$date1 = '29/02/2000';      //yes
$date2 = '30/04/2003';      //yes
$date3 = '01/01/2003';      //yes
$date4 = '29/02/2001';      //no
$date5 = '30-04-2003';      //no
$date6 = '1/1/1899';        //no


function regExpCheck($date)
{
    $regexp = '/(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))'
        . '|((29|30)[\/](0[4,6,9]|11)))[\/](1[6-9]|[2-9][0-9])\d\d$)|(^29[\/]02[\/](1[6-9]|[2-9][0-9])'
        . '(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)/';
    return preg_match($regexp, $date);
}


function phpCheck($date)
{
    $date = explode('/', $date);

    if (count($date) === 3) {
        [$d, $m, $y] = $date;

        $result = (checkdate($m, $d, $y)
            && strlen($m) === 2
            && strlen($d) === 2
            && strlen($y) === 4
        );

    } else {
        $result = false;
    }

    return $result;
}


//Тестовые запуски

echo regExpCheck($date1) . PHP_EOL;  //1
echo regExpCheck($date2) . PHP_EOL;  //1
echo regExpCheck($date3) . PHP_EOL;  //1
echo regExpCheck($date4) . PHP_EOL;  //0
echo regExpCheck($date5) . PHP_EOL;  //0
echo regExpCheck($date6) . PHP_EOL;  //0

echo '--------------------' . PHP_EOL;

echo phpCheck($date1) . PHP_EOL;  //true
echo phpCheck($date2) . PHP_EOL;  //true
echo phpCheck($date3) . PHP_EOL;  //true
echo phpCheck($date4) . PHP_EOL;  //false
echo phpCheck($date5) . PHP_EOL;  //false
echo phpCheck($date6) . PHP_EOL;  //false
