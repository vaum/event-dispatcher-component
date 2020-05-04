<?php

namespace example;


use entities\EventSubscriber;

class TransactionSubscriber extends EventSubscriber
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