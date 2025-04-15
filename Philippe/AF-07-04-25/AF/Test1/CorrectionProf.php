<?php
/*
# Objectif: classe simple, méthodes, attributs, un peu d'algorithmie ...
# TODO:
Gérer un compte bancaire: on peut déposer, retirer sur un compte et faire un transfert.
On veut voir l'état des comptes après certaines manipulations concernant 3 personnes (Elsa, John, Pat). A chaque étape, il s'agit de générer l'état des comptes dans un fichier texte.
Le découvert est pénalisé et le transfert est sujet aussi à une taxe.

# Scénario
Démarrage: (E, J, P)=(100, 200, 300)
E verse 200 sur son compte (1), retire 700(2)
J retire 100 (3)
P verse 400 (4) et transfère 200 à J (5)
(entre () les étapes)

# Détails:
- pour le découvert, entre 0 et 100, j'ai 10% de retenue supplémentaire, au delà 30% (ie si j'ai 500 de découvert, mon solde=-500 - 10% de 100 - 30% de 400)
- la taxe de transfert = 20
- chaque mouvement est associé à une étape
- on travaille en entier

# Conseils:
- quelle est la classe, ses attributs, ses méthodes (internes, externes)

# Attendu:
- le prog principal est un scénario, il définit les users (dans un tableau) et les mouvements bancaires, puis en fin affiche les soldes de tout le monde
- la classe encapsule des services (alimenter compte, retirer du compte, transférer, ...)

# Exemple de résultats
Init: Elsa balance: 100 - John balance: 200 - Paul balance: 300
E +200 -700 Elsa balance: -500
J -100 John balance: 100
P +400 -200 Tr John
Fin: Elsa balance: -500 - John balance: 300 - Paul balance: 680
*/
declare(strict_types=1);	// improves security (type method params)
class BankAccount {
		// 0/ class constants
	const THRESHOLD = 100;
	const PERCENT1 = 0.1;
	const PERCENT2 = 0.3;
	const TRANSFERT_TAX = 20;
		// 1/ attributes in/out mode
	private string $name = "";			// in 
	private float $balance = 0.0;   	// out (le solde)

		// 2/ constructor, tostring: 'magic' fonctions
	public function __construct(string $name, int $amount=0) {	// invoked by new...
		$this->name = $name;
		$this->balance = $amount;
	}
	
	public function __toString() {	// to print
		return "{$this->name} balance: {$this->balance}";	// 'template string' évite les concaténations!
	}

		// 3/ public methods : ajout, retirer, transférer
	public function add(int $amount) : void {
		$this->balance += $amount;
	}
	public function withdraw(int $amount) : void {
		$this->balance -= $amount;
		if ($this->balance<0) {	// des agios!
			$posBal = abs($this->balance);	// on passe en positif
			$agio = 0;
			if ($posBal <= self::THRESHOLD){	// 10% d'agio
				$agio = $posBal * self::PERCENT1;
			}
			else {	// 10% agio première tranche, 30% sur le restant
				$agio = self::THRESHOLD * self::PERCENT1 + ($posBal - self::THRESHOLD) * self::PERCENT2;
			}
			$this->balance = -$posBal - $agio;			
		}			
	}
	public function transfer(int $amount, BankAccount $account) : void {
		$this->balance -= self::TRANSFERT_TAX;	// la taxe
		$account->add($amount);	// rajout pour le destinataire
	}
}
	// main: mon scénario et des traces
$e = new BankAccount("Elsa", 100);
$j = new BankAccount("John", 200);
$p = new BankAccount("Paul", 300);
$html [] = "Init: ${e} - ${j} - ${p}";
$e->add(200);$e->withdraw(700);
$html [] = "E +200 -700 {$e}";
$j->withdraw(100);
$html [] = "J -100 {$j}";
$p->add(400);
$p->transfer(200, $j);
$html [] = "P +400 -200 Tr John";
$html [] = "Fin: ${e} - ${j} - ${p}";

echo (implode ('<br/>'.PHP_EOL, $html));	// je fais un seul echo, je construis un tableau et j'insère un saut de ligne
exit();