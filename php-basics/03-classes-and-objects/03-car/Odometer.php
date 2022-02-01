<?php
class Odometer
{
    private int $mileage = 0;

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function addMileage(int $mileage): void
    {
        $this->mileage += $mileage;
//        if($this->km < 999999){
//            $this->km += $km;
//            return $this->km;
//        } else{
//            $this->km = 0;
//            return $this->km;
//        }
    }
}