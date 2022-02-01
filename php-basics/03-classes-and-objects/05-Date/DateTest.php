<?php


class DateTest
{
    private Date $date;

    public function __construct(Date $date)
    {
        $this->date = $date;
    }

    public function testDateFormat(): void
    {
        if($this->date->displayDate()[2] === "/" && $this->date->displayDate()[5] === "/"){
            echo "PASS: {$this->date->displayDate()}" . PHP_EOL;
        } else{
          echo "WRONG: / is used for date formatting." . PHP_EOL;
        }
    }

    public function testYearIsLast(): void
    {
        if(strlen($this->date->getDay()) === 2){
            echo "PASS: {$this->date->displayDate()}" . PHP_EOL;
        } else{
            echo "WRONG: Date format is DD/MM/YYYY" . PHP_EOL;
        }
    }

    public function testMonthDayPosition(): void
    {
        if((int) $this->date->getMonth() > 12){
            echo "WRONG: Month is second position: DD/MM/YYYY" . PHP_EOL;
        } else{
            echo "PASS: {$this->date->displayDate()}" . PHP_EOL;
        }
    }


    public function testYearIsFourDigits(): void
    {
        if(strlen($this->date->getYear()) < 4){
            echo "WRONG: Year format is 4 digits." . PHP_EOL;
        } else{
            echo "PASS: {$this->date->displayDate()}" . PHP_EOL;
        }
    }
}
