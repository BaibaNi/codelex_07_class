<?php
//Write a program that calculates and displays a person's body mass index (BMI).
// A person's BMI is calculated with the following formula: BMI = weight x 703 / height ^ 2.
// Where weight is measured in pounds and height is measured in inches.
// Display a message indicating whether the person has optimal weight,
// is underweight, or is overweight. A sedentary person's weight is considered optimal
// if his or her BMI is between 18.5 and 25. If the BMI is less than 18.5, the person
// is considered underweight. If the BMI value is greater than 25, the person is considered overweight.
//
//Your program must accept metric units.

$weight_kg = (float) readline("Enter your weight in kg: >> ");
$height_cm = (int) readline("Enter your height in cm: >> ");

$weight_lb = $weight_kg * 2.20462262; // pounds:  1kg = 2.20462262 pounds
$height_in = $height_cm * 0.393700787; // inches: 1cm = 0.393700787 inches

$BMI = round(($weight_lb * 703) / pow($height_in, 2), 1);

if($BMI < 18.5){
    echo "Your BMI is {$BMI}. You are underweight!"  . PHP_EOL;
}
elseif ($BMI >18.5 && $BMI < 25){
    echo "Your BMI is {$BMI}. Your weight is optimal."  . PHP_EOL;
}
elseif($BMI > 25) {
    echo "Your BMI is {$BMI}. You are overweight!" . PHP_EOL;
}