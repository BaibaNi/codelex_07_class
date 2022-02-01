<?php
class SavingsAccount
{
    private float $interestRate;
    private float $balance;
    private float $interestAmount;
    private float $totalInterest = 0;
    private float $totalDeposit = 0;
    private float $totalWithdrawal = 0;

    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }

    public function withdraw(float $withdrawal): float
    {
        $this->balance = $this->balance - $withdrawal;
        return $this->balance;
    }

    public function addDeposit(float $deposit): float
    {
        $this->balance = $this->balance + $deposit;
        return $this->balance;
    }

    public function addMonthlyInterest(float $interestRate): void
    {
        $this->interestRate = $interestRate;
        $this->interestAmount = $this->balance * ($this->interestRate / 12 / 100);
        $this->balance = $this->balance + $this->interestAmount;
    }

    public function calculateTotalDeposit(float $deposit): void
    {
        $this->totalDeposit = $this->totalDeposit + $deposit;
    }

    public function calculateTotalWithdrawal(float $withdrawal): void
    {
        $this->totalWithdrawal = $this->totalWithdrawal + $withdrawal;
    }


    public function getBalance(): float
    {
        return round($this->balance, 2);
    }

    public function getTotalDepositAmount(): float
    {
        return round($this->totalDeposit, 2);
    }

    public function getTotalWithdrawAmount(): float
    {
        return round($this->totalWithdrawal, 2);
    }

    public function getTotalInterestAmount(): float
    {
        $this->totalInterest = $this->totalInterest + $this->interestAmount;
        return round($this->totalInterest, 2);
    }
}