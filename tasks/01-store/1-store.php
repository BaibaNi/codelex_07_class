<?php
//Story:
//A client asks you to build a simple program for his store that would allow couple of his clients to get information about the products and purchase them.
//
//Task:
//Create a database of products (.csv file)
//Database should hold information about the product
//
// - Name
// - Price
// - Category
// - Description
// - Expiry date
// - Amount
//Requester (buyer) is a .txt file that hold information about the person and how much cash he has.
//Create a store program that you can enter multiple commands.
//When the customer purchases the product, cash from the customer.txt file has to be subtracted.
// Example: "php store.php list" would list all products in the store.
// Example: "php store.php purchase apple-1 10" would make john.php purchase the 10 apples.
//
//Commands:
// - List all products, prices & info
// - List single product info
// - Buy product from the store 1 or multiple items at the same time.
// - Additional
//
//Create import script that will read information from the warehouse file and update your products in the store.
//Note that warehouse could only export their products in .txt file with | as separator.


$personData = explode(",", file_get_contents("customer.txt"));                                          // read the info from file. explode() separates string elements.
                                                                                                                        //or [$name, $cash] = explode(",", file_get_contents("customer.txt"));
$person = new stdClass();
$person->name = $personData[0];                                                                                         // or $person->name = $name;
$person->cash = (int) $personData[1];                                                                                   // or $person->cash = $cash;

function createProduct(string $name, int $price, string $category, string $description, string $expirydate, int $amount): stdClass {
    $product = new stdClass();
    $product->name = $name;
    $product->price = $price;
    $product->category = $category;
    $product->description = $description;
    $product->expirydate = $expirydate;
    $product->amount = $amount;
    return $product;
}

$products = [];
if (($handle = fopen("store.csv", "r")) !== false) {                                                      // if possible to read the file, content of the fopen() function is stored in the variable
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {                                            // false is when file is empty, or finished
        [$name, $price, $category, $description, $expirydate, $amount] = $data;                                         // this can be skipped, but then use createProduct($data[0], $data[1]) in the next line
        if($name !== "Name") {                                                                                          // because this line is existent in the .csv file
            $products[] = createProduct($name, (int)$price, $category, $description, $expirydate, (int) $amount);       // (or array_push) --> make an object according to the parameters
        }
    }
    fclose($handle);
}

echo "{$person->name} has {$person->cash}$." . PHP_EOL . PHP_EOL;

$basket = [];
if(file_exists("cart.txt")) {
    $basket = explode(',', file_get_contents("cart.txt"));
}

$basketAmount = [];
if(file_exists("amounts.txt")) {
    $basketAmount = explode(',', file_get_contents("amounts.txt"));
}


while(true){
    echo "Select: " . PHP_EOL;
    echo "1 - Purchase" . PHP_EOL;
    echo "2 - Checkout" . PHP_EOL;
    echo "any - Exit" . PHP_EOL;

    $selectToContinue = (int) readline(">> ");
    echo PHP_EOL;

    switch($selectToContinue){
// PURCHASE ------------------------------------------------------------------------------------------------------------
        case 1:
            foreach ($products as $index => $product){
                echo "$index - {$product->name} {$product->price}$ | {$product->description} | expires on {$product->expirydate} | available amount: {$product->amount} pcs" . PHP_EOL;
            }

            $selectedProductIndex = (int) readline("{$person->name}, please, select a product you want to purchase: ");
            $product = $products[$selectedProductIndex] ?? null;                                                        // checks if the selected product exists in the list bases on the index

            if($product === null){
                echo "Product is not found." . PHP_EOL;
                exit;
            }

            $purchaseAmount = (int) readline("How many pieces you want to purchase?: ");
            if($purchaseAmount > $product->amount){
                echo "Amount is not available in the store. Available amount: {$product->amount} pcs" . PHP_EOL;
                exit;
            }

//            $basket[] = $product;// or array_push() |
            $basket[] = $selectedProductIndex;                                                                          // store product indexes instead of the whole product
//            var_dump($basket);
            $basketAmount[] = $purchaseAmount;
            var_dump($basketAmount);
            echo "{$product->name}, {$purchaseAmount} pcs - added to basket." . PHP_EOL . PHP_EOL;
            $product->amount -= $purchaseAmount;
            break;

// CHECKOUT ------------------------------------------------------------------------------------------------------------
        case 2:
            $totalSum = 0;
            $amountIndex = 0;
            foreach ($basket as $productIndex){
                $product = $products[$productIndex];
                $amountSaved = $basketAmount[$amountIndex++];
//                var_dump($amountSaved);
                $totalSum += ($product->price * $amountSaved);
                echo "{$product->name} ({$product->price}$/pc) x {$amountSaved} pcs" . PHP_EOL;
            }

            echo "--------------------". PHP_EOL;
            echo "Total: $totalSum $" .PHP_EOL;
            echo $person->cash >= $totalSum ? "Payment was successful." . PHP_EOL : "Payment failed. Not enough cash." . PHP_EOL;


            if(file_exists("cart.txt") && file_exists("amounts.txt")) {
                unlink("cart.txt");
                unlink("amounts.txt");  // clear the existing file
            }

            exit;

// EXIT ----------------------------------------------------------------------------------------------------------------
        default:
            echo "Save the basket" . PHP_EOL;
            $productsIndexes = implode(',', $basket);
            file_put_contents("cart.txt", $productsIndexes); // Store the data
            $productsAmounts = implode(',', $basketAmount);
            file_put_contents("amounts.txt", $productsAmounts);
            exit;
    }
}
