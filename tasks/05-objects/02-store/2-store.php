<?php

class Product{
    public string $name;
    public float $price;
    public int $quantity;

    public function __construct(string $name, float $price, int $quantity){
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}

class Store{
    public array $store = [];

    public function addProduct(Product $product): void{
        $this->store[] = $product;
    }

    public function totalSum(): float{
        $sum = 0;
        foreach ($this->store as $product){
            $sum = $sum + $product->price * $product->quantity;
        }
        return $sum;
    }
}

$prod1 = new Product("Apple", 0.21, 140);
$prod2 = new Product("Bread", 1.88, 409);
$prod3 = new Product("Plate", 7.59, 78);
$prod4 = new Product("Mug", 10.59, 46);

$store = new Store();
$store->addProduct($prod1);
$store->addProduct($prod2);
$store->addProduct($prod3);
$store->addProduct($prod4);

//var_dump($store); die;

echo "Product  |  Price (EUR)  |  Quantity (pcs)" . PHP_EOL;
echo "-------------------------------------" . PHP_EOL;

foreach ($store as $item) {
    foreach ($item as $product) {
        echo "$product->name    |  $product->price EUR    |  $product->quantity pcs" . PHP_EOL;
    }
}

echo "-------------------------------------" . PHP_EOL;
echo "TOTAL: " . $store->totalSum() . " EUR" . PHP_EOL;

