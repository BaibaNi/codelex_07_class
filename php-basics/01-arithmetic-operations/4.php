<?php
//Write a program to compute the product of integers from 1 to 10 (i.e., 1×2×3×...×10), as an int.
// Take note that it is the same as factorial of N. --> 3628800

function prodOfIntegers(int $n): int{
    $i = $n;
    while($i > 1){
        $n = $n * ($i - 1);
        $i--;
    }
    return $n .PHP_EOL;
}

echo (prodOfIntegers(10));