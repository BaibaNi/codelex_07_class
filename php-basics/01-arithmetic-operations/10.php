<?php
//Design a Geometry class with the following methods:
//
//1) A static method that accepts the radius of a circle and returns the area of the circle. Use the following formula:
//-> Area = π * r * 2
//-> Use Math.PI for π and r for the radius of the circle
//2) A static method that accepts the length and width of a rectangle and returns the area of the rectangle. Use the following formula:
//-> Area = Length x Width
//3) A static method that accepts the length of a triangle’s base and the triangle’s height. The method should return the area of the triangle. Use the following formula:
//-> Area = Base x Height x 0.5
//
//The methods should display an error message if negative values are used for the circle’s radius, the rectangle’s length or width, or the triangle’s base or height.
//
//Next write a program to test the class, which displays the following menu and responds to the user’s selection:
//
//Geometry calculator:
//
//Calculate the Area of a Circle
//Calculate the Area of a Rectangle
//Calculate the Area of a Triangle
//Quit
//Enter your choice (1-4):
//Display an error message if the user enters a number outside the range of 1 through 4 when selecting an item from the menu.

class Geometry{

    public static function circleArea(int $r): float{ // $r = radius of the circle
        if($r < 0){
            trigger_error("Radius cannot be negative!", E_USER_ERROR);
        }
        return round(M_PI * $r * 2, 2);
    }

    public static function rectangleArea(int $length, int $width): int{
        if($length < 0 || $width < 0){
            trigger_error("Length or width cannot be negative!", E_USER_ERROR);
        }
        return $length * $width;
    }

    public static function triangleArea(int $base, int $height): float{ // $base = base of the triangle
        if($base < 0 || $height < 0){
            trigger_error("Base or height cannot be negative!", E_USER_ERROR);
        }
        return $base * $height * 0.5;
    }
}

echo "Geometry calculator:" . PHP_EOL;
echo "1 - Calculate the Area of a Circle" . PHP_EOL;
echo "2 - Calculate the Area of a Rectangle" . PHP_EOL;
echo "3 - Calculate the Area of a Triangle" . PHP_EOL;
echo "4 - Quit" . PHP_EOL;

$choice = (int) readline("Enter your choice (1-4): >> ");
if($choice < 1 || $choice > 4){
    trigger_error("You selected a number out of the range!", E_USER_ERROR);
}
elseif ($choice === 1){
    $radius = (int) readline("What is the radius (in cm) of the Circle? >> ");
    echo "Area of the Circle is " . Geometry::circleArea($radius) . " cm^2." . PHP_EOL;
}
elseif ($choice === 2){
    $length = (int) readline("What is the length (in cm) of the Rectangle? >> ");
    $width = (int) readline("What is the width (in cm) of the Rectangle? >> ");
    echo "Area of the Rectangle is " . Geometry::rectangleArea($length, $width) . " cm^2." . PHP_EOL;
}
elseif ($choice === 3){
    $base = (int) readline("What is the base (in cm) of the Triangle? >> ");
    $height = (int) readline("What is the height (in cm) of the Triangle? >> ");
    echo "Area of the Triangle is " . Geometry::triangleArea($base, $height) . " cm^2." . PHP_EOL;
}
elseif ($choice === 4){
    echo "Thanks and bye!" . PHP_EOL;
}