<?php
//Create a class Product that represents a product sold in a shop. A product has a price, amount and name.
//The class should have:
// - A constructor Product(string name, float startPrice, int amount)
// - A function printProduct() that prints a product in the following form:
// -- Banana, price 1.1, amount 13
//Test your code by creating a class with main method and add three products there:
// - "Logitech mouse", 70.00 EUR, 14 units
// - "iPhone 5s", 999.99 EUR, 3 units
// - "Epson EB-U05", 440.46 EUR, 1 units
//Print out information about them.
//Add new behaviour to the Product class:
// - possibility to change quantity
// - possibility to change price
//Reflect your changes in a working application.


class Product
{
    public string $name;
    public float $startPrice;
    public int $amount;

    public function __construct(string $name, float $startPrice, int $amount)
    {
        $this->name = $name;
        $this->startPrice = $startPrice;
        $this->amount = $amount;
    }

    public function printProduct(): void
    {
        echo "$this->name, price $this->startPrice EUR, amount $this->amount units" . PHP_EOL;
    }

    public function changeQuantity(int $newAmount): int
    {
        $this->amount = $newAmount;
        return $newAmount;
    }

    public function changePrice(float $newPrice): float
    {
        $this->startPrice = $newPrice;
        return $newPrice;
    }

}

$mouse = new Product("Logitech mouse", 70.00, 14);
$phone = new Product("iPhone 5s", 999.99, 3);
$projector = new Product("Epson EB-U05", 440.46, 1);

echo "AVAILABLE PRODUCTS IN THE STORE:" . PHP_EOL;
echo "[1] - "; $mouse->printProduct();
echo "[2] - "; $phone->printProduct();
echo "[3] - "; $projector->printProduct();
echo "----------------------------------------" . PHP_EOL;

while(true) {
    echo PHP_EOL . "Would you like to update products in the store?" . PHP_EOL;
    echo "[1] - YES - change price" . PHP_EOL;
    echo "[2] - YES - change amount" . PHP_EOL;
    echo "[3] - NO - exit" . PHP_EOL;
    $selection = readline(">> ");

    switch ($selection) {
        case 1:
            echo "Which product's PRICE you would like to change?" . PHP_EOL;
            $product = readline(">> ");
            switch ($product) {
                case 1:
                    $newPrice = readline("What is the new price? ");
                    $mouse->changePrice($newPrice);
                    break;
                case 2:
                    $newPrice = readline("What is the new price? ");
                    $phone->changePrice($newPrice);
                    break;
                case 3:
                    $newPrice = readline("What is the new price? ");
                    $projector->changePrice($newPrice);
                    break;
                default:
                    echo "There is no such product." . PHP_EOL;
                    break;
            }
            break;
        case 2:
            echo "Which product's AMOUNT you would like to change?" . PHP_EOL;
            $product = readline(">> ");
            switch ($product) {
                case 1:
                    $newAmount = readline("What is the new amount? ");
                    $mouse->changeQuantity($newAmount);
                    break;
                case 2:
                    $newAmount = readline("What is the new amount? ");
                    $phone->changeQuantity($newAmount);
                    break;
                case 3:
                    $newAmount = readline("What is the new amount? ");
                    $projector->changeQuantity($newAmount);
                    break;
                default:
                    echo "There is no such a product." . PHP_EOL;
                    break;
            }
            break;
        default:
            echo PHP_EOL . "AVAILABLE (UPDATED) PRODUCTS IN THE STORE:" . PHP_EOL;
            echo "[1] - "; $mouse->printProduct();
            echo "[2] - "; $phone->printProduct();
            echo "[3] - "; $projector->printProduct();
            echo "----------------------------------------" . PHP_EOL;
            echo "Bye-bye!" . PHP_EOL;
            exit;
    }

    echo PHP_EOL . "AVAILABLE (UPDATED) PRODUCTS IN THE STORE:" . PHP_EOL;
    echo "[1] - "; $mouse->printProduct();
    echo "[2] - "; $phone->printProduct();
    echo "[3] - "; $projector->printProduct();
    echo "----------------------------------------" . PHP_EOL;
}