<?php
//Write a program that creates an array of ten integers. It should put ten random numbers from 1 to 100 in the array.
// It should copy all the elements of that array into another array of the same size.
//Then display the contents of both arrays. To get the output to look like this, you'll need a several for loops.
// - Create an array of ten integers
// - Fill the array with ten random numbers (1-100)
// - Copy the array into another array of the same capacity
// - Change the last value in the first array to a -7
// - Display the contents of both arrays
//Array 1: 45 87 39 32 93 86 12 44 75 -7
//Array 2: 45 87 39 32 93 86 12 44 75 50


$randomFirstArray = array_map(function () {
    return rand(1, 100);
}, array_fill(0, 10, null));

$randomSecondArray = array_fill(0, sizeof($randomFirstArray), null); // creates the 2nd array (empty) with the same size as the 1st array

for ($i = 0; $i < sizeof($randomSecondArray); $i++){
    $randomSecondArray[$i] = $randomFirstArray[$i]; // each element in the 2nd array to be defined as the 1st array's element at the same position
}

array_pop($randomFirstArray); // removes last element (changes the initial array)
$randomFirstArray[] = -7; // adds -7 as the last element (changes the initial array)

echo "Array 1: ";
foreach ($randomFirstArray as $number){
    echo $number . " " ;
}
echo PHP_EOL;


echo "Array 2: ";
foreach ($randomSecondArray as $number){
    echo $number . " " ;
}
echo PHP_EOL;
