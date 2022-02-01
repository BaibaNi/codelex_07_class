<?php
//Foo Corporation needs a program to calculate how much to pay their hourly employees.
// The US Department of Labor requires that employees get paid
// time and a half for any hours over 40 that they work in a single week.
// For example, if an employee works 45 hours, they get 5 hours of overtime, at 1.5 times their base pay.
// The State of Massachusetts requires that hourly employees be paid at least $8.00 an hour.
// Foo Corp requires that an employee not work more than 60 hours in a week.


$employees = [
    [
        "name" => "Employee-1",
        "basepay" => 7.50,
        "hoursworked" => 35
    ],
    [
        "name" => "Employee-2",
        "basepay" => 8.20,
        "hoursworked" => 47
    ],
    [
        "name" => "Employee-3",
        "basepay" => 10.00,
        "hoursworked" => 73
    ],
];

$basepay = 8.00; // USD
$basehours = 40; // h
$overtimeLimit = 60; // h
$overtimeRate = 1.5;

foreach ($employees as $employee){
    if($employee["basepay"] < $basepay){
        echo "Error! {$employee["name"]}'s base pay is {$employee["basepay"]} USD/hour - it's too low." . PHP_EOL;
    }
    elseif($employee["hoursworked"] > $overtimeLimit){
        $hourstoomuch = $employee["hoursworked"] - $overtimeLimit;
        echo "Error! {$employee["name"]} works too much! It's {$hourstoomuch} hours over the limit!" . PHP_EOL;
    }
    elseif($employee["hoursworked"] < $overtimeLimit){
        $topay = ($basehours + ($employee["hoursworked"] - $basehours) * $overtimeRate) * $basepay;
        echo "{$employee["name"]} will be paid {$topay} USD." . PHP_EOL;
    }
}
