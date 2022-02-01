<?php
//Modify the example program to compute the position of an object after
// falling for 10 seconds, outputting the position in meters.
// The formula in Math notation is: x(t) = 0.5 * a * t^2 + v(i) * t + x(i)
// a = acceleration (m/s^2) -9.81;
// t = time (s) 10;
// v(i) = initial velocity (m/s) 0;
// x(i) - initial position 0;
// Note: The correct value is -490.5m.


function getPosition(int $t): float{
    $a = -9.81; // m/s^2
//    $t = 10; // s
    $vi = 0; // m/s
    $xi = 0; // m
    return 0.5 * $a * pow($t, 2) + $vi * $t + $xi;
}

echo getPosition(10) . "m" . PHP_EOL;