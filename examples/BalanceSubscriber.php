<?php

namespace example;

use entities\EventSubscriber;

class BalanceSubscriber extends EventSubscriber
{
    /**
     *  * ['eventName' => 'methodName']
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents() : array
    {
        // list methods here

        return [
            'eventName' => 'methodName'
        ];
    }
}