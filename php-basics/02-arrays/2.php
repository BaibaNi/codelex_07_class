<?php

$numbers = [20, 30, 25, 35, -16, 60, -100];

//--- calculate an average value of the numbers

function sumOfAll(int $added, int $item): int {
    $added += $item;
    return $added;
}

$sumOfArray = array_reduce($numbers, "sumOfAll", 0);

echo $sumOfArray / sizeof($numbers) . PHP_EOL;