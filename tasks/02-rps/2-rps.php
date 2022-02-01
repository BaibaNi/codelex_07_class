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
["P", "R"], ["R", "S"], ["S", "P"], ["R", "L"], ["L", "SP"], ["SP", "S"], ["S", "L"], ["L", "P"], ["P", "SP"], ["SP", "R"]
];

$prs = fopen("prs_log.csv", "w");

function giveResult(array $winningCombinations, array $possibleChoices, string $player, string $computer): array {
    $prsLogs = [];

    echo "Player selected: {$player}." . PHP_EOL;
    echo "Computer selected: {$computer}." . PHP_EOL;

    $prsLogs[] = "Player selected: {$player}.";
    $prsLogs[] = "Computer selected: {$computer}.";

    if(in_array($player, $possibleChoices)) {
        if ($player === $computer) {
            echo "Result: Tie!" . PHP_EOL;
            $prsLogs[] = "Result: Tie!";
        } else {
            foreach ($winningCombinations as $combination) {
                if ($player === $combination[0] && $computer === $combination[1]) {
                    echo "Result: Player wins!" . PHP_EOL;
                    $prsLogs[] = "Result: Player wins!";
                } elseif ($computer === $combination[0] && $player === $combination[1]) {
                    echo "Result: Computer wins!" . PHP_EOL;
                    $prsLogs[] = "Result: Computer wins!";
                }
            }
        }
    }
    else{
        echo "Unavailable selection." . PHP_EOL;
        $prsLogs[] = "Unavailable selection.";
    }
    return $prsLogs;
}

fputcsv($prs, giveResult($winningCombinations, $possibleChoices, $player, $computer));
fclose($prs);