<?php
class Person{
    private string $name;
    private string $surname;
    private string $code;

    public function __construct(string $name, string $surname, string $code){
        $this->name = $name;
        $this->surname = $surname;
        $this->code = $code;
    }

    public function getName(){
        return $this->name;
    }

    public function getSurname(){
        return $this->surname;
    }

    public function getCode(){
        return $this->code;
    }
}

class Register{
    private array $register = [];

    public function addPerson(Person $person): void {
        $this->register[] = $person;
    }

    public function getPerson(): array{
        return $this->register;
    }
}

$register = new Register();

while(true) {
    echo "[1] Add person" . PHP_EOL;
    echo "[2] View list" . PHP_EOL;
    $selection = readline(">> ");

    if ($selection == 1) {
        $name = readline("Name: ");
        $surname = readline("Surname: ");
        $code = readline("ID code: ");
        $person = new Person($name, $surname, $code);
        $register->addPerson($person);
    }
    elseif ($selection == 2) {
        foreach ($register->getPerson() as $index => $person) {
            /**@var Person $person */
            echo "[$index] " . $person->getName() . " " . $person->getSurname() . " - " . $person->getCode() . PHP_EOL;
        }
        break;
    }

    else{
        echo "Unavailable choice." . PHP_EOL;
    }
}


