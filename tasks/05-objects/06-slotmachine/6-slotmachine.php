<?php
class Board
{
    private int $columnCount;
    private array $board = [];
    private array $possibleSymbols = ["A", "B", "C"];
    private array $comboMoney = [5, 10, 15];

    public function createBoard(int $columnCount): array
    {
        $this->columnCount = $columnCount;
        $boardRow = array_fill(0, $this->columnCount, "-");
        $this->board = array_fill(0, 3, $boardRow);
        return $this->board;
    }

    public function playGame(): array
    {
        foreach ($this->board as $row => $item) {
            foreach ($item as $key => $value) {
                $this->board[$row][$key] = $this->possibleSymbols[array_rand($this->possibleSymbols)];
            }
        }
        return $this->board;
    }

    public function displayBoard(): void
    {
        foreach ($this->board as $row)
        {
            foreach ($row as $value)
            {
                echo " $value ";
            }
            echo PHP_EOL;
        }
    }

    public function getBoard(): array
    {
        return $this->board;
    }

    public function getSymbols(): array
    {
        return $this->possibleSymbols;
    }

    public function getComboMoney(): array
    {
        return $this->comboMoney;
    }

    public function getColumnCount(): int
    {
        return $this->columnCount;
    }
}

class Combinations
{
    private array $combinations3x3 = [
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

    private array $combinations3x4 = [
        [
            [0, 0], [0, 1], [0, 2], [0, 3]
        ],
        [
            [1, 0], [1, 1], [1, 2], [1, 3]
        ],
        [
            [2, 0], [2, 1], [2, 2], [2, 3]
        ],
        [
            [0, 0], [1, 1], [2, 2], [2, 3]
        ],
        [
            [2, 0], [1, 1], [0, 2], [0, 3]
        ]
    ];

    public function getCombinations3x3(): array
    {
        return $this->combinations3x3;
    }

    public function getCombinations3x4(): array
    {
        return $this->combinations3x4;
    }

}

class Player
{
    private int $playerMoney;
    private int $spinCost;

    public function __construct(int $playerMoney, int $spinCost)
    {
        $this->playerMoney = $playerMoney;
        $this->spinCost = $spinCost;
    }

    public function getPlayerMoney(): int
    {
        return $this->playerMoney;
    }

    public function getSpinCost(): int
    {
        return $this->spinCost;
    }

    public function calculateWonMoney(int $moneyWon): void
    {
        $this->playerMoney += $moneyWon;
    }

    public function calculateLostMoney(): void
    {
        $this->playerMoney -= $this->spinCost;
    }
}

//----- FUNCTION TO CHECK COMBINATIONS ---------------------------------------------------------------------------------
function checkCombinations(array $combinations, array $board, array $possibleSymbols): array
{
    $winnerSymbol = [];
    for ($i = 0; $i < sizeof($possibleSymbols); $i++) {
        foreach ($combinations as $combination) {
            foreach ($combination as $item) {
                [$row, $column] = $item;

                if ($board[$row][$column] !== $possibleSymbols[$i]) {
                    break;
                }

                if (end($combination) === $item) {
                    $winnerSymbol[] = $possibleSymbols[$i];
                }
            }
        }
    }
    return $winnerSymbol;
}


//----- APPLICATION: INITIATE THE BOARD OF THE GAME --------------------------------------------------------------------
echo "Choose the the game:" . PHP_EOL;
echo "[1] - 3x3" . PHP_EOL;
echo "[2] - 3x4" . PHP_EOL;

$gameChoice = readline(">> ");
$board = new Board();
$combinations = new Combinations();

switch ($gameChoice) {
    case 1:
        $gameBoard= $board->createBoard(3);
        $combinations = $combinations->getCombinations3x3();
        break;
    case 2:
        $gameBoard = $board->createBoard(4);
        $combinations = $combinations->getCombinations3x4();
        break;
    default:
        echo "Invalid choice." . PHP_EOL;
        exit;
}


//----- APPLICATION: MONEY & SETUP -------------------------------------------------------------------------------------
$playerSetsMoney = readline("Provide your money amount: ");
$PlayerSetsSpinCost = readline("Choose the spin price: ");

$player = new Player($playerSetsMoney, $PlayerSetsSpinCost);


if($player->getSpinCost() > $player->getPlayerMoney()){
    echo "You don't have enough money to play. Try again later!" . PHP_EOL;
    exit;
}

echo "You have chosen 3x" . $board->getColumnCount() . " game:" . PHP_EOL;
$board->displayBoard();
echo "Selected price to spin is " . $player->getSpinCost() . " EUR!" . PHP_EOL;

//----- APPLICATION: PLAY ----------------------------------------------------------------------------------------------
while($player->getPlayerMoney() >= $player->getSpinCost()) {

    readline("Press enter to spin!");

    $board->playGame();
    $board->displayBoard();

    $winners = checkCombinations($combinations, $board->getBoard(), $board->getSymbols());

    $player->calculateLostMoney();

    if(!empty($winners)) {
        foreach ($winners as $symbol) {
            for($i = 0; $i < count($board->getSymbols()); $i++){
                if($symbol === $board->getSymbols()[$i]){
                    $moneyWon = $board->getComboMoney()[$i] * $player->getSpinCost();
                    echo "You won $moneyWon EUR with the combination of " . $board->getSymbols()[$i] . "'s!" . PHP_EOL;
                    $player->calculateWonMoney($moneyWon);
                }
            }
        }
    } else{
        echo "No combinations. You lost " . $player->getSpinCost(). " EUR!" . PHP_EOL;
    }

    echo "Your total money is: " . $player->getPlayerMoney() . " EUR" . PHP_EOL;
    echo "---------------------------------------" . PHP_EOL;

    if($player->getPlayerMoney() >= 2 * $playerSetsMoney){
        echo "You have at least DOUBLED your money." . PHP_EOL;
        echo "Do you want to continue or withdraw?" . PHP_EOL;
        echo "[1] - CONTINUE PLAYING" . PHP_EOL;
        echo "[2] - WITHDRAW MONEY" . PHP_EOL;
        $continueWithdraw = readline(">> ");

        switch ($continueWithdraw){
            case 1:
                echo "Let's continue! You currently have " . $player->getPlayerMoney() . " EUR." . PHP_EOL;
                $playerSetsMoney = 2 * $playerSetsMoney;
                break;
            default:
                echo "Thank you for playing! You have won " . $player->getPlayerMoney() . " EUR." . PHP_EOL;
                exit;

        }
    }
}