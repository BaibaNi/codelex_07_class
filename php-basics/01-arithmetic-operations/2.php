<?php
//Write a program called CheckOddEven which prints "Odd Number" if the int variable “number” is odd,
// or “Even Number” otherwise. The program shall always print “bye!” before exiting.

function CheckOddEven(int $int): string{
    if($int % 2 == 0){
        return "Even Number" . PHP_EOL;
    }
    else{
        return "Odd Number" . PHP_EOL;
    }
    return "Bye!" . PHP_EOL;
}

echo CheckOddEven(3);
echo CheckOddEven(4);