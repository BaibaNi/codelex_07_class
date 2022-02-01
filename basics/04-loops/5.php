<?php
//Create an associative array with objects of multiple persons.
//Each person should have a name, surname, age and birthday.
// Using loop (by your choice) print out every persons personal data.

$persons = [
    [
        "name" => "John",
        "surname" => "Doe",
        "age" => 50
    ],
    [
        "name" => "Jane",
        "surname" => "Doe",
        "age" => 41
    ],
    [
        "name" => "Carmen",
        "surname" => "Core",
        "age" => 53
    ]
];

foreach ($persons as $person){
    echo $person["name"] . " " . $person["surname"] . " " . $person["age"] . PHP_EOL;
}