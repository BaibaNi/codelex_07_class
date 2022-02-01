<?php
// Rock, Paper, Scissors
// Spēlētāju skaits: 1
// Spēle notiek pret datoru
// Spēles notikumu "logs", kurā tiek saglabāts spēlētāja izvēle + pret ko cīnījās un kāds bija rezultāts.
// Spēles papildinājums - divi papildus elementi: lizards, spock (https://bigbangtheory.fandom.com/wiki/Rock,_Paper,_Scissors,_Lizard,_Spock)

echo "PAPER, ROCK, SCISSORS, LIZARD, SPOCK" . PHP_EOL;
$possibleChoices = ["P", "R", "S", "L", "SP"];
$computer = $possibleChoices[array_rand($possibleChoices)];
$player = readline("Select your choice (P, R, S, L, SP): ");

$winningCombinations = [
    "P" => ["R", "SP"],
    "R" => ["S", "L"],
    "S" => ["P", "L"],
    "L" => ["SP", "P"],
    "SP" => ["R", "S"]
];

$prs2 = fopen("prs_log2.csv", "w");

function giveResult(array $winningCombinations, array $possibleChoices, string $player, string $computer): array {
    $prsLogs = [];

    echo "Player selected: {$player}." . PHP_EOL;
    echo "Computer selected: {$computer}." . PHP_EOL;

    $prsLogs[] = "Player selected: {$player}.";
    $prsLogs[] = "Computer selected: {$computer}.";

    if(in_array($player, $possibleChoices)) {
        echo in_array($computer, $winningCombinations[$player]) ? "Player wins!" . PHP_EOL : "Computer wins!" . PHP_EOL;
        $prsLogs[] = in_array($computer, $winningCombinations[$player]) ? "Player wins!" : "Computer wins!";
    }
    else{
        echo "Unavailable selection." . PHP_EOL;
        $prsLogs[] = "Unavailable selection.";
    }
    return $prsLogs;
}

fputcsv($prs2, giveResult($winningCombinations, $possibleChoices, $player, $computer));
fclose($prs2);