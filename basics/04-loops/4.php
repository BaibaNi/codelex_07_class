<?php
//Create a non associative array with integers and print out only integers that divides by 3 without any left.

$integers = [3, 4, 6, 7, 8, 9];
foreach ($integers as $value){
    if($value % 3 == 0){
        echo $value . PHP_EOL;
    }
}
