<?php
class Deck
{
    private array $cards = [];
    private array $symbols = [
        '♦', '♧', '♥', '♤'
    ];


    public function __construct(array $cards = [])
    {
        $this->cards = $cards;
        if (empty($this->cards)) $this->createDeck();
    }

    public function draw(): Card
    {
        $randomCardIndex = array_rand($this->cards);
        $card = $this->cards[$randomCardIndex];
        array_splice($this->cards, $randomCardIndex, 1);
        return $card;
    }

    private function createDeck(): void
    {
        $this->cards = [];
        for ($i = 2; $i <= 14; $i++) {
            for ($j = 0; $j < 4; $j++) {
                ($j % 2 == 0) ? $color = "R" : $color = "B";
                switch ($i) {
                    case 11:
                        break; // all Jacks are removed, except for the Jack of Spades - that is added at the end
                    case 12:
                        $this->cards[] = new Card($this->symbols[$j], 'Q', $color);
                        break;
                    case 13:
                        $this->cards[] = new Card($this->symbols[$j], 'K', $color);
                        break;
                    case 14:
                        $this->cards[] = new Card($this->symbols[$j], 'A', $color);
                        break;
                    default:
                        $this->cards[] = new Card($this->symbols[$j], $i, $color);
                        break;
                }
            }
        }
        $this->cards[] = new Card('♤', 'J', 'B');
    }
}