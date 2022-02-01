<?php
class Battery
{
    private int $chargeLevel = 0;

    public function __construct(float $chargeLevel)
    {
        $this->changeChargeLevel($chargeLevel);
    }

    public function changeChargeLevel(int $percent): void
    {
        if($this->chargeLevel >= 100){
            $this->chargeLevel = 100;
        } else{
            $this->chargeLevel += $percent;
        }
    }

    public function getChargeLevel(): int
    {
        return $this->chargeLevel;
    }
}