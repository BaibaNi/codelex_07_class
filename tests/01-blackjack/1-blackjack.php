<?php
//Create an application BLACKJACK.
//Task consists of basic blackjack application where player plays against computer (desk).
//Each card has assigned value (number) that makes combination.
//Options: Option start the game, "hold" or "pick card". Player can pick card unless it goes over combination of 21. (total sum).
//If the value goes over 21, player looses.
//If player decided "hold", then computer starts to draw cards. If computer goes over 21, he looses.
//If computer reached value between 17-21 and player holds, then the decision is made by who has the higher number.
//!!! YOU DON'T NEED TO MAKE FULL GAME WITH ALL POSSIBLE SCENARIOS, MODES, BLACKJACK MOMENT etc. !!!
// Rules: https://en.wikipedia.org/wiki/Blackjack

// to improve: Ace = 1 or 11 / picked cards taken out / computer = automated
// ** Card, PLayer, Deck, Black Jack game classes + app...

require_once "BlackJack.php";

$player1 = "Human";
$player2 = "Computer";
$activePlayer = $player1;

$cardPlayer = new BlackJack();
$cardDealer = new BlackJack();
$card = $cardPlayer;


echo "Start the game!" . PHP_EOL;


while($card->get21() < 21) {
    $pickedCard = $card->pickCard();
    echo "$activePlayer, you got " . $card->getPickedCard($pickedCard) . " of " . $card->getPickedFamily($pickedCard) . PHP_EOL;
    $card->addPickedCard($pickedCard);
    $allPickedCards = $card->getAllPickedCards();

    echo "$activePlayer, your current result is: " . $card->get21() . PHP_EOL;

    if($cardPlayer->get21() > 21 || $cardDealer->get21() > 21){
        echo "$activePlayer, you lost!" . PHP_EOL;
        exit;
    } elseif($cardPlayer->get21() < 21 && $cardDealer->get21() === 21){
        echo "Dealer won!" . PHP_EOL;
        exit;
    } elseif($cardPlayer->get21() === 21 && $cardDealer->get21() < 21){
        echo "Human, you won!" . PHP_EOL;
        exit;
    }

    echo "[1] - Pick a card" . PHP_EOL;
    echo "[2] - Hold" . PHP_EOL;

    $choice = readline(">> ");

    switch ($choice) {
        case 2:
            $activePlayer = $player2;
            $card = $cardDealer;
            break;
        default:
            break;
    }
}


