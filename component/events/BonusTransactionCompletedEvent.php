<?php

namespace EventDispatcherComponent\events;


use EventDispatcherComponent\entities\BonusTransaction;

class BonusTransactionCompletedEvent
{
    public const NAME = 'bonus.transaction.completed';

    protected BonusTransaction $bonusTransaction;

    public function __construct(BonusTransaction $bonusTransaction)
    {
        $this->bonusTransaction = $bonusTransaction;
    }

    public function getBonusTransaction()
    {
        return $this->bonusTransaction;
    }
}