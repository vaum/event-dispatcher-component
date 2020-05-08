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
        echo "-->". "\t" . __METHOD__  . "\n";
        self::creditBalance();
        self::calculateBonus();
        self::sendEmail();
        echo "Event Completed!";
    }

    public static function creditBalance()
    {
        echo "-->". "\t" . __METHOD__  . "\n";
        echo "-->". "\t" . BalanceUpdateSubscriber::notifyUser();
    }

    public static function calculateBonus()
    {
        echo "-->". "\t" . __METHOD__  . "\n";
        echo "-->". "\t" .  self::creditBalance();

    }

    public static function sendEmail()
    {
        echo "-->". "\t" . __METHOD__  . "\n";
    }
}
