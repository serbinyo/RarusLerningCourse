<?php

/*
 * Задача 1
Палиндром — число, слово или текст, одинаково читающееся в обоих направлениях. Например: "радар", "топот".
Реализуйте функцию isPalindrome, которая принимает на вход слово, определяет является ли оно палиндромом
и возвращает логическое значение.

Для определения является ли слово палиндромом, достаточно сравнивать попарно символ с обоих концов слова.
Если они все равны, то это палиндром. Решите задачу без использования реверса строки.

Примеры использования:

isPalindrome('radar'); // true
isPalindrome('maam'); // true
isPalindrome('a');     // true
isPalindrome('abs');   // false
 */

function isPalindrome($str)
{
    $len = mb_strlen($str);
    if ($len <= 0) {
        return false;
    }

    for ($i = 0; $i <= ($len / 2); $i++) {
        if ($str[$i] !== $str[($len - 1) - $i]) {
            return false;
        }
    }

    return true;
}


/* Тестовые запуски

echo isPalindrome('abs') . '<br>';   //false
echo isPalindrome('maam') . '<br>';  //true
echo isPalindrome('aaa') . '<br>';  //true
echo isPalindrome('false') . '<br>';  //false
echo isPalindrome('radar') . '<br>';  //true
*/
