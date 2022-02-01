<?php

//----- reading conditions from file -----------------------
$gameFile = file_get_contents("default.txt");
[$boardSetup, $combinationsSetup] = explode("\n", $gameFile);


//----- defining a board -----------------------------------
$boardBase = explode(":", $boardSetup);
$boardDimensions = explode("x", $boardBase[1]);
$boardRow = array_fill(0, (int) $boardDimensions[0], "-");
$board = array_fill(0, (int) $boardDimensions[1], $boardRow);


//----- defining possible combinations ---------------------
$combinations = [];
$combinationsBase = explode(":", $combinationsSetup);
foreach (explode("|", $combinationsBase[1]) as $comboNum => $combination)
{
      foreach (explode(";", $combination) as $coordinationIndex => $coordination)
      {
          [$x, $y] = explode(",", $coordination);
          $combinations[$comboNum][$coordinationIndex] = [(int) $x, (int) $y];
      }
}

/**
 * $board = [
    ['-', '-', '-'],
    ['-', '-', '-'],
    ['-', '-', '-'],
];
 */

function displayBoard(array $board): void {

    foreach ($board as $item){
        foreach($item as $value){
            echo " $value ";
        }
        echo PHP_EOL;
    }
}

$player1 = readline("Player 1, choose your symbol: ");
$player2 = readline("Player 2, choose your symbol: ");

$activePlayer = $player1;

/**
$combinations = [
    [
        [0, 0], [0, 1], [0, 2],
    ],
    [
        [1, 0], [1, 1], [1, 2]
    ],
    [
        [2, 0], [2, 1], [2, 2]
    ],
    [
        [0, 0], [1, 0], [2, 0],
    ],
    [
        [0, 1], [1, 1], [2, 1]
    ],
    [
        [0, 2], [1, 2], [2, 2]
    ],
    [
        [0, 0], [1, 1], [2, 2]
    ],
    [
        [2, 0], [1, 1], [0, 2]
    ]
];
*/

function winnerWinnerChickenDinner(array $combinations, array $board, string $activePlayer): bool
{
    foreach ($combinations as $combination) {
        foreach ($combination as $item)
        {
            [$row, $column] = $item;
            if ($board[$row][$column] !== $activePlayer) {
                break;
            }

            if (end($combination) === $item) { // check if the iteration is the last one
                return true;
            }
        }
    }

    return false;
}

function isBoardFull(array $board): bool
{
    foreach ($board as $row) {
        if (in_array('-', $row)) return false;
    }
    return true;
}

while (!isBoardFull($board) && !winnerWinnerChickenDinner($combinations, $board, $activePlayer)) {

    displayBoard($board);

    $position = readline("{$activePlayer}, choose your location (row, column): ");
    [$row, $column] = explode(',', $position);

    if (!isset($board[$row][$column]) || $board[$row][$column] !== '-') { // Place does not exist (!isset()) or is already taken
        echo 'Invalid position.' . PHP_EOL;
        continue;
    }

    $board[$row][$column] = $activePlayer;

    if (winnerWinnerChickenDinner($combinations, $board, $activePlayer))
    {
        displayBoard($board);
        echo "Winner is {$activePlayer}!" . PHP_EOL;
        exit;
    }

    $activePlayer = $player1 === $activePlayer ? $player2 : $player1;
}

displayBoard($board);
echo "It's a tie!" . PHP_EOL;