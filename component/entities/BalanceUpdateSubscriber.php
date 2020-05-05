<?php

namespace EventDispatcherComponent\entities;


use EventDispatcherComponent\interfaces\EventSubscriberInterface as ESI;


class BalanceUpdateSubscriber implements ESI
{
    /**
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents() : array
    {
        return [
            'user.notify' => 'notifyUser'
        ];
    }
}
