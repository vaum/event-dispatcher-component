<?php

namespace EventDispatcherComponent\interfaces;


interface EventDispatcherInterface
{
    /**
     * @param object|string $event
     * @param EventSubscriberInterface $subscriber
     * @return null
     */
    public function subscribe($event, EventSubscriberInterface $subscriber);

    /**
     * @param object|string $event
     * @param string|null $eventName
     * @return string
     */
    public function dispatch($event, string $eventName = null) : string ;

}