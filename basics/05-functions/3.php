<?php
//Create a person object with name, surname and age.
// Create a function that will determine if the person has reached 18 years of age.
// Print out if the person has reached age of 18 or not.

$person = new stdClass();
$person->name = "Peter";
$person->surname = "Pan";
$person->age = 15;

function determineAge(object $object, int $age = 18): bool{
    return $object->age >= $age;
}

$age = (int) readline("Enter the age: "); // age to be validated
echo "{$person->name} {$person->surname}";
echo determineAge($person, $age) ? ", {$person->age} years of age." . PHP_EOL : " hasn't reached {$age} years of age." . PHP_EOL;
