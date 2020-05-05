<?php


namespace EventDispatcherComponent\entities;


/**
 * Class User
 * @package example
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property int $balance
 * @property int $bonusBalance
 */
class User
{
    public const DEMO_USERID = 0;
    private const NO_USER_FOUND = false;

    /**
     * @param int $userId
     * @return bool|User
     */
    public static function getUserById(int $userId)
    {
        if (self::DEMO_USERID === $userId) {
            return self::getDemoUser();
        }

        return self::NO_USER_FOUND;
    }

    private static function getDemoUser() : User {
        $demoUser = new User();
        $demoUser->id = 0;
        $demoUser->name = "Tom";
        $demoUser->surname = "Bean";
        $demoUser->email = "t.bean@somemail.com";
        $demoUser->balance = 247.56;
        $demoUser->bonusBalance = 5600;

        return $demoUser;
    }


}
