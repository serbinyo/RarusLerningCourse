<?php
/*
Задача 17
Реализуйте функцию countUniqChars, которая получает на вход строку и считает, сколько символов (уникальных символов)
использовано в этой строке. Например, в строке 'yy' всего один уникальный символ — y. А в строке
'111yya!' — четыре уникальных символа: 1, y, a и !.

Задание необходимо выполнить без использования функции array_unique.

Примеры

<?php

$text1 = 'yyab';
countUniqChars($text1); // => 3

$text2 = 'You know nothing Jon Snow';
countUniqChars($text2); // => 13

$text3 = '';
countUniqChars($text3); // => 0
Примечания Если передана пустая строка, то функция должна вернуть 0, так как пустая строка вообще не
содержит символов.
 */

function countUniqChars($str)
{
    return count(count_chars($str, 1));
}

/* Тестовые запуски

$text1 = 'yyab';
echo countUniqChars($text1) . '<br>'; // => 3

$text2 = 'You know nothing Jon Snow';
echo countUniqChars($text2) . '<br>'; // => 13

$text3 = '';
echo countUniqChars($text3) . '<br>'; // => 0
*/
