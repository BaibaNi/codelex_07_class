<?php
class Application
{
    private VideoStore $videoStore;

    public function run()
    {
        $this->videoStore = new VideoStore();

        while (true) {
            echo PHP_EOL;
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
//        $videoFill = readline("Fill videos manually? [y/n] ");
//        if($videoFill === "Y" || $videoFill === "y"){
//            $videoTitleFill = readline("Movie title: ");
//            $this->videoStore->addVideo($videoTitleFill);
//        } else{
            $this->videoStore->addVideo("The Matrix");
            $this->videoStore->addVideo("Godfather II");
            $this->videoStore->addVideo("Star Wars Episode IV: A New Hope");
            $this->videoStore->addVideo("Good Will Hunting");
            $this->videoStore->addVideo("A Nightmare on Elm Street");
            $this->videoStore->addVideo("Pulp Fiction");
            $this->videoStore->addVideo("Only Lovers Left Alive");
//        }

        $this->listInventory();
    }

    private function rentVideo()
    {
        $this->listInventory();

        $videoRentIndex = readline("Select movie (number) to rent: ");
        if($videoRentIndex >= count($this->videoStore->getInventory())) {
            exit("Movie not found." . PHP_EOL);
        }

        $videoRent = $this->videoStore->getInventory()[$videoRentIndex];
        if(!$videoRent->getAvailability()){
            echo ">> Movie \"{$videoRent->getTitle()}\" is not available to rent." . PHP_EOL;
        } else{
            $this->videoStore->checkOutVideo($videoRent->getTitle());

            echo ">> You selected \"{$videoRent->getTitle()}\" - ";
            echo "average rating ★ {$videoRent->getAverageRating()} ★ " . PHP_EOL;
        }
    }

    private function rateVideo()
    {
        $this->listInventory();

        $videoRateIndex = readline("Select movie (number) to rate: ");
        if($videoRateIndex >= count($this->videoStore->getInventory())) {
            echo "Movie not found." . PHP_EOL;
        }

        $videoRating = (float) readline("Give your rating (0 to 5): ");
        if($videoRating < 0 || $videoRating > 5){
            echo "Impossible rating score." . PHP_EOL;
        } else{
            $videoRateTitle = $this->videoStore->getInventory()[$videoRateIndex]->getTitle();
            $this->videoStore->takeUsersRating($videoRateTitle, $videoRating);

            echo ">> Your rating of $videoRating ★ for movie \"$videoRateTitle\" was accepted." . PHP_EOL;
        }
    }

    private function returnVideo()
    {
        $this->listInventory();

        $videoReturnIndex = readline("Movie title (to return): ");

        $videoReturnTitle = $this->videoStore->getInventory()[$videoReturnIndex]->getTitle();
        $this->videoStore->returnVideoToStore($videoReturnTitle);

        echo ">> Movie \"$videoReturnTitle\" is returned." . PHP_EOL;

    }

    private function listInventory()
    {
        echo PHP_EOL;
        echo "----- LIST OF MOVIES -------------------------------------------------------------------------------";
        echo PHP_EOL;
        $countRented = 0;
        $countAvailable = 0;
        foreach ($this->videoStore->getInventory() as $index => $video){
            $status = ($video->getAvailability()) ? "available" : "rented";
//            echo $index . " - " . $video->getTitle() . " | ★ " . $video->getAverageRating() . " ★ | ";
//            echo $video->peopleGive4and5Stars() . "% of voters give 4 and 5 ★." . $status . PHP_EOL;
            ($video->getAvailability()) ? $countAvailable++ : $countRented++;

            echo sprintf('%1$s - %2$32s | ★ %3$s ★ | %4$-2s percent of voters give 4 and 5 ★. | %5$4s' . PHP_EOL,
                $index , $video->getTitle(), $video->getAverageRating(), $video->peopleGive4and5Stars(), $status);
        }
        echo "----------------------------------------------------------------------------------------------------";
        echo PHP_EOL . "Available - $countAvailable movies. Rented - $countRented movies.";
        echo PHP_EOL . PHP_EOL;


    }
}