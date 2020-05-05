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
            'balance.credit' => 'creditBalance',
            'bonuses.calculate' => 'calculateBonus',
            'email.sent' => 'sendEmail',
        ];
    }
}
