<?php
class VideoStore
{
    private array $inventory = [];

    public function addVideo(string $videoTitle): void
    {
        if(!array_filter($this->inventory, function($video) use ($videoTitle){
            return $video->getTitle() === $videoTitle;
        })){
            $this->inventory[] = new Video($videoTitle);
        }
    }


    public function checkOutVideo(string $videoTitle): void
    {
        foreach ($this->inventory as $video){
            if($video->getTitle() === $videoTitle){
                $video->checkOut();
            }
        }
    }


    public function returnVideoToStore(string $videoTitle): void
    {
        foreach ($this->inventory as $video){
            if($video->getTitle() === $videoTitle){
                $video->toReturn();
            }
        }
    }


    public function takeUsersRating(string $videoTitle, float $rating): void
    {
        foreach ($this->inventory as $video){
            if($video->getTitle() === $videoTitle){
                $video->receiveRating($rating);
            }
        }
    }


    public function getInventory(): array
    {
        return $this->inventory;
    }
}