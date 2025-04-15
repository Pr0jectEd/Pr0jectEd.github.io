<?php
/*
* Héritage
* CDC 

- Un Employé (nom, sal annuel, ex: "Paul", 30000)
- un Manager a en plus un bonus
- un PDG a encore en plus des stock-options
Quel est le coût pour une entreprise sachant que seul le salaire est taxé dans mon modèle (à 90%)?
(prendre un exemple avec 3 salariés à 20000, un manager à 30000+5000, un pdg à 50000 + 10000 + 20000)


* nota: 
- il n'est pas demandé de faire une vue (un seul fichier php avec plusieurs classes métier et un main)
cf https://www.pierre-giraud.com/php-mysql-apprendre-coder-cours/oriente-objet-classe-etendue-heritage/
*/
declare(strict_types=1);
class Emp {
	const TAX_RATE = 0.9;

	protected string $_name = "";		// protected : allows use by child, private no!
	protected int $_sal = 0;
	protected int $_cost = 0;

	public function __construct(string $name, int $sal) { 
		$this->_name = $name;
		$this->_sal = $sal;
  	}
	public function __toString() : string {
		return "[{$this->_name} {$this->_sal} -> {$this->_cost}]";
	}

  	public function run () : void {
		$this->_cost = intval ($this->_sal*(1 + self::TAX_RATE));
    }

  	public function getCost () : int {
  		return $this->_cost;
	}
	  
}
class Manager extends Emp {
	// define specific attributes&&methods or redefines parent's method
	protected int $_bonus;

	public function __construct(string $name, int $sal, int $bonus) { 
		parent::__construct($name, $sal);	// calls parent constructor
		$this->_bonus = $bonus;				// update specific attribute
  	}
  	public function run () : void {	// override!!
		parent::run();
		$this->_cost += $this->_bonus;
    }
	public function __toString() : string {
		return parent::__toString() . " [Bonus: {$this->_bonus}]";
	}
}
class Ceo extends Manager {
	private int $_stockOptions;

	public function __construct(string $name, int $sal, int $bonus, int $stockOptions) { 
		parent::__construct($name, $sal, $bonus);	
		$this->_stockOptions = $stockOptions;			
  	}
  	public function run () : void {
		parent::run() ;
		$this->_cost += $this->_stockOptions;
		echo $this->_cost;
    }
	  public function __toString() : string {
		return parent::__toString() . " [Stock-options: {$this->_stockOptions}]";
	}
}
	// main
$firm = [
		new Emp ('Cath', 10000), 
		new Emp ('Pat', 10000), 
		new Emp ('John', 10000),
		new Manager ('Boss', 20000, 5000),
		new Ceo ('bigBoss', 50000, 10000, 20000),
	];
$html = [];
$cost = 0;

foreach ($firm as $e){
	$e->run();	// polymorphism!!!
	$cost += $e->getCost();	
	$html [] = $e;
}
$html [] = "---------> Global cost: {$cost}";
echo implode ("</br>".PHP_EOL, $html);

?>