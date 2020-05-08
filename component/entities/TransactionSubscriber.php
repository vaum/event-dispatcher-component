<?php

namespace EventDispatcherComponent\entities;

use EventDispatcherComponent\events\TransactionCompletedEvent;
use EventDispatcherComponent\interfaces\EventSubscriberInterface as ESI;


class TransactionSubscriber implements ESI
{
    /**
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents() : array
    {
        return [
            TransactionCompletedEvent::NAME => 'transactionCompleted',
        ];
    }

    public static function transactionCompleted()
    {
        echo __FUNCTION__
            . ":" . "\n"
            . '1) ' . self::creditBalance()
            . '2) ' . self::calculateBonus()
            . '3) ' . self::sendEmail();
        return;
    }

    public static function creditBalance()
    {
        return  __METHOD__ . "\n"
            . BalanceUpdateSubscriber::notifyUser();
    }

    public static function calculateBonus()
    {
        return __METHOD__ . "\n"
            . "\t"   .  self::creditBalance();

    }

    public static function sendEmail()
    {
        return __METHOD__  . "\n";
    }
}
