<?php


namespace EventDispatcherComponent\entities;

use EventDispatcherComponent\events\Event;
use EventDispatcherComponent\interfaces\EventDispatcherInterface as EDI;
use EventDispatcherComponent\interfaces\EventSubscriberInterface;

/**
 * Class EventDispatcher
 * @package EventDispatcherComponent\entities
 */
class EventDispatcher implements EDI
{
    private static array $listeners = [];


    public static function dispatch($event)
    {
        if ($event::NAME && self::$listeners) {
            $listeners = self::getListeners($event::NAME);
            self::callListeners($event::NAME, $event);
            return $event;
        }

        echo "\t" . " No such event!";
        return;
    }

    public static function subscribe($event, EventSubscriberInterface $subscriber)
    {
        foreach ($subscriber->getSubscribedEvents() as $eventName => $eventAction) {

            if (\is_string($eventAction)) {
                self::addListener($eventName, $subscriber, $eventAction);
            }
        }
    }

    public static function addListener(string $eventName, $subscriber, $eventAction)
    {
        $listener = new Listener();
        $listener->name = $eventName;
        $listener->eventAction = $eventAction;
        $listener->subscriber = $subscriber;
        self::$listeners[$eventName] = $listener;
    }

    public static function getListeners(string $eventName = null)
    {
        if (null !== $eventName) {
            if (empty(self::$listeners[$eventName])) {
                return [];
            }

            return self::$listeners[$eventName];
        }
    }


    protected static function callListeners(string $eventName)
    {
        foreach (self::$listeners as $listener) {
            /** @var Listener $listener */
            $eventAction = $listener->eventAction;
            $subscriber = $listener->subscriber;
            $subscriber::$eventAction($eventName);
        }
    }
}
