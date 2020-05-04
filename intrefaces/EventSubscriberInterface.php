<?php

namespace interfaces;


interface EventSubscriberInterface
{
    public static function getSubscribedEvents() : array;
}