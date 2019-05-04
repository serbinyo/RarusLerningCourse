<?php

/*
Задача 25
Реализуйте функцию getSortedNames, которая принимает на вход список пользователей, извлекает их имена, сортирует
и возвращает отсортированный список имен.

<?php

$users = [
    ['name' => 'Bronn', 'gender' => 'male', 'birthday' => '1973-03-23'],
    ['name' => 'Reigar', 'gender' => 'male', 'birthday' => '1973-11-03'],
    ['name' => 'Eiegon',  'gender' => 'male', 'birthday' => '1963-11-03'],
    ['name' => 'Sansa', 'gender' => 'female', 'birthday' => '2012-11-03']
];

getSortedNames($users); // => ['Bronn', 'Eiegon', 'Reigar', 'Sansa']
 */

/**
 * @param $profiles
 *
 * @return array
 */
function getSortedNames(array $profiles)
{
    $names = [];
    foreach ($profiles as $key => $value) {
        $names[] = $value['name'];
    }
    sort($names);
    return $names;
}

/* Тестовые запуски

$users = [
    ['name' => 'Bronn', 'gender' => 'male', 'birthday' => '1973-03-23'],
    ['name' => 'Reigar', 'gender' => 'male', 'birthday' => '1973-11-03'],
    ['name' => 'Eiegon', 'gender' => 'male', 'birthday' => '1963-11-03'],
    ['name' => 'Sansa', 'gender' => 'female', 'birthday' => '2012-11-03'],
];

print_r(getSortedNames($users)); // => ['Bronn', 'Eiegon', 'Reigar', 'Sansa']

Array
(
    [0] => Bronn
    [1] => Eiegon
    [2] => Reigar
    [3] => Sansa
)
*/