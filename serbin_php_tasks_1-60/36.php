<?php
/*
Задача 36
Реализуйте функцию getGirlFriends, которая принимает на вход список пользователей и возвращает плоский
список подруг всех пользователей (без сохранения ключей). Друзья каждого пользователя хранятся в виде
массива в ключе friends. Пол доступен по ключу gender и может принимать значения male или female.

<?php

$users = [
    ['name' => 'Tirion', 'friends' => [
        ['name' => 'Mira', 'gender' => 'female'],
        ['name' => 'Ramsey', 'gender' => 'male']
    ]],
    ['name' => 'Bronn', 'friends' => []],
    ['name' => 'Sam', 'friends' => [
        ['name' => 'Aria', 'gender' => 'female'],
        ['name' => 'Keit', 'gender' => 'female']
    ]],
    ['name' => 'Rob', 'friends' => [
        ['name' => 'Taywin', 'gender' => 'male']
    ]],
];
 */

function getGirlFriends(array $users)
{
    $girls = [];
    foreach ($users as $user) {
        foreach ($user['friends'] as $friend) {
            if ($friend['gender'] === 'female') {
                $girls[] = $friend['name'];
            }
        }
    }
    return $girls;
}

/* Тестовые запуски

$users = [
    ['name' => 'Tirion', 'friends' => [
        ['name' => 'Mira', 'gender' => 'female'],
        ['name' => 'Ramsey', 'gender' => 'male']
    ]],
    ['name' => 'Bronn', 'friends' => []],
    ['name' => 'Sam', 'friends' => [
        ['name' => 'Aria', 'gender' => 'female'],
        ['name' => 'Keit', 'gender' => 'female']
    ]],
    ['name' => 'Rob', 'friends' => [
        ['name' => 'Taywin', 'gender' => 'male']
    ]],
];

print_r(getGirlFriends($users));

Результат:

Array
(
    [0] => Mira
    [1] => Aria
    [2] => Keit
)*/
