<?php
declare(strict_types=1);

/*
Задача 2 Написать регулярное выражение определяющее является ли данная строка GUID с или без скобок.
Где GUID это строка, состоящая из 8, 4, 4, 4, 12 шестнадцатеричных цифр разделенных тире.

Пример правильных выражений:

{e02fa0e4-01ad-090A-c130-0d05a0008ba0}
e02fd0e4-00fd-090A-ca30-0d00a0038ba0

Пример неправильных выражений:
02fa0e4-01ad-090A-c130-0d05a0008ba0}
e02fd0e400fd090Aca300d00a0038ba0
 */

$guid1 = '{e02fa0e4-01ad-090A-c130-0d05a0008ba0}';  //yes
$guid2 = 'e02fd0e4-00fd-090A-ca30-0d00a0038ba0';    //yes
$guid3 = '02fa0e4-01ad-090A-c130-0d05a0008ba0}';    //no
$guid4 = 'e02fd0e400fd090Aca300d00a0038ba0';        //no


function regExpCheck($guid)
{
    $regexp = '/^(\{[0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12}\}' .
        '|[0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12})$/';
    return preg_match($regexp, $guid);
}


function phpCheck(string $guid)
{
    $result = false;

    if (strncmp($guid, '{', 1) === 0
        && strpos($guid, '}') === (strlen($guid) - 1)) {
        $guid = substr($guid, 1, -1);
    }

    $parts = explode('-', $guid);

    $count = count($parts);

    if ($count === 5) {

        foreach ($parts as $key => $part) {

            if ($key === 0) {
                $part_length = 8;
            } elseif ($key === 4) {
                $part_length = 12;
            } else {
                $part_length = 4;
            }

            if (strlen($part) === $part_length
                && ctype_xdigit($part)) {
                $result = true;
                continue;
            }
            $result = false;
            break;
        }
    }

    return $result;
}


//Тестовые запуски

echo regExpCheck($guid1) . PHP_EOL; //1
echo regExpCheck($guid2) . PHP_EOL; //1
echo regExpCheck($guid3) . PHP_EOL; //0
echo regExpCheck($guid4) . PHP_EOL; //0

echo '--------------------' . PHP_EOL;

echo phpCheck($guid1) . PHP_EOL; //true
echo phpCheck($guid2) . PHP_EOL; //true
echo phpCheck($guid3) . PHP_EOL; //false
echo phpCheck($guid4) . PHP_EOL; //false