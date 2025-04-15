
<?php

/* # DWWM2411
* Exception spécialisée/gestion de code d'erreurs
* CDC
Je jette un dé sans arrêt (jusqu'à ce que j'ai 6 auquel cas, c'est fini!)
S'il est pair je considère que c'est une erreur grave, sinon un warning.
L'erreur doit être affichée à l'écran (rouge pour erreur, orange pour warning) et est de plus stockée dans un fichier de log (log.txt)
comportant la date courante.

Bonus: le libellé des messages est externe au fichier php (dans un fichier de propriétés)

* Exigences:
- POO
- une classe d'exception spécifique

* technique
- exception spécialisée:
class DieException extends Exception {
}
- fichier de propriétés (si Bonus): les messages d'erreur sont dans un fichier de propriétés
avec la fonction php: parse_ini_file,
on peut lire un fichier de propriétés, ex: "conf.ini", dont la structure est:
; Les commentaires commencent par ';'
code1 = ERREUR dé=
code2 = WARNING dé=
...
code:
$errorMessages = parse_ini_file("conf.ini");
dans $errorMessages["code1"] j'ai "ERREUR dé="
- la date courante: cf php.net, date()

* rendu fichier log.txt:
2025/04/11 14:00:23 ERREUR dé=4
2025/04/11 14:00:35 WARNING dé=1
*/
class DieThrowing
{

    private int $throwing;

    public function __construct() {}

    public function throwDie()
    {
        $value = rand(1, 6);
        echo "Throwing die <br>";
        //echo $value;
       do {
            if ($value == 1) {
                echo "Resultat 1 <br>";
                throw new CustomException("Value1 <br>");
            }
            if ($value == 2) {
                echo "Resultat 2 <br>";
                throw new CustomException("Value 2 <br>");
            }
            if ($value == 3) {
                echo "Resultat 3 <br>";
                throw new CustomException("Value 3 <br>");
            }
            if ($value == 4) {
                echo "Resultat 4 <br>";
                throw new CustomException("Value 4 <br>");
            }
            if ($value == 5) {
                echo "Resultat 5 <br>";
                throw new CustomException("Value 5 <br>");
            }
            if ($value == 6) {
                echo "Resultat 5 <br>";
                throw new CustomException("Value 6 <br>");
            }
        } while ($value !=6);


    }

    public function exec()
    {
        
        try {
            $this->throwDie();
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }
}



class CustomException extends Exception
{
    // exception spécialisée, hérite de l'exception standard
    public function myCustomMessage($errorMsg)
    { // rajoute une nouvelle méthode

        if($errorMsg==1){
            $errorMsg = 'Erreur à la ligne: ' . $this->getLine() .
            ', fichier: ' . $this->getFile() . ': <b>' . $this->getMessage() .
            '</b> ne peut pas être un diviseur';
        return $errorMsg;
        }
        if($errorMsg==2){
            $errorMsg = 'Erreur à la ligne: ' . $this->getLine() .
            ', fichier: ' . $this->getFile() . ': <b>' . $this->getMessage() .
            '</b> ne peut pas être un diviseur';
        return $errorMsg;
        }
        if($errorMsg==3){
            $errorMsg = 'Ok: ' . $this->getLine() .
            ', fichier: ' . $this->getFile() . ': <b>' . $this->getMessage() .
            '</b> ne peut pas être un diviseur';
        return $errorMsg;
        }
        if($errorMsg==4){
            $errorMsg = 'Warning: ' . $this->getLine() .
            ', fichier: ' . $this->getFile() . ': <b>' . $this->getMessage() .
            '</b> ne peut pas être un diviseur';
        return $errorMsg;
        }
        if($errorMsg==5){
            $errorMsg = 'Erreur critique: ' . $this->getLine() .
            ', fichier: ' . $this->getFile() . ': <b>' . $this->getMessage() .
            '</b> ne peut pas être un diviseur';
        return $errorMsg;
        }
        if($errorMsg==6){
            $errorMsg = 'Erreur Fatal: PROGRAMM TERMINE';
        return $errorMsg;
        }

    }
}

$throw1 = new DieThrowing();
$throw1->exec();
?>