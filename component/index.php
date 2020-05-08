<?php
require __DIR__ . '/../vendor/autoload.php';

use EventDispatcherComponent\entities\BalanceUpdateSubscriber;
use EventDispatcherComponent\entities\BonusTransaction;
use EventDispatcherComponent\entities\EventDispatcher;
use EventDispatcherComponent\entities\TransactionSubscriber;
use EventDispatcherComponent\events\TransactionCompletedEvent;
use EventDispatcherComponent\entities\Transaction;
use EventDispatcherComponent\events\BalanceUpdatedEvent;
use EventDispatcherComponent\entities\Balance;
use EventDispatcherComponent\events\BonusTransactionCompletedEvent;


//$dispatcher = new EventDispatcher();
//
//$balanceUpdateSubscriber = new BalanceUpdateSubscriber();
//$dispatcher->subscribe('', $balanceUpdateSubscriber);
//
//$transactionSubscriber = new TransactionSubscriber();
//$dispatcher->subscribe('', $transactionSubscriber);

$transaction = new Transaction();
$balance = new Balance();
$bonusTransaction = new BonusTransaction();

$transactionCompletedEvent = new TransactionCompletedEvent($transaction);
$balanceUpdatedEvent = new BalanceUpdatedEvent($balance);
$bonusTransactionCompletedEvent = new BonusTransactionCompletedEvent($bonusTransaction);

$balanceUpdateSubscriber = new BalanceUpdateSubscriber();
$transactionSubscriber = new TransactionSubscriber();

EventDispatcher::subscribe($transactionCompletedEvent, $transactionSubscriber);
//EventDispatcher::subscribe($transactionCompletedEvent, $balanceUpdateSubscriber);


echo "<h2>START</h2> \n";

EventDispatcher::dispatch($transactionCompletedEvent);

echo "\n <h2>END</h2> \n";