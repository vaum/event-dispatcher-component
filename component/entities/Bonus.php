<?php


namespace EventDispatcherComponent\entities;


class Bonus
{
    /**
     * @param int $userId
     * @return bool|int
     */
    public static function getBonus(int $userId)
    {
        /** @var User|bool $user */
        $user = User::getUserById($userId);

        if ($user instanceof User) {
            return $user->bonusBalance;
        }

        return $user;
    }
}