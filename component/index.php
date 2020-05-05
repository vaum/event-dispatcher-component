<?php
require __DIR__ . '/../vendor/autoload.php';

use EventDispatcherComponent\entities\EventDispatcher;

$dispatcher = new EventDispatcher();


$balanceUpdateSubscriber = new BalanceUpdateSubscriber();
$dispatcher->subscribe("user.notify", $balanceUpdateSubscriber);

$transactionSubscriber = new TransactionSubscriber();
$dispatcher->subscribe('balance.credit', $transactionSubscriber);
$dispatcher->subscribe('bonuses.calculate', $transactionSubscriber);
$dispatcher->subscribe('email.sent', $transactionSubscriber);

//$dispatcher->addListener('baz.action', array($listener, 'onFooAction'));
//$dispatcher->addListener('foo.action', function() {
//    echo __FUNCTION__;
//    echo "<br>";
//});


echo "<h2>START</h2>";

$dispatcher->dispatch('foo.action');

echo "<h2>END</h2>";