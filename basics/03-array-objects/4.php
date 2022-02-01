<?php

//Given array
//
//$items = [
//    [
//        [
//            "name" => "John",
//            "surname" => "Doe",
//            "age" => 50
//        ],
//        [
//            "name" => "Jane",
//            "surname" => "Doe",
//            "age" => 41
//        ]
//    ]
//];
//Program should display concatenated value of - Jane Doe 41

$items = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];

$person = $items[0][1];
echo $person["name"] . " " . $person["surname"] . " " . $person["age"] . PHP_EOL;
//echo $items[0][1]["name"] . " " . $items[0][1]["surname"] . " " . $items[0][1]["age"] . PHP_EOL;