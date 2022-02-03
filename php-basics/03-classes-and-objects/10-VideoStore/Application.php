<?php
class Application
{
    public function run()
    {
        while (true) {
            echo "Choose the operation you want to perform " . PHP_EOL;
            echo "Choose 0 for EXIT"  . PHP_EOL;
            echo "Choose 1 to fill video store"  . PHP_EOL;
            echo "Choose 2 to rent video (as user)"  . PHP_EOL;
            echo "Choose 3 to return video (as user)"  . PHP_EOL;
            echo "Choose 4 to list inventory"  . PHP_EOL;

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->addMovies();
                    break;
                case 2:
                    $this->rentVideo();
                    break;
                case 3:
                    $this->returnVideo();
                    break;
                case 4:
                    $this->listInventory();
                    break;
                default:
                    echo "Sorry, I don't understand you.." . PHP_EOL;
            }
        }
    }

    private function addMovies()
    {
        //todo
    }

    private function rentVideo()
    {
        //todo
    }

    private function returnVideo()
    {
        //todo
    }

    private function listInventory()
    {
        //todo
    }
}