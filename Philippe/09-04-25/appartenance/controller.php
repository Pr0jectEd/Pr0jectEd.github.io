<?php
require "classVehicle.php";

echo $propietario1=new Owner("Eduardo","Toulouse",11000);
echo "<br>";
echo $propietario2=new Owner("Maria","Narbonne",12000);
echo "<br>";
echo $vehiculo1= new Vehicle("Porsche",$propietario1, "Diesel");
echo "<br>";
echo $vehiculo1->setOwner($propietario2);
echo "<br>";
echo $vehiculo1;




?>