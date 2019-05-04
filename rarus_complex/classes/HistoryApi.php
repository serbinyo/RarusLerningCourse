<?php
declare(strict_types=1);


namespace Classes;

use Classes\Model\History;
use RuntimeException;

/**
 * Class HistoryApi
 *
 * @package Classes
 */
class HistoryApi extends Api
{
    public $apiName = 'history';

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

    protected function indexAction()
    {
        Authentication::managementStaffOnlyGuard();
        $showOnlyQuantity = $this->needQuantity();

        $historyModel = new History();

        if (\array_key_exists('from', $this->requestParams)
            && \array_key_exists('to', $this->requestParams)) {

            $from = $this->requestParams['from'];
            $to = $this->requestParams['to'];

            if (strtotime($from) && strtotime($to)) {

                if ($showOnlyQuantity) {
                    $history = $historyModel->getAllByDate('count(*)', $from, $to);
                } else {
                    $history = $historyModel->getAllByDate('*', $from, $to);
                }

            } else {
                throw new RuntimeException('Wrong date parameters');
            }

        } elseif ($showOnlyQuantity) {
            $history = $historyModel->getAll('count(*)');
        } else {
            $history = $historyModel->getAll('*');
        }

        if ($history) {
            $result = $this->response($history, 200);
        } else {
            throw new RuntimeException('Data not found', 404);
        }

        return $result;
    }

    protected function viewAction()
    {
        Authentication::managementStaffOnlyGuard();

        $num = array_shift($this->requestUri);

        $showOnlyQuantity = $this->needQuantity();

        $historyModel = new History();

        if (\array_key_exists('from', $this->requestParams)
            && \array_key_exists('to', $this->requestParams)) {

            $from = $this->requestParams['from'];
            $to = $this->requestParams['to'];

            if (strtotime($from) && strtotime($to)) {

                if ($showOnlyQuantity) {
                    $history = $historyModel->getByCardByDate($num, 'count(*)', $from, $to);
                } else {
                    $history = $historyModel->getByCardByDate($num, '*', $from, $to);
                }

            } else {
                throw new RuntimeException('Wrong date parameters');
            }

        } elseif ($showOnlyQuantity) {
            $history = $historyModel->getByCard($num, 'count(*)');
        } else {
            $history = $historyModel->getByCard($num, '*');
        }

        if ($history) {
            $result = $this->response($history, 200);
        } else {
            throw new RuntimeException('Data not found', 404);
        }

        return $result;
    }

    protected function createAction()
    {
        throw new RuntimeException('API Not Found', 404);
    }

    protected function updateAction()
    {
        throw new RuntimeException('API Not Found', 404);
    }

    protected function deleteAction()
    {
        throw new RuntimeException('API Not Found', 404);
    }
}