<?php
/*
Задача 34
Реализуйте функцию takeOldest, которая принимает на вход список пользователей и возвращает самых взрослых. Количество
возвращаемых пользователей задается вторым параметром, который по-умолчанию равен единице.

<?php
$users = [
    ['name' => 'Tirion', 'birthday' => '1988-11-19'],
    ['name' => 'Sam', 'birthday' => '1999-11-22'],
    ['name' => 'Rob', 'birthday' => '1975-01-11'],
    ['name' => 'Sansa', 'birthday' => '2001-03-20'],
    ['name' => 'Tisha', 'birthday' => '1992-02-27']
];

takeOldest($users);
# => Array (
#   ['name' => 'Rob', 'birthday' => '1975-01-11']
# )
Подсказки Для преобразования даты в unixtimestamp используйте функцию strtotime
 */


function takeOldest($users, $num = 1)
{
    function birth_cmp($user1, $user2)
    {
        $date1 = strtotime($user1['birthday']);
        $date2 = strtotime($user2['birthday']);
        return $date1 - $date2;
    }

    usort($users, 'birth_cmp');

    return array_slice($users, 0, $num);
}

/* Тестовые запуски

$users = [
    ['name' => 'Tirion', 'birthday' => '1988-11-19'],
    ['name' => 'Sam', 'birthday' => '1999-11-22'],
    ['name' => 'Rob', 'birthday' => '1975-01-11'],
    ['name' => 'Sansa', 'birthday' => '2001-03-20'],
    ['name' => 'Tisha', 'birthday' => '1992-02-27'],
];

print_r(takeOldest($users, 3));
*/
