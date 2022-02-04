<?php

require_once "Video.php";
require_once "VideoStore.php";
require_once "Application.php";

$videoStore = new VideoStore();

$videoStore->addVideo("The Matrix");
$videoStore->addVideo("Godfather II");
$videoStore->addVideo("Star Wars Episode IV: A New Hope");


foreach ($videoStore->getInventory() as $video){
    $status = ($video->getAvailability()) ? "available" : "rented";
    echo $video->getTitle() . " | " . $video->getAverageRating() . " ★ | " . $status . PHP_EOL;
}


// --> rateVideo() in App
$videoStore->takeUsersRating("Godfather II", 5);
$videoStore->takeUsersRating("Godfather II", 3);
$videoStore->takeUsersRating("Godfather II", 3);
$videoStore->takeUsersRating("The Matrix", 5);
$videoStore->takeUsersRating("Star Wars Episode IV: A New Hope", 5);
$videoStore->takeUsersRating("Godfather II", 4);
$videoStore->takeUsersRating("The Matrix", 4.007);
$videoStore->takeUsersRating("Star Wars Episode IV: A New Hope", 4.50);


// --> rentVideo() in App
$videoStore->checkOutVideo("Godfather II");
$videoStore->checkOutVideo("The Matrix");
$videoStore->checkOutVideo("Star Wars Episode IV: A New Hope");

echo PHP_EOL . "-----------------" . PHP_EOL;

foreach ($videoStore->getInventory() as $video){
    $status = ($video->getAvailability()) ? "available" : "rented";
    echo $video->getTitle() . " | " . $video->getAverageRating() . " ★ | " . $status . PHP_EOL;
}


// --> returnVideo() in App
$videoStore->returnVideoToStore("The Matrix");
$videoStore->returnVideoToStore("Godfather II");
$videoStore->returnVideoToStore("Star Wars Episode IV: A New Hope");


// --> listInventory() in App
echo PHP_EOL . "-----------------" . PHP_EOL;

foreach ($videoStore->getInventory() as $video){
    $status = ($video->getAvailability()) ? "available" : "rented";
    echo $video->getTitle() . " | " . $video->getAverageRating() . " ★ | " . $status . PHP_EOL;
}