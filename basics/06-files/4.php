<?php
//Using PHP in-built functions create a program that accepts 1 argument - filename.
//Create a file with the filename of your choice and store information with comma separated (example. John, Doe, 10)
//Using PHP in-built functions read information from this file and create an object based on information from the file.
//Output the name, surname and age of the person in the output.


$file = fopen("4-fourth.txt", "r");
echo fread($file, filesize("4-fourth.txt")) . PHP_EOL;
fclose($file);
