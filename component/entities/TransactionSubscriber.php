<?php

namespace EventDispatcherComponent\entities;

use EventDispatcherComponent\interfaces\EventSubscriberInterface as ESI;


class TransactionSubscriber implements ESI
{
    /**
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents() : array
    {
        return [
            'balance.credit' => 'onCreditBalance',
            'bonuses.calculate' => 'onCalculateBonus',
            'email.send' => 'onSendEmail',
        ];
    }

    public function onCreditBalance()
    {
        echo __CLASS__ . '/' . __METHOD__;
        echo "<br>";
    }

    public function onCalculateBonus()
    {
        echo __CLASS__ . '/' . __METHOD__;
        echo "<br>";
    }

    public function onSendEmail()
    {
        echo __CLASS__ . '/' . __METHOD__;
        echo "<br>";
    }
}
