<?php
/*
- POO Classe/Objet/Composition/algorithmie
- CDC: Une entreprise(nom) embauche des salariés(1 salarié=nom, salaire mensuel)
1/ Quel est le coût annuel pour l'entreprise (masse salariale) avec un salaire sur 12 mois?
ex: PME=bricoshop embauche: Paul, 2000; Patricia, 3000; Arthur, 5000 -> le coût annuel=120 000?
2/ Puis licencier le dernier arrivé (recalculer)
3/ réembaucher un autre (recalculer)
4/ Il s'agit d'augmenter les plus bas salaires de 10% (-1500€)
*/
declare(strict_types=1);

class Emp
{	
	const MONTHS_NB = 12;		// class const
	
	private string $_name = "";	// attributes in (typing only in php >= 7.4)
	private int $_mSal = 0;		// attributes in
	private int $_ySal;		// attributes out 
	private ?Firm $_firm = null;		// on sait à quelle usine est l'employé! 
										// ?signifie que cela peut-être null

	public function __construct(string $name, int $mSal) {
		$this->_name = $name;
		$this->_mSal = $mSal;
		$this->_ySal = 0;
	}
	public function run () : void { 	// update year salary
		$this->_ySal = self::MONTHS_NB * $this->_mSal;	// use of class const with self not this!!
	}
	public function getMSal () : int {
		return ($this->_mSal);
	}
	public function setMSal (int $sal) : void {
		$this->_mSal = $sal;
	}
	public function getYSal () : int {
		return ($this->_ySal);
	}

	public function setFirm(Firm $firm) : void	{
		$this->_firm = $firm;
	}
	
	public function __toString() : string {	// debug
		return "[{$this->_name} {$this->_mSal} -> {$this->_ySal} {$this->_firm}]";
	}
}
class Firm 
{
	const SAL_THRESHOLD = 1500;
	const SAL_PERCENT = 0.10;

	private string $_name = "";	// attributes in
	private array $_emps = [];   // made of Emp[] : attributes out (to be computed)

	public function __construct(string $fName, array|null $emps = null) {	
		$this->_name = $fName;
		foreach ($emps as $emp)			
			$this->add ($emp);		
	}
	public function add(Emp $emp) : void {
		$emp->setFirm($this);	// de l'employé on remonte à l'usine
		$this->_emps [] = $emp;	// other way: use array_push
	}
	public function removeLastEmp () : Emp {
			// consists of removing an item from an array (the last one)
		$e = array_pop ($this->_emps);	// cf php.net
		return $e;
	}
	public function getAnnualSalaryCost() : int {
		$cost = 0;
		foreach ($this->_emps as $e) 
			$cost += $e->getYSal();
		return $cost;
	}
	public function raiseLowSalaries(): void {
		foreach ($this->_emps as $e) {
			if ($e->getMSal() < self::SAL_THRESHOLD) {// low salary, get Msal then raise it
				$newSal = intval($e->getMSal()*(1+self::SAL_PERCENT));	// cast into integer
				$e->setMSal ($newSal);	
				$e->run();		// once mSal is updated compute ySal
			}
		}
	}

	public function getName () : string {
		return strtoupper($this->_name);
	}
	public function getEmps () : array {
		return $this->_emps;
	}
	public function __toString() : string {	// debug
		return "[{$this->_name}]";
	}
}

	// main (here Controller+View):
$firm = new Firm ("Bricoshop", 
	[new Emp("Paul", 1000),
	 new Emp("Patricia", 3000),
	 new Emp("Arthur", 6000),
	]);
$html = ["<p>"];
foreach ($firm->getEmps() as $e) {
	$e->run();	// update year salary
	//$html [] = $e;
}
$html [] = "1/ Global cost of: " . $firm->getName() . " is: " . $firm->getAnnualSalaryCost() . " €.";
$html [] = "2/ Fire last Employee...";
$html [] = $firm->removeLastEmp();
$html [] = "Global cost of: " . $firm->getName() . " is now: " . $firm->getAnnualSalaryCost() . " €.";

$html [] = "3/ Hire another one...";
$newEmp= new Emp("Alicia", 4000);
$newEmp->run();
$firm->add($newEmp);
$html [] = $newEmp;
$html [] = "Global cost of: " . $firm->getName() . " is now: " . $firm->getAnnualSalaryCost() . " €.";

$html [] = "4/ Raise lowest salaries...";
$firm->raiseLowSalaries();
$html [] = "Global cost of: " . $firm->getName() . " is now: " . $firm->getAnnualSalaryCost() . " €.";

$html [] = "</p>";
echo implode ("</br>".PHP_EOL, $html);
exit();
?>