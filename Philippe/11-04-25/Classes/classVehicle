<?php
/*
- POO Classe/Objet/typage
- CDC: je me déplace avec un véhicule sur une route (un axe) depuis une position initiale, 
où suis-je au bout de quelques déplacements ? 
(par ex: j'avance de 20 kms, je recule de 3kms, puis j'avance de 40kms, ...)
ces distances sont tirées au sort par exemple entre -100 et 100
Ces trajets peuvent être regroupés pour plus de souplesse.
Mon programme principal introduit 2 véhicules

- Consignes:
typer fonctions, retours de fonctions
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
Vehicle destructor: TOYOTA
*/
declare(strict_types=1);	// improves security (type method params)

class Vehicle {
		// 0/ class constants
	const DEP = 0;
	const RANGE = 100;
		// 1/ attributes in/out mode
	private string $_name = "";		// in ("" or null for instance)
	private int $_currPos;   	// out (to be computed) : current position of Vehicle
	private int $_currDist;							// la distance?
	private bool $_isStopped = false;
	
		// 2/ constructor (generally assigns parameters to in attributes)
	public function __construct(string $vName) {	// invoked by new...
		$this->_name = $vName;
		$this->_currPos = self::DEP;	
		$this->_currDist = self::DEP;	
		echo 'Vehicle constructor: ' . $this->_name .'<br/>';
	}
		// and predefined methods (facultative)
	public function __destruct() {	// as soon as this object is not used anymore 
		echo 'Vehicle destructor: ' . $this->_name .'<br/>';
	}
	public function __toString() {	// to print the object
		return "Vehicle: " . $this->_name . " is now at position: " . $this->_currPos . 
			" and distance is: " . $this->_currDist . "<br/>";
	}

		// 3/ public methods : just necessary things invoked from outside
	public function multipleMove(int $nb=1) : void {
		if ($this->_isStopped) {
			echo $this->_name . ' is stopped!<br/>';
			return;
		}
		for ($i=0; $i < $nb; $i++) {
			$dist = $this->randVehicle();
			echo $this->_name . ' move from: ' . $dist . '...<br/>';
			$this->_currPos += $dist;
			$this->_currDist += abs($dist);
		}
	}

	public function stop() : void {
		$this->_isStopped = true;
	}

		// 4/ private below (hidden from all except inside class)
	private function randVehicle() : int {
		return rand(- self::RANGE, self::RANGE);
	}

}
	// main: a scenario!
const MOVS_NB = 5;
$cars = [new Vehicle("Porsche"), new Vehicle("Toyota") ];

foreach ($cars as $aCar) {
	$aCar->multipleMove (5);
	echo $aCar;
}

// stopper la voiture Porsche
$cars[0]->stop ();
// tenter de bouger?
$cars[0]->multipleMove ();

exit();
?>