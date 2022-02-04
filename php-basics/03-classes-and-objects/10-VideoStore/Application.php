<?php
class Application
{
    private VideoStore $videoStore;

    public function run()
    {
        $this->videoStore = new VideoStore();

        while (true) {
            echo "Choose the operation you want to perform " . PHP_EOL;
            echo "Choose 0 for EXIT"  . PHP_EOL;
            echo "Choose 1 to fill video store"  . PHP_EOL;
            echo "Choose 2 to rent video (as user)"  . PHP_EOL;
            echo "Choose 3 to rate video (as user)"  . PHP_EOL;
            echo "Choose 4 to return video (as user)"  . PHP_EOL;
            echo "Choose 5 to list inventory"  . PHP_EOL;

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!" . PHP_EOL;
                    die;
                case 1:
                    $this->addMovies();
                    break;
                case 2:
                    $this->rentVideo();
                    break;
                case 3:
                    $this->rateVideo();
                    break;
                case 4:
                    $this->returnVideo();
                    break;
                case 5:
                    $this->listInventory();
                    break;
                default:
                    echo "Sorry, I don't understand you.." . PHP_EOL;
            }
        }
    }

    private function addMovies(): void
    {
        $this->videoStore->addVideo("The Matrix");
        $this->videoStore->addVideo("Godfather II");
        $this->videoStore->addVideo("Star Wars Episode IV: A New Hope");
    }

    private function rentVideo()
    {
        $this->videoStore->checkOutVideo("Godfather II");
        $this->videoStore->checkOutVideo("The Matrix");
        $this->videoStore->checkOutVideo("Star Wars Episode IV: A New Hope");
    }

    private function rateVideo()
    {
        $this->videoStore->takeUsersRating("Godfather II", 5);
        $this->videoStore->takeUsersRating("Godfather II", 3);
        $this->videoStore->takeUsersRating("Godfather II", 3);
        $this->videoStore->takeUsersRating("The Matrix", 5);
        $this->videoStore->takeUsersRating("Star Wars Episode IV: A New Hope", 5);
        $this->videoStore->takeUsersRating("Godfather II", 4);
        $this->videoStore->takeUsersRating("The Matrix", 4.007);
        $this->videoStore->takeUsersRating("Star Wars Episode IV: A New Hope", 4.50);
    }

    private function returnVideo()
    {
        $this->videoStore->returnVideoToStore("The Matrix");
        $this->videoStore->returnVideoToStore("Godfather II");
        $this->videoStore->returnVideoToStore("Star Wars Episode IV: A New Hope");
    }

    private function listInventory()
    {
        echo PHP_EOL . "----- LIST OF MOVIES ----------------------" . PHP_EOL;
        foreach ($this->videoStore->getInventory() as $video){
            $status = ($video->getAvailability()) ? "available" : "rented";
            echo $video->getTitle() . " | ★ " . $video->getAverageRating() . " ★ | " . $status . PHP_EOL;
        }
        echo "-------------------------------------------" . PHP_EOL . PHP_EOL;
    }
}