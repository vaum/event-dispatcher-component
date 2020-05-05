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
     * @return string
     */
    public function dispatch($event, string $eventName = null) : string
    {
        $eventName = $eventName ?? \get_class($event);
        $result = "";

        $listeners = $this->getListeners($eventName);

        if ($listeners) {
            $this->callListeners($listeners, $eventName, $event);
        }

        return "\t" . implode("\n\t", $result);
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

    public function addSubscriber(EventSubscriberInterface $subscriber)
    {
        foreach ($subscriber->getSubscribedEvents() as $eventName => $params) {
            if (\is_string($params)) {
                $this->addListener($eventName, [$subscriber, $params]);
            } elseif (\is_string($params[0])) {
                $this->addListener($eventName, [$subscriber, $params[0]], isset($params[1]) ? $params[1] : 0);
            } else {
                foreach ($params as $listener) {
                    $this->addListener($eventName, [$subscriber, $listener[0]], isset($listener[1]) ? $listener[1] : 0);
                }
            }
        }
    }

    public function removeSubscriber(EventSubscriberInterface $subscriber)
    {
        foreach ($subscriber->getSubscribedEvents() as $eventName => $params) {
            if (\is_array($params) && \is_array($params[0])) {
                foreach ($params as $listener) {
                    $this->removeListener($eventName, [$subscriber, $listener[0]]);
                }
            } else {
                $this->removeListener($eventName, [$subscriber, \is_string($params) ? $params : $params[0]]);
            }
        }
    }
}