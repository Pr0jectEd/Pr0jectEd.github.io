<?php
declare(strict_types=1);
require "class-Owner.php";
/* #DWWM2024-11
- POO 2 Classes/Appartenance/constantes de classe/valeur par défaut des params d'une méthode
Propriétaire = (nom, ville, code postal)
Vehicule = (nom, propriétaire, type de Vehicule (valeurs : diesel/elec/essence))
- Déclarer 2 personnes ayant chacun un véhicule, faire en sorte que l'un vende le sien à l'autre, afficher le scénario
(utiliser le typage strict, cf:
https://belitsoft.com/php-development-services/php-7-review-new-features-scalar-type-declarations-and-return-type-declarations)

- Résultats:

[ Vehicle: Porsche (GASOLINE) [Owner: PAUL Carcassonne 11000] ]
[ Vehicle: Renault (DIESEL) [Owner: CYNTHIA Toulouse 31000] ]
... Change owner of this car!
[ Vehicle: Renault (DIESEL) [Owner: PAUL Carcassonne 11000] ] */

class Vehicle{

    private string $brand;
    private Owner $owner;
    private string $typeVehicle;

    public function __construct(string $marca,Owner $propietario,string $tipoVehiculo){

        $this->brand = $marca;
        $this->owner = $propietario;
        $this->typeVehicle = $tipoVehiculo;
        
    }

    public function __toString(){
        return $this->brand.$this->owner.$this->typeVehicle;
    }

/*     public function exec(Owner $owner){
        $message= "[Vehicle:{$this->brand}({$this->typeVehicle}) [{$owner}]]";
        return $message;

    
    } */

    public function setOwner(Owner $newOwner){
    
        $this->owner =$newOwner;

    }


     
}

?>