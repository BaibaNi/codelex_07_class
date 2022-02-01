<?php

require_once "Card.php";
require_once "Deck.php";
require_once "Player.php";
require_once "BlackPeterGame.php";

$game = new BlackPeterGame();
$player1 = new Player();
$player2 = new Player();


function displayCards(object $player): void{
    /** @var Player $player */
    foreach($player->getCards() as $card){
        /** @var Card $card */
        echo " [" . $card->getDisplayValue() . "] ";
    }
    echo PHP_EOL;
}


function checkWinner(object $player1, object  $player2): void
{
    if(empty($player1->getCards()) && count($player2->getCards()) === 1){
        echo ">> GAME OVER! Player 2 is the BLACK PETER!" . PHP_EOL;
        exit;
    } elseif (empty($player2->getCards()) && count($player1->getCards()) === 1) {
        echo ">> GAME OVER! Player 1 is the BLACK PETER!" . PHP_EOL;
        exit;
    }
}

// DEAL CARDS -------------------------------
for($i = 0; $i < 25; $i++){
    $player1->addCard($game->deal());
}

for($i = 0; $i < 24; $i++){
    $player2->addCard($game->deal());
}


echo "----- DISTRIBUTED CARDS -----------------------" . PHP_EOL;
echo "Player 1: " . PHP_EOL;
displayCards($player1);

echo "Player 2: " . PHP_EOL;
displayCards($player2);



echo PHP_EOL . "----- AFTER REMOVING PAIRS ---------------------" . PHP_EOL;
$player1->disband();
$player2->disband();

echo "Player 1: ";
displayCards($player1);

echo "Player 2: ";
displayCards($player2);


$turn = 1;
while(!empty($player1->getCards()) || !empty($player2->getCards())){

    echo PHP_EOL . "----- ROUND $turn -------------------------------------" . PHP_EOL;

    $player1->addCard($player2->removeCard());
    $player1->disband();

    if(empty($player1->getCards()) || empty($player2->getCards())){
        echo "Player 1: ";
        displayCards($player1);

        echo "Player 2: ";
        displayCards($player2);

        checkWinner($player1, $player2);
    }

    $player2->addCard($player1->removeCard());
    $player2->disband();

    echo "Player 1: ";
    displayCards($player1);

    echo "Player 2: ";
    displayCards($player2);

    $turn++;

    checkWinner($player1, $player2);
    sleep(1);
}


