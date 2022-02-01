<?php
//Code an interactive, two-player game of Tic-Tac-Toe. You'll use a two-dimensional array of chars.

function display_board()
{
    echo "   |   |   \n";
    echo "---+---+---\n";
    echo "   |   |   \n";
    echo "---+---+---\n";
    echo "   |   |   \n";
}

display_board();


$board = [
    [" ", " ", " "],
    [" ", " ", " "],
    [" ", " ", " "]
];

$validCombinations = ["00", "01", "02", "10", "11", "12", "20", "21", "22"];

$countOfTurns = 0;
$player1 = "X";
$player2 = "O";

$activePlayer = $player1;

while(sizeof($validCombinations) > 0) {

    do{
        $selection = readline("{$activePlayer}, choose your location (row, column): ");
        if ($invalidChoice = !in_array($selection, $validCombinations, TRUE)) {
            echo "Impossible choice." . PHP_EOL;
        }
    }while($invalidChoice);

    $selectionCoordinates = str_split($selection); // array of [x, y]
    $x = $selectionCoordinates[0];
    $y = $selectionCoordinates[1];
    $board[$x][$y] = $activePlayer;

    unset($validCombinations[array_search($selection, $validCombinations)]); // removes element at the key, that is value = selection; from the array of valid choices

    echo " " . $board[0][0] . " | " . $board[0][1] . " | " . $board[0][2] . PHP_EOL;
    echo "---+---+---" . PHP_EOL;
    echo " " . $board[1][0] . " | " . $board[1][1] . " | " . $board[1][2] . PHP_EOL;
    echo "---+---+---" . PHP_EOL;
    echo " " . $board[2][0] . " | " . $board[2][1] . " | " . $board[2][2] . PHP_EOL;

    $countOfTurns++;

    if($countOfTurns > 4){
        if(
            ($board[0][0] !== " " && $board[0][0] === $board[0][1] && $board[0][0] === $board[0][2]) || // rows
            ($board[1][0] !== " " && $board[1][0] === $board[1][1] && $board[1][0] === $board[1][2]) ||
            ($board[2][0] !== " " && $board[2][0] === $board[2][1] && $board[2][0] === $board[2][2]) ||
            ($board[0][0] !== " " && $board[0][0] === $board[1][0] && $board[0][0] === $board[2][0]) || // columns
            ($board[0][1] !== " " && $board[0][1] === $board[1][1] && $board[0][1] === $board[2][1]) ||
            ($board[0][2] !== " " && $board[0][2] === $board[1][2] && $board[0][2] === $board[2][2]) ||
            ($board[0][0] !== " " && $board[0][0] === $board[1][1] && $board[0][0] === $board[2][2]) || // diagonals
            ($board[0][2] !== " " && $board[0][2] === $board[1][1] && $board[0][2] === $board[2][0])
        ){
            echo "Winner is player {$activePlayer}" . PHP_EOL;
            exit;
        }
    }

    $activePlayer = ($activePlayer === $player1) ? $player2 : $player1;

}
echo "It's a tie!" . PHP_EOL;

