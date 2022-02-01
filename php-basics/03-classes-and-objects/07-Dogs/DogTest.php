<?php
class DogTest
{
    public function main()
    {
        $sparky = new Dog("Sparky", "male");
        $sam = new Dog("Sam", "male");
        $lady = new Dog("Lady", "female");
        $molly = new Dog("Molly", "female");
        $buster = new Dog("Buster", "male", "Lady", "Sparky");
        $coco = new Dog("Coco", "female", "Molly", "Buster");
        $rocky = new Dog("Rocky", "male", "Molly", "Sam");
        $max = new Dog("Max", "male", "Lady", "Rocky");


        echo $coco->fathersName() . PHP_EOL;
        echo $sparky->fathersName() . PHP_EOL;
        echo $coco->hasSameMotherAs($max) === 1 ? "The same mother." . PHP_EOL : "Different mother." . PHP_EOL;

    }



}

