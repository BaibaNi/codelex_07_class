<?php
//Create a 2D associative array in 2nd dimension with fruits and their weight.
//Create a function that determines if fruit has weight over 10kg. Create a secondary array with shipping costs per weight.
//Meaning that you can say that over 10 kg shipping costs are 2 euros, otherwise its 1 euro.
//Using foreach loop print out the values of the fruits and how much it would cost to ship this product.

$fruits = [
    [
        "fruit" => "lemons",
        "weight" => 8
    ],
    [
        "fruit" => "bananas",
        "weight" => 15
    ],
    [
        "fruit" => "cherries",
        "weight" => 20
    ]
];

function weightOver10(int $int, int $weight = 10): bool{
    return $int >= $weight;
}

$costs = [1, 2]; // 1eur for <10kg and 2eur for >10kg
$shippingCosts = 0;

foreach ($fruits as $fruit){
    if(weightOver10($fruit["weight"])){
        $shippingCosts += $costs[1];
        echo "Shipping cost for {$fruit["fruit"]} is " . " " . $costs[1] . " EUR." . PHP_EOL;
    }
    else{
        $shippingCosts += $costs[0];
        echo "Shipping cost for {$fruit["fruit"]} is " . " " . $costs[0] . " EUR." . PHP_EOL;
    }
}

echo "Total shipping costs for fruits is " . $shippingCosts . " EUR." . PHP_EOL;