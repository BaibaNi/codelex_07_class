<?php
class Video
{
    private string $title;
    private ?bool $available; // if video is available or not (is checked out)
    private ?float $averageRating;

    private array $allRatings = [];

    public function __construct(string $title, ?bool $available = true, ?float $averageRating = 0)
    {
        $this->title = $title;
        $this->available = $available;
        $this->averageRating = $averageRating;
    }

    public function checkOut(): bool
    {
        return $this->available = false;
    }

    public function toReturn(): bool
    {
        return $this->available = true;
    }

    public function receiveRating(?float $rating): void
    {
        $this->allRatings[] = number_format($rating, 2);
    }

    public function getAverageRating(): float
    {
        if(count($this->allRatings) !== 0){
            $this->averageRating = array_sum($this->allRatings) / count($this->allRatings);
        }
        return number_format($this->averageRating, 2);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAvailability(): bool
    {
        return $this->available;
    }


}