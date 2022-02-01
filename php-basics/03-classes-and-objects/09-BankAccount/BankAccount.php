<?php
class BankAccount
{
    public function show_user_name_and_balance(AccountHolder $accountHolder): string
    {
        if($accountHolder->getBalance() < 0){
            return $accountHolder->getName() . ", -$" . number_format(abs($accountHolder->getBalance()), 2);
        }
        else{
            return $accountHolder->getName() . ", $" . number_format($accountHolder->getBalance(), 2);
        }
    }
}