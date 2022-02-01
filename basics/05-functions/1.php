<?php
//Create a function that accepts any string and returns the same value with added "codelex" by the end of it. Print this value out.

function addCodelex(string $string): string{
    return $string . " Codelex" . PHP_EOL;
}

echo addCodelex("Welcome to");