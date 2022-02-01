<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

//--- check if an array contains a value user entered

echo "Enter the value to search for: ";
$yourValue = (int) readline(">> ");

if (in_array($yourValue, $numbers)){
    echo "Your value - {$yourValue} - is in the array." . PHP_EOL;
}
else{
    echo "Your value - {$yourValue} - is NOT in the array." . PHP_EOL;
}