<?php
class BankAccount
{
    public function showUserNameAndBalance(AccountHolder $accountHolder): string
    {
        if($accountHolder->getBalance() < 0){
            return $accountHolder->getName() . ", -$" . number_format(abs($accountHolder->getBalance()), 2);
        }
        else{
            return $accountHolder->getName() . ", $" . number_format($accountHolder->getBalance(), 2);
        }
    }
}