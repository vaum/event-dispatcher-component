<?php

namespace EventDispatcherComponent\interfaces;


interface EventSubscriberInterface
{
    public static function getSubscribedEvents() : array;
}
