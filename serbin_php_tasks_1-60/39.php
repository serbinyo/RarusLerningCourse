<?php

/*
Задача 39
Реализуйте функцию getManWithLessFriends, которая принимает список пользователей и возвращает пользователя, у которого
меньше всего друзей.

Примечания Если список пользователей пустой, то возвращается null Если в списке есть более одного пользователя с
минимальным количеством друзей, то возвращается последний из таких пользователей Примеры

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
    ['name' => 'Keit', 'friends' => []],
    ['name' => 'Rob', 'friends' => [
        ['name' => 'Taywin', 'gender' => 'male']
    ]],
];

getManWithLessFriends($users);
// => ['name' => 'Keit', 'friends' => []];
 */

function getManWithLessFriends(array $buddies)
{
    if (empty($buddies)) {
        $lessFriendsHasA = null;
    } else {
        // если список переданных пользователей не пустой, заносим в результат первого пользователя,
        // далее если у кого то окажется меньше или столько же друзей(по условию) перезапишем его
        $lessFriendsHasA = $buddies[0];

        foreach ($buddies as $buddy) {
            if (count($buddy['friends']) <= count($lessFriendsHasA['friends'])) {
                $lessFriendsHasA = $buddy;
            }
        }
    }
    return $lessFriendsHasA;
}

/* Тестовые запуски

$users = [
    [
        'name' => 'Tirion',
        'friends' => [
            ['name' => 'Mira', 'gender' => 'female'],
            ['name' => 'Ramsey', 'gender' => 'male'],
        ],
    ],
    ['name' => 'Bronn', 'friends' => []],
    [
        'name' => 'Sam',
        'friends' => [
            ['name' => 'Aria', 'gender' => 'female'],
            ['name' => 'Keit', 'gender' => 'female'],
        ],
    ],
    ['name' => 'Keit', 'friends' => []],
    [
        'name' => 'Rob',
        'friends' => [
            ['name' => 'Taywin', 'gender' => 'male'],
        ],
    ],
];

print_r(getManWithLessFriends($users));
*/
