<?php

/*
Задача 38
Реализуйте функцию getFreeDomainsCount, которая принимает на вход список емейлов, а возвращает количество емейлов,
расположенных на каждом бесплатном домене. Список бесплатных доменов хранится в константе FREE_EMAIL_DOMAINS.

<?php

$emails = [
    'info@gmail.com',
    'info@yandex.ru',
    'info@hotmail.com',
    'mk@host.com',
    'support@bitrix.com',
    'keys@yandex.ru',
    'sergey@gmail.com',
    'vovan@gmail.com',
    'vovan@hotmail.com'
];

getFreeDomainsCount($emails);
# => Array (
#     'gmail.com' => 3
#     'yandex.ru' => 2
#     'hotmail.com' => 2
#  )
 */

define("FREE_EMAIL_DOMAINS", [
    'gmail.com',
    'yandex.ru',
    'hotmail.com',
]);

function getFreeDomainsCount(array $emails)
{
    $freeDomains = [];

    foreach ($emails as $email) {
        $domain = explode('@', $email);

        foreach (FREE_EMAIL_DOMAINS as $free) {
            if ($domain[1] === $free) {
                $freeDomains[] = $domain[1];
            }
        }
    }
    return array_count_values($freeDomains);
}

/* Тестовые запуски

$emails = [
    'info@gmail.com',
    'info@yandex.ru',
    'info@hotmail.com',
    'mk@host.com',
    'support@bitrix.com',
    'keys@yandex.ru',
    'sergey@gmail.com',
    'vovan@gmail.com',
    'vovan@hotmail.com'
];

print_r(getFreeDomainsCount($emails));

Результат

Array
(
    [gmail.com] => 3
    [yandex.ru] => 2
    [hotmail.com] => 2
)*/
