<?php
//Write a method named swapPoints that accepts two Points as parameters and swaps their x/y values.
//Consider the following example code that calls swapPoints:
// - $p1 = new Point(5, 2);
// - $p2 = new Point(-3, 6);
// - swapPoints(p1, p2);
// - echo "(" . p1.x . ", " . p1.y . ")";
// - echo "(" . p2.x . ", " . p2.y . ")";
//The output produced from the above code should be:
// - (-3, 6)
// - (5, 2)

class Point
{
    public int $x;
    public int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
}

function swapPoints(object $p1, object $p2){
    $x2 = $p1->x;
    $y2 = $p1->y;
    $p1->x = $p2->x;
    $p1->y = $p2->y;
    $p2->x = $x2;
    $p2->y = $y2;
}

$p1 = new Point(5, 2);
$p2 = new Point(-3, 6);

echo "(" . $p1->x . ", " . $p1->y . ")" . PHP_EOL;
echo "(" . $p2->x . ", " . $p2->y . ")" . PHP_EOL;

swapPoints($p1, $p2);
echo "(" . $p1->x . ", " . $p1->y . ")" . PHP_EOL;
echo "(" . $p2->x . ", " . $p2->y . ")" . PHP_EOL;