<?php
//Write a program to play a word-guessing game like Hangman.
//
// - It must randomly choose a word from a list of words.
// - It must stop when all the letters are guessed.
// - It must give them limited tries and stop after they run out.
// - It must display letters they have already guessed (either only the incorrect guesses or all guesses).


$listOfWords = array("leviathan", "elephant", "hippopotamus", "balloon"); // array with random words to choose from
$wordToGuess = str_split($listOfWords[array_rand($listOfWords)]); // select a random word form an array

$word = array_fill(0, sizeof($wordToGuess), "_"); // create an array with _, that is the same size as the chosen word

$missedLetters = [];

while(sizeof($missedLetters) < 5){
//    echo implode(" ", $wordToGuess) . PHP_EOL;
    echo "-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-" . PHP_EOL;
    echo "Word: " . implode(" ", $word) . PHP_EOL; // print out the size of the word to guess
    echo "Misses: " . implode(" ", $missedLetters) . PHP_EOL;

    if(implode(" ", $wordToGuess) === implode(" ", $word) ){
        echo "YOU GOT IT!" . PHP_EOL;
        $option = readline('Play "again" or "quit"?: ');
        exit;
    }

    $guessLetter = readline("Guess: ");

    if(!in_array($guessLetter, $wordToGuess, TRUE)){
        $missedLetters[] = $guessLetter;
    }

    else{
        foreach ($wordToGuess as $index => $letter){
            if($guessLetter === $letter) {
                $word[$index] = $letter;
            }
        }
    }
}