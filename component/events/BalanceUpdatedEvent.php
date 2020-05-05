<?php

namespace EventDispatcherComponent\events;


use EventDispatcherComponent\entities\Bonus;

class BalanceUpdatedEvent
{
    public const NAME = 'bonus.updated';

    protected $bonus;

    public function __construct(Bonus $bonus)
    {
        $this->bonus = $bonus;
    }

    public function getBonus()
    {
        return $this->bonus;
    }
}