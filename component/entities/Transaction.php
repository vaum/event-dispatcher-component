<?php


namespace EventDispatcherComponent\entities;


class Transaction
{
    public function creditBalance()
    {
        return Balance::CURRENT_CREDIT;
    }

    public function calculateBonuses(int $currentBonus) : int
    {
        return $currentBonus + ($currentBonus * 0.1);
    }

    public function sendEmail(User $user) {
        $content = new EmailContent();
        $content->address = $user->email;
        $content->header = "Automatic balance update notification message";
        $content->body = `Dear $user->name $user->surname, your bonus balance has been updated
                            , it's something like  now`;

        if (EmailSender::send($content))
        {
            return true;
        }

        return false;
    }
}