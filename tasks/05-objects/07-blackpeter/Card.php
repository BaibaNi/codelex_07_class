<?php
class Card
{
    private string $symbol; //
    private string $value; //
    private string $color;

    public function __construct(string $symbol, string $value, string $color)
    {
        $this->symbol = $symbol;
        $this->value = $value;
        $this->color = $color;
    }

    public function getDisplayValue(): string
    {
        return "{$this->value}.{$this->symbol}"; //.{$this->color}";
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }
}