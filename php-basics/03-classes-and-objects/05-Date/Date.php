<?php
class Date
{
    private string $day;
    private string $month;
    private string $year;

    public function __construct(string $day, string $month, string $year)
    {
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
    }

    public function getDay(): string
    {
        return $this->day;
    }

    public function getMonth(): string
    {
        return $this->month;
    }

    public function getYear(): string
    {
        return $this->year;
    }

    public function setDay(string $day): void
    {
        $this->day = $day;
    }

    public function setMonth(string $month): void
    {
        $this->month = $month;
    }

    public function setYear(string $year): void
    {
        $this->year = $year;
    }

    public function displayDate(): string
    {
        return "{$this->day}.{$this->month}/{$this->year}";
    }

}

