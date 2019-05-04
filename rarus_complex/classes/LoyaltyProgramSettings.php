<?php
declare(strict_types=1);

namespace Classes;

use RuntimeException;

/**
 * Class LoyaltyProgramSettings
 *
 * Класс отвечает за настройку программы лояльности
 *
 * @package Classes
 */
class LoyaltyProgramSettings
{
    private static $type = '';
    private static $birthdayBonusFactor = 2;
    private static $birthdayDiscount = 10;
    private static $maxDiscount = 50;
    private static $allowedManagementRole = ['manager'];


    /**
     * LoyaltyProgramSettings constructor.
     *
     * @param array $settings
     */
    public function __construct(array $settings)
    {
        if ($settings['loyaltyProgramType'] === 'bonus'
            || $settings['loyaltyProgramType'] === 'discount') {
            self::$type = $settings['loyaltyProgramType'];
        } else {
            throw new RuntimeException('Unexpected loyalty strategy', 404);
        }

        if (\array_key_exists('birthdayBonusFactor', $settings)) {
            self::$birthdayBonusFactor = $settings['birthdayBonusFactor'];
        }

        if (\array_key_exists('birthdayDiscount', $settings)) {
            self::$birthdayDiscount = $settings['birthdayDiscount'];
        }

        if (\array_key_exists('maxDiscount', $settings)) {
            self::$maxDiscount = $settings['maxDiscount'];
        }

        if (\array_key_exists('allowedManagementRole', $settings)) {
            self::$allowedManagementRole = $settings['allowedManagementRole'];
        }
    }

    /**
     * @return string
     */
    public static function getType()
    {
        return self::$type;
    }

    /**
     * @return int|mixed
     */
    public static function getBirthdayBonusFactor()
    {
        return self::$birthdayBonusFactor;
    }

    /**
     * @return int|mixed
     */
    public static function getBirthdayDiscount()
    {
        return self::$birthdayDiscount;
    }

    /**
     * @return mixed
     */
    public static function getMaxDiscount()
    {
        return self::$maxDiscount;
    }

    /**
     * @return array|mixed
     */
    public static function getAllowedManagementRole()
    {
        return self::$allowedManagementRole;
    }
}