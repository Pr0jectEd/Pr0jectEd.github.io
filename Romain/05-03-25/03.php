<?php

/*Ecrire un programe demandant a l'utilisateur de saisir un entier strictement positiv et reealisant l'affichage ci dessous(aucune croix ne doit etre adjacente horizontalement ou verticalement a une autre croix

X0X0X0X0X0X0
0X0X0X0X0X0X
X0X0X0X0X0X0
0X0X0X0X0X0X
*/


/* function croix2($numero){
    for ($i = 0; $i < $numero; $i++) {

        for ($j = 0; $j < 10; $j++) {
            if ($j % 2 == 0) {
                echo "X";
            } else {
                echo "0";
            }
        }
        echo "<br>";
    };
}
 */
function croix3($numero){
    for ($i = 0; $i < $numero; $i++) {
        if($i%2==0){
            for ($j = 0; $j < 10; $j++) {
                if ($j % 2 == 0) {
                    echo "X";
                } else {
                    echo "0";
                }
            }
            echo "<br>";

        } else {
            for ($j = 0; $j < 10; $j++) {
                if ($j % 2 == 0) {
                    echo "0";
                } else {
                    echo "X";
                }
            }
            echo "<br>";
        }
    };
}

function croix4($numero) {
    $sX0 = str_repeat('X0', 5);
    $s0X = str_repeat('0X', 5);
    
    for ($i = 0; $i < $numero; $i++) {
        echo $i % 2 == 0 ? $sX0 : $s0X;
        echo "<br>";
    }
}

function croixProf1($nombre){
    //boucle pour les lignes:
    for ($ligne =1 ; $ligne < $nombre; $ligne++){

        //boucle pour les colonnes
        for($colonne = 1 ; $colonne <= $nombre; $colonne++){
        /*on ecrit une croix si ligne impare ET colonne impaire
            OU
                ligne paire ET colonne paire*/
            if(($ligne % 2 != 0 and $colonne % 2 != 0)){

                 
            }
        }

    }
}

function croixProf2($nombre){
    if($nombre > 0)
    {
        $i = 1;
        while($i <= $nombre)
        {
            $j = 1;
            $k = $i;
            while($j <= $nombre)
            {
                if($k %2 != 0)
                {
                    echo "X";
                }else
                {
                    echo "0";
                } 
                $j++;
                $k++;
                   
            }
            echo '<br>';
            $i++;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php //echo croix2(3);?></p>
    <p><?php //echo croix2($_GET["m"]);?></p>
    <p><?php echo croix3($_GET["m"]);?></p>
    <p><?php echo croix4($_GET["m"]);?></p>
    <p><?php echo croixProf2($_GET["m"]);?></p>
    <!-- Pour afficher quelque chose avec le parametre cest: http://localhost/PHP/Romain/05-03-25/03.php?m=5 sur le navigateur -->
</body>
</html>

