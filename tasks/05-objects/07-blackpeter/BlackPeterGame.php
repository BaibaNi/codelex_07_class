<?php

class BlackPeterGame
{
    private Deck $deck;

    public function __construct()
    {
        $this->deck = new Deck();
    }

    public function deal(): Card
    {
        return $this->deck->draw();
    }

}