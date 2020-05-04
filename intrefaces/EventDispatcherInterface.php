<?php

namespace interfaces;


interface EventDispatcherInterface
{
    public function subscribe(object $event, EventSubscriberInterface $subscriber);

    public function dispatch(object $event, string $eventName = null);

}