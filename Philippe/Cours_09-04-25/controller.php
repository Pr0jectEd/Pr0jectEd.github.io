<?php
require "classVehicle.php";

echo $propietario1=new Owner("Eduardo","Toulouse",11000);
echo $propietario2=new Owner("Maria","Toulouse",11000);
echo "<br>";
echo $vehiculo1= new Vehicle("Porsche",$propietario1->getName(), "Diesel");
echo "<br>";
echo $vehiculo1->exec($propietario1);
echo $vehiculo1->exec($propietario2);
echo "<br>";
echo $vehiculo1= new Vehicle("Porsche",$propietario1->getName(), "Diesel");



?>