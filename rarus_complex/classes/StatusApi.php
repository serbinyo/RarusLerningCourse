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
 * Class StatusApi
 *
 * @package Classes
 */
class StatusApi extends Api
{
    public $apiName = 'status';
    private $infoLoggerCard;
    private $errorLoggerCard;

    public function __construct()
    {
        parent::__construct();

        $this->infoLoggerCard = new Logger('card logger status');
        $this->errorLoggerCard = new Logger('card logger status');

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
    protected function updateAction()
    {
        $needle = array_shift($this->requestUri);
        $status = array_shift($this->requestParams);


        if (empty($needle) || empty($status)) {
            throw new RuntimeException('Missing API parameters', 404);
        }

        if ($status !== 'active' && $status !== 'blocked'
            && $status !== 'Активна' && $status !== 'Заблокирована') {
            throw new RuntimeException('Wrong status value', 404);
        }

        if ($status === 'active') {
            $status = 'Активна';
        } elseif ($status === 'blocked') {
            $status = 'Заблокирована';
        }

        $cardModel = new Card();
        $card = $cardModel->getOne($needle);

        if ($card) {

            $statusUpdated = $cardModel->updateColumn('status', $needle, $status);

            if ($statusUpdated) {
                $result = $this->response('Data updated.', 200);

                $historyModel = new History();
                $statusUpdateMessage = 'Изменение статуса карты '
                    . json_encode($card, JSON_UNESCAPED_UNICODE)
                    . ' на - ' . $status;
                $historyModel->addToHistory($this->apiName, $statusUpdateMessage, (int)$needle);

                $this->infoLoggerCard->info('Изменение статуса карты',
                    ['Карта' => $card, 'Новый статус' => $status]);

            } else {

                $this->errorLoggerCard->error('Ошибка изменения статуса карты',
                    ['Карта' => $card, 'Новый статус' => $status]);
                throw new RuntimeException('Delete error', 404);

            }
        } else {
            throw new RuntimeException("Card with num = $needle not found", 404);
        }

        return $result;
    }

    protected function indexAction(): void
    {
        throw new RuntimeException('API Not Found', 404);
    }

    protected function viewAction(): void
    {
        throw new RuntimeException('API Not Found', 404);
    }

    protected function createAction(): void
    {
        throw new RuntimeException('API Not Found', 404);
    }

    protected function deleteAction(): void
    {
        throw new RuntimeException('API Not Found', 404);
    }
}