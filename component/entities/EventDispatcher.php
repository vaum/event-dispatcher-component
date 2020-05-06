<?php


namespace EventDispatcherComponent\entities;

use EventDispatcherComponent\interfaces\EventDispatcherInterface as EDI;
use EventDispatcherComponent\interfaces\EventSubscriberInterface;

class EventDispatcher implements EDI
{
    private array $listeners = [];

    public function subscribe($event, EventSubscriberInterface $subscriber)
    {
        foreach ($subscriber->getSubscribedEvents() as $eventName => $params) {
            if (\is_string($params)) {
                $this->addListener($eventName, [$subscriber, $params]);
            }
        }
    }

    /**
     * @param object|string $event
     * @param string|null $eventName
     */
    public function dispatch($event, string $eventName = null)
    {
        if (null !== $event && is_string($event) && array_key_exists($event, $this->listeners)) {
            return  var_dump($this->listeners[$event]);
        } else if (null !== $eventName && array_key_exists($eventName, $this->listeners)) {
            return var_dump($this->listeners[$eventName]);
        }

        return "\t" . " No such event!";
    }

    public function addListener(string $eventName, $listener)
    {
        $this->listeners[$eventName][] = $listener;
    }
}
