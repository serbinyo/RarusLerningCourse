<?php
declare(strict_types=1);


namespace Classes;


use Classes\Model\History;
use Classes\Model\User;
use Exception;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use RuntimeException;

class UserApi extends Api
{
    public $apiName = 'user';
    private $infoLoggerCard;
    private $errorLoggerCard;

    public function __construct()
    {
        parent::__construct();

        $this->infoLoggerCard = new Logger('user logger');
        $this->errorLoggerCard = new Logger('user logger');

        try {
            $this->infoLoggerCard->pushHandler(new StreamHandler(__DIR__
                . '/../logs/user_info.log', Logger::INFO));

            $this->errorLoggerCard->pushHandler(new StreamHandler(__DIR__
                . '/../logs/user_error.log', Logger::ERROR));
        } catch (Exception $e) {
            throw new RuntimeException('Logger pushHandler error', 404);
        }
    }

    protected function indexAction()
    {
        $userModel = new User();
        $users = $userModel->getAll('*');

        if ($users) {
            $result = $this->response($users, 200);
        } else {
            throw new RuntimeException('Data not found', 404);
        }

        return $result;
    }

    protected function viewAction()
    {
        $login = array_shift($this->requestUri);

        $userModel = new User();
        $user = $userModel->getByLogin($login);

        if ($user) {
            $result = $this->response($user, 200);
        } else {
            throw new RuntimeException('Data not found', 404);
        }

        return $result;
    }

    protected function createAction()
    {
        $now = date('YmdHis');

        $userData = [
            $this->requestParams['login'],
            $this->requestParams['last_name'],
            $this->requestParams['first_name'],
            $this->requestParams['middle_name'],
            $this->requestParams['birthday'],
            $this->requestParams['phone_number'],
            $this->requestParams['position'],
            password_hash($this->requestParams['password'], PASSWORD_BCRYPT),
            $now,
            $now,
        ];

        $userModel = new User();
        $newUserId = $userModel->create($userData);

        if ($newUserId) {
            $result = $this->response('Data saved.', 200);

            $user = $userModel->getOne($newUserId, '*');

            $historyModel = new History();
            $historyText = 'Новый пользователь : ' . $newUserId
                . '. ' . json_encode($user, JSON_UNESCAPED_UNICODE);
            $historyModel->addToHistory($this->apiName, $historyText, (int)$newUserId);

            $this->infoLoggerCard->info('Выпущена карта', $user);

        } else {

            $this->errorLoggerCard->error('Ошибка выпуска карты', $userData);
            throw new RuntimeException('New user saving error', 404);

        }

        return $result;
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