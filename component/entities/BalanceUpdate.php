<?php


namespace EventDispatcherComponent\entities;


class BalanceUpdate
{
    public function notifyUser(User $user)
    {
        return true;
    }
}