<?php


namespace entities;

use interfaces\EventDispatcherInterface as EDI;
use interfaces\EventSubscriberInterface;

class EventDispatcher implements EDI
{
    private array $listeners = [];

    public function subscribe(object $event, EventSubscriberInterface $subscriber)
    {
        foreach ($subscriber->getSubscribedEvents() as $eventName => $params) {
            if (\is_string($params)) {
                $this->addListener($eventName, [$subscriber, $params]);
            }
        }
    }

    public function dispatch(object $event, string $eventName = null): object
    {
        $eventName = $eventName ?? \get_class($event);


        $listeners = $this->getListeners($eventName);

        if ($listeners) {
            $this->callListeners($listeners, $eventName, $event);
        }

        return $event;
    }

    public function getListeners(string $eventName = null)
    {
        if (null === $eventName) {
            return [];
        }

        if (empty($this->listeners[$eventName])) {
            return [];
        }

        return $this->listeners;
    }

    protected function callListeners(iterable $listeners, string $eventName, object $event)
    {
        foreach ($listeners as $listener) {
            $listener($event, $eventName, $this);
        }
    }

    public function addListener(string $eventName, $listener)
    {
        $this->listeners[$eventName][] = $listener;
    }
}