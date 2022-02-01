<?php
//Write a program to accept two integers and return true if the either one is 15 or if their sum or difference is 15.

function acceptTwoIntegers(int $int1, int $int2): string{
    if(($int1 == 15 || $int2 == 15) || (($int1 + $int2) == 15 || ($int1 - $int2) == 15)){
        return "TRUE" . PHP_EOL;
    }
    else{
        return "FALSE" . PHP_EOL;
    }
}

echo acceptTwoIntegers(15, 3);
echo acceptTwoIntegers(10, 15);
echo acceptTwoIntegers(3, 5);
echo acceptTwoIntegers(10, 5);
echo acceptTwoIntegers(20, 5);
