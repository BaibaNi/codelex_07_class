<?php
//Create a class called Date that includes: three pieces of information as instance variables — a month, a day and a year.
//Your class should have a constructor that initializes the three instance variables and assumes that the values provided are correct.
//Provide a set and a get for each instance variable.
//Provide a method DisplayDate that displays the month, day and year separated by forward slashes /.
//Write a test application named DateTest that demonstrates class Date capabilities.
// --> klase, kas testē Date klasi. pārbaudīt, vai strādā (neatkarīgi no aplikācijas; izveidot testa gadījumus)

require_once "Date.php";
require_once "DateTest.php";


$date = new Date("26", "01", "2022");
(new DateTest($date))->testDateFormat();

$date->setDay("2022");
(new DateTest($date))->testYearIsLast();

$date->setMonth("23");
(new DateTest($date))->testMonthDayPosition();

$date->setYear("23");
(new DateTest($date))->testYearIsFourDigits();