<?php
require __DIR__ . '/../vendor/autoload.php';

use EventDispatcherComponent\entities\BalanceUpdateSubscriber;
use EventDispatcherComponent\entities\EventDispatcher;
use EventDispatcherComponent\entities\TransactionSubscriber;


$dispatcher = new EventDispatcher();

$balanceUpdateSubscriber = new BalanceUpdateSubscriber();
$dispatcher->subscribe('', $balanceUpdateSubscriber);

$transactionSubscriber = new TransactionSubscriber();
$dispatcher->subscribe('', $transactionSubscriber);

echo "<h2>START</h2> \n";

echo $dispatcher->dispatch('balance.credit');
echo $dispatcher->dispatch('user.notify');
echo $dispatcher->dispatch('bonuses.calculate');
echo $dispatcher->dispatch('balance.credit');
echo $dispatcher->dispatch('user.notify');
echo $dispatcher->dispatch('email.send');


echo "\n <h2>END</h2> \n";