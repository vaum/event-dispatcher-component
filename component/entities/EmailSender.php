<?php


namespace EventDispatcherComponent\entities;


class EmailSender
{
    public static function send(EmailContent $content) : bool
    {
        if (empty($content)) return false;

        return  true;
    }
}