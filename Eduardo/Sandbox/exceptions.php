<?php

class Machinealaver
{
    private int $action;
    public function __construct() {

    }

    private function prelavage(int $prelavage)
    {
        if ($prelavage == 1) {
            throw new Exception("Planté: au prelavage <>");
        }
        echo " Prelavage Ok <br>";
    }

    private function lavage(int $lavage)
    {
        if ($lavage == 2) {
            throw new Exception("Planté: au lavage <br>");
        }
        echo " Lavage Ok <br>";
    }

    private function essorage(int $essorage)
    {
        if ($essorage == 3) {
            throw new Exception("Planté: au essorage <br>");
        }
        echo " Essorage OK <br>";
    }

    private function rincage(int $rincage)
    {
        if ($rincage == 4) {
            throw new Exception("Planté: au rincage <br>");
        }
        echo " Rincage OK <br>";
    }
    
    public function run(int $running)
    {
        try {
            $this->prelavage($running);
            $this->lavage($running);
            $this->essorage($running);
            $this->rincage($running);
        } catch (Exception $err) {
            echo $err->getMessage();
        }
        echo "Stopped";
    }
}
$Machine1 = new Machinealaver();
$Machine1->run(rand(1, 5));
