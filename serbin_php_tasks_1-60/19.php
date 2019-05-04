<?php
/*

Реализуйте функцию checkIfBalanced, которая проверяет балансировку круглых скобок в арифметических выражениях.

<?php

checkIfBalanced('(5 + 6) * (7 + 8)/(4 + 3)'); // => true
checkIfBalanced('(4 + 3))'); // => false
 */

function checkIfBalanced($expression)
{
    return (substr_count($expression, '(') === substr_count($expression, ')'));
}

/* Тестовые запуски

echo checkIfBalanced('(5 + 6) * (7 + 8)/(4 + 3)') . "<br>\n"; // => true
echo checkIfBalanced('(4 + 3))') . "<br>\n";  // => false
*/
