<?php

class Weapon{
    public string $name;
    public int $power;

    public function __construct(string $name, int $power){
        $this->name = $name;
        $this->power = $power;
    }
}

class Inventory{
    public array $inventory = [];

    public function addWeapon(Weapon $weapon): void{
        $this->inventory[] = $weapon;
    }
}


$gun = new Weapon('gun', 20);
$knife = new Weapon('knife', 10);
$sniper = new Weapon('sniper', 150);

$storage = new Inventory();
$storage->addWeapon($gun);
$storage->addWeapon($knife);
$storage->addWeapon($sniper);


foreach ($storage as $item) {
    foreach ($item as $value) {
        echo "Weapon: '$value->name' | Power: $value->power" . PHP_EOL;
    }
}