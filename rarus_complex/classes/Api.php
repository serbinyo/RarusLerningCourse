<?php
declare(strict_types=1);

namespace Classes;

use RuntimeException;

/**
 * Class Api
 *
 * @package Classes
 */
abstract class Api
{
    public $apiReceivedName = '';
    public $allowedApiNames = ['card', 'status', 'discount', 'bonus', 'turnover', 'history', 'user'];
    protected $method = '';
    public $requestUri = [];
    public $requestParams = [];
    protected $action = '';

    public function __construct()
    {
        $apiPath = explode('?', $_SERVER['REQUEST_URI']);
        $this->requestUri = explode('/', trim($apiPath[0], '/'));
        $this->requestParams = $_REQUEST;
        $this->method = $_SERVER['REQUEST_METHOD'];
        if ($this->method === 'GET') {

            if ($this->requestUri[1] === 'show') {
                $this->method = 'GET';
            } elseif ($this->requestUri[1] === 'delete') {
                $this->method = 'DELETE';
            }
        } elseif ($this->method === 'POST') {

            if ($this->requestUri[1] === 'add') {
                $this->method = 'POST';
            } elseif ($this->requestUri[1] === 'update') {
                $this->method = 'PUT';
            }
        }

        if (!\in_array($this->method, ['GET', 'POST', 'PUT', 'DELETE'], true)) {
            throw new RuntimeException('Unexpected Method');
        }
    }

    /**
     * @return mixed
     */
    public function run()
    {
        $api = array_shift($this->requestUri);
        array_shift($this->requestUri);
        $this->apiReceivedName = array_shift($this->requestUri);

        if ($api !== 'api'
            || !\in_array($this->apiReceivedName, $this->allowedApiNames, true)) {
            throw new RuntimeException('API Not Found', 404);
        }

        $this->action = $this->getAction();

        if (method_exists($this, $this->action)) {
            return $this->{$this->action}();
        }

        throw new RuntimeException('Invalid Method', 405);
    }

    /**
     * @param     $data
     * @param int $status
     *
     * @return false|string
     */
    protected function response($data, $status = 500)
    {
        header('HTTP/1.1 ' . $status . ' ' . $this->requestStatus($status));
        return json_encode($data);
    }

    /**
     * @param $code
     *
     * @return mixed
     */
    private function requestStatus($code)
    {
        $status = [
            200 => 'OK',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        ];
        return $status[$code] ?: $status[500];
    }

    /**
     * @return string|null
     */
    protected function getAction(): ?string
    {
        $method = $this->method;
        switch ($method) {
            case 'GET':
                if ($this->requestUri) {
                    $action = 'viewAction';
                } else {
                    $action = 'indexAction';
                }
                break;
            case 'POST':
                $action = 'createAction';
                break;
            case 'PUT':
                $action = 'updateAction';
                break;
            case 'DELETE':
                $action = 'deleteAction';
                break;
            default:
                $action = null;
        }
        return $action;
    }

    abstract protected function indexAction();

    abstract protected function viewAction();

    abstract protected function createAction();

    abstract protected function updateAction();

    abstract protected function deleteAction();
}