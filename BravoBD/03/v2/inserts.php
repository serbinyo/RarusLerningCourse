<?php

require_once __DIR__ . '/func.php';

$user = 'stud06';
$pass = 'stud06';

try {
    $dbh = new PDO(
        'mysql:host=127.0.0.1;dbname=bd3',
        $user,
        $pass
    );
} catch (PDOException $e) {
    die('Не удалось подключиться: ' . $e->getMessage());
}

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo 'Заполнение таблиц тестовыми данными. Ожидайте...' . PHP_EOL;

fillUsers($dbh, 100);
fillGroups($dbh, 100);
fillContacts($dbh, 10000, 100);
fillChannels($dbh);
fillContactGroup($dbh, 10000, 4);
fillContactChannel($dbh, 10000, 3);