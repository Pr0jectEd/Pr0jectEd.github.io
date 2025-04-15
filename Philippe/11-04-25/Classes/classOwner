<?php
/*
- POO 2 Classes/Appartenance/constantes de classe/valeur par défaut des params d'une méthode
Propriétaire = (nom, ville, code postal) 
Vehicule = (nom, propriétaire, type de Vehicule (valeurs : diesel/elec/essence))
- Déclarer 2 personnes ayant chacun un véhicule, faire en sorte que l'un vende le sien à l'autre, afficher le scénario
(utiliser le typage strict, cf:
https://belitsoft.com/php-development-services/php-7-review-new-features-scalar-type-declarations-and-return-type-declarations
*/

declare(strict_types=1);
class Owner {
	private string $_name = "";	// in attributes only	
	private string $_town = "";
	private int $_zipCode = 0;   

	public function __construct(string $name, string $town, int $zipCode=11000) {
		$this->_name = strtoupper($name);
		$this->_town = $town;
		$this->_zipCode = $zipCode;	
	}	
	public function __toString () : string {
		return ' [Owner: ' . $this->_name . ' ' . $this->_town . ' ' . $this->_zipCode . ']';

	}
		// getter&setter examples! php vscode extension (roberto...)
	/*public function getZipCode () {
		return $this->_zipCode;
	}
	public function setZipCode ($zc) {
		$this->_zipCode = $zc;
	}*/

}
class Vehicle {
	const GASOLINE = "GASOLINE";	// constants of class
	const DIESEL = "DIESEL";
	const ELECTRIC = "ELECTRIC";

	private string $_name = "";	// attributes in
	private string $_engine;
	private Owner $_owner;	// of type Owner (not a primitive type!!)

		// constructor : set a default value as a parameter in php7
	public function __construct(Owner $owner, string $vName="Renault", string $engine=self::DIESEL) {
		$this->_name = $vName;
		$this->_engine = $engine;
		$this->_owner = $owner;
	}

	// used as a a debug method (magic method)
	public function __toString () : string {
		return "[ Vehicle: $this->_name ($this->_engine) $this->_owner ]";
	}

	public function getOwner () : Owner {
		return $this->_owner;
	}
	public function setOwner (Owner $o) : void {
		$this->_owner = $o;
	}

		// private below...

}
	// main:
$html = ["<p>"];		// prepare rendering with an array
$car1 = new Vehicle(new Owner('Paul', 'Carcassonne'), "Porsche", Vehicle::GASOLINE) ;
$html [] = $car1;
$car2 = new Vehicle(new Owner('Cynthia', 'Toulouse', 31000)) ;
$html [] =  $car2;

$html [] = "... Change owner of this car!";
$car2->setOwner ($car1->getOwner());
$html [] = $car2;
$html [] ="</p>";
	// minimal rendering
echo implode ("</br>".PHP_EOL, $html); // avoid multiple echo and generates better src files
// phpinfo(); // ramène toute la config php
exit();
?>