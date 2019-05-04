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
 * Class DiscountApi
 *
 * @package Classes
 */
class DiscountApi extends Api
{

    public $apiName = 'discount';
    private $infoLoggerCard;
    private $errorLoggerCard;

    public function __construct()
    {
        parent::__construct();

        $this->infoLoggerCard = new Logger('card logger discount');
        $this->errorLoggerCard = new Logger('card logger discount');

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
     * @return string
     */
    protected function updateAction()
    {
        Authentication::managementStaffOnlyGuard();

        $needle = array_shift($this->requestUri);
        $discount = array_shift($this->requestParams);

        if (empty($needle) || empty($discount)) {
            throw new RuntimeException('Missing API parameters', 404);
        }

        if ($discount <= 0 || $discount >= LoyaltyProgramSettings::getMaxDiscount()) {
            throw new RuntimeException('Wrong discount value ' . $discount, 404);
        }

        $cardModel = new Card();
        $card = $cardModel->getOne($needle);

        if ($card) {

            $discountUpdated = $cardModel->updateColumn('discount', $needle, $discount);

            if ($discountUpdated) {
                $result = $this->response('Data updated.', 200);

                $historyModel = new History();
                $discountUpdateMessage = 'Изменение процента по карте '
                    . json_encode($card, JSON_UNESCAPED_UNICODE)
                    . '; Новый процент скидки: ' . $discount;
                $historyModel->addToHistory($this->apiName, $discountUpdateMessage, (int)$needle, (float)$discount);

                $this->infoLoggerCard->info('Изменение процента скидки',
                    ['Карта' => $card, 'Новый процент скидки' => $discount]);

            } else {

                $this->errorLoggerCard->error('Ошибка изменения процента скидки',
                    ['Карта' => $card, 'Новый процент скидки' => $discount]);
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