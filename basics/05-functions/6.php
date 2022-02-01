<?php
//Create a non-associative array with 5 elements where 3 are integers, 1 float and 1 string.
//Create a for loop that iterates non-associative array using php in-built function that determines count of elements in the array.
//Create a function that doubles the integer number.
//Within the loop using php in-built function print out the double of the number value (using your custom function).

$mixArray = [2, 5, "word", 7.8, 9];

for($i = 0; $i < sizeof($mixArray); $i++){
    $mixArray[$i] = doubleInteger($mixArray[$i]);
    echo $mixArray[$i] . PHP_EOL;
}

function doubleInteger($value){
    if(is_integer($value)){
        return $value * 2;
    }
    else{
        return $value;
    }
}
