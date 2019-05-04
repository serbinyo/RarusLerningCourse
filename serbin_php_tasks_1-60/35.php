<?php
/*
Задача 35
Реализуйте функцию getChildren, которая принимает на вход список пользователей и возвращает плоский
список их детей. Дети каждого пользователя хранятся в виде массива в ключе children

<?php

$users = [
    ['name' => 'Tirion', 'children' => [
        ['name' => 'Mira', 'birdhday' => '1983-03-23']
    ]],
    ['name' => 'Bronn', 'children' => []],
    ['name' => 'Sam', 'children' => [
        ['name' => 'Aria', 'birdhday' => '2012-11-03'],
        ['name' => 'Keit', 'birdhday' => '1933-05-14']
    ]],
    ['name' => 'Rob', 'children' => [
        ['name' => 'Tisha', 'birdhday' => '2012-11-03']
    ]],
];

getChildren($users);
// [
//     ['name' => 'Mira', 'birdhday' => '1983-03-23'],
//     ['name' => 'Aria', 'birdhday' => '2012-11-03'],
//     ['name' => 'Keit', 'birdhday' => '1933-05-14'],
//     ['name' => 'Tisha', 'birdhday' => '2012-11-03']
// ]
 */

function getChildren(array $parents)
{
    $children = [];
    foreach ($parents as $parent) {
        foreach ($parent['children'] as $child) {
            $children[] = $child;
        }
    }
    return $children;
}

/*Тестовые запуски

$users = [
    [
        'name' => 'Tirion',
        'children' => [
            ['name' => 'Mira', 'birdhday' => '1983-03-23'],
        ],
    ],
    ['name' => 'Bronn', 'children' => []],
    [
        'name' => 'Sam',
        'children' => [
            ['name' => 'Aria', 'birdhday' => '2012-11-03'],
            ['name' => 'Keit', 'birdhday' => '1933-05-14'],
        ],
    ],
    [
        'name' => 'Rob',
        'children' => [
            ['name' => 'Tisha', 'birdhday' => '2012-11-03'],
        ],
    ],
];

print_r(getChildren($users));

Результат:
Array
(
    [0] => Array
    (
        [name] => Mira
        [birdhday] => 1983-03-23
        )

    [1] => Array
(
    [name] => Aria
    [birdhday] => 2012-11-03
        )

    [2] => Array
(
    [name] => Keit
    [birdhday] => 1933-05-14
        )

    [3] => Array
(
    [name] => Tisha
    [birdhday] => 2012-11-03
        )

)*/
