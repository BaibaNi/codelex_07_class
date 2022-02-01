<?php

$board = [
['-', '-', '-'],
['-', '-', '-'],
['-', '-', '-'],
];

$combinations = [
    [
        [0, 0], [0, 1], [0, 2]
    ],
    [
        [1, 0], [1, 1], [1, 2]
    ],
    [
        [2, 0], [2, 1], [2, 2]
    ],
    [
        [0, 0], [1, 1], [2, 2]
    ],
    [
        [2, 0], [1, 1], [0, 2]
    ]
];

$possibleSymbols = ["A", "B", "C"];
$comboMoney = [5, 10, 15];

$playerMoney = readline("Provide your money amount: ");
$spinCost = readline("Choose the spin price: ");


function displayBoard(array $board): void
{

    foreach ($board as $item) {
        foreach ($item as $value) {
            echo " $value ";
        }
        echo PHP_EOL;
    }
}

function checkCombos(array $combinations, array $board, array $possibleSymbols): array
{
    $winnerSymbol = [];
    for ($i = 0; $i < sizeof($possibleSymbols); $i++) {
        foreach ($combinations as $combination) {
            foreach ($combination as $item) {
                [$row, $column] = $item;

                if ($board[$row][$column] !== $possibleSymbols[$i]) {
                    break;
                }

                if (end($combination) === $item) { // checks if the iteration is the last one
                    $winnerSymbol[] = $possibleSymbols[$i]; // was --> return true;
                }
            }
        }
    }
    return $winnerSymbol; // was --> return false;
}

if($spinCost > $playerMoney){
    echo "You don't have enough money to play. Try again!" . PHP_EOL;
    exit;
}

echo displayBoard($board);

while($playerMoney > $spinCost) {

    echo "Price to spin is $spinCost EUR!" . PHP_EOL;
    readline("Press enter to spin!");

    foreach ($board as $row => $item) {
        foreach ($item as $key => $value) {
            $board[$row][$key] = $possibleSymbols[array_rand($possibleSymbols)]; // assigned to each place random value from the possibleSymbols array
        }
    }

    echo displayBoard($board);

    $winners = checkCombos($combinations, $board, $possibleSymbols);

    if(!empty($winners)) {
        $playerMoney = $playerMoney - $spinCost;
        foreach ($winners as $symbol) {
            for($i = 0; $i < count($possibleSymbols); $i++){
                if($symbol === $possibleSymbols[$i]){
                    $moneyWon = $comboMoney[$i] * $spinCost;
                    echo "You won $moneyWon EUR with the combination of $possibleSymbols[$i]'s!" . PHP_EOL;
                    $playerMoney = $playerMoney + $moneyWon;
                }
            }
        }
    }
    else{
        echo "No combinations. You lost $spinCost EUR!" . PHP_EOL;
        $playerMoney = $playerMoney - $spinCost;
    }

    echo "Your total money is: $playerMoney EUR" . PHP_EOL;
    echo "---------------------------------------" . PHP_EOL;
}