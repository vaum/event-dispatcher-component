<?php

namespace EventDispatcherComponent\controllers;


use EventDispatcherComponent\entities\Balance;
use EventDispatcherComponent\entities\User;
use EventDispatcherComponent\entities\WebSocketConnection;

class TransactionController
{
    public function actionTransactionCompleted() : bool
    {
        $user = User::getUserById(User::DEMO_USERID);

        $connection = new WebSocketConnection();
        $connection->send();
    }

    public function actionBonusTransactionCompleted()
    {

    }

    public function actionBalanceUpdated()
    {

    }

}
