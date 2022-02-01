<?php
//A soft drink company recently surveyed 12,467 of its customers and found that approximately 14 percent of those
// surveyed purchase one or more energy drinks per week. Of those customers who purchase energy drinks,
// approximately 64 percent of them prefer citrus flavored energy drinks.
//Write a program that displays the following:
// - The approximate number of customers in the survey who purchased one or more energy drinks per week
// - The approximate number of customers in the survey who prefer citrus flavored energy drinks
class Survey
{
    private string $name;
    private int $surveyed;

    public function __construct(string $name, int $surveyed)
    {
        $this->name = $name;
        $this->surveyed = $surveyed;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurveyed(): int
    {
        return $this->surveyed;
    }

}

class EnergyDrinks extends Survey
{
    private float $purchased_energy_drinks;
    private float $prefer_citrus_drinks;

    public function __construct(string $name, int $surveyed, float $purchased_energy_drinks, float $prefer_citrus_drinks)
    {
        parent::__construct($name, $surveyed);
        $this->purchased_energy_drinks = $purchased_energy_drinks;
        $this->prefer_citrus_drinks = $prefer_citrus_drinks;
    }

    public function calculate_energy_drinkers(int $numberSurveyed): int
    {
        if($numberSurveyed){
            return $numberSurveyed * $this->purchased_energy_drinks;
        }
        else{
            throw new LogicException(";(");
        }
    }

    public function calculate_prefer_citrus(int $numberSurveyed): int
    {
        if($numberSurveyed){
            return $numberSurveyed * $this->purchased_energy_drinks * $this->prefer_citrus_drinks;
        }
        throw new LogicException(";(");
    }
}


$surveyed = 12467;
$purchased_energy_drinks = 0.14;
$prefer_citrus_drinks = 0.64;

$energyDrinks = new EnergyDrinks("ENERGY DRINKS", $surveyed, $purchased_energy_drinks, $prefer_citrus_drinks);

echo "Total number of people surveyed in " . $energyDrinks->getName() . " survey: " . $energyDrinks->getSurveyed() . PHP_EOL;
echo "Approximately " . $energyDrinks->calculate_energy_drinkers($surveyed) . " people bought at least one energy drink" . PHP_EOL;
echo $energyDrinks->calculate_prefer_citrus($surveyed) . " of those prefer citrus flavored energy drinks." . PHP_EOL;




