<?php
class DogTest
{
    public function testDogParents(Dog $dog): void
    {
        if($dog->mothersName() === "Lady" && $dog->fathersName() === "Rocky"){
            echo "Correct";
        } else {
            echo "NOT correct";
        }
    }

    public function testIfHasFather(Dog $dog): void
    {
        if($dog->fathersName() === "Unknown"){
            echo $dog->getName() . " - father is UNKNOWN.";
        } else{
            echo $dog->getName() . " - father is " . $dog->fathersName();
        }
    }

    public function testSameMother(Dog $dog1, Dog $dog2): void
    {
        if($dog1->mothersName() === $dog2->mothersName() && $dog1->mothersName() !== "Unknown" || $dog2->mothersName() !== "Unknown"){
            echo $dog1->getName() . " and " . $dog2->getName() . " has the same mother.";
        } else{
            echo $dog1->getName() . " and " . $dog2->getName() . " DOES NOT have the same mother.";
        }
    }


}

