<?php 

/*Faire le programme de calcul d'un taux d'interet et trouver en combien d'annes on double le capital*

Un montant soumis a un certain taux annuel.*/

function calculerTaux ($T){
    $A=0;//Años
    $B=1;//Capital
    
    if ($T>0){
        while($B<2){
            $B = $B*(1+$T);
            $A++;
            echo "Año:".$A."  Capital ".$B."<br>";
        }
    } else 
    echo "La taux n'est pas valdie";
}

function PGCD ($A,$B){
    while ($B!=0){// Je verifie que B ne soit pas 0
        $R= $A%$B;
        echo "A:".$A." B:".$B." R:".$R."<br>";
        $A=$B;
        $B=$R;
        
    }
}

function PGCD2 ($A,$B){

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taux</title>
</head>
<body>
    <p><?php calculerTaux($_GET["taux"]); ?></p>
    <p><?php PGCD($_GET["A"],$_GET["B"]); ?></p>
</body>
</html>