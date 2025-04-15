<?php

declare(strict_types=1);
/* # DWWM2024-11
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

* résultats:
[Cath 38000]
[Pat 38000]
[John 38000]
[boss 62000]
[bigBoss 125000]
---------> Global cost: 301000 */

class Manager extends Employee{

    private float $bonusManager;

    public function __construct(string $nombreManager , float $salarioAnaulEmpleado, float $bonusGerente)
    {
        $this->bonusManager = $bonusGerente;
        $this->EmployeeName = $nombreManager;
        $this->yearSalaryEmployee = $salarioAnaulEmpleado;
        $this->costEmployee = ($salarioAnaulEmpleado*1.9)+$bonusGerente;
       
    }

    public function __toString()
    {
        return "Prenom: {$this->EmployeeName}".
        " Salaire Annuel:{$this->yearSalaryEmployee} ".
        "Bonus: {$this->bonusManager}" .
        "Cout Employee {$this->costEmployee}";
    }

    public function EmployeeCost(){
        $baseCost= parent::EmployeeCost();
        $costWithBonus=$baseCost+ $this->bonusManager;
        return $costWithBonus;


    }
}

?>