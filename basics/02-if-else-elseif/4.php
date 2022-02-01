<?php
//By your choice, create condition with 3 checks.
//For example, if value is greater than X, less than Y and is an even number.

$value = 40;
$x = 20;
$y = 50;

if (($value > $x && $value < $y) && ($value % 2 === 0)){
    echo "$value is between $x and $y, and is even number.";
}
else{
    echo "$value does not match criteria.";
}