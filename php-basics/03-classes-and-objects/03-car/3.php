<?php
//For this exercise, you will design a set of classes that work together to simulate a car's fuel gauge and odometer.
//The classes you will design are the following:
// 1) The FuelGauge Class: This class will simulate a fuel gauge. Its responsibilities are as follows:
// - To know the car’s current amount of fuel, in liters.
// - To report the car’s current amount of fuel, in liters.
// - To be able to increment the amount of fuel by 1 liter.
//   This simulates putting fuel in the car. ( The car can hold a maximum of 70 liters.)
// - To be able to decrement the amount of fuel by 1 liter, if the amount of fuel is greater than 0 liters.
//   This simulates burning fuel as the car runs.
//
// 2) The Odometer Class: This class will simulate the car’s odometer. Its responsibilities are as follows:
// - To know the car’s current mileage.
// - To report the car’s current mileage.
// - To be able to increment the current mileage by 1 kilometer. The maximum mileage the odometer can store
//   is 999,999 kilometer. When this amount is exceeded, the odometer resets the current mileage to 0.
// - To be able to work with a FuelGauge object. It should decrease the FuelGauge object’s current amount of fuel
//   by 1 liter for every 10 kilometers traveled. (The car’s fuel economy is 10 kilometers per liter.)
//
//Demonstrate the classes by creating instances of each. Simulate filling the car up with fuel, and then run a loop
//that increments the odometer until the car runs out of fuel.
//During each loop iteration, print the car’s current mileage and amount of fuel.

require_once "FuelGauge.php";
require_once "Odometer.php";
require_once "Tire.php";
require_once "Light.php";
require_once "Battery.php";
require_once "Car.php";


$name = readline('Car name: ');
$fuelAmount = (int) readline("How many liters to fill? >> ");
$driveDistance = (int) readline('Drive distance: '); // how many km can drive with one fuel amount (CONSUMPTION_PER_KM)

$car = new Car($name, 1234, $fuelAmount, 50);

echo "-CAR: " . $car->getName() . " ----------------------" . PHP_EOL;

$pinCode = (int) readline("Enter the car's PIN code: ");
$car->startCar($pinCode);

if(!$car->carStarted()){
    echo "{$car->getName()} has not started." . PHP_EOL;
    echo "Verify your PIN code. Your BATTERY has {$car->getBatteryCharge()} % charge." . PHP_EOL;
    exit;
}


while($car->getFuel() > 0 && $car->carStarted() && $car->getValidTires() && $car->getValidLights()){

    echo "Fuel: " . $car->getFuel() . " liters" . PHP_EOL;
    echo "Mileage: " . $car->getMileage() . " km" . PHP_EOL;
    echo "Battery: " . $car->getBatteryCharge() . " %" . PHP_EOL;

    echo "-TIRES ----------------------" . PHP_EOL;
    foreach ($car->getTires() as $tire)
    {
        echo "Tire ({$tire->getName()}): " . $tire->getCondition() . " %" . PHP_EOL;
    }

    echo "-LIGHTS ----------------------" . PHP_EOL;
    foreach ($car->getFarLights() as $farLight)
    {
        echo "{$farLight->getName()}: " . $farLight->getCondition() . " %" . PHP_EOL;
    }

    foreach ($car->getCloseLights() as $closeLight)
    {
        echo "{$closeLight->getName()}: " . $closeLight->getCondition() . " %" . PHP_EOL;
    }

    echo "------------###--------------" . PHP_EOL;

    $car->drive($driveDistance);

    sleep(1);
}


