<?php
declare(strict_types=1);

use Classes\Authentication;
use Classes\CardsApi;
use Classes\LoyaltyProgramSettings;
use Classes\StatusApi;
use Classes\DiscountApi;
use Classes\BonusApi;
use Classes\TurnoverApi;
use Classes\HistoryApi;
use Classes\UserApi;

header('Access-Control-Allow-Orgin: *');
header('Content-Type: application/json');

require_once __DIR__ . '/vendor/autoload.php';

/** @var array $LoyaltyProgramSettings
 *  Первоначальная конфигурация сервиса
 */
$LoyaltyProgramSettings = [
    'loyaltyProgramType' => 'bonus',
    'birthdayBonusFactor' => 2,
    'birthdayDiscount' => 20,
    'maxDiscount' => 50,
    'allowedManagementRole' => ['manager'],
];

try {
    new LoyaltyProgramSettings($LoyaltyProgramSettings);
} catch (Exception $e) {
    die(json_encode(['error' => $e->getMessage()]));
}

try {

    if (array_key_exists('PHP_AUTH_USER', $_SERVER)
        && array_key_exists('PHP_AUTH_PW', $_SERVER)) {
        $authentication = new Authentication($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);
    }

    if (!isset(Authentication::$user)) {
        throw new RuntimeException('Access denied', 404);
    }

} catch (Exception $e) {
    die(json_encode(['error' => $e->getMessage()]));
}

$apiPath = explode('?', $_SERVER['REQUEST_URI']);
$requestUri = explode('/', trim($apiPath[0], '/'));

try {

    if ($requestUri[2] === 'card') {
        $api = new CardsApi();
    } elseif ($requestUri[2] === 'status') {
        $api = new StatusApi();
    } elseif ($requestUri[2] === 'discount') {
        $api = new DiscountApi();
    } elseif ($requestUri[2] === 'bonus') {
        $api = new BonusApi();
    } elseif ($requestUri[2] === 'turnover') {
        $api = new TurnoverApi();
    } elseif ($requestUri[2] === 'history') {
        $api = new HistoryApi();
    } elseif ($requestUri[2] === 'user') {
        $api = new UserApi();
    } else {
        throw new RuntimeException('API Not Found', 404);
    }

    echo $api->run();

} catch (Exception $e) {
    die(json_encode(['error' => $e->getMessage()]));
}