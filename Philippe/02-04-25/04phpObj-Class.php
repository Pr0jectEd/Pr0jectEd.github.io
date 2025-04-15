<?php 

/*- POO Classe/Objet/typage
- CDC: je me déplace avec un véhicule sur une route (un axe) depuis une position initiale,
où suis-je au bout de quelques déplacements ?
(par ex: j'avance de 20 kms, je recule de 3kms, puis j'avance de 40kms, ...)
ces distances sont tirées au sort par exemple entre -100 et 100 (random)
Ces trajets peuvent être regroupés pour plus de souplesse.
Mon programme principal introduit 2 véhicules

- Consignes:
typer fonctions, retours de fonctions
typer les paramètres
bien choisir les noms de variables

- Résultat:
Vehicle constructor: PORSCHE
Vehicle constructor: TOYOTA
Porsche move from: 68...
Porsche move from: 48...
Porsche move from: -84...
Vehicle: PORSCHE is now at position: 32
Toyota move from: -42...
Toyota move from: 11...
Toyota move from: 61...
Vehicle: TOYOTA is now at position: 30
Vehicle destructor: PORSCHE
Vehicle destructor: TOYOTA*/ 

declare(strict_types=1);

class Car {
    private int $startPoint;
    private string $brand;

    public function __construct(int $location, string $carType )
    {
        $this->startPoint = $location;
        $this->brand = $carType;
        
    }

    public function display(): void {
        echo "Brand".$this->brand . "starts at:".$this->startPoint." km";
    }

    public function location(): int {
        return $this->startPoint;

    }

    public function get_current_position(): int {
        return $this->startPoint + rand(-100,100);
    }

    public function get_positions(int $time): array {
        $positions = [];
        for ($i = 0; $i < $time; $i++) {
            $positions[] = $this->brand." Current Position: ".$this->get_current_position();
            
        }
        return $positions;
    }


    public function __toString(): string {
        return "Brand:".$this->brand . " starts at:".$this->startPoint." km";
    }

    public function __destruct() {
      
    }
    
}


$Toyota = new Car(20,"Toyota");
$Porsche = new Car(50,"Porsche");
print_r($Toyota->get_positions(3)) ;
echo "<br>";
print_r($Porsche->get_positions(5));






?>

