<?php
class Dog
{
    private string $name;
    private string $sex;

    private string $mother;
    private string $father;

    public function __construct(string $name, string $sex, string $mother = "Unknown", string $father = "Unknown")
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->mother = $mother;
        $this->father = $father;
    }

    public function fathersName(): string
    {
        if($this->father === "null"){
            return "Unknown";
        }
        return $this->father;
    }

    public function mothersName(): string
    {
        return $this->mother;
    }

    public function hasSameMotherAs(Dog $otherDog): bool
    {
        return $this->mother === $otherDog->mothersName() ? true : false;
    }
}