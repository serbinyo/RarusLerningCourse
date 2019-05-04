<?php
declare(strict_types=1);

header('Content-Type: application/json');

$apilist =
    [
        'show_card' => 'GET /api/show/card/num',
        'update_status' => 'POST /api/update/status/num + form-data: значение статуса active или blocked',
        'create_card' => 'POST /api/add/card + form-data: данные о клиенте',
        'add_purchase_with_card' => 'POST /api/update/turnover/num + form-data: данные о покупке',
        'add_purchase_without_card' => 'POST /api/update/turnover + form-data: данные о покупке',
        //manager only:
        'show_cards' => 'GET /api/show/card[?from=date&to=date]',
        'show_cards_quantity' => 'GET /api/show/card?count=quantity[&from=date&to=date]',
        'update_card' => 'POST /api/update/card/target + form-data: данные о клиенте',
        'delete_card' => 'GET /api/delete/card/target',
        'update_bonuses' => 'POST /api/update/bonus/num '
            . '+ form-data: значение бонусов - положительное для начисления (только руководящий персонал),'
            . ' отрицательное значение бонусов для списания',
        'show_history' => 'GET /api/show/history[?from=date&to=date]',
        'show_history_quantity' => 'GET /api/show/history?count=quantity[&from=date&to=date]',
        'show_turnover' => 'GET /api/show/turnover[?from=date&to=date]',
        'show_turnover_quantity' => 'GET /api/show/turnover?count=quantity[&from=date&to=date]',
        'show_turnover_with_cards' => 'GET /api/show/turnover/card[?from=date&to=date]',
        'show_turnover_with_cards_quantity' => 'GET /api/show/turnover/card?count=quantity[&from=date&to=date]',
        'show_turnover_by_card' => 'GET /api/show/turnover/card/num[?from=date&to=date]',
        'show_turnover_by_card_quantity' => 'GET /api/show/turnover/card/num?count=quantity[&from=date&to=date]',
        'total_bonuses_on_cards' => 'GET /api/show/bonus',
        'bonus_credit' => 'GET /api/show/bonus/credit[?from=date&to=date]',
        'bonus_debit' => 'GET /api/show/bonus/debit[?from=date&to=date]',
        'update_discount' => 'POST /api/update/discount/num + form-data: новое значение процента скидки',
        'show_users' => 'GET /api/show/user',
        'create_user' => 'POST api/add/user + form-data: данные о сотруднике',
    ];

echo json_encode($apilist, JSON_UNESCAPED_UNICODE);