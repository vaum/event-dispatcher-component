<?php

namespace EventDispatcherComponent\events;


use EventDispatcherComponent\entities\Transaction;

class TransactionCompletedEvent
{
    public const NAME = 'transaction.completed';

    protected $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function getTransaction()
    {
        return $this->transaction;
    }

}