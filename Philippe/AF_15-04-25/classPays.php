<?php
declare(strict_types=1);

class Pays{

    public $nom;
    public $continent;
    public $population;

    public function __construct($nom, $continent, $population) {
        $this->nom = $nom;
        $this->continent = $continent;
        $this->population = $population;
    }

    public function __toString():string
    {
        return "Le Pays{$this->nom} dans:{$this->continent} a une population de {$this->population} millions";
    }
}
?>