<?php
class FuelGauge
{
    private float $fuelAmount = 0.0;
    private const FUEL_CAPACITY = 70;

    public function __construct(float $fuelAmount)
    {
        $this->changeFuel($fuelAmount);
    }

    public function changeFuel(float $amount): void
    {
        $this->fuelAmount += $amount;

        if ($this->fuelAmount > self::FUEL_CAPACITY){
            $this->fuelAmount = self::FUEL_CAPACITY;
        }

        if ($this->fuelAmount < 0) {
            $this->fuelAmount = 0;
        }
    }

    public function getFuel(): float
    {
        return $this->fuelAmount;
    }
}
