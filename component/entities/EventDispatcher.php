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
            $listener = self::getListener($event::NAME);
            self::callListener($event::NAME, $listener);
            return;
        }

        echo "No such event!";
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

    public static function getListener(string $eventName = null)
    {
        if (null !== $eventName) {
            if (empty(self::$listeners[$eventName])) {
                return [];
            }

            return self::$listeners[$eventName];
        }
    }


    protected static function callListener(string $eventName, $listener)
    {
        /** @var Listener $listener */
        $eventAction = $listener->eventAction;
        $subscriber = $listener->subscriber;
        $subscriber::$eventAction($eventName);
    }
}
