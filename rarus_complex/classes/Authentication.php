<?php
declare(strict_types=1);

namespace Classes;

use Classes\Model\User;
use RuntimeException;

/**
 * Class Authentication
 *
 * @package Classes
 */
class Authentication
{
    public static $user;

    /**
     * Authentication constructor.
     *
     * @param $login
     * @param $password
     */
    public function __construct($login, $password)
    {
        $userModel = new User();
        $user_to_login = $userModel->getByLogin($login);

        if ($user_to_login) {
            if (password_verify($password, $user_to_login['passhash'])) {
                self::$user = $user_to_login;
            } else {
                throw new RuntimeException('Wrong password', 404);
            }
        } else {
            throw new RuntimeException('User is not found', 404);
        }
    }

    public static function managementStaffOnlyGuard(): void
    {
        if (!\in_array(self::$user['position'], LoyaltyProgramSettings::getAllowedManagementRole(), true)) {
            throw new RuntimeException('Access denied', 404);
        }
    }
}