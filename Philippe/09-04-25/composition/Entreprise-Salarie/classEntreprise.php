<?php
declare(strict_types=1);

# DWWM2024-11
/* - POO Classe/Objet/Composition/algorithmie
- CDC: Une entreprise(nom) embauche des salariés(1 salarié=nom, salaire mensuel)
1/ Quel est le coût annuel pour l'entreprise (masse salariale) avec un salaire sur 12 mois?
ex: PME=bricoshop embauche: Paul, 2000; Patricia, 3000; Arthur, 5000 -> le coût annuel=120 000?
2/ Puis licencier le dernier arrivé (recalculer)
3/ réembaucher un autre (recalculer)
4/ Il s'agit d'augmenter les plus bas salaires de 10% (-1500€)

- Résultats:
[Paul, 1000 -> byYear: 12000]
[Patricia, 3000 -> byYear: 36000]
[Arthur, 6000 -> byYear: 72000]
1/ Global cost of: BRICOSHOP is: 120000 €.
2/ Fire last Employee...
Global cost of: BRICOSHOP is now: 48000 €.
3/ Hire another one...
[Alicia, 4000 -> byYear: 48000]
Global cost of: BRICOSHOP is now: 96000 €.
4/ Raise lowest salaries...
Global cost of: BRICOSHOP is now: 97200 €. */
require "classSalarie.php";
class Entreprise{
    private string $companyName;
   /*  private Salarie $salarie; */
    private array $empolyees = [];

    public function __construct(string $nombreEmpresa)
    {
        $this->companyName = $nombreEmpresa;

    }

    public function hiereEmployee(Salarie $sSalariado):void{
        $this->empolyees[] = $sSalariado;

    }

    public function fireLastEmployee(Salarie $sSalariado):Salarie{
        return array_pop($this->empolyees);

    }

    public function augmenteLowestSalary(){

        $lowestSalary=0;
        $betterSalary=0;
        foreach($this->empolyees as $employee){
            if ($employee->getMonthSalary()>$lowestSalary){
                $lowestSalary = $employee->getMonthSalary();
            }
            $betterSalary = $lowestSalary+ ($lowestSalary*0.1);
        }
        return "Voila un meilleur Salarie". $betterSalary;

    }

    public function costByYear():float {
        $totalCost=0;
        foreach($this->empolyees as $employee){
            $totalCost+= $employee->getMonthSalary()*12;
        }
        return $totalCost;
    }


    public function __toString()
    {
        $company =[];
        foreach($this->empolyees as $employee){
            $company[] = "[ Employee: ". $employee->getName() ." , Salaire par mois: ".$employee->getMonthSalary()." Salarie par année".($employee->getMonthSalary()*12)."]"; 
        }
        $message = "Côut annuel pour l'entreprise {$this->companyName} is: ". $this->costByYear()."€\n" . implode("|",$company);
        return $message;        
    }

}