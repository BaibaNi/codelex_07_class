<?php

$symbol = "#";
$racers = 7; // readline("Enter the player amount: ");
$raceLength = 50;
$maxSteps = 3;
$field = [];
$winnerCoefficients = [2, 1.5, 1.1];

function displayRace(array $field){
    foreach ($field as $index => $item){
        $racerNumber = $index + 1;
        echo "Racer [$racerNumber] ";
        foreach($item as $value){
            echo "$value";
        }
        echo PHP_EOL;
    }
}


// ----- PREPARE FIELD -------------------------------------------------------------------------------------------------
echo "WELCOME! Today we have $racers RACERS!" . PHP_EOL;
echo "Only " . count($winnerCoefficients) . " places are rewarded!" . PHP_EOL;

for($i = 0; $i < $racers; $i++){
    $field[$i] = array_fill(0, $raceLength, "_");
}

displayRace($field);


// ----- TAKE BETS -----------------------------------------------------------------------------------------------------
$doBetAgain = 1;
$betRacerList = [];
while($doBetAgain === 1){
    echo PHP_EOL;
    $betMoney = readline("Make your bet (EUR): ");
    $betRacer = readline("For racer Nr.: ");

    if(!in_array($betRacer, range(1, $racers))){
        echo PHP_EOL . "There is no such racer. Choose again!" . PHP_EOL;
    }
    else{
        echo "Thank you! $betMoney EUR for Racer $betRacer received." . PHP_EOL;
        $betRacerList[] = [$betRacer, $betMoney];
    }

    echo "Do you want to make another bet?" . PHP_EOL;
    echo "[1] - YES!" . PHP_EOL;
    echo "[2] - NO! Start racing." . PHP_EOL;
    $doBetAgain = (int) readline("--> ");
}


// ----- PREPARE FOR START ---------------------------------------------------------------------------------------------
echo PHP_EOL . "On your marks!" . PHP_EOL;

for($i = 0; $i < $racers; $i++){
    $field[$i][0] = $symbol;
}

displayRace($field);
echo PHP_EOL;
readline("Ready? Set! Go!!!");


// ----- RACING --------------------------------------------------------------------------------------------------------
$winners = [];
$racerCount = $racers;
while($racerCount > 0){
    echo PHP_EOL;

    $roundWinners = [];
    for ($i = 0; $i < $racers; $i++) {
        for ($j = 0; $j < $raceLength; $j++) {
            if ($field[$i][$j] === $symbol) {
                $field[$i][$j] = "_";
                if ($j === $raceLength - 3) {
                    $field[$i][$j + 2] = $symbol;
                } elseif ($j === $raceLength - 2) {
                    $field[$i][$j + 1] = $symbol;
                } elseif ($j === $raceLength - 1) {
                    $roundWinners[] = $i+1;
                    $racerCount--;
                } else {
                    $field[$i][$j + rand(1, $maxSteps)] = $symbol;
                    break;
                }
            }
        }
    }
    if(count($roundWinners) > 0) {
        $winners[] = $roundWinners;
    }

    displayRace($field);
    sleep(1);
}


// ----- LIST WINNERS --------------------------------------------------------------------------------------------------
echo PHP_EOL . "-------- PODIUM --------" . PHP_EOL;
foreach ($winners as $index => $racers){
    $place = $index + 1;
    foreach ($racers as $racer) {
        echo " $place.place: Racer $racer." . PHP_EOL;
    }
}


// ----- CALCULATE WINNING MONEY ---------------------------------------------------------------------------------------
$wonMoney = 0;
$totalBetMoney = 0;
foreach ($betRacerList as $index => $bet) {
    [$betRacer, $betMoney] = $bet;
    foreach ($winners as $place => $winnerList) {
        for ($i = 0; $i < count($winnerList); $i++) {
            if ($winnerList[$i] == $betRacer && $place < count($winnerCoefficients)) {
                $wonMoney = $wonMoney + $betMoney * $winnerCoefficients[$place];
            }
        }
    }
    $totalBetMoney = $totalBetMoney + $betMoney;
}


// ----- WINNING MONEY DETAILS -----------------------------------------------------------------------------------------
echo PHP_EOL . "-------- DETAILS OF YOUR BETS --------" . PHP_EOL;

$lostMoney = 0;
$totalWonMoney = 0;
foreach ($betRacerList as $bet){
    [$betRacer, $betMoney] = $bet;
    foreach ($winners as $place => $winnerList) {
        $realPlace = $place + 1;
        for ($i = 0; $i < count($winnerList); $i++) {
            if ($winnerList[$i] == $betRacer) {
                if ($place < count($winnerCoefficients)) {
                    $subMoney = $betMoney * $winnerCoefficients[$place] - $betMoney;
                    $totalWonMoney = $totalWonMoney + $subMoney;
                    echo "Racer $betRacer | Bet: $betMoney EUR | Place $realPlace - coefficient: $winnerCoefficients[$place] | Won $subMoney EUR" . PHP_EOL;
                }
                else {
                    $lostMoney = $lostMoney + $betMoney;
                    echo "Racer $betRacer | Bet: $betMoney EUR | Place $realPlace - coefficient: 0 | Lost $betMoney EUR" . PHP_EOL;
                }
            }

        }
    }
}

echo "--------------------------------------" . PHP_EOL;
echo "Total bet amount: $totalBetMoney EUR." . PHP_EOL;
echo " - Total lost amount: $lostMoney EUR." . PHP_EOL;
echo " + Total won amount: $totalWonMoney EUR." . PHP_EOL;
echo "--------------------------------------" . PHP_EOL;
echo " = YOU HAVE NOW $wonMoney EUR." . PHP_EOL;

