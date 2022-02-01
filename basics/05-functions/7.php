<?php
//Imagine you own a gun store. Only certain guns can be purchased with license types.
// Create an object (person) that will be the requester to purchase a gun (object)
// Person object has a name, valid licenses (multiple) & cash.
// Guns are objects stored within an array. Each gun has license letter, price & name.
// Using PHP in-built functions determine if the requester (person) can buy a gun from the store.

$person = new stdClass(); // the requester to purchase
$person->name = "Killer"; // can have a user input: readline("Your name:  ");
$person->cash = 10; // can have a user input: (int) readline("Your money:  ");
$person->license = ["A", "C"]; // can have a user input: explode(',', readline("Enter licenses: "))

function createWeapon(string $name, int $price, ?string $license = null): stdClass {
    $weapon = new stdClass();
    $weapon->name = $name;
    $weapon->license = $license;
    $weapon->price = $price;
    return $weapon;
}

$weapons = [
    createWeapon("Gunner", 3, "A"),
    createWeapon("Shooter", 5, "B"),
    createWeapon("Sniper", 11,"C"),
    createWeapon("Knife", 7)
];

echo "{$person->name} has {$person->cash}$." . PHP_EOL . PHP_EOL;

$basket = [];
while(true){
    echo "Select: " . PHP_EOL;
    echo "1 - Purchase" . PHP_EOL;
    echo "2 - Checkout" . PHP_EOL;
    echo "any - Exit" . PHP_EOL;

    $selectIfContinue = (int) readline(">> ");
    echo PHP_EOL;

    switch($selectIfContinue){
        case 1: // Purchase

            foreach ($weapons as $index => $weapon){
                echo "$index - {$weapon->name} ({$weapon->license}) {$weapon->price}$" . PHP_EOL;
            }

            $selectedWeaponIndex = (int) readline("{$person->name}, please, select a weapon you want to purchase: ");
            $weapon = $weapons[$selectedWeaponIndex] ?? null; // checks if the selected weapon exists in the list bases on the index

            if($weapon === null){
                echo "Weapon is not found." . PHP_EOL;
                exit;
            }

            if($weapon->license !== null && !in_array($weapon->license, $person->license)){
                echo "Invalid license." . PHP_EOL;
                exit;
            }

            $basket[] = $weapon; // or array_push()
            echo "{$weapon->name} was added to basket." . PHP_EOL . PHP_EOL;
            break;

        case 2: // Checkout
            $totalSum = 0;
            foreach ($basket as $weapon){
                $totalSum += $weapon->price;
                echo "{$weapon->name}" . PHP_EOL;
            }

            echo "--------------------". PHP_EOL;
            echo "Total: $totalSum $" .PHP_EOL;

//            if($person->cash >= $totalSum){
//                echo "Payment was successful" . PHP_EOL;
//            }
//            else{
//                echo "Payment failed. Not enough cash." . PHP_EOL;
//            }

            echo $person->cash >= $totalSum ? "Payment was successful." . PHP_EOL : "Payment failed. Not enough cash." . PHP_EOL;

            exit;

        default:
            exit;
    }

}
