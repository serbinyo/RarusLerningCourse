<?php
declare(strict_types=1);

namespace Classes;

use Classes\Model\Card;
use Classes\Model\History;
use Classes\Model\NewCardRules;
use Exception;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use RuntimeException;


/**
 * Class CardsApi
 *
 * @package Classes
 */
class CardsApi extends Api
{
    public $apiName = 'card';
    private $infoLoggerCard;
    private $errorLoggerCard;

    public function __construct()
    {
        parent::__construct();

        $this->infoLoggerCard = new Logger('card logger');
        $this->errorLoggerCard = new Logger('card logger');

        try {
            $this->infoLoggerCard->pushHandler(new StreamHandler(__DIR__
                . '/../logs/card_info.log', Logger::INFO));

            $this->errorLoggerCard->pushHandler(new StreamHandler(__DIR__
                . '/../logs/card_error.log', Logger::ERROR));
        } catch (Exception $e) {
            throw new RuntimeException('Logger pushHandler error', 404);
        }
    }

    /**
     * @return bool
     */
    public function needQuantity(): bool
    {
        if (\array_key_exists('count', $this->requestParams)
            && $this->requestParams['count'] === 'quantity') {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    /**
     * Метод GET
     * Вывод списка всех записей
     * http://ДОМЕН/api/show/card
     *
     * @return string
     */
    public function indexAction()
    {
        $showOnlyQuantity = $this->needQuantity();

        $cardModel = new Card();

        if (\array_key_exists('from', $this->requestParams)
            && \array_key_exists('to', $this->requestParams)) {

            $from = $this->requestParams['from'];
            $to = $this->requestParams['to'];

            if (strtotime($from) && strtotime($to)) {

                if ($showOnlyQuantity) {
                    $cards = $cardModel->getAllByDate('count(*)', $from, $to);
                } else {
                    $cards = $cardModel->getAllByDate('*', $from, $to);
                }

            } else {
                throw new RuntimeException('Wrong date parameters');
            }

        } elseif ($showOnlyQuantity) {
            $cards = $cardModel->getAll('count(*)');
        } else {
            $cards = $cardModel->getAll('*');
        }

        if ($cards) {
            $result = $this->response($cards, 200);
        } else {
            throw new RuntimeException('Data not found', 404);
        }

        return $result;
    }

    /**
     * Метод GET
     * Просмотр отдельной записи (по id или номеру телефона)
     * http://ДОМЕН/api/show/card/1 или http://ДОМЕН/api/show/card/79788885566
     *
     * @return string
     */
    public function viewAction()
    {
        $needle = array_shift($this->requestUri);

        $cardModel = new Card();
        $card = $cardModel->getOne($needle);

        if ($card) {
            $result = $this->response($card, 200);
        } else {
            throw new RuntimeException('Data not found', 404);
        }

        return $result;
    }

    /**
     * Метод POST
     * Создание новой записи
     * http://ДОМЕН/api/add/card + параметры запроса методом POST:
     * num, last_name, first_name, middle_name, phone_number,
     * bonus, discount, turnover, status, create_time, update_time     *
     *
     * @return string
     */
    public function createAction()
    {
        $now = date('YmdHis');

        $newCardRulesModel = new NewCardRules();
        $startBonusRow = $newCardRulesModel->getOne('name', 'bonus');
        $startDiscountRow = $newCardRulesModel->getOne('name', 'discount');

        $clientsData = [
            $this->requestParams['num'],
            $this->requestParams['last_name'],
            $this->requestParams['first_name'],
            $this->requestParams['middle_name'],
            $this->requestParams['birthday'],
            $this->requestParams['phone_number'],
            $startBonusRow['value'],
            $startDiscountRow['value'],
            0,
            'Активна',
            $now,
            $now,
        ];

        $cardModel = new Card();
        $newCardNum = $cardModel->create($clientsData);

        if ($newCardNum) {
            $result = $this->response('Data saved.', 200);

            $card = $cardModel->getOne($newCardNum);

            $historyModel = new History();
            $historyText = 'Выпуск карты под номером : ' . $newCardNum
                . '. ' . json_encode($card, JSON_UNESCAPED_UNICODE);
            $historyModel->addToHistory($this->apiName, $historyText, (int)$newCardNum);

            $this->infoLoggerCard->info('Выпущена карта', $card);

        } else {

            $this->errorLoggerCard->error('Ошибка выпуска карты', $clientsData);
            throw new RuntimeException('New card saving error', 404);

        }

        return $result;
    }

    /**
     * Метод POST
     * Обновление отдельной записи (по ее id)
     * http://ДОМЕН/api/update/card/1 + параметры запроса
     * num, last_name, first_name, middle_name, phone_number,
     * bonus, discount, turnover, status, create_time, update_time
     *
     * @return string
     */
    public function updateAction()
    {
        Authentication::managementStaffOnlyGuard();

        $needle = array_shift($this->requestUri);

        $cardModel = new Card();
        $card = $cardModel->getOne($needle);

        if ($card) {
            $clientData = [
                $this->requestParams['num'],
                $this->requestParams['last_name'],
                $this->requestParams['first_name'],
                $this->requestParams['middle_name'],
                $this->requestParams['birthday'],
                $this->requestParams['phone_number'],
                $this->requestParams['bonus'],
                $this->requestParams['discount'],
                $this->requestParams['turnover_amount'],
                $this->requestParams['status'],
                date('YmdHis'),
            ];

            $updated = $cardModel->update($needle, $clientData);

            if ($updated) {
                $result = $this->response('Data updated.', 200);

                $historyModel = new History();
                $historyText = 'Обновление данных по карте : '
                    . json_encode($card, JSON_UNESCAPED_UNICODE)
                    . '. Новые данные: ' . json_encode($clientData, JSON_UNESCAPED_UNICODE);
                $historyModel->addToHistory($this->apiName, $historyText, (int)$updated);

                $this->infoLoggerCard->info('Данные по карте обновлены',
                    [
                        'Карта: ' => $card,
                        'Новые данные' => $clientData,
                    ]);

            } else {

                $this->errorLoggerCard->error('Ошибка обновления карты', $card);
                throw new RuntimeException('Update error', 404);

            }
        } else {
            throw new RuntimeException("Card with num = $needle not found", 404);
        }

        return $result;
    }

    /**
     * Метод GET
     * Удаление отдельной записи (по ее id)
     * http://ДОМЕН/api/delete/card/1
     *
     * @return string
     */
    public function deleteAction()
    {

        $needle = array_shift($this->requestUri);

        $cardModel = new Card();
        $card = $cardModel->getOne($needle);

        if ($card) {

            $deleted = $cardModel->delete($needle);

            if ($deleted) {
                $result = $this->response('Data deleted.', 200);

                $historyModel = new History();
                $historyText = 'Удаление карты под номером : ' . $deleted
                    . '. ' . json_encode($card, JSON_UNESCAPED_UNICODE);
                $historyModel->addToHistory($this->apiName, $historyText, (int)$deleted);

                $this->infoLoggerCard->info('Карта удалена', $card);

            } else {

                $this->errorLoggerCard->error('Ошибка удаления карты', $card);
                throw new RuntimeException('Delete error', 404);

            }
        } else {
            throw new RuntimeException("Card with num = $needle not found", 404);
        }

        return $result;
    }
}