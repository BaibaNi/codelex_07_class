<?php
class Account
{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }

    public function deposit(float $amount): float
    {
        return $this->balance += $amount;
    }

    public function balance(): string
    {
        return number_format($this->balance, 2);
    }

    public function withdrawal(float $amount): float
    {
        return $this->balance -= $amount;
    }

}