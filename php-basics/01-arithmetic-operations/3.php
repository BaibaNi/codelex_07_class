<?php
//Write a program to produce the sum of 1, 2, 3, ..., to 100.
// Store 1 and 100 in variables lower bound and upper bound, so that we can change their values easily.
// Also compute and display the average. The output shall look like:
//
//The sum of 1 to 100 is 5050
//The average is 50.5

$lowerbound = 1;
$upperbound = 100;
$numbers = range($lowerbound, $upperbound); // masīvs no low līdz high
$sum = array_sum($numbers);
$avg = $sum / count($numbers); // count f-cija saskaita, cik elementu ir masīvā

echo "The sum of $lowerbound to $upperbound is $sum" . PHP_EOL;
echo "The average is $avg" . PHP_EOL;
