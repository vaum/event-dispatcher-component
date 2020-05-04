<?php


namespace entities;

use interfaces\EventSubscriberInterface as ESI;

abstract class EventSubscriber implements ESI
{
    public abstract static function getSubscribedEvents() : array;
}