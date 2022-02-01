<?php
//Add the following method to class BankAccount: function show_user_name_and_balance() { }
//Your method should return a string that contains the account's name and balance separated by a comma and space.
// For example, if an account object named ben has the name "Benson" and a balance of 17.25,
// the call of ben.show_user_name_and_balance() should return: --> Benson, $17.25
//There are some special cases you should handle. If the balance is negative, put the - sign before the dollar sign.
// Also, always display the cents as a two-digit number.
// For example, if the same object had a balance of -17.5, your method should return: --> Benson, $17.50


require_once "BankAccount.php";
require_once "AccountHolder.php";

$benson = new AccountHolder("Benson", 17.25);
echo (new BankAccount())->show_user_name_and_balance($benson) . PHP_EOL;

$james = new AccountHolder("James", -1.50);
echo (new BankAccount())->show_user_name_and_balance($james) . PHP_EOL;

$deborah = new AccountHolder("Deborah", 17.50);
echo (new BankAccount())->show_user_name_and_balance($deborah) . PHP_EOL;