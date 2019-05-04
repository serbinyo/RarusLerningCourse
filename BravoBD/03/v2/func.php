<?php

function fillUsers($conn, $numOfUsers)
{

    $stmt = $conn->prepare(
        'INSERT INTO `user` (`login`, `passwd`, `email`, `first_name`, `middle_name`, `last_name`)'
        . ' VALUES (:login, :passwd,:email, :first_name, :middle_name, :last_name)'
    );

    try {
        $conn->beginTransaction();

        for ($i = 1; $i <= $numOfUsers; $i++) {
            $login = 'login' . $i;
            $email = 'email@mail.com' . $i;
            $firstName = 'alk' . $i;
            $middleName = 'evg' . $i;
            $lastName = 'srb' . $i;

            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':passwd', $login);
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


function fillGroups($conn, $numOfClients)
{
    try {
        $conn->beginTransaction();

        for ($i = 1; $i <= $numOfClients; $i++) {
            $group1 = 'main';
            $group2 = 'my_group';
            $group3 = 'business';
            $group4 = 'family';

            $conn->exec("INSERT INTO `group` (`user_id` , `name`) VALUES ('$i', '$group1')");
            $conn->exec("INSERT INTO `group` (`user_id` , `name`) VALUES ('$i', '$group2')");
            $conn->exec("INSERT INTO `group` (`user_id` , `name`) VALUES ('$i', '$group3')");
            $conn->exec("INSERT INTO `group` (`user_id` , `name`) VALUES ('$i', '$group4')");

        }

        $conn->commit();

    } catch (Exception $e) {
        $conn->rollBack();
        echo 'Ошибка: ' . $e->getMessage() . PHP_EOL;
    }

    echo 'Таблица Группы - OK!' . PHP_EOL;
}


function fillContacts($conn, $numOfContacts, $numOfUsers)
{
    $stmt = $conn->prepare(
        'INSERT INTO `contact` (`id`, `user_id`, `first_name`, `middle_name`, `last_name`, `tel`, `email`, `sending_counter`)'
        . ' VALUES (:id, :user_id, :first_name, :middle_name, :last_name, :tel, :email, :sending_counter)'
    );

    try {

        $conn->beginTransaction();

        for ($i = 1; $i <= $numOfContacts; $i++) {
            $userId = mt_rand(1, $numOfUsers);
            $firstName = 'fname' . $i;
            $middleName = 'mname' . $i;
            $lastName = 'surname' . $i;
            $tel = 79780000000 + $i;
            $email = $firstName . '@gmail.com';
            $sendingCounter = mt_rand(0, 10000);

            $stmt->bindParam(':id', $i);
            $stmt->bindParam(':user_id', $userId);
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


function fillChannels($conn)
{
    $stmt = $conn->prepare(
        'INSERT INTO `distributionChannel` (`name`) VALUES (:name)'
    );

    $messengers = ['WhatsApp', 'Viber', 'Telegram'];

    foreach ($messengers as $messenger) {
        $stmt->bindParam(':name', $messenger);
        $stmt->execute();
    }

    echo 'Таблица Канал - OK!' . PHP_EOL;
}


function fillContactChannel($conn, $numOfContacts, $numOfChannels)
{
    $stmt = $conn->prepare(
        'INSERT INTO `contact_distributionChannel` (`contact_id`, `distributionChannel_id`, `token`)'
        . 'VALUES (:contact_id, :distributionChannel_id, :token)'
    );


    try {
        $conn->beginTransaction();

        for ($i = 1; $i <= $numOfContacts; $i++) {
            for ($j = 1; $j <= $numOfChannels; $j++) {

                $token = 'token' . $i . $j;

                $stmt->bindParam(':contact_id', $i);
                $stmt->bindParam(':distributionChannel_id', $j);
                $stmt->bindParam(':token', $token);

                $stmt->execute();
            }
        }

        $conn->commit();

    } catch (Exception $e) {
        $conn->rollBack();
        echo 'Ошибка: ' . $e->getMessage() . PHP_EOL;
    }

    echo 'Таблица Контакт-Канал - OK!' . PHP_EOL;
}


function fillContactGroup($conn, $numOfContacts, $numOfGroups)
{
    $stmt = $conn->prepare(
        'INSERT INTO `contact_group` (`contact_id`, `group_id`) VALUES (:contact_id, :group_id)'
    );

    try {
        $conn->beginTransaction();

        for ($i = 1; $i <= $numOfContacts; $i++) {
            for ($j = 1; $j <= $numOfGroups; $j++) {

                $stmt->bindParam(':contact_id', $i);
                $stmt->bindParam(':group_id', $j);

                $stmt->execute();
            }
        }

        $conn->commit();

    } catch (Exception $e) {
        $conn->rollBack();
        echo 'Ошибка: ' . $e->getMessage() . PHP_EOL;
    }

    echo 'Таблица Контакт-Группа - OK!' . PHP_EOL;
}