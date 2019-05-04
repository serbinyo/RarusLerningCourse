<?php

/*
 * Задача 2
Реализуйте функцию isPalindrome, которая принимает на вход слово, определяет является ли оно палиндромом
и возвращает логическое значение.

В отличии от предыдущей реализации, выполните эту более простым способом, через сравнение исходной строки
с ее перевернутой версией. Если они между собой равны, значит это палиндром.
 */


function isPalindrome($str)
{
    return $str === strrev($str);
}

//Так как $strrev не переворачивает корректно русский, можно реализовать эту функцию следующим образом
function isPalindrome_unicode($str)
{
    $len = mb_strlen($str);
    if ($len <= 0) {
        return false;
    }

    $reverse = '';

    for ($i = $len; $i >= 0; $i--) {
        $reverse .= mb_substr($str, $i, 1);
    }

    return $reverse === $str;
}

/* Тестовые запуски

echo isPalindrome_unicode('торт') . '<br>';   //false
echo isPalindrome_unicode('топот') . '<br>';  //true
echo isPalindrome_unicode('радар') . '<br>';  //true
echo isPalindrome_unicode('false') . '<br>';  //false
echo isPalindrome_unicode('radar') . '<br>';  //true

echo '<hr>';

echo isPalindrome('abs') . '<br>';    //false
echo isPalindrome('maam') . '<br>';   //true
echo isPalindrome('aaa') . '<br>';    //true
echo isPalindrome('false') . '<br>';  //false
echo isPalindrome('radar') . '<br>';  //true
*/
