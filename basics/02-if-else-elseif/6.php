<?php
//Create a variable $plateNumber that stores your car plate number.
// Create a switch statement that prints out that its your car in case of your number.

$plateNumber = "AB-1234";

switch ($plateNumber){
    case "AB-1234":
        echo "It's your plate number.";
        break;
    default:
        echo "It's not your plate number.";
}