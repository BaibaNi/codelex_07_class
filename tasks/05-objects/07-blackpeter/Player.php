<?php

class Player
{
    private array $cards = [];

    public function getCards(): array
    {
        return $this->cards;
    }

    public function addCard(Card $card): void
    {
        $this->cards[] = $card;
    }

    public function disband1(): void // removing pairs not taking into account the colors
    {

        $values = [];
        foreach ($this->cards as $card)
        {
            /** @var Card $card */
            $values[] = $card->getValue();
        }

        $uniqueCardsCount = array_count_values($values);

        foreach ($uniqueCardsCount as $value => $count) {
            if ($count === 1) continue;
            if ($count === 2 || $count === 4) {
                foreach ($this->cards as $index => $card) {
                    /** @var Card $card */
                    if ($card->getValue() === (string)$value){
                        unset($this->cards[$index]);
                    }
                }
            }
            if ($count === 3) {
                for ($i = 0; $i < 2; $i++) {
                    foreach ($this->cards as $index => $card) {
                        /** @var Card $card */
                        if ($card->getValue() === (string)$value){
                            unset($this->cards[$index]);
                            break;
                        }
                    }
                }
            }
        }
    }

    public function disband(): void // removing pairs, taking into account the colors
    {

        usort($this->cards, function (Card $a, Card $b)
        {
            if ($a->getColor() == $b->getColor())
            {
                return ($a->getValue() < $b->getValue()) ? -1 : 1;
            }
            return ($a->getColor() < $b->getColor()) ? -1 : 1;
        });

        $previousCardValue = '';
        $previousCardColor = '';
        $previousCardIndex = -1;

        foreach($this->cards as $index => $card){
            if($card->getValue() === $previousCardValue && $card->getColor() === $previousCardColor){
                unset($this->cards[$previousCardIndex]);
                unset($this->cards[$index]);
            } else{
                $previousCardValue = $card->getValue();
                $previousCardColor = $card->getColor();
                $previousCardIndex = $index;
            }
        }
    }

    public function removeCard(): Card
    {
        $randomCardIndex = array_rand($this->cards);
        $card = $this->cards[$randomCardIndex];
        unset($this->cards[$randomCardIndex]);
        return $card;
    }

}

