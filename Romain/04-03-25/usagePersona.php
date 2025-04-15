<?php
require_once('classPersona.php');

$persona1 = new Persona();
$persona1 -> nombre = "Eduardo";
$persona1 -> apellido = "Gonzalez";
$persona1 -> edad = 40;

print_r($persona1);


?>