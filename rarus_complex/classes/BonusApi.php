<?php
declare(strict_types=1);

namespace Classes;

use Classes\Model\Card;
use Classes\Model\History;
use Exception;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use RuntimeException;

/**
 * Class BonusApi
 *
 * @package Classes
 */
class BonusApi extends Api
{
    public $apiName = 'bonus';
    private $infoLoggerCard;
    private $errorLoggerCard;

    public function __construct()
    {
        parent::__construct();

        $this->infoLoggerCard = new Logger('card logger bonus');
        $this->errorLoggerCard = new Logger('card logger bonus');

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
     * @return false|string
     */
    protected function indexAction()
    {
        Authentication::managementStaffOnlyGuard();

        $cardModel = new Card();
        $sumOfBonuses = $cardModel->getSumOfBonuses();
        if ($sumOfBonuses) {
            $result = $this->response($sumOfBonuses, 200);
        } else {
            throw new RuntimeException('Data not found', 404);
        }

        return $result;
    }

    /**
     * @return false|string
     */
    protected function viewAction()
    {
        Authentication::managementStaffOnlyGuard();

        $key = array_shift($this->requestUri);
        if ($key === 'credit' || $key === 'debit') {
            $result = $this->show($key);
        } else {
            throw new RuntimeException('Wrong type parameter');
        }
        return $result;
    }

    /**
     * @param $key
     *
     * @return false|string
     */
    private function show($key)
    {
        $historyModel = new History();

        if (\array_key_exists('from', $this->requestParams)
            && \array_key_exists('to', $this->requestParams)) {

            $from = $this->requestParams['from'];
            $to = $this->requestParams['to'];

            if (strtotime($from) && strtotime($to)) {

                $bonuses = $historyModel->showBonusTurnoverByDate($key, $from, $to);

            } else {
                throw new RuntimeException('Wrong date parameters');
            }
        } else {
            $bonuses = $historyModel->showBonusTurnover($key);
        }

        if ($bonuses) {
            $result = $this->response($bonuses, 200);
        } else {
            throw new RuntimeException('Data not found', 404);
        }

        return $result;
    }

    protected function createAction(): void
    {
        throw new RuntimeException('API Not Found', 404);
    }

    /**
     * @return string
     */
    protected function updateAction(): string
    {
        $needle = array_shift($this->requestUri);
        $bonuses = (int)array_shift($this->requestParams);

        if (empty($needle) || empty($bonuses)) {
            throw new RuntimeException('Missing API parameters', 404);
        }

        if ($bonuses > 0) {
            Authentication::managementStaffOnlyGuard();
        }

        $cardModel = new Card();
        $card = $cardModel->getOne($needle);

        if ($card) {
            $totalBonuses = $bonuses + $card['bonus'];

            if ($totalBonuses < 0) {
                throw new RuntimeException('На счету недостаточно бонусов', 404);
            }

            $bonusUpdated = $cardModel->updateColumn('bonus', $needle, $totalBonuses);

            if ($bonusUpdated) {
                $result = $this->response('Data updated.', 200);

                $historyModel = new History();
                $bonusUpdateMessage = 'Изменение бонусов по карте: '
                    . json_encode($card, JSON_UNESCAPED_UNICODE)
                    . ' на - ' . $bonuses . '; Стало бонусов:' . $totalBonuses;
                $historyModel->addToHistory($this->apiName, $bonusUpdateMessage, (int)$needle, (float)$bonuses);

                $this->infoLoggerCard->info('Изменение количества бонусов',
                    [
                        'Карта: ' => $card,
                        'Изменение бонусов' => $bonuses,
                        'Стало бонусов' => $totalBonuses,
                    ]);

            } else {

                $this->errorLoggerCard->error('Ошибка изменения количества бонусов',
                    [
                        'Карта: ' => $card,
                        'Изменение бонусов' => $bonuses,
                    ]);

                throw new RuntimeException('Delete error', 404);
            }
        } else {
            throw new RuntimeException("Card with num = $needle not found", 404);
        }

        return $result;
    }

    protected function deleteAction(): void
    {
        throw new RuntimeException('API Not Found', 404);
    }
}