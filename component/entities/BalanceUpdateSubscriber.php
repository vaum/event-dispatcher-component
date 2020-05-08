<?php

namespace EventDispatcherComponent\entities;


use EventDispatcherComponent\events\BalanceUpdatedEvent;
use EventDispatcherComponent\interfaces\EventSubscriberInterface as ESI;
use ReflectionClass;


class BalanceUpdateSubscriber implements ESI
{
    /**
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents() : array
    {
        return [
            BalanceUpdatedEvent::NAME => 'notifyUser'
        ];
    }

    public static function notifyUser()
    {
        return "\t -> " . __METHOD__  . "\n";
    }
}
