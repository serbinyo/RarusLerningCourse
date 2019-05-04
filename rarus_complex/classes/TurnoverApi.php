<?php
declare(strict_types=1);

namespace Classes;

use Classes\Model\BonusRules;
use Classes\Model\Card;
use Classes\Model\CelebrationDay;
use Classes\Model\DiscountRules;
use Classes\Model\History;
use Exception;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use RuntimeException;

/**
 * Class TurnoverApi
 *
 * @package Classes
 */
class TurnoverApi extends Api
{
    public $apiName = 'turnover';
    private $infoLoggerCard;
    private $errorLoggerCard;
    private $cardModel;

    public function __construct()
    {
        parent::__construct();

        $this->cardModel = new Card();

        $this->infoLoggerCard = new Logger('card logger turnover');
        $this->errorLoggerCard = new Logger('card logger turnover');

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
     * @return false|string
     */
    protected function indexAction()
    {
        Authentication::managementStaffOnlyGuard();

        return $this->show('indexAction');
    }

    /**
     * @return false|string
     */
    protected function viewAction()
    {
        Authentication::managementStaffOnlyGuard();

        $key = array_pop($this->requestUri);

        if ($key === 'card') {
            $result = $this->show('viewAction');
        } elseif (array_pop($this->requestUri) === 'card') {
            $result = $this->showByCard($key);
        } else {
            throw new RuntimeException('Wrong parameters', 404);
        }
        return $result;
    }

    private function showByCard($num)
    {
        $historyModel = new History();
        $showOnlyQuantity = $this->needQuantity();

        if (\array_key_exists('from', $this->requestParams)
            && \array_key_exists('to', $this->requestParams)) {

            $from = $this->requestParams['from'];
            $to = $this->requestParams['to'];

            if (strtotime($from) && strtotime($to)) {

                if ($showOnlyQuantity) {
                    $turnover = $historyModel->getTurnoverByCardAndDate($num, 'count(*)', $from, $to);
                } else {
                    $turnover = $historyModel->getTurnoverByCardAndDate($num, '*', $from, $to);
                }

            } else {
                throw new RuntimeException('Wrong date parameters');
            }

        } elseif ($showOnlyQuantity) {
            $turnover = $historyModel->getTurnoverByCard($num, 'count(*)');
        } else {
            $turnover = $historyModel->getTurnoverByCard($num, '*');
        }

        if ($turnover) {
            $result = $this->response($turnover, 200);
        } else {
            throw new RuntimeException('Data not found', 404);
        }

        return $result;
    }

    /**
     * @param $action
     *
     * @return false|string
     */
    private function show($action)
    {
        if ($action === 'indexAction') {
            $showByDate = 'getTurnoverAllByDate';
            $show = 'getTurnoverAll';
        } elseif ($action === 'viewAction') {
            $showByDate = 'getTurnoverWithCardsByDate';
            $show = 'getTurnoverWithCards';
        } else {
            throw new RuntimeException('Turnover private method show fail', 404);
        }

        $showOnlyQuantity = $this->needQuantity();

        $historyModel = new History();

        if (\array_key_exists('from', $this->requestParams)
            && \array_key_exists('to', $this->requestParams)) {

            $from = $this->requestParams['from'];
            $to = $this->requestParams['to'];

            if (strtotime($from) && strtotime($to)) {

                if ($showOnlyQuantity) {
                    $turnover = $historyModel->$showByDate('count(*)', $from, $to);
                } else {
                    $turnover = $historyModel->$showByDate('*', $from, $to);
                }

            } else {
                throw new RuntimeException('Wrong date parameters');
            }

        } elseif ($showOnlyQuantity) {
            $turnover = $historyModel->$show('count(*)');
        } else {
            $turnover = $historyModel->$show('*');
        }

        if ($turnover) {
            $result = $this->response($turnover, 200);
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
    protected function updateAction()
    {
        $needle = array_shift($this->requestUri);
        $purchase = $this->requestParams['purchase'];
        $amount = (float)$this->requestParams['amount'];

        if (empty($needle)) {
            $result = $this->purchaseWithoutCard($purchase, $amount);
        } else {
            $result = $this->purchaseWithCard($needle, $purchase, $amount);
        }
        return $result;
    }

    /**
     * @param string $purchase
     * @param float  $amount
     *
     * @return string
     */
    private function purchaseWithoutCard(string $purchase, float $amount)
    {
        $historyModel = new History();
        $historyText = 'Оформление покупки без карты'
            . '; Покупка: ' . $purchase
            . '; Сумма: ' . $amount;
        $historyModel->addToHistory($this->apiName, $historyText, null, $amount);

        $this->infoLoggerCard->info('Оформление покупки без карты',
            [
                'Покупка: ' => $purchase,
                'Сумма' => $amount,
            ]);

        return $this->response('Purchase without card added', 200);
    }

    /**
     * @param string $needle
     * @param string $purchase
     * @param float  $purchaseAmount
     *
     * @return string
     */
    private function purchaseWithCard(string $needle, string $purchase, float $purchaseAmount)
    {
        $card = $this->cardModel->getOne($needle);
        if ($card) {

            $this->statusCheck($card['status']);

            $totalAmount = $purchaseAmount + $card['turnover_amount'];
            $turnoverUpdated = $this->cardModel->updateColumn('turnover_amount', $card['num'], $totalAmount);

            if ($turnoverUpdated) {

                $historyModel = new History();
                $turnoverUpdateMessage = 'Оформление покупки с картой: '
                    . json_encode($card, JSON_UNESCAPED_UNICODE)
                    . '; Покупка: ' . $purchase
                    . '; Сумма: ' . $purchaseAmount
                    . '; Оборот по карте:' . $totalAmount;
                $historyModel->addToHistory($this->apiName, $turnoverUpdateMessage, (int)$card['num'], $purchaseAmount);

                $this->infoLoggerCard->info('Оформление покупки с картой',
                    [
                        'Карта: ' => $card,
                        'Покупка' => $purchase,
                        'Сумма покупки' => $purchaseAmount,
                        'Оборот по карте' => $totalAmount,
                    ]);

                $this->changeLoyaltyIfNecessary($card['num'], $purchaseAmount, $totalAmount);

                $result = $this->response('Purchase with card added', 200);

            } else {

                $this->errorLoggerCard->error('Ошибка оформления покупки с картой',
                    [
                        'Карта: ' => $card,
                        'Покупка' => $purchase,
                        'Сумма покупки' => $purchaseAmount,
                    ]);

                throw new RuntimeException('Purchase with card error', 404);

            }

        } else {
            throw new RuntimeException("Card with num = $needle not found", 404);
        }
        return $result;
    }

    /**
     * @param $needle
     * @param $purchaseAmount
     * @param $totalAmount
     */
    private function changeLoyaltyIfNecessary($needle, $purchaseAmount, $totalAmount): void
    {
        if (LoyaltyProgramSettings::getType() === 'bonus') {
            $this->changeBonusesBalance($needle, $purchaseAmount);
        } elseif (LoyaltyProgramSettings::getType() === 'discount') {
            $this->changeDiscountPercent($needle, $totalAmount);
        } else {
            throw new RuntimeException('Unexpected loyalty strategy');
        }
    }

    /**
     * @param $needle
     * @param $purchaseAmount
     */
    private function changeBonusesBalance($needle, $purchaseAmount): void
    {
        $br = new BonusRules();
        $rules = $br->getAll();
        $dueBonuses = 0;

        foreach ($rules as $rule) {
            if ($purchaseAmount >= $rule['purchase_amount']) {
                $dueBonuses = $rule['bonus'];
            }
        }

        if ($dueBonuses > 0) {
            $factor = 1;

            $cd = new CelebrationDay();
            $celebrationDays = $cd->getAll();
            $today = date('Y-m-d');

            foreach ($celebrationDays as $celebrationsDay) {
                if ($celebrationsDay['date'] === $today) {
                    $factor = $celebrationsDay['factor'];
                }
            }

            $card = $this->cardModel->getOne($needle);

            $birthday = substr($card['birthday'], 5);
            $today = date('m-d');

            if ($birthday === $today) {
                $birthdayFactor = LoyaltyProgramSettings::getBirthdayBonusFactor();
                if ($birthdayFactor > $factor) {
                    $factor = $birthdayFactor;
                }
            }

            $dueBonuses *= $factor;

            $totalBonuses = $dueBonuses + $card['bonus'];
            $this->cardModel->updateColumn('bonus', $needle, $totalBonuses);

            $historyModel = new History();
            $bonusUpdateMessage = 'Изменение бонусов по карте: '
                . json_encode($card, JSON_UNESCAPED_UNICODE)
                . ' на - ' . $dueBonuses . '; Стало бонусов:' . $totalBonuses;
            $historyModel->addToHistory('bonus', $bonusUpdateMessage, (int)$needle, (float)$dueBonuses);

            $this->infoLoggerCard->info('Изменение количества бонусов',
                [
                    'Карта: ' => $card,
                    'Изменение бонусов' => $dueBonuses,
                    'Стало бонусов' => $totalBonuses,
                ]);
        }
    }

    /**
     * @param $needle
     * @param $totalAmount
     */
    private function changeDiscountPercent($needle, $totalAmount): void
    {
        $dr = new DiscountRules();
        $rules = $dr->getAll();
        $card = $this->cardModel->getOne($needle);
        $discount = $card['discount'];

        foreach ($rules as $rule) {
            if ($totalAmount >= $rule['turnover_amount']
                && $discount < $rule['discount']) {
                $discount = $rule['discount'];
            }
        }

        if ($discount !== $card['discount']) {
            $this->cardModel->updateColumn('discount', $needle, $discount);

            echo 'yes';

            $historyModel = new History();
            $discountUpdateMessage = 'Изменение процента по карте '
                . json_encode($card, JSON_UNESCAPED_UNICODE)
                . '; Новый процент скидки: ' . $discount;
            $historyModel->addToHistory('discount', $discountUpdateMessage, (int)$needle, (float)$discount);

            $this->infoLoggerCard->info('Изменение процента скидки',
                ['Карта' => $card, 'Новый процент скидки' => $discount]);
        }
    }

    /**
     * @param $status
     */
    private function statusCheck($status): void
    {
        if ($status === 'Заблокирована'
            || $status === 'blocked') {
            throw new RuntimeException('Card blocked');
        }
    }


    protected function deleteAction(): void
    {
        throw new RuntimeException('API Not Found', 404);
    }
}