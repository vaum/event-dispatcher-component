<?php

namespace EventDispatcherComponent\events;


use EventDispatcherComponent\entities\Balance;

class BalanceUpdatedEvent
{
    public const NAME = 'bonus.updated';

    protected Balance $balance;

    public function __construct(Balance $balance)
    {
        $this->balance = $balance;
    }

    public function getBalance()
    {
        return $this->balance;
    }
}