<?php

namespace EventDispatcherComponent\interfaces;


interface EventDispatcherInterface
{
    /**
     * @param object|string $event
     * @param EventSubscriberInterface $subscriber
     * @return null
     */
    public static function subscribe($event, EventSubscriberInterface $subscriber);

    /**
     * @param object|string $event
     */
    public static function dispatch($event);

}