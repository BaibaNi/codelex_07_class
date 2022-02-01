<?php
//Create an array of objects that uses the function of exercise 3 but in loop
// printing out if the person has reached age of 18.

function createPerson(string $name, string $surname, int $age): stdClass {
    $person = new stdClass();
    $person->name = $name;
    $person->surname = $surname;
    $person->age = $age;
    return $person;
}

//$person1 = new stdClass();
//$person1->name = "John";
//$person1->surname = "Doe";
//$person1->age = 50;
//
//$person2 = new stdClass();
//$person2->name = "Jane";
//$person2->surname = "Doe";
//$person2->age = 41;
//
//$person3 = new stdClass();
//$person3->name = "Carmen";
//$person3->surname = "Core";
//$person3->age = 15;
//
//
//$persons = [$person1, $person2, $person3];

$persons = [
    $person1 = createPerson("John", "Doe", 50),
    $person2 = createPerson("Jane", "Doe", 41),
    $person3 = createPerson("Carmen", "Class", 15)
];

function determineAge(object $object, int $age): bool{
    return $object->age >= $age;
}

$age = (int) readline("Enter the age: "); // age to be validated
foreach($persons as $person) {
    echo "{$person->name} {$person->surname}";
    echo determineAge($person, $age) ? ", {$person->age} years of age." . PHP_EOL : " hasn't reached $age years of age." . PHP_EOL;
}
