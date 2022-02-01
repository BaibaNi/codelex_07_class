<?php
//The questions in this exercise all deal with a class Dog that you have to program from scratch.
// Create a class Dog. Dogs should have a name, and a sex.
// Make a class DogTest with a Main method in which you create the following Dogs:
// -- Max, male
// -- Rocky, male
// -- Sparky, male
// -- Buster, male
// -- Sam, male
// -- Lady, female
// -- Molly, female
// -- Coco, female
// Change the Dog class so that each dog has a mother and a father.
// Add to the main method in DogTest, so that:
// -- Max has Lady as mother, and Rocky as father
// -- Coco has Molly as mother, and Buster as father
// -- Rocky has Molly as mother, and Sam as father
// -- Buster has Lady as mother, and Sparky as father
// Change the dog class to include a method fathersName that return the name of the father. If the father reference is null, return "Unknown". Test in the DogTest main method that it works.
// -- referenceToCoco.FathersName() returns the string "Buster"
// -- referenceToSparky.FathersName() returns the string "Unknown"
// Change the dog class to include a method boolean HasSameMotherAs(Dog otherDog). The method should return true on the call
// -- referenceToCoco.HasSameMotherAs(referenceToRocky). Show that the new method works in the DogTest main method.

require_once "Dog.php";
require_once "DogTest.php";

$sparky = new Dog("Sparky", "male");
$sam = new Dog("Sam", "male");
$lady = new Dog("Lady", "female");
$molly = new Dog("Molly", "female");
$buster = new Dog("Buster", "male", "Lady", "Sparky");
$coco = new Dog("Coco", "female", "Molly", "Buster");
$rocky = new Dog("Rocky", "male", "Molly", "Sam");
$max = new Dog("Max", "male", "Lady", "Rocky");

(new DogTest())->testDogParents($max);
echo PHP_EOL;

(new DogTest())->testDogParents($buster);
echo PHP_EOL;


(new DogTest())->testIfHasFather($sparky);
echo PHP_EOL;

(new DogTest())->testIfHasFather($rocky);
echo PHP_EOL;


(new DogTest())->testSameMother($coco, $rocky);
echo PHP_EOL;

(new DogTest())->testSameMother($molly, $sam);
echo PHP_EOL;


// simple tests
echo $coco->fathersName() . PHP_EOL;
echo $sparky->fathersName() . PHP_EOL;
echo $coco->hasSameMotherAs($max) === 1 ? "The same mother." . PHP_EOL : "Different mother." . PHP_EOL;