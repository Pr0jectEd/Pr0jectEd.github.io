<?php
require "classEntreprise.php";
echo $salarie1=new Salarie("Eduardo",11000);
echo $salarie2=new Salarie("Mike",11000);
echo $salarie3=new Salarie("Andres",10000);
echo $salarie4=new Salarie("Gerard",12000);
echo "<br>";
echo $salarie1=new Salarie("Gerard",12000);
echo "<br>";

echo $entreprise1 = new Entreprise("Bricomarche");
echo "<br>";

echo $entreprise1->hiereEmployee($salarie1);
echo $entreprise1->hiereEmployee($salarie2);
echo $entreprise1->hiereEmployee($salarie3);
echo $entreprise1->hiereEmployee($salarie4);
echo "<br>";
echo $entreprise1;
echo "<br>";
echo $entreprise1->augmenteLowestSalary();
echo "<br>";
?>