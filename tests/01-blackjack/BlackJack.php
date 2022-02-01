<?php
class BlackJack
{
    private array $family = ["Hearts", "Diamonds", "Clubs", "Spades"];
    private array $cards = [2, 3, 4, 5, 6, 7, 8, 9, 10, "Jack", "Queen", "King", "Ace"];

    private array $pickedCard = [];
    private array $allPickedCards = [];


    public function pickCard(): array
    {
        $receivedCard = $this->cards[array_rand($this->cards)];
        $receivedFamily = $this->family[array_rand($this->family)];

        $this->pickedCard[] = [$receivedCard, $receivedFamily];
        return $this->pickedCard;
    }

    public function addPickedCard(array $pickedCard): void
    {
        $this->allPickedCards[] = $pickedCard;
    }

    public function get21(): int
    {
        $sum = 0;
        foreach ($this->pickedCard as $card)
        {
            if($card[0] === "Jack" || $card[0]  === "Queen" || $card[0]  === "King"){
                $sum += 10;
            } elseif ($card[0]  === "Ace")
            {
                $sum += 11;
            } else{
                $sum += $card[0];
            }

        }
        return $sum;
    }

    public function getPickedFamily(array $pickedCard): string
    {
        $this->pickedCard = $pickedCard;
        $pickedFamily = '';
        foreach ($this->pickedCard as $card)
        {
            $pickedFamily = $card[1];
        }
        return $pickedFamily;

    }

    public function getPickedCard(array $pickedCard): string
    {
        $this->pickedCard = $pickedCard;
        $result = '';
        foreach ($this->pickedCard as $card)
        {
            $result = $card[0];
        }
        return $result;
    }

    public function getAllPickedCards(): array
    {
        return $this->allPickedCards;
    }

}