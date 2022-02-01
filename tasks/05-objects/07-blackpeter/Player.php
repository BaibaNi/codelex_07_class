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

    public function disband1(): void
    {

        $symbols = [];
        foreach ($this->cards as $card)
        {
            /** @var Card $card */
            $symbols[] = $card->getSymbol();
        }

        $uniqueCardsCount = array_count_values($symbols);

//        $colors = ["R", "B"];//todo
//        for($k = 0; $k < 2; $k++) {


            foreach ($uniqueCardsCount as $symbol => $count) {
                if ($count === 1) continue;
                if ($count === 2 || $count === 4) {
                    foreach ($this->cards as $index => $card) {
                        /** @var Card $card */
                        if ($card->getSymbol() === (string)$symbol){ // && $card->getColor() === "R") {
                            unset($this->cards[$index]);
                        }
                    }
                }
                if ($count === 3) {
                    for ($i = 0; $i < 2; $i++) {
                        foreach ($this->cards as $index => $card) {
                            /** @var Card $card */
                            if ($card->getSymbol() === (string)$symbol){ // && $card->getColor() === "R") {
                                unset($this->cards[$index]);
                                break;
                            }
                        }
                    }
                }
            }


//        }
    }


    public function disband2(): void
    {

        $symbols = [];
        foreach ($this->cards as $card)
        {
            /** @var Card $card */
            $symbols[] = $card->getSymbol();
        }

        $uniqueCardsCount = array_count_values($symbols);

//        var_dump($uniqueCardsCount); die;

//        $colors = ["R", "B"];//todo
//        for($k = 0; $k < 2; $k++) {


        foreach ($uniqueCardsCount as $symbol => $count) {
            if ($count === 1) continue;
            elseif ($count === 2 || $count === 4) {
                $color = "";
                $firstIndex = -1;
                foreach ($this->cards as $index => $card) {
                    /** @var Card $card */
                    if ($card->getSymbol() === (string)$symbol){ // && $card->getColor() === "R") {
                        if($count === 4) unset($this->cards[$index]);
                        else if($card->getColor() === $color){
                            unset($this->cards[$index]);
                            unset($this->cards[$firstIndex]);
                            break;
                        }
                        elseif($color === ""){
                            $color = $card->getColor();
                            $firstIndex = $index;
                        }
                    }
                }
            }
            elseif ($count === 3) {
//                    for ($i = 0; $i < 2; $i++) {
                $color = "";
                $firstIndex = -1;
                foreach ($this->cards as $index => $card) {
                    /** @var Card $card */
                    if ($card->getSymbol() === (string)$symbol) {
                        if($card->getColor() === $color){
                            unset($this->cards[$index]);
                            unset($this->cards[$firstIndex]);
                            break;
                        }
                        elseif($color === ""){
                            $color = $card->getColor();
                            $firstIndex = $index;
                        }
                    }
                }
//                    }
            }
        }


//        }
    }


    public function disband3(): void
    {

        $redCardSymbols = [];
        $blackCardSymbols = [];
        foreach ($this->cards as $card)
        {
            /** @var Card $card */
            if($card->getColor() === "R"){
                $redCardSymbols[] = $card->getSymbol();
            } elseif ($card->getColor() === "B"){
                $blackCardSymbols[] = $card->getSymbol();
            }
        }



        $uniqueRedCardsCount = array_count_values($redCardSymbols);
        $uniqueBlackCardsCount = array_count_values($blackCardSymbols);

        foreach ($uniqueRedCardsCount as $redSymbol => $count) {
            if ($count === 1) continue;
            if ($count === 2) {
                foreach ($this->cards as $index => $card) {
                    /** @var Card $card */
                    if ($card->getSymbol() === (string)$redSymbol){
                        unset($this->cards[$index]);
                    }
                }
            }
        }

        foreach ($uniqueBlackCardsCount as $blackSymbol => $count) {
            if ($count === 1) continue;
            if ($count === 2) {
                foreach ($this->cards as $index => $card) {
                    /** @var Card $card */
                    if ($card->getSymbol() === (string)$blackSymbol){
                        unset($this->cards[$index]);
                    }
                }
            }
        }

    }


    public function disband4(): void
    {

        $symbols = [];
        foreach ($this->cards as $card)
        {
            /** @var Card $card */
            $symbols[] = $card->getSymbol();
        }

        $uniqueCardsCount = array_count_values($symbols);

        foreach ($uniqueCardsCount as $symbol => $count) {
            foreach ($this->cards as $index => $card) {
                if($count === 2){
                    if ($card->getColor() === "R" && $card->getSymbol() === (string)$symbol) {
                        unset($this->cards[$index]);
                    }
                    if ($card->getColor() === "B" && $card->getSymbol() === (string)$symbol) {
                        unset($this->cards[$index]);
                    }
                }


            }
        }
    }


    public function disband(): void
    {

        $redCardSymbols = [];
        $blackCardSymbols = [];
        foreach ($this->cards as $card)
        {
            /** @var Card $card */
            if($card->getColor() === "R"){
                $redCardSymbols[] = $card;
            } elseif ($card->getColor() === "B"){
                $blackCardSymbols[] = $card;
            }
        }

        usort($redCardSymbols, function (object $card1, object $card2)
        {
            if ($card1->getSymbol() == $card2->getSymbol()) return 0;
            return ($card1->getSymbol() < $card2->getSymbol()) ? -1 : 1;
        });


        $previousCard = new Card("", "", "");
        $previousIndex = -1;
        foreach($redCardSymbols as $redIndex => $redCard){
            if($redCard->getSymbol() === $previousCard->getSymbol()) {
                unset($redCardSymbols[$redIndex]);
                unset($redCardSymbols[$previousIndex]);
            }
            $previousCard = $redCard;
            $previousIndex = $redIndex;
        }

        $this->cards = $redCardSymbols;



        usort($blackCardSymbols, function (object $card1, object $card2)
        {
            if ($card1->getSymbol() == $card2->getSymbol()) return 0;
            return ($card1->getSymbol() < $card2->getSymbol()) ? -1 : 1;
        });


        $previousBCard = new Card("", "", "");
        $previousIndex = -1;
        foreach($blackCardSymbols as $blackIndex => $blackCard){
            if($blackCard->getSymbol() === $previousBCard->getSymbol()) {
                unset($blackCardSymbols[$blackIndex]);
                unset($blackCardSymbols[$previousIndex]);
            }
            $previousBCard = $blackCard;
            $previousIndex = $blackIndex;
        }

        $this->cards[] = $blackCardSymbols;

    }

    public function removeCard(): Card
    {
        $randomCardIndex = array_rand($this->cards);
        $card = $this->cards[$randomCardIndex];
        unset($this->cards[$randomCardIndex]);
        return $card;
    }

}

