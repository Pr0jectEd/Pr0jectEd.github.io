<?php

require_once "Square.php";
require_once "Rectangle.php";


$figure1= new Rectangle(3,5,"green",4.5,7);
$figure2= new Square(5,6,"red",4);
$figure3= new Rectangle(5,6,"red",4,6.2);
$figure4= new Square(5,6,"red",5);
$figure5= new Square(5,6,"red",3);

$tableauFigures = [$figure1,$figure2,$figure3,$figure4,$figure5];
$html=[];
function presentation(array $arrayFigures){
    foreach($arrayFigures as $figure){
        echo "<p>".$figure."</p><br>";
    }
}









?>