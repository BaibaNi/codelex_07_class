<?php

abstract class Shape
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

class Circle extends Shape
{
    private int $radius;

    public function __construct(string $name, int $radius)
    {
        parent::__construct($name);
        $this->radius = $radius;
    }

    public function area(): float
    {
        return round(pi() * $this->radius ** 2, 2);
    }

    public function perimeter(): float
    {
        return round(2 * pi() * $this->radius, 2);
    }
}

class Triangle extends Shape // triangle with height and base
{
    private int $height;
    private int $base;
    private int $sideA;
    private int $sideB;

    public function __construct(string $name, int $height, int $base, int $sideA, int $sideB)
    {
        parent::__construct($name);
        $this->height = $height;
        $this->base = $base;
        $this->sideA = $sideA;
        $this->sideB = $sideB;
    }

    public function area(): int
    {
        return $this->base * $this->height / 2;
    }

    public function perimeter(): int
    {
        return $this->sideA + $this->sideB + $this->base;
    }
}

class Square extends Shape
{
    private int $side;

    public function __construct(string $name, int $side)
    {
        parent::__construct($name);
        $this->side = $side;
    }

    public function area(): int
    {
        return $this->side ** 2;
    }

    public function perimeter(): int
    {
        return $this->side * 4;
    }
}

// ----- register of all shapes -----------
class AllShapes
{
    private array $allShapes = [];

    public function addShapes(Shape $shapeArea): void
    {
        $this->allShapes[] = $shapeArea;
    }

    public function totalArea(): float
    {
        $sum = 0;
        foreach ($this->allShapes as $shape)
        {
            $sum = $sum + $shape->area();
        }
        return $sum;
    }

    public function totalPerimeter(): float
    {
        $sum = 0;
        foreach ($this->allShapes as $shape)
        {
            $sum = $sum + $shape->perimeter();
        }
        return $sum;
    }
}

$totalArea = new AllShapes();
while(true) {
    echo PHP_EOL . "----- Select the shape -----" . PHP_EOL;
    echo "[1] - Circle" . PHP_EOL;
    echo "[2] - Triangle" . PHP_EOL;
    echo "[3] - Square" . PHP_EOL;

    $choice = readline("Select shape >> ");

    switch ($choice) {
        case 1:
            echo "Enter parameters (cm)" . PHP_EOL;
            $radius = readline("Radius >> ");
            $circle = new Circle("Circle", $radius);
            $totalArea->addShapes($circle);
            echo $circle->getName() . " has area of " . $circle->area() . " cm^2 | Perimeter: " . $circle->perimeter() . " cm" . PHP_EOL;
            break;
        case 2:
            echo "Enter parameters (cm)" . PHP_EOL;
            $height = readline("Height >> ");
            $base = readline("Base >> ");
            $sideA = readline("Side a >> ");
            $sideB = readline("Side b >> ");
            $triangle = new Triangle("Triangle", $height, $base, $sideA, $sideB);
            $totalArea->addShapes($triangle);
            echo $triangle->getName() . " has area of " . $triangle->area() . " cm^2 | Perimeter: " . $triangle->perimeter() . " cm" . PHP_EOL;
            break;
        case 3:
            echo "Enter parameters (cm)" . PHP_EOL;
            $side = readline("Side >> ");
            $square = new Square("Square", $side);
            $totalArea->addShapes($square);
            echo $square->getName() . " has area of " . $square->area() . " cm^2 | Perimeter: " . $square->perimeter() . " cm" . PHP_EOL;
            break;
        default:
            echo "You didn't select anything." . PHP_EOL;
            break;
    }


    echo PHP_EOL . "----- Next actions -----" . PHP_EOL;
    echo "[1] - Add another shape." . PHP_EOL;
    echo "[2] - Calculate TOTAL AREA" . PHP_EOL;
    echo "[3] - Calculate TOTAL PERIMETER" . PHP_EOL;
    echo "[4] - Exit." . PHP_EOL;

    $action = readline("Your selection >> ");
    switch ($action){
        case 2:
            echo "Total AREA of all shapes is " . $totalArea->totalArea() . " cm^2" . PHP_EOL;
            echo PHP_EOL . "Continue?" . PHP_EOL;
            echo "[1] - Yes" . PHP_EOL;
            echo "[2] - No" . PHP_EOL;
            $continue1 = readline(">> ");
            switch ($continue1){
                case 1:
                    break;
                case 2:
                    echo "Bye-bye!" . PHP_EOL;
                    exit;
                default:
                    exit;
            }
            break;
        case 3:
            echo "Total PERIMETER of all shapes is " . $totalArea->totalPerimeter() . " cm" . PHP_EOL;
            echo PHP_EOL . "Continue?" . PHP_EOL;
            echo "[1] - Yes" . PHP_EOL;
            echo "[2] - No" . PHP_EOL;
            $continue2 = readline(">> ");
            switch ($continue2){
                case 1:
                    break;
                case 2:
                    echo "Bye-bye!" . PHP_EOL;
                    exit;
                default:
                    exit;
            }
            break;
        case 4:
            echo "Bye-bye!" . PHP_EOL;
            exit;
        default:
            break;
    }
}