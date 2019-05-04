<?php

require_once __DIR__ . '/func.php';

$user = 'stud06';
$pass = 'stud06';

try {
    $dbh = new PDO(
        'mysql:host=127.0.0.1;dbname=bravobd3',
        $user,
        $pass
    );
} catch (PDOException $e) {
    die('Не удалось подключиться: ' . $e->getMessage());
}

echo 'Заполнение таблиц тестовыми данными. Ожидайте...' . PHP_EOL;

fillClients($dbh, 1000);
fillContactBases($dbh, 2000, 1000);
fillContacts($dbh, 10000, 2000);
fillChannels($dbh);
fillContactChannel($dbh, 1000, 10000, 3);
fillGroups($dbh, 300);
fillContactGroup($dbh, 500, 10000, 300);