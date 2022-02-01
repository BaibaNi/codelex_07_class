<?php
class Car
{
    private string $name;
    private int $pinCode;
    private FuelGauge $fuelAmount;
    private Odometer $odometer;
    private Battery $battery;

    private const CONSUMPTION_PER_KM = 0.07; // 7L on 100km
    private const TIRE_QUALITY_LOSS_PER_KM = [1, 2];
    private const FAR_LIGHT_QUALITY_LOSS_PER_KM = [1, 2];
    private const BATTERY_CHARGE_PER_KM = [1, 2];

    private array $tires;
    private array $farLights;
    private array $closeLights;

    private bool $started = false;


    public function __construct(string $name, int $pinCode, int $fuelAmount, int $battery)
    {
        $this->name = $name;
        $this->pinCode = $pinCode;
        $this->fuelAmount = new FuelGauge($fuelAmount);
        $this->odometer = new Odometer();
        $this->battery = new Battery($battery);

        $this->tires = [
            new Tire("Front left"),
            new Tire("Front right"),
            new Tire("Back left"),
            new Tire("Back right")
        ];

        $this->farLights = [
            new Light("Far left"),
            new Light("Far right"),
        ];

        $this->closeLights = [
            new Light("Close left"),
            new Light("Close right")
        ];

    }

//START CAR
    public function carStarted(): bool
    {
        return $this->started;
    }

    public function startCar(int $pinCode): void
    {
        if($this->pinCode !== $pinCode) return;
        elseif($this->battery->getChargeLevel() === 0) return;

        $this->started = true;
    }

//DRIVE CAR
    public function drive(int $distance = 10): void
    {
        if ($this->fuelAmount->getFuel() <= 0) return;

//FUEL
        $this->fuelAmount->changeFuel($distance * -self::CONSUMPTION_PER_KM);

//ODOMETER
        $this->odometer->addMileage($distance);

//TIRES
        [$minQualityLossTires, $maxQualityLossTires] = self::TIRE_QUALITY_LOSS_PER_KM;
        foreach ($this->tires as $tire)
        {
            $tire->changeCondition(rand($minQualityLossTires * $distance, $maxQualityLossTires * $distance));
        }

//LIGHTS
        foreach ($this->closeLights as $light)
        {
            $light->changeCondition(1);
        }

        [$minQualityLossFarLights, $maxQualityLossFarLights] = self::FAR_LIGHT_QUALITY_LOSS_PER_KM;
        foreach ($this->farLights as $light)
        {
            $light->changeCondition(rand($minQualityLossFarLights * $distance, $maxQualityLossFarLights * $distance));
        }

//BATTERY
        [$minCharge, $maxCharge] = self::BATTERY_CHARGE_PER_KM;
        $this->battery->changeChargeLevel(rand($minCharge * $distance, $maxCharge * $distance));

    }

//GET FUNCTIONS
    public function getName(): string
    {
        return $this->name;
    }

    public function getFuel(): float
    {
        return $this->fuelAmount->getFuel();
    }

    public function getMileage(): int
    {
        return $this->odometer->getMileage();
    }

    public function getTires(): array
    {
        return $this->tires;
    }

    public function getValidTires(): bool
    {
        $badTires = [];

        foreach($this->tires as $tire)
        {
            if($tire->getCondition() <= 0){
                $badTires[] = $tire;
            }
        }

        return count($badTires) <= 2;
    }

    public function getCloseLights(): array
    {
        return $this->closeLights;
    }

    public function getFarLights(): array
    {
        return $this->farLights;
    }

    public function getValidLights(): bool
    {
        $badLights = [];

        foreach($this->farLights as $light)
        {
            if($light->getCondition() <= 50){
                $badLights[] = $light;
            }
        }

        foreach($this->closeLights as $light)
        {
            if($light->getCondition() <= 70){
                $badLights[] = $light;
            }
        }

        return count($badLights) <= 2;
    }

    public function getBatteryCharge(): int
    {
        return $this->battery->getChargeLevel();
    }
}
