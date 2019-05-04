<?php

/*
Задача 5 Написать регулярное выражение определяющее является ли данная строка шестнадцатиричным
идентификатором цвета в HTML. Где #FFFFFF для белого, #000000 для черного, #FF0000 для красного и.т.д.

Пример правильных выражений:
#FFFFFF
#FF3421
#00ff00

Пример неправильных выражений:
232323
f#fddee
#fd2
 */

$color1 = '#FFFFFF';
$color2 = '#FF3421';
$color3 = '#00ff00';
$color4 = '232323';
$color5 = 'f#fddee';
$color6 = '#fd2';


function regExpCheck($color)
{
    $regexp = '/^#[0-9a-fA-F]{6}$/';
    return preg_match($regexp, $color);
}


//Тестовые запуски

echo regExpCheck($color1) . PHP_EOL;  //1
echo regExpCheck($color2) . PHP_EOL;  //1
echo regExpCheck($color3) . PHP_EOL;  //1
echo regExpCheck($color4) . PHP_EOL;  //0
echo regExpCheck($color5) . PHP_EOL;  //0
echo regExpCheck($color6) . PHP_EOL;  //0
