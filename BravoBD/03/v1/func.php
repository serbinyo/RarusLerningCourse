<?php

function fillClients($conn, $numOfClients)
{

    $stmt = $conn->prepare(
        'INSERT INTO `client` (`login`, `email`, `first_name`, `middle_name`, `lastname`)'
        . ' VALUES (:login, :email, :first_name, :middle_name, :last_name)'
    );

    try {
        $conn->beginTransaction();

        for ($i = 1; $i <= $numOfClients; $i++) {
            $login = 'login' . $i;
            $email = 'email@mail.com' . $i;
            $firstName = 'alk' . $i;
            $middleName = 'evg' . $i;
            $lastName = 'srb' . $i;

            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':first_name', $firstName);
            $stmt->bindParam(':middle_name', $middleName);
            $stmt->bindParam(':last_name', $lastName);

            $stmt->execute();
        }

        $conn->commit();
    } catch (Exception $e) {
        $conn->rollBack();
        echo 'Ошибка: ' . $e->getMessage() . PHP_EOL;
    }

    echo 'Таблица Клиенты - OK!' . PHP_EOL;
}


function fillContactBases($conn, $numOfBases, $numOfClients)
{
    $stmt = $conn->prepare(
        'INSERT INTO `contactbase` (`name`, `client_id`)'
        . ' VALUES (:name, :client_id)'
    );

    try {
        $conn->beginTransaction();

        for ($i = 1; $i <= $numOfBases; $i++) {
            $name = 'base' . $i;
            $clientId = mt_rand(1, $numOfClients);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':client_id', $clientId);


            $stmt->execute();
        }

        $conn->commit();
    } catch (Exception $e) {
        $conn->rollBack();
        echo 'Ошибка: ' . $e->getMessage() . PHP_EOL;
    }

    echo 'Таблица База Контактов - OK!' . PHP_EOL;
}


function fillContacts($conn, $numOfContacts, $numOfContactbases)
{
    $stmt = $conn->prepare(
        'INSERT INTO `contact` (`contactbase_id`, `first_name`, `middle_name`, `lastname`, `tel`, `email`, `sending_counter`)'
        . ' VALUES (:contactbase_id, :first_name, :middle_name, :last_name, :tel, :email, :sending_counter)'
    );

    try {
        $conn->beginTransaction();


        for ($i = 1; $i <= $numOfContacts; $i++) {
            $contactbaseId = mt_rand(1, $numOfContactbases);
            $firstName = 'fname' . $i;
            $middleName = 'mname' . $i;
            $lastName = 'surname' . $i;
            $tel = 79780000000 + $i;
            $email = $firstName . '@gmail.com';
            $sendingCounter = mt_rand(0, 10000);

            $stmt->bindParam(':contactbase_id', $contactbaseId);
            $stmt->bindParam(':first_name', $firstName);
            $stmt->bindParam(':middle_name', $middleName);
            $stmt->bindParam(':last_name', $lastName);
            $stmt->bindParam(':tel', $tel);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':sending_counter', $sendingCounter);

            $stmt->execute();
        }

        $conn->commit();
    } catch (Exception $e) {
        $conn->rollBack();
        echo 'Ошибка: ' . $e->getMessage() . PHP_EOL;
    }

    echo 'Таблица Контакты - OK!' . PHP_EOL;
}


function fillGroups($conn, $numOfGroups)
{
    $stmt = $conn->prepare(
        'INSERT INTO `group` (`name`) VALUES (:name)'
    );

    try {
        $conn->beginTransaction();

        for ($i = 1; $i <= $numOfGroups; $i++) {
            $name = 'group' . $i;

            $stmt->bindParam(':name', $name);

            $stmt->execute();
        }

        $conn->commit();
    } catch (Exception $e) {
        $conn->rollBack();
        echo 'Ошибка: ' . $e->getMessage() . PHP_EOL;
    }

    echo 'Таблица Группы - OK!' . PHP_EOL;
}


function fillContactGroup($conn, $numOfRecords, $numOfContacts, $numOfGroups)
{
    $stmt = $conn->prepare(
        'INSERT INTO `contact_group` (`contact_id`, `group_id`) VALUES (:contact_id, :group_id)'
    );

    for ($i = 1; $i <= $numOfRecords; $i++) {

        $contactId = mt_rand(1, $numOfContacts);
        $groupId = mt_rand(1, $numOfGroups);

        $stmt->bindParam(':contact_id', $contactId);
        $stmt->bindParam(':group_id', $groupId);

        try {
            $conn->beginTransaction();

            $stmt->execute();

            $conn->commit();
        } catch (Exception $e) {
            $conn->rollBack();
        }
    }

    echo 'Таблица Контакт-Группа - OK!' . PHP_EOL;
}

function fillChannels($conn)
{
    $stmt = $conn->prepare(
        'INSERT INTO `channel` (`name`) VALUES (:name)'
    );

    $messengers = ['WhatsApp', 'Viber', 'Telegram'];

    foreach ($messengers as $messenger) {
        $stmt->bindParam(':name', $messenger);
        $stmt->execute();
    }

    echo 'Таблица Канал - OK!' . PHP_EOL;
}


function fillContactChannel($conn, $numOfRecords, $numOfContacts, $numOfChannels)
{
    $stmt = $conn->prepare(
        'INSERT INTO `contact_channel` (`contact_id`, `channel_id`) VALUES (:contact_id, :channel_id)'
    );

    for ($i = 1; $i <= $numOfRecords; $i++) {

        $contactId = mt_rand(1, $numOfContacts);
        $channelId = mt_rand(1, $numOfChannels);

        $stmt->bindParam(':contact_id', $contactId);
        $stmt->bindParam(':channel_id', $channelId);

        try {
            $conn->beginTransaction();

            $stmt->execute();

            $conn->commit();
        } catch (Exception $e) {
            $conn->rollBack();
        }
    }

    echo 'Таблица Контакт-Канал - OK!' . PHP_EOL;
}