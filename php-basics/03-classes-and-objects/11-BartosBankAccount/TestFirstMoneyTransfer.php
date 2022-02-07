<?php
require_once "Account.php";

$mattAccount = new Account("Matt's account", 1000);
$myAccount = new Account("My account", 0);

echo "Initial state" . PHP_EOL;
echo $mattAccount->balance() . PHP_EOL;
echo $myAccount->balance() . PHP_EOL;
echo "------------"  . PHP_EOL;

$mattAccount->withdrawal(100.0);
echo "Matt's account balance is now: " . $mattAccount->balance() . PHP_EOL;
$myAccount->deposit(100.0);
echo "My account balance is now: ". $myAccount->balance() . PHP_EOL;

echo "------------"  . PHP_EOL;
echo "Final state" . PHP_EOL;
echo $mattAccount->balance() . PHP_EOL;
echo $myAccount->balance() . PHP_EOL;