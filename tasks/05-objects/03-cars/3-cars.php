<?php

class Car{
    public string $name;

    public function __construct(string $name){
        $this->name = $name;
    }
}

class CarStore{
    public array $cars = [];

    public function addCar(Car $car): void {
        $this->cars[] = $car;
    }

    public function removeCar(int $key): void {
//        unset($this->cars[$key - 1]);
        array_splice($this->cars, $key, 1);
    }

}

function printCars(object $carsList): void{
    foreach ($carsList as $cars) {
        foreach ($cars as $index => $car){
            $number = $index + 1;
            echo "[$number] " . $car->name . PHP_EOL;
        }
    }
}


$audi = new Car("Audi R8");
$pontiac = new Car("Pontiac Catalina 2+2");
$honda = new Car("Honda Civic Type R");
$mclaren = new Car("McLaren 720S");
$ford = new Car("Ford Mustang BOSS 429");
$jaguar = new Car("Jaguar F-Type");
$chevrolet = new Car("Chevrolet Chevelle SS 454");

$availableCars = new CarStore();
$availableCars->addCar($audi);
$availableCars->addCar($pontiac);
$availableCars->addCar($honda);
$availableCars->addCar($mclaren);
$availableCars->addCar($ford);
$availableCars->addCar($jaguar);
$availableCars->addCar($chevrolet);

$reservedCars = new CarStore();


echo PHP_EOL . "---------- Available cars ----------" . PHP_EOL;
printCars($availableCars) . PHP_EOL;

echo PHP_EOL;
$reservation = (int) readline(">> Select your car: ");
echo "Thank you!" . PHP_EOL;

foreach ($availableCars as $cars) {
    foreach ($cars as $index => $car) {
        if($reservation - 1  === $index){
            $availableCars->removeCar($reservation - 1);
            $reservedCars->addCar($car);
        }
    }
}


echo PHP_EOL . "---------- Available cars ----------" . PHP_EOL;
printCars($availableCars);


echo PHP_EOL . "---------- Reserved cars ----------" . PHP_EOL;
printCars($reservedCars);

